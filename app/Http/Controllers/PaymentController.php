<?php

namespace App\Http\Controllers;

use App\Package;
use App\PaypalSetting;
use App\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        $userpackage = UserPackage::where('id', $request->id)->latest('created_at')->first()->package_id;
        $package = Package::where('id', $userpackage)->first();
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        ///Cart Product Add
        $item_1 = new Item();
        $item_1->setName($package->name) /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($package->price); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($package->price);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status')) /** Specify return URL **/ //Route Success Message
        ->setCancelUrl(URL::route('status')); //Error Message
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::back();
            } else {
                Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::back();
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        Session::put('error', 'Unknown error occurred');
        return Redirect::back();
    }
    public function status(Request $request){
        $payment_id = Session::get('paypal_payment_id');

        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            dd("error");
            return Redirect::to('/');

        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            dd("success");
            return Redirect::to('/');

        }

        dd("error");
        return Redirect::to('/');
    }
    public function save_setting(Request $request){
        PaypalSetting::truncate();
        $set = new PaypalSetting();
        $set->client_id = $request->client_id;
        $set->client_secret = $request->client_secret;
        $set->mode = $request->mode;
        if($set->save()){
            $this->changeEnv(['PAYPAL_CLIENT_ID' => $request->client_id]);
            $this->changeEnv(['PAYPAL_SECRET' => $request->client_secret]);
            $this->changeEnv(['PAYPAL_MODE' => strtolower($request->mode)]);
            return redirect()->back()->with("success" , "Setting saved Successfully!");
        }
    }
    public function paypal_setting(Request $request){
        return view('paypalSetting.create');
    }
    public function changeEnv($data = array()){
        if(count($data) > 0){

// Read .env-file
            $env = file_get_contents(base_path() . '/.env');

// Split string on every " " and write into array
            $env = preg_split('/\s+/', $env);;

// Loop through given data
            foreach((array)$data as $key => $value){

// Loop through .env-data
                foreach($env as $env_key => $env_value){

// Turn the value into an array and stop after the first split
// So it's not possible to split e.g. the App-Key by accident
                    $entry = explode("=", $env_value, 2);

// Check, if new key fits the actual .env-key
                    if($entry[0] == $key){
// If yes, overwrite it with the new one
                        $env[$env_key] = $key . "=" . $value;
                    } else {
// If not, keep the old one
                        $env[$env_key] = $env_value;
                    }
                }
            }

// Turn the array back to an String
            $env = implode("\n", $env);

// And overwrite the .env with the new data
            file_put_contents(base_path() . '/.env', $env);

            return true;

        } else {
            return false;
        }
    }
}
