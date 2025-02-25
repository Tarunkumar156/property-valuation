<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_phone');
            $table->integer('type'); // Company Or Indiual

            // $table->string('otp')->nullable();
            // $table->string('password');

            $table->boolean('is_accountactive', array(0, 1))->default(1);
            $table->string('api_token', 60)->unique()->nullable();
            $table->string('slack', 100)->nullable();

            $table->string('avatar')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('last_loginsessionid')->nullable();
            $table->string('last_sessionid')->nullable();
            $table->string('usertype');

            // $table->double('latitude')->nullable();
            // $table->double('longitude')->nullable();

            // $table->string('doornumber')->nullable();
            // $table->string('city')->nullable();
            // $table->string('state')->nullable();
            // $table->string('country')->nullable();
            // $table->string('address_lineone')->nullable();
            // $table->string('address_linetwo')->nullable();
            // $table->integer('pincode')->nullable();
            // $table->string('landmark')->nullable();

            // $table->string('device_token')->nullable();
            // $table->string('device_model')->nullable();
            // $table->string('device_brand')->nullable();
            // $table->string('device_manufacturer')->nullable();

            // $table->string('pan_front')->nullable();
            // $table->string('pan_back')->nullable();
            // $table->string('aadhar_front')->nullable();
            // $table->string('aadhar_back')->nullable();

            $table->text('note')->nullable();
            $table->string('sys_id')->unique();
            $table->string('uniqid')->unique();
            $table->uuid('uuid')->unique();
            $table->integer('sequence_id');
            $table->boolean('active', array(0, 1))->default(1);

            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
};
