<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class JobController extends Controller
{

    public function index(Request $request) {
        $url = 'https://jobs.github.com/positions.json';

        
        $page = 1;
        if($request->has('page'))
        {
            $page = $request->get('page');
        }
        $url = $url."?page=".$page;

        if($request->has('description') || $request->has('location') || $request->has('full_time')) {
            $param = http_build_query($request->all());
            $url = $url."&".$param;
        }

        $result = file_get_contents($url);
        $collect = collect(json_decode($result));

        $morePage = $page+1;
        return view("job.index", ['data' => $collect, 'page' => $morePage]);
    }

    public function show($id)
    {
        $url = 'https://jobs.github.com/positions/'.$id.'.json';
        
        $result = file_get_contents($url);
        $data = json_decode($result);

        // dd($collect);
        return view('job.show', compact('data'));
    }
}
