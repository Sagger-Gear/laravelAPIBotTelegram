<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция с созданием полей в бд для реализации создания или редактирования настроек в telegram
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('название колонки настройки');
            $table->string('val')->comment('Здесь будут значения настроек');
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
        Schema::dropIfExists('telegram_settings');
    }
};
