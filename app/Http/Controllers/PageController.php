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
        $image = $this->getGooglePageSpeedScreenshot($response['id']);
        
        return response(['response' => $response, 'issues' => $issues, 'suggetions' => $suggetions, 'image' => $image], 200);
    }

    /**
     * Get Google Page Speed Screenshot
     *
     * Uses Google's Page Speed API to generate a screenshot of a website. 
     * Returns the image as  a base64 jpeg image tag
     * 
     * Usage Example:
     * echo getGooglePageSpeedScreenshot("http://ghost.org", 'class="thumbnail"');
     * 
     * 
     * @author jaseclamp <https://gist.github.com/jaseclamp>
     * @author <andrew@nomstock.com>
     * @link https://gist.github.com/simpliwp/e6b69e3eb5a3bc1dc081#file-get-webpage-thumbnails-from-google
     * @link https://gist.github.com/jaseclamp/d4ac6205db352e822ff6
     * #ref: http://stackoverflow.com/a/22342840/3306354
     * 
     * 
     * @param string $site The url of the site you want to capture
     * @param string $img_tag_attributes The img tag attributes to add 
     * @return string A base64 coded jpg img tag. Simply echo it out wherever you want the image.
     */
    public function getGooglePageSpeedScreenshot($site, $img_tag_attributes = "border='1'")
    {
        #initialize
        $use_cache = false;
        $apc_is_loaded = extension_loaded('apc');

        #set $use_cache
        if ($apc_is_loaded) {
            apc_fetch("thumbnail:" . $site, $use_cache);
        }

        $stream_opts = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
            ]
        ];

        if (!$use_cache) {
            $image = file_get_contents("https://www.googleapis.com/pagespeedonline/v1/runPagespeed?url=$site&screenshot=true", false, stream_context_create($stream_opts));
            $image = json_decode($image, true);
//            echo '<pre>'; print_r($image);die;
            $image = $image['screenshot']['data'];
            if ($apc_is_loaded) {
                apc_add("thumbnail:" . $site, $image, 2400);
            }
        }

        $image = str_replace(array('_', '-'), array('/', '+'), $image);
        return "data:image/jpeg;base64," . $image;
    }

    public function home()
    {
        return view('home');
    }

}
