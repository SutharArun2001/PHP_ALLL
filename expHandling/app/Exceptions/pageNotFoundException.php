<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class pageNotFoundException extends Exception 
{
    function report(Exception $e)
    {
        Log::e("page not founddd");
    //     return report("page not foundd.");
        // return new JsonResponse([
        //     'error' => [
        //         'message' => $this->getMessage(),
        //     ]
        // ],$this->code);   
        // dd("is page not found.");
        // return view('error.pageNotFound');
    }

    function render()
    {
        return new JsonResponse([
            'error' => [
                'message' => $this->getMessage(),
            ]
        ]);
    }

}