<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function __invoke()
    {
        return view(
            'blog.fallback'
        )->with('message', 'this is the message using the with method which accesses session');
    }
}
