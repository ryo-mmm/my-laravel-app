{{-- layouts/app.blade.php のレイアウトを継承します --}}
@extends('layouts.app')

@section('title', $page_title ?? 'タスク管理')

@section('content')

    <h1>タスク一覧</h1>

    <form action="/" method="POST">
        @csrf

        <input type="text" name="description" placeholder="新しいタスクを入力" value="{{ old('description') }}">

        @error('description')
            <div style="color: red;">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">タスクを追加</button>
    </form>

    <hr>

    @if ($tasks->isEmpty())
        <p>まだタスクがありません。</p>
    @else
        <ul>
            @foreach ($tasks as $task)
                <li style="font-size: 1em; line-height: 1.5;">

                    {{-- PATCHリクエストとして送信 --}}
                    <form action="{{ url('/task/' . $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('PATCH')

                        {{-- 打ち消し線が必要なタスクの説明部分 --}}
                        <span style="display: inline-block; vertical-align: middle;
                                    text-decoration: {{ $task->is_completed ? 'line-through' : 'none' }};
                                    color: {{ $task->is_completed ? '#aaa' : '#333' }};">
                            ID: {{ $task->id }} - {{ $task->description }}
                        </span>

                        {{-- 状態変更ボタン --}}
                        <button type="submit"
                                style="cursor: pointer; border: none; background: none; padding: 0; text-align: left;
                                    color: #333; display: inline-block; vertical-align: middle; font-size: 1em">

                            {{-- 状態表示テキスト --}}
                            <span style="color: #6c757d; margin-left: 10px;">
                                ({{ $task->is_completed ? '元に戻す' : '完了！' }})
                            </span>
                        </button>
                    </form>

                    <form action="{{ url('/task/' . $task->id) }}" method="POST" style="display: inline; margin-left: 20px;">
                        @csrf
                        {{-- 削除にはDELETEメソッドを使用 --}}
                        @method('DELETE')

                        <button type="submit" style="color: red; cursor: pointer; border: none; background: none; padding: 0; font-size: 1em;"
                            onclick="return confirm('本当にこのタスクを削除しますか？');">
                            [削除]
                        </button>
                    </form>

                </li>
            @endforeach
        </ul>
    @endif

@endsection