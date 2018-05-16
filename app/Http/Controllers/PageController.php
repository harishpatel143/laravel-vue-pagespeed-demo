<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class PageController extends Controller
{

    public function index(Request $request)
    {
        // Send a GET request to: http://www.foo.com/bar
        $response = Curl::to('https://www.googleapis.com/pagespeedonline/v4/runPagespeed')
                ->withData(array('url' => $request->url))
                ->get();

        return response();
    }

    public function result()
    {
        return view('result');
    }

}
