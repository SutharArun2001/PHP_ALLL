<?php

namespace App\Console\Commands;

use App\Models\Fruits;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getFruitApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getFruits';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch data from Api and store in local database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $data = Http::get('https://fruityvice.com/api/fruit/all');
        $fruits = json_decode($data);
        $this->info("fetching data");
        try {
            //code...
            foreach ($fruits as $value) {
                $checkFruits= Fruits::where('fruit_id',$value->id)->first();
                if($checkFruits){
                     $this->info("fruit already exit.");
                }else{
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
                $this->info("Fruit $value->name inserting Data");
            }
            }
        } catch (\PDOException $th) {
            $this->info($th);
        }
        return Command::SUCCESS;
    }
}