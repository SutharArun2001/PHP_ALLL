<?php
use LP\Calculator\CalculatorController;

Route::get('calculator',function(){
    echo "hello from packages";
});

Route::get('counter', [CalculatorController::class,'counterHome'])->name('counterHome');
Route::get('counter/{num?}', [CalculatorController::class,'counter'])->name('counter');
Route::get('add/{num1}/{num2}', [CalculatorController::class,'add'])->name('add');
Route::get('substract/{num1}/{num2}', [CalculatorController::class,'substract'])->name('substact');

?>