<?php

/* 管理者ユーザーのテーブル admins を操作するモデル Admin
 * 以下のコマンドでひな形を生成
 * vendor/bin/sail artisan make:model Admin
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/*
 * 認証機能を利用するため、Model クラスに認証用機能を追加したクラスを継承する
 * (Illuminate\Foundation\Auth\User)
 */
// use Illuminate\Database\Eloquent\Model; // Model クラスは利用しない
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
 * メールでの通知を行うため、Notifiable トレイトを読み込む
 */
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    // admin ガードを用いて認証するので、ガード名を設定しておく
    protected $guard = 'admin';

    // Admin モデルを経由して値をまとめて変更できるカラムを制限する
    // guarded の配列で指定されたカラムは、複数項目の一括変更ができなくなる(保護される)
    protected $guarded = [
        'id',  // 事故対策
        'is_master', // 事故対策
        'created_at', // Laravelコア内部で設定するので、モデルから渡す必要がない
        'updated_at', // Laravelコア内部で設定するので、モデルから渡す必要がない
    ];

    // Admin モデルオブジェクトの取得結果から除外したいカラムを設定する
    // 取得結果に含まないことで、セキュリティリスクを排除する
    protected $hidden = [
        'password',
        'remember_token',
    ];
}