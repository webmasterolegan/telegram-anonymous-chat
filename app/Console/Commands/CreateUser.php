<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {name?} {email?} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Создание пользователя';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Получение ввода и дозапрос недостающих аргументов
        $inputs = [
            'name' => $this->argument('name') ?? $this->ask(__('console.create_user.name')),
            'email' => $this->argument('email') ?? $this->ask(__('console.create_user.email')),
            'password' => $this->argument('password') ?? $this->secret(__('console.create_user.password')),
        ];

        // Проверка ввода
        $validator = Validator::make($inputs, [
            'name' => 'required|string|max:255',
            'email' => 'required|unique:users|email',
            'password' => User::PASSWORD_RULE,
        ]);

        // Вывод ошибок валидации, если обнаружены
        if ($validator->fails()) {
            $this->error('Проверка ввода не пройдена!');

            $messages = $validator->errors()->messages();
            foreach ($messages as $input => $errors) {
                foreach ($errors as $error) {
                    $this->line('['.$input.'] '.$error);
                }
            }

            return;
        }

        // Данные ввода прошедшие проверку
        $validated = $validator->validated();

        $user = User::create([...$validated, 'password' => bcrypt($validated['password'])]);

        if ($user) {
            $this->info('Пользователь '.$user->name.' успешно создан!');
        } else {
            $this->error('Не удалось создать пользователя');
        }
    }
}
