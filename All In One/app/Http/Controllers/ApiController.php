<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use App\Models\Student;
use App\Notifications\FruitAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

/**
 * Summary of ApiController
 */
class ApiController extends Controller
{
    /**
     * Summary of getData
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getData()
    {
        return Fruits::all();
    }

    /**
     * Summary of allFruits
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function allFruits(){
        $fruits =  Fruits::all();
        $data = compact('fruits');
        return response($data);
    }

    /**
     * Summary of addFavourite
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function addFavourite(Request $request)
    {
        $fruit_id = $request->id;
        $fruits = Fruits::where('fruit_id',$fruit_id)->first();
        $user = Student::first();
        if($fruits->favourite_flag == 1){
            $fruits->favourite_flag = 0;
            $fruits->update();
            return response([
                "status" => "remove",
            ]);
        }else{
            $fruits->favourite_flag = 1;    
            $fruits->update();
            return response([
                "status" => "added",
                ]);
        }
    }
    
    /**
     * Summary of allFavourites
     * @return mixed
     */
    public function allFavourites()
    {
        $fruits = Fruits::where('favourite_flag', 1)->get();
        $data = compact('fruits');
        return response([
            "data" => $fruits,
        ]);
    }

    /**
     * Summary of findFruits
     * @return mixed
     */
    public function findFruits(Fruits $name){
        // $fruits =  $name;
        // $data = compact('fruits');
        // return response([
        //     "data" => $name,
        // ]);
        return $name;
    }
}
