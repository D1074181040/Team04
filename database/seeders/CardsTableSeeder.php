<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function generateRandomstatus(){
        $status=['成功','失敗'];
        return $status[rand(0,count($status)-1)];
    }
    public function run()
    {
        for($i=0;$i<30;$i++)
        {
            $p_time=Carbon::now()->subMinute(rand(1,55));
            $status=$this->generateRandomstatus();

            DB::table('cards')->insert([
                'n_ID'=>rand(1000,2000),
                'p_time'=>$p_time,
                'status'=>$status,
                'created_at'=>$p_time,
                'updated_at'=>$p_time,
            ]);
        }

        //
    }
}
