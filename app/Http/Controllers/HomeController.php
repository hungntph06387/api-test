<?php

namespace App\Http\Controllers;

use App\Models\Convert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{

    public function index()
    {
        return view('/homepage');
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

    public function convert(Request $request)
    {
        $str          = $request->str;
        $to           = $request->to;
        $mode         = $request->mode;
        $romajiSystem = $request->romajiSystem;
        $user_id      = $request->user_id;

        $checkStr = DB::table('converts')
            ->where('str','=', $str)
            ->where('to','=',$to)
            ->where('mode','=',$mode)
            ->where('user_id', '=', $user_id)
            ->first();

        if($checkStr){
            $result = $checkStr->cv;
            $content= json_decode($result);
            return response()->json($content);
        }else{
            $url = "https://api.kuroshiro.org/convert";
            $client = new \GuzzleHttp\Client();
            $response = $client->post($url, [
                \GuzzleHttp\RequestOptions::JSON => [
                    'str'          => $str,
                    'to'           => $to,
                    'mode'         => $mode,
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
                'user_id'     => $user_id
            ]);
            return response()->json($content);
        }
    }

}
