<?php

namespace App\Http\Controllers;

use App\Models\Convert;
use App\Models\ConvertUser;
use App\Models\User;
use App\Repositories\ConvertRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public $convertRepository;

    public function __construct(ConvertRepository $convertRepository)
    {
        $this->convertRepository = $convertRepository;
    }

    public function index()
    {
        return $this->convertRepository->index();
    }

    public function historyConvert($id)
    {
       return $this->convertRepository->historyConvert($id);
    }

    public function deleteHistory($id)
    {
        return $this->convertRepository->deleteHistory($id);
    }

    public function convert(Request $request)
    {
        return $this->convertRepository->convert($request);
    }

}
