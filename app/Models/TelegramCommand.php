<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelegramCommand extends Model
{
    use HasFactory;

    # Вместо Fillable - тем самым прописываем только защищенные колонки
    # Которые нельзя будет редактировать или менять при создании
    protected $guarded = ['id'];
}
