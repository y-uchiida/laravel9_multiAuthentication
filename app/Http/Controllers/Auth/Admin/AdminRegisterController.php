<?php

/* 管理者ユーザーの追加処理を担うController
 * 以下のコマンドでひな形を生成
 * vendor/bin/sail artisan make:controller Auth/Admin/AdminRegisterController
 */

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin; // 管理者ユーザーの登録を行うため、Admin モデルを利用する
use Illuminate\Support\Facades\Hash; // パスワードのハッシュ化のために利用する
use Illuminate\Validation\Rules; // バリデーションの共通ルールを読み込みする

class AdminRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function create(Request $request)
    {
        // ユーザーがフォームに入力した内容を、以下の条件でバリデーションする
        // 条件を満たさなかった場合、管理者ユーザーの登録画面に戻る
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // バリデーションが成功した場合、以降の処理が実行される

        // フォームの入力内容を使って、管理者ユーザーのレコードを作成する
        // モデルのcreate() メソッドは、配列で渡された項目を受け取ってオブジェクトを生成し、
        // その内容でデータベースへの反映まで行う
        $newAdminUser = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 作成した管理者ユーザーでログインを行う
        auth('admin')->login($newAdminUser);

        // ログイン後、トップ画面へ戻る
        return redirect('/');
    }
}