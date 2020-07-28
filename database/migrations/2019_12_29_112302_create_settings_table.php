<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('website_title')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->text('custom_css')->nullable();
            $table->text('custom_js')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('analytics_code')->nullable();
            $table->boolean('cookie_alert')->default(true);
            $table->string('cookie_alert_btn_text')->default('Allow Cookies');
            $table->string('cookie_alert_text')->default('Your experience on this site will be improved by allowing cookies.');
            $table->enum('mail_driver', ['smtp','mail','sendmail','mailgun','mandrill','ses','sparkpost'])->default('smtp');
            $table->string('smtp_protocol')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_port')->default('587')->nullable();
            $table->string('smtp_security')->default('tls')->nullable();
            $table->string('mail_sendmail')->nullable();
            $table->string('mail_pretend')->nullable();
            $table->string('mailgun_domain')->nullable();
            $table->string('mailgun_secret')->nullable();
            $table->string('mandrill_secret')->nullable();
            $table->string('sparkpost_secret')->nullable();
            $table->string('ses_key')->nullable();
            $table->string('ses_secret')->nullable();
            $table->string('ses_region')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
