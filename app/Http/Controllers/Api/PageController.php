<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function vacancy() {
        $vacancy =Vacancy::first();
        return $vacancy;
    }
}
