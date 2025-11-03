<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GreetingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// トップページをタスク一覧表示に紐づけ
Route::get('/', [GreetingController::class, 'showTasks']);

// トップページをタスク一覧表示に紐づけ (GETリクエスト)
Route::get('/', [GreetingController::class, 'showTasks']);

// トップページへのタスク投稿処理 (POSTリクエスト)
Route::post('/', [GreetingController::class, 'storeTask']);

// ★ タスクの状態更新処理 (PATCHリクエスト)
Route::patch('/task/{task}', [GreetingController::class, 'updateTask']);

// ★ タスクの削除処理 (DELETEリクエスト)
Route::delete('/task/{task}', [GreetingController::class, 'deleteTask']);