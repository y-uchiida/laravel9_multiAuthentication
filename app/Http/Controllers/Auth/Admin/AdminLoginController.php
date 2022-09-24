<?php

/* 管理者ユーザーのログイン処理を担うController
 * 以下のコマンドでひな形を生成
 * vendor/bin/sail artisan make:controller Auth/Admin/AdminLoginController
 */

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function adminLogin(Request $request)
    {
        // ユーザーがフォームに入力した内容を、以下の条件でバリデーションする
        // 条件を満たさなかった場合、管理者ユーザーのログイン画面に戻る
        $request->validate([
            'email' => ['required', 'email',],
            'password' => ['required', 'string', 'max:255'],
        ]);

        // バリデーションが成功した場合、以降の処理が実行される

        // フォームの入力内容を使って、管理者ユーザーとしてのログインを施行する
        if (auth('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // ログインに成功した場合は、トップ画面へ戻る
            return redirect('/');
        }

        // ログインに失敗した場合は、元の画面に戻る
        // 戻る際、入力したメールアドレスがログインフォームに表示されるように、withInputを使って値を引き渡しておく
        return back()->withInput($request->only('email'));
    }
}