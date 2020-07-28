<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'admins',
            function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('name', 100);
                $table->string('email', 255)->unique();
                $table->string('password');
                $table->boolean('is_active')->default(1);
                $table->integer('created_by')->nullable();
                $table->integer('updated_by')->nullable();
                $table->dateTime('last_login')->nullable();
                $table->ipAddress('login_ip')->nullable();
                $table->softDeletes();
                $table->rememberToken();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
