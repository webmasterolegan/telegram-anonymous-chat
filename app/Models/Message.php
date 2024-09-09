<?php

namespace App\Models;

use App\Enums\MessageDirectionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Сообщения
 */
class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact_id',
        'user_id',
        'text',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'direction' => MessageDirectionEnum::class,
        ];
    }

    /**
     * Контакт, отправитель или получатель сообщений
     */
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class);
    }
}
