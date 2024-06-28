<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $except = [
//        'payment/*', // exclude all URLs with payment/ prefix
//        'user/add' // exclude exact URL
        '*',
    ];
}
