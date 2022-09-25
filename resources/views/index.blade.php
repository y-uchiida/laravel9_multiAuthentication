<x-guest-layout>
    <div class="bg-gray-100 h-screen w-screen">

        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Laravel 9 Multi Auth Sample
                </h2>
                <ul class="flex space-x-8">

                    @if (auth()->user())
                        {{-- 一般ユーザーとしてログインしている場合、ログアウトのボタンを表示する --}}
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <input type="submit" value="一般ユーザーログアウト">
                            </form>
                        </li>
                    @else
                        {{-- 一般ユーザーとしてログインしていない場合は、一般ユーザー用ログインのリンクを表示する --}}
                        <li><a href="/login">一般ユーザーログイン</a></li>
                    @endif

                    @if (auth('admin')->user())
                        {{-- 管理者ユーザーとしてのログイン状態を判定するので、auth('admin') でguardを指定する --}}
                        {{-- 管理者ユーザーとしてログインしている場合、ログアウトのボタンを表示する --}}
                        <li>
                            <form action="/admin/logout" method="POST">
                                @csrf
                                <input type="submit" value="管理者ユーザーログアウト">
                            </form>
                        </li>
                    @else
                        {{-- 管理者ユーザーとしてログインしていない場合は、管理者ユーザー用ログインのリンクを表示する --}}
                        <li><a href="/admin/login">管理者ユーザーログイン</a></li>
                    @endif

                </ul>
            </div>
        </header>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <section class="mb-4">
                            <h2 class="text-xl">これは何</h2>
                            <p>一般ユーザーと管理者ユーザーの情報を別々のテーブルで分けて管理する機能(マルチ認証)を実装したLaravel9 のサンプルアプリケーションです</p>
                            <p>この画面の右上にあるリンクから、一般ユーザー、管理者ユーザーでそれぞれログインすることができます</p>
                        </section>

                        <h2 class="text-xl">ログイン状況</h2>

                        <section class="mb-4">
                            <h3 class="text-lg">一般ユーザー</h3>
                            {{-- 一般ユーザーのログイン状況を表示する --}}
                            @if (auth()->user())
                                ログイン中(ユーザー名: {{ auth()->user()->name }})
                            @else
                                未ログイン
                            @endif
                        </section>

                        <section class="mb-4">
                            <h3 class="text-lg">管理者ユーザー</h3>
                            {{-- 管理者ユーザーのログイン状況を表示する --}}
                            @if (auth('admin')->user())
                                {{-- 管理者ユーザーとしてのログイン状況を確認するので、admin ガードを指定する --}}
                                ログイン中(ユーザー名: {{ auth('admin')->user()->name }})
                            @else
                                未ログイン
                            @endif
                        </section>

                        <h2 class="text-xl">ユーザー登録</h2>
                        <ul>
                            <li class="underline"><a href="/register">一般ユーザー登録</a></li>
                            <li class="underline"><a href="/admin/register">管理者ユーザー登録</a></li>
                        </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
