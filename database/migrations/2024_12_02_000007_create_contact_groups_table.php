<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('contact_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('total_emails')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
