<?php

/* 管理者ユーザーのテーブル admins を操作するモデル Admin
 * 以下のコマンドでひな形を生成
 * vendor/bin/sail artisan make:model Admin
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
}