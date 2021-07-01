<?php

namespace App\Repositories;

use App\Models\Convert;
use App\Models\User;
use Illuminate\Http\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ConvertRepository.
 */
class ConvertRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Convert::class;
    }

    public function index()
    {
        return view('/homepage');
    }

    public function historyConvert($id)
    {
        $historys = User::find($id)->converts;
        return view('pages.history', compact('historys'));
        //return response()->json($historys);
    }

    public function deleteHistory($id)
    {
        $this->model()::where('id', $id)->delete();
        return back()->with('success', 'Delete success!');
    }

    public function convert($request)
    {
        $str          = $request->str;
        $to           = $request->to;
        $mode         = $request->mode;
        $romajiSystem = $request->romajiSystem;
        $user_id      = $request->user_id;

        $checkStr     = $this->model()::where([
            'str'     => $str,
            'to'      => $to,
            'mode'    => $mode
        ])->first();

        if ($checkStr) {
            $result   = $checkStr->cv;
            $content  = json_decode($result);
            return response()->json($content);

        } else {
            $url      = "https://api.kuroshiro.org/convert";
            $client   = new \GuzzleHttp\Client();
            $response = $client->post($url, [
                \GuzzleHttp\RequestOptions::JSON => [
                    'str'          => $str,
                    'to'           => $to,
                    'mode'         => $mode,
                    'romajiSystem' => $romajiSystem
                ],
            ]);
            $content  = json_decode($response->getBody(), true);
            $convert  = $this->model()::create([
                'str'          => $str,
                'to'           => $to,
                'mode'         => $mode,
                'romajiSystem' => $romajiSystem,
                'cv'           => $response->getBody()
            ]);
            $convert->users()->attach($user_id);
            return response()->json($content);
        }
    }
}
