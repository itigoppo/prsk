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
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('members');
  }
};
