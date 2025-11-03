{{-- @extends('layouts.app') で、layouts/app.blade.php のレイアウトを継承します --}}
@extends('layouts.app')

{{-- @section('title') で、マスターレイアウト内の @yield('title') の内容を上書きします --}}
@section('title', 'ユーザー挨拶')

{{-- @section('content') と @endsection で囲まれた部分が、マスターレイアウトの @yield('content') に挿入されます --}}
@section('content')

    {{-- ステップ20でコントローラから受け取ったデータを表示 --}}
    <h1>{{ $message }}</h1>

    <p>このページは、共通レイアウト `layouts/app.blade.php` を使用しています。</p>
    <p>ユーザー名: **{{ $name }}**</p>

    <a href="/">トップページに戻る</a>

@endsection