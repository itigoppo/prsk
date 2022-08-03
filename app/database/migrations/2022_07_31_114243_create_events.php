<?php

use App\Enums\Attribute;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->timestamp('starts_at');
            $table->timestamp('ends_at');
            $table->string('name');
            $table->string('type', 20);
            $table->enum('attribute', Attribute::getValues());
            $table->bigInteger('tune_id')->nullable();
            $table->boolean('is_key_story');
            $table->integer('story_chapter')->nullable();
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
        Schema::dropIfExists('events');
    }
}
