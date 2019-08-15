<?php

namespace App\Http\Controllers\Backend;

use App\Models\BotUser\BotUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BotUsersController extends Controller
{
    public function index() {
    	return view('backend.bot_users.index', ['botUsers' => BotUser::getAllUsers()]);
    }
}
