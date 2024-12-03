<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->datetime('scheduled_at')->nullable();
            $table->datetime('opened_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
