<?php

namespace App\Models;

use App\Lib\Texting\TextingApi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string to
 * @property string body
 * @property ?\Carbon\Carbon sent_at
 */
class TextMessage extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = ['sent_at' => 'timestamp'];

    /**
     * Create a text message and send it out.
     *
     * @param string $to
     * @param string $body
     * @return TextMessage
     */
    public static function createAndSend(string $to, string $body): self
    {
        /** @var TextMessage $message */
        $message = self::query()->create(compact('to', 'body'));

        app(TextingApi::class)->send($message);

        return $message;
    }
}
