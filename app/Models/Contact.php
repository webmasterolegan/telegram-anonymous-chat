<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Контакты, отправители и получатели сообьщений от пользователей
 */
class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'chat_id',
        'first_name',
        'last_name',
        'username',
        'language_code',
    ];

    /**
     * Summary of messages
     */
    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
