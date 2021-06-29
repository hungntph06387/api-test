<?php

namespace App\Http\Controllers;

use App\Models\Convert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }


    public function res(Request $request)
    {
        $str = $request->input('str');
        $to = $request->input('to');
        $mode = $request->input('mode');
        $romajiSystem = $request->input('romajiSystem');
        $user_id = $request->input('user_id');

        $checkStr = Convert::where('str', '=', $str)->first();

        if($checkStr){
            $result = $checkStr->cv;
            $content= json_decode($result);
            return view('home', compact('content'));
        }
        else{
            $url = "https://api.kuroshiro.org/convert";
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url, [
                \GuzzleHttp\RequestOptions::JSON => [
                    'str' => $str,
                    'to' => $to,
                    'mode' => $mode,
                    'romajiSystem' => $romajiSystem
                ],
            ]);
            $content = json_decode($response->getBody(), true);
            Convert::create([
                'str'         => $str,
                'to'          => $to,
                'mode'        => $mode,
                'romajiSystem'=> $romajiSystem,
                'cv'          => $response->getBody(),
                'user_id'     => $user_id,
            ]);

            return view('home', compact('content'));
        }
    }

    public function historyConvert($id)
    {
        $historys = User::find($id)->converts;
        return view('pages.history', compact('historys'));
    }

    public function deleteHistory($id)
    {
        Convert::where('id', $id)->delete();
        return back()
            ->with('success', 'Delete success!');
    }

}
