<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>

        @import "compass/css3";

        .box {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100vh;
        }

        .paypal-logo {
             font-family: Verdana, Tahoma;
             font-weight: bold;
             font-size: 26px;
         }

        i:first-child {
            color: #253b80;
        }

        i:last-child {
            color: #179bd7;
        }


        .paypal-button {
            padding: 15px 30px;
            border: 1px solid #FF9933;
            border-radius: 5px;
            background-image: linear-gradient(#FFF0A8, #F9B421);
            margin: 0 auto;
            display: block;
            min-width: 138px;
            position: relative
        }

        .paypal-button-title {
             font-size: 14px;
             color: #505050;
             vertical-align: baseline;
             text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);
         }

        .paypal-logo {
            display: inline-block;
            text-shadow: 0px 1px 0px rgba(255, 255, 255, 0.6);
            font-size: 20px;
        }



        body{background:#eee;}
        .package{margin:auto; width:35%; background:#fff; box-shadow:0 0 5px #aaa;}

        .pheader{float:left; width:100%; text-align:center;font-size:20px; font-weight:800;
            padding:10px;border-bottom:1px solid #aaa; margin-bottom:10px;
        }

        .pbody{padding:25px;}

        .cards{margin:auto; width:70%; margin-bottom:20px;}

        .acard_detail{float:left; width:100%; text-align:center; font-size:16px; padding-top:10px;color:#333; margin-bottom:10px;}

        .acard_detail:hover{color:#333; text-decoration:none;}

        /****/


        .package2{float:left; width:50%; background:#fff;margin-left:25%;margin-bottom:30px; box-shadow:0 0 5px #aaa; position:relative;}

        .stripe{width:100px; height:100px; border-radius:10em;
            background:url(https://stripe.com/img/v3/home/twitter.png); background-size:cover; background-position:center;
            position:absolute; top:-50px;left:43%;
            /*border:5px solid #ececec;*/
            box-shadow:0 0 5px #333;
        }

        .pheader2{float:left; width:100%; text-align:center;font-size:20px; font-weight:800;
            padding:70px 10px 10px 10px;border-bottom:1px solid #aaa; margin-bottom:10px;
        }

        .pbody2{padding:25px;}

        .cards2{float:left; width:50%; margin-bottom:20px;}

        .acard_detail2{float:left; width:100%; font-size:16px; padding-top:10px;color:#333; margin-bottom:10px;}

        .acard_detail2:hover{color:#333; text-decoration:none;}


    </style>
</head>
<body>
<div class="w3-container">
    @if ($message = Session::get('success'))
        <div class="w3-panel w3-green w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                  class="w3-button w3-green w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('success');?>
    @endif

    @if ($message = Session::get('error'))
        <div class="w3-panel w3-red w3-display-container">
            <span onclick="this.parentElement.style.display='none'"
                  class="w3-button w3-red w3-large w3-display-topright">&times;</span>
            <p>{!! $message !!}</p>
        </div>
        <?php Session::forget('error');?>
    @endif

    <form style="margin-top: 10%" method="post"
          action="{{route('paymentwithpaypal')}}">
        @csrf
        <div class="package2">
            <div class="stripe">
            </div>
            <div class="pheader2">
                Package Details
            </div>
            <div class="pbody">
                <div class="cards">
                    @foreach($package as $p)
                    <label class="w3-text"><b>Package Name</b> : {{$p->name}}</label> <br>
                    <hr>
                    <label class="w3-text"><b>Package Period</b> : {{$p->period}}</label> <br>
                    <hr>
                    <label class="w3-text"><b>Package Price</b> : ${{$p->price}} </label> <br>
                    <hr>
                    <label class="w3-text"><b>Package User</b> : {{$p->user}}</label> <br>
                    <hr>
                    <input class="w3-input w3-border" id="amount" type="hidden" value="{{$p->price}}" name="amount"></p>
                    @endforeach
                        <input type="hidden" name="id" value="{{request()->id}}">
                        <button class="paypal-button" type="submit">
                            <span class="paypal-button-title">
                              Pay now with
                            </span>
                            <span class="paypal-logo">
                                <i>Pay</i><i>Pal</i>
                            </span>
                        </button>
                </div>
                </div>
            </div>
    </form>
</div>
</body>
</html>



<!------ Include the above in your HEAD tag ---------->




