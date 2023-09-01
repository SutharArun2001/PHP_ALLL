<?php

namespace App\Http\Controllers;

use App\Models\Fruits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * Summary of FruitController
 */
class FruitController extends Controller
{
    /**
     * Route function for fetching data from api
     * @return string
     */
    public function api(){
        $data = Http::get('https://fruityvice.com/api/fruit/all');
        $fruits = json_decode($data);
        foreach ($fruits as $value) {
            $fruit = new Fruits;
            $fruit->fruit_id = $value->id;
            $fruit->genus = $value->genus;
            $fruit->name = $value->name;
            $fruit->family = $value->family;
            $fruit->order = $value->order;
            $fruit->protein = $value->nutritions->protein;
            $fruit->carbohydrates = $value->nutritions->carbohydrates;
            $fruit->fat = $value->nutritions->fat;
            $fruit->calories = $value->nutritions->calories;
            $fruit->sugar = $value->nutritions->sugar;
            $fruit->save();
        }
        return route('fruits');
    } 

    /**
     * show all all Fruits
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function allFruits(){
        $fruits =  Fruits::paginate(10);
        $data = compact('fruits');
        return view('fruits.allFruits')->with($data);
    }

    /**
     * adding Fruits to favroute
     * @param Request $req
     * @return string
     */
    public function addFavourite(Request $req){
        $fruit_id = $req->id;
        $fruits = Fruits::where('fruit_id',$fruit_id)->first();
        if($fruits->favourite_flag == 1){
            $fruits->favourite_flag = 0;
            $fruits->update();
            return "remove";
        }else{
            $fruits->favourite_flag = 1;    
            $fruits->update();
            return "added";
        }
    }

    /**
     * show all Favourites
     * @return void
     */
    public function allFavourites(){
        $fruits = Fruits::where('favourite_flag', 1)->paginate(10);
        // dd($fruits);
        $data = compact('fruits');
        return view('fruits.allFruits')->with($data);
    }

    /**
     * Summary of findFruits
     * @return mixed
     */
    public function findFruits(Request $request){
        $fruitname =  $request->name;
        $fruits =  Fruits::where('name','like','%'.$fruitname.'%')->get();
        // return "find";
        // return view('fruits.allFruits')->with($data);
        return response(
            $fruits,
        );
    }
 
}
