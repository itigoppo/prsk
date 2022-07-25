<?php

use App\Enums\TuneType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTunes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tunes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->timestamp('released_at');
            $table->string('name');
            $table->enum('type', TuneType::getValues());
            $table->bigInteger('unit_id')->nullable();
            $table->boolean('has_3d_mv');
            $table->boolean('has_2d_mv');
            $table->boolean('has_original_mv');
            $table->integer('easy_level')->nullable();
            $table->integer('normal_level')->nullable();
            $table->integer('hard_level')->nullable();
            $table->integer('expert_level')->nullable();
            $table->integer('master_level')->nullable();
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
        Schema::dropIfExists('tunes');
    }
}
