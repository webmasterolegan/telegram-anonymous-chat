<?php

use App\Enums\MessageDirectionEnum;
use App\Models\Contact;
use App\Models\User;
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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('direction')
                ->default(MessageDirectionEnum::INCOMING->value)
                ->comment('Тип сообщения, входящие или исходящее');
            $table->foreignIdFor(Contact::class)
                ->cascadeOnDelete()
                ->nullable()
                ->comment('Контакт отправитель или получатель сообщения, если автор сообщения пользователь сервиса');
            $table->foreignIdFor(User::class)
                ->cascadeOnDelete()
                ->nullable()
                ->comment('Пользователь отправитель сообщения');
            $table->text('text')->comment('Текст сообщения');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
