<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('dialogues', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid')->unique();
      $table->bigInteger('from_member_id')->nullable();
      $table->string('from_line')->nullable();
      $table->bigInteger('to_member_id')->nullable();
      $table->string('to_line')->nullable();
      $table->string('file')->nullable();
      $table->string('note')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('dialogues');
  }
};
