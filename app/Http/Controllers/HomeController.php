<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function res(Request $request)
    {
        dd($request->input());

        $str = $request->input('str');
        $to = $request->input('to');
        $mode = $request->input('mode');
        $romajiSystem = $request->input('romajiSystem');

        $response = Http::post('https://api.kuroshiro.org/convert', [
            'str' => $str,
            'to' => $to,
            'mode' => $mode,
            'romajiSystem' => $romajiSystem
        ]);

        dd($response);
    }

    public function index()
    {
        dd('123');
    }
}
