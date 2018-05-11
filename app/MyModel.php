<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{

	public $timestamps=false;
	protected $table='user';
	protected $primary_key='id';
	protected $casts=['id'=>'INT'];

    public function index()
    {
    	echo "Hi I am model";
    }
}
