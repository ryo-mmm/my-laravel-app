<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class GreetingController extends Controller
{
    /**
     * URLパラメータからユーザー名を受け取り、ビューを表示する。
     *
     * @param string $name URLから受け取ったユーザー名
     * @return \Illuminate\View\View
     */
    public function showTasks()
    {
        // Task::all() で tasks テーブルの全てのレコード（行）を取得します
        $tasks = Task::all();

        $data = [
            'page_title' => 'タスクリスト',
            'tasks' => $tasks, // 取得したタスクのコレクションをビューに渡します
        ];

        // 新しいビューファイル 'task.index' を使用します
        return view('task.index', $data);
    }

    /**
     * 新しいタスクをデータベースに保存する（Create操作）。
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function storeTask(Request $request)
    {
        // 1. バリデーション（入力チェック）：descriptionが必須であることを確認
        $request->validate([
            'description' => 'required|max:255',
        ]);

        // 2. データベースへ保存
        Task::create([
            'description' => $request->description,
            'is_completed' => false, // デフォルトは未完了
        ]);

        // 3. リダイレクト：フォームの再送信を防ぐため、一覧ページへ戻る
        return redirect('/');
    }

    /**
     * 指定されたタスクの状態（is_completed）を反転させて更新する（Update操作）。
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateTask(Task $task)
    {
        // 1. 状態を反転させる（true なら false に、false なら true にする）
        $task->is_completed = !$task->is_completed;

        // 2. データベースに保存
        $task->save();

        // 3. 一覧ページへ戻る
        return redirect('/');
    }

    /**
     * 指定されたタスクをデータベースから削除する（Delete操作）。
     *
     * @param  \App\Models\Task  $task ルーティングで受け取ったIDに対応するTaskモデルのインスタンス
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTask(Task $task)
    {
        // 1. データベースから該当レコードを削除
        $task->delete();

        // 2. 一覧ページへ戻る
        return redirect('/');
    }
}
