<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;

class UrlController extends Controller
{
    public function shorten(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);

        $originalUrl = $request->original_url;

        if(!filter_var($originalUrl, FILTER_VALIDATE_URL)){
            return response()->json(['error' => 'Invalid URL'], 400);
        }

        $shortened = substr(md5(uniqid()), 0, 8);

        $url = Url::shortenUrl($originalUrl, $shortened);

        return response()->json($url);
    }

    public function redirect($shortened)
    {
        $originalUrl = Url::getOriginalUrl($shortened);
        // return response()->json(['original_url' => $url->original_url]);
        return response()->json($originalUrl);
    }
}

