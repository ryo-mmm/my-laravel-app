<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ロジカル開発 - @yield('title')</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f4f4f4; }
        .container { max-width: 800px; margin: 40px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        header { background-color: #333; color: white; padding: 10px 0; text-align: center; }
        footer { margin-top: 30px; padding-top: 10px; border-top: 1px solid #ccc; text-align: center; color: #777; font-size: 0.9em; }
    </style>
</head>
<body>
    <header>
        <h1>Web開発 ロジカル・ガイド (共通ヘッダー)</h1>
    </header>

    <div class="container">
        {{-- @yield('content')が、各子ビュー（ページ固有の内容）が挿入される場所です。 --}}
        @yield('content')
    </div>

    <footer>
        <p>Copyright © {{ date('Y') }} Logic Guide. All rights reserved.</p>
    </footer>
</body>
</html>