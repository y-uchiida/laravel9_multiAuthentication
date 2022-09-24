<?php

/* 管理者ユーザーの情報を保持するテーブル admins を生成する
 * 以下のコマンドでひな形を生成
 * vendor/bin/sail artisan make:migration create_admins_table
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->comment('管理者ユーザーのID');
            $table->string('name')->comment('管理者ユーザーの名前');
            $table->string('email')->unique()->comment('管理者ユーザーのメールアドレス');
            $table->string('password')->comment('管理者ユーザーのパスワード');
            $table->boolean('is_master')->default(false)->comment('管理者ユーザーがマスター権限を持っているかのフラグ');
            $table->rememberToken()->comment('ログイン継続機能で利用するトークン');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
};