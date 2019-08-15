<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '978302857:AAG4QFuiXnwdquiUv-1sSM__eeqCcqLluDo/webhook'
    ];

    /*
    public function __construct(\Illuminate\Foundation\Application $app, \Illuminate\Contracts\Encryption\Encrypter $encrypter) {
        $this->app = $app;
        $this->encrypter = $encrypter;
        $this->except[] = \Telegram::getAccessToken(); 
    }
    */
}
