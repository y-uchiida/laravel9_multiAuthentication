<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;

class AdminLogoutController extends Controller
{
    public function adminLogout()
    {
        // 管理者ユーザーとしてのログイン情報を破棄する
        auth('admin')->logout();

        // ログアウト処理後、トップ画面へ戻る
        return redirect('/');
    }
}