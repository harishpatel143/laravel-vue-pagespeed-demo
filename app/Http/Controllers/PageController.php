<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class PageController extends Controller
{

    public function index(Request $request)
    {
        $response = json_decode(Curl::to('https://www.googleapis.com/pagespeedonline/v4/runPagespeed')
                        ->withData(array('url' => $request->pageUrl))
                        ->get(), true);
        $suggetions = [];
        $issues = [];
        $value = '';
        if (isset($response)) {
            foreach ($response as $key => $values) {
                if ($key == 'formattedResults') {
                    if ($values['ruleResults']) {
                        foreach ($values['ruleResults'] as $rule) {
                            if ($rule['ruleImpact'] == 0) {
                                $suggetions[] = $rule;
                            } else {
                                $issues[] = $rule;
                            }
                        }
                    }
                }
            }
        }

        return response(['response' => $response, 'issues' => $issues, 'suggetions' => $suggetions], 200);
    }

    public function home()
    {
        return view('home');
    }

}
