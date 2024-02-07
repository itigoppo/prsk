<?php

use App\Enums\RoleEnum;
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
    Schema::table('users', function (Blueprint $table) {
      $table->enum('role', array_column(RoleEnum::cases(), 'value'))->default(RoleEnum::Subscriber->value)
        ->after('password')
        ->index('idx_role')
        ->comment('管理ロール(subscriber:購読者、contributor:寄稿者、author:投稿者、editor:編集者、administrator:管理者)');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropIndex('idx_role');
      $table->dropColumn('role');
    });
  }
};
