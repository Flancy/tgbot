<?php

namespace App\Models\BotUser;

use Illuminate\Database\Eloquent\Model;

class BotUser extends Model
{
    protected $fillable = [
        'login', 'info',
    ];

    public static function getAllUsers() {
    	$botUsers = self::get();

    	return $botUsers;
    }
}
