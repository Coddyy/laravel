<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class MainController extends Controller
{
    //
    public function index()
    {
    	return view('project_dashboard');
    }
    public function insert()
    {
    	var_dump($_POST);
    	die();
    }
}
?>