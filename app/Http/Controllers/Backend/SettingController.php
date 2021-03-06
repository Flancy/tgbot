<?php

namespace App\Http\Controllers\Backend;

use App\Models\Dashboard\Setting;
use Telegram\Bot\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index() {
    	return view('backend.setting', Setting::getSettings());
    }

    public function store(Request $request) {
        Setting::where('key', '!=', NULL)->delete();

        foreach ($request->except('_token') as $key => $value) {
            $setting = new Setting;
            $setting->key = $key;
            $setting->value = $value;
            $setting->save();
        }

        return redirect()->route('admin.setting.index');
    }

    public function setWebhook(Request $request) {
        $result = $this->sendTelegramData('setwebhook', [
            'query' => ['url' => $request->url . '/' . \Telegram::getAccessToken() . '/webhook']
        ]);

        return redirect()->route('admin.setting.index')->with(['status' => $result]);
    }

    public function getWebhookInfo(Request $request) {
        //$result = $this->sendTelegramData('getWebhookInfo');

        $response = \Telegram::getMe();

        $botId = $response->getId();
        $firstName = $response->getFirstName();
        $username = $response->getUsername();

        return redirect()->route('admin.setting.index')->with('status', $botId);
    }

    public function sendTelegramData($route = '', $params = [], $method = 'POST') {
        $client = new \GuzzleHttp\Client([
            'base_uri' => 'https://api.telegram.org/bot' . \Telegram::getAccessToken() . '/'
        ]);
        $result = $client->request($method, $route, $params);

        return (string) $result->getBody();
    }
}
