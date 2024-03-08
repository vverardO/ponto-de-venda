<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class FallbackController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        return redirect()->route('welcome');
    }
}
