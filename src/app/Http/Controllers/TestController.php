<?php

namespace App\Http\Controllers;

use FeedrssFeeding\FeedRSS;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //

    function index(Request $request)
    {
        FeedRSS::start();
    }
}
