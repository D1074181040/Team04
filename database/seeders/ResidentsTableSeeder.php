<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResidentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function  generateRandomString($length=10){
        $characters='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength=strlen($characters);
        $randomString='';
        for ($i=0;$i<$length;$i++){
            $randomString .=$characters[rand(0,$charactersLength-1)];
        }
        return $randomString;
    }

    public function generateRandomName(){
        $first_name=$this->generateRandomString(rand(2,8));
        $first_name=strtolower($first_name);
        $first_name=ucfirst($first_name);
        $last_name=$this->generateRandomString(rand(2,8));
        $last_name=strtolower($last_name);
        $last_name=ucfirst($last_name);
        $p_name=$first_name." ".$last_name;
        return $p_name;
    }
    public function generateRandomphone(){
        $phone=['932456781','978456178','948785124','971524631','941578426','964178020','974852963','986102349','996541023','974123456'];
        return $phone[rand(0,count($phone)-1)];
    }

    public function generateRandomregion(){
        $region=['A','B','C'];
        return $region[rand(0,count($region)-1)];
    }
    public function generateRandomgender(){
        $gender=['男','女'];
        return $gender[rand(0,count($gender)-1)];
    }
    public function generateRandomfloor(){
        $floor=['1','2','3','4','5','6','7','8'];
        return $floor[rand(0,count($floor)-1)];
    }



    public function run()
    {
        for($i=0;$i<30;$i++)
        {
            $p_time=Carbon::now()->subMinute(rand(1,55));
            $p_name=$this->generateRandomName();
            $phone=$this->generateRandomphone();
            $gender=$this->generateRandomgender();
            $region=$this->generateRandomregion();
            $floor=$this->generateRandomfloor();

            DB::table('residents')->insert([
                'n_ID'=>rand(1000,2000),
                'p_name'=>$p_name,
                'phone'=>$phone,
                'gender'=>$gender,
                'region'=>$region,
                'floor'=>$floor,
                'created_at'=>$p_time,
                'updated_at'=>$p_time,
            ]);
        }


        //
    }
}
