<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icons', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('path');
            $table->string('name');
            $table->string('mime_type')->nullable();
            $table->string('extension')->nullable();
            $table->string('label')->nullable();
            $table->systemColumns();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icons');
    }
}
