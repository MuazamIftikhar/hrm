<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company_id');
            $table->string('user_id');
            $table->string('lastName');
            $table->string('email');
            $table->string('shift');
            $table->string('DOB');
            $table->string('DOJ');
            $table->string('confirmationDate');
            $table->string('Gender');
            $table->string('Address');
            $table->string('employmentType');
            $table->string('martialStatus');
            $table->string('Department');
            $table->string('leave');
            $table->string('Nationality');
            $table->string('Designation');
            $table->string('Religion');
            $table->string('Race');
            $table->string('supervisorName');
            $table->string('bloodGroup');
            $table->string('POB');
            $table->string('Identification');
            $table->string('picture');
            $table->string('Number');
            $table->string('Country');
            $table->string('Postal');
            $table->string('Skill');
            $table->string('workingHour');
            $table->string('payrollType');
            $table->string('Frequency');
            $table->string('basicPay');
            $table->string('contactName');
            $table->string('Relationship');
            $table->string('contactNumber');
            $table->string('fatherName');
            $table->string('fatherID');
            $table->string('motherName');
            $table->string('motherID');
            $table->string('spouseName');
            $table->string('spouseID');
            $table->string('childName');
            $table->string('childID');
            $table->string('childTwoName');
            $table->string('childTwoID');
            $table->string('payMode');
            $table->string('Bank');
            $table->string('Code');
            $table->string('accountNumber');
            $table->string('branchCode');
            $table->string('Remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
