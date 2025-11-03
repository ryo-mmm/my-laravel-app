<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * マスアサインメント（一括代入）を許可するカラムを定義します。
     * これがないと、Task::create() などでデータ挿入ができません。
     */
    protected $fillable = [
        'description',
        'is_completed',
    ];
}
