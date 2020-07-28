<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('country')->nullable();
            $table->string('telephone_1')->nullable();
            $table->string('telephone_2')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_via')->nullable();
            $table->enum('is_subscribed', ['y', 'n'])->default('y');
            $table->enum('is_active', ['y', 'n'])->default('y');
            $table->dateTime('last_login')->nullable();
            $table->ipAddress('login_ip')->nullable();
            $table->string('login_agent')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
