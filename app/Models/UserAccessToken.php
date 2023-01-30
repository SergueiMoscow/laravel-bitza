<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class UserAccessToken extends Model
{
    use HasFactory;

    public static $currentToken = null;

    protected $fillable = [
        'token',
        'tokenable_id',
        'tokenable_type',
        'name',
        'http_user_agent',
        'abilities',
        'user_id'
    ];
    protected $table = 'personal_access_tokens';

    public static function createToken(User|int $user, array $abilities = ['*'], string $name='Default') :self {
        if (gettype($user) == 'integer') {
            $user = User::findOrFail($user);
        }
        $newToken = Str::random(64);
        $token = self::create([
            'tokenable_type' => 'App\Models\User',
            'tokenable_id' => $user->id,
            'user_id' => $user->id,
            'name' => $name,
            'token' => $newToken,
            'abilities' => implode($abilities),
            'http_user_agent' => ''
        ]);
        return $token;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
