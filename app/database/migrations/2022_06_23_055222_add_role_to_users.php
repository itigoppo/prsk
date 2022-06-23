<?php

use App\Enums\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', Role::getValues())->default(Role::SUBSCRIBER)
                ->after('password')
                ->index('idx_role')
                ->comment('管理ロール(subscriber:購読者、contributor:寄稿者、author:投稿者、editor:編集者、administrator:管理者)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('idx_role');
            $table->dropColumn('role');
        });
    }
}
