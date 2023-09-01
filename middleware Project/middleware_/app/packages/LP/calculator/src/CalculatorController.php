<?php

namespace LP\Calculator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function add($num1, $num2)
    {
        $result = $num1 + $num2;
        // return view('result',compact('result'));
        return view('calculator::result', compact('result'));
    }
    public function subtract($num1, $num2)
    {
        $result = $num1 - $num2;
        // return view('result',compact('result'));
        return view('calculator::result', compact('result'));
    }
    public function counterHome()
    {
        $num = "";
        $result ="";
        $data = compact('result', 'num');
        return view('calculator::counter')->with($data);;
    }
    public function counter($num)
    {
        $num = $num++;
        $result = $num++;
        $data = compact('result', 'num');
        return view('calculator::counter')->with($data);
    }
}