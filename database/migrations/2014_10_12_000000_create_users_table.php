<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция с созданием полей в бд для реализации создания или редактирования пользователей
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 32)->unique();
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Отмена миграции
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
