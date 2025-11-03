<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // タスクの内容を保存する文字列型（最大255文字）のカラム
            $table->string('description');
            // 完了状態（真偽値）。デフォルトは未完了（false）
            $table->boolean('is_completed')->default(false);
            // created_at と updated_at カラムを自動生成
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
