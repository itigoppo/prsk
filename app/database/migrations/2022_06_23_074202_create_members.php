<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->bigInteger('unit_id');
            $table->bigInteger('icon_id')->nullable();
            $table->string('code', 20);
            $table->string('name', 20);
            $table->string('short', 10);
            $table->string('color', 10);
            $table->string('bg_color', 10);
            $table->boolean('is_active');
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
        Schema::table('members', function (Blueprint $table) {
            Schema::dropIfExists('members');
        });
    }
}
