# laravel9_multiAuthentication

## これは何

一般ユーザーと管理者ユーザーの情報を別々のテーブルで分けて管理する機能(マルチ認証)を実装した Laravel9 のサンプルアプリケーションです  
この画面の右上にあるリンクから、一般ユーザー、管理者ユーザーでそれぞれログインすることができます

## ローカルでの動作確認

-   Docker が利用できる環境で、このリポジトリをクローンしてください
-   クローンしたリポジトリのディレクトリルートで、以下のコマンドを実行してください

    ```bash
    $ cp .env.local .env

    $ docker run --rm \
      -u "$(id -u):$(id -g)" \
      -v $(pwd):/var/www/html \
      -w /var/www/html \
      laravelsail/php81-composer:latest \
      composer install --ignore-platform-reqs

    $ vendor/bin/sail up -d

    $ vendor/bin/sail artisan key:generate

    $ vendor/bin/sail composer install

    $ vendor/bin/sail npm install

    $ vendor/bin/sail npm build

    $ vendor/bin/sail artisan migrate
    ```
