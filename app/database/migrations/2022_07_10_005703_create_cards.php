<?php

use App\Enums\Attribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->timestamp('released_at');
            $table->string('rarity');
            $table->enum('attribute', Attribute::getValues());
            $table->string('name');
            $table->bigInteger('member_id');
            $table->string('skill_effect');
            $table->string('skill_name')->nullable();
            $table->string('costume')->nullable();
            $table->boolean('has_hair_style');
            $table->integer('performance')->default(0);
            $table->integer('technique')->default(0);
            $table->integer('stamina')->default(0);
            $table->string('normal_file')->nullable();
            $table->string('after_training_file')->nullable();
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
        Schema::dropIfExists('cards');
    }
}
