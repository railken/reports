<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    
    /**
     * Return a JSON response with status success
     *
     * @param array $data
     * @param integer $code
     * 
     * @return \Illuminate\Http\Response
     */
    public function success($data, $code = 200)
    {
        return response()->json(array_merge(['status' => 'success'], $data), $code);
    }

    /**
     * Return a JSON response with status error
     *
     * @param array $data
     * @param integer $code
     * 
     * @return \Illuminate\Http\Response
     */
    public function error($data, $code = 400)
    {
        return response()->json(array_merge(['status' => 'error'], $data), $code);
    }

    /**
     * Create a new report
     *
     * @param Request $request
     *
     * @return Response
     */
    public function create(Request $request)
    {

        do {
            $hash = hash('md5', rand(0, microtime(true)) * rand(0, microtime(true)));
            $file = "reports/".$hash.".json";
        } while (Storage::disk('local')->exists($file));

        $resource = (object)['hash' => $hash, 'bugs' => []];

        Storage::put($file, json_encode($resource));

        return $this->success(['resource' => $resource]);
    }

    /**
     * Show the report
     *
     * @param string $hash
     * @param Request $request
     *
     * @return Response
     */
    public function show($hash, Request $request)
    {

        $file = "reports/".$hash.".json";

        if (!Storage::exists($file))
            $this->error([]);

        $resource = json_decode(Storage::get($file));

        return $this->success(['resource' => $resource]);
    }

    /**
     * Show the report
     *
     * @param string $hash
     * @param Request $request
     *
     * @return Response
     */
    public function update($hash, Request $request)
    {

        $file = "reports/".$hash.".json";

        if (!Storage::exists($file))
            $this->error([]);

        $resource = json_decode($request->getContent());
        $resource->hash = $hash;

        Storage::put($file, json_encode($resource));

        $resource = json_decode(Storage::get($file));


        return $this->success(['resource' => $resource]);
    }
}
