<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyModel as MyModel;

class MyController extends Controller
{
    //
    public function index()
    {
    	 echo "hello controller";
    	// $data = array('name' =>'Abhra' ,
    	// 			  'email'=>'cadtestmymail@gmail.com');
    	return view('myview');
    }
    public function submit(Request $request)
    {
        $name=$request->get('name');
        $model = new MyModel();
        $model->name=$name;
        $success=$model->save();
        if($success)
        {
            echo "Success";
        }
        else
        {
            echo "Failed";
        }
    }
    public function my_api(Request $request)
    {

        $model = new MyModel();
        $model->name=$request->get('name');
        $model->email=$request->get('email');
        //$success=$model->save();
        $model->save();
        $id=$model->id;
        date_default_timezone_set('Asia/Kolkata');
        $data=array(
            'package_id'=>$request->get('package_id'),
            'user_id'=>$id,
            'created'=>date('Y-m-d H:i:s')

            );
        $ok=\DB::table('subscription')->insert($data);

        if($ok)
        {
            //$success=$model->id;
            $success="Ok";
        }
        else
        {
            $success="Failed";
        }
        //$success=DB::table('user')->insert($data);

        return response()->json($success);
    }

    public function form()
    {
        //echo "hello";exit();
        if($_GET)
        {
            //var_dump($_GET);exit();
        }
        $data['package']=\DB::select('SELECT * FROM packages');
        return view('form',$data);
    }

}
