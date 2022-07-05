<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('from_member_id')->nullable();
            $table->string('from_line')->nullable();
            $table->bigInteger('to_member_id')->nullable();
            $table->string('to_line')->nullable();
            $table->string('file')->nullable();
            $table->string('note')->nullable();
            $table->systemColumnsWithSoftDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}
