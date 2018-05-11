<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main_M as Main_M;
use Session;

class MainController extends Controller
{
    //
    public function index()
    {
    	$data['subview']=view('subview.dashboard_home');
        return view('project_dashboard',$data);
    }
    public function add_car_repair()
    {
        $data['subview']=view('subview.add_car_repair');
        return view('project_dashboard',$data);
    }
    public function insert_car_repair(Request $request)
    {
        // echo '<pre>';
        // print_r($_POST);
        $post=$request->all();
        $Main_M= new Main_M();
        $result=$Main_M->insert($post);
        if($result)
        {
            Session::flash('success_msg', 'Car added successfully');
        }
        else
        {
            Session::flash('error_msg', 'Car not added!');
        }
        $data['subview']=view('subview.add_car_repair');
        return view('project_dashboard',$data);

    }
}
?>