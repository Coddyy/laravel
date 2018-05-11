<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_M extends Model
{
	public function index()
    {
    	echo "Hi I am model";
    }
    public function insert($data)
    {
    	// echo '<pre>';
    	// print_r($data);
    	$success=\DB::table('car_repair_list')->insert(['car_number' => $data['car_number'],'owner_name' => $data['owner_name'], 'owner_mobile' => $data['owner_mobile'],'created' => date('y-m-d H:i:s'),'status' =>'0']);
    	if($success)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
}