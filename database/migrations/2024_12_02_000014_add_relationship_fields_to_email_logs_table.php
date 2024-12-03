<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEmailLogsTable extends Migration
{
    public function up()
    {
        Schema::table('email_logs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10299439')->references('id')->on('users');
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->foreign('contact_id', 'contact_fk_10299440')->references('id')->on('contacts');
            $table->unsignedBigInteger('template_id')->nullable();
            $table->foreign('template_id', 'template_fk_10299447')->references('id')->on('email_templates');
        });
    }
}
