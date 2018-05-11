<?php 
use App\Models\Authority;
/*$authority  = DB::table('authorities')
            ->get();
print_r($authority[0]->id);
die();
*//*DB::table('authority')
            ->where('id', 1)
            ->update(['authority_name' => "Updated Title"]);
die();*/

/*$user = DB::table('authorities')->where('authority_name', 'csm')->get();

echo '<pre>';
print_r($user); die();
*/
/*if(isset($dashboard_data)){
    echo "<pre>";
    print_r($dashboard_data); die();
}*/
?>
@extends( 'layouts.website' )
@section( 'innercontent' )


    <!-- Header -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/kpidashboard.css')}}">
    <div class="inner-hdr">
        <header class="text-center">
            <div class="container relativ-pos">
                <div class="intro-text">
                    <div class="clearfix"></div>
                    <div class="wow fadeInDown">
                        <div class="searchboxwrapper">
                            <input class="searchbox" type="text" value="" name="s" placeholder="Type your search term here..." id="s">
                            <input class="searchsubmit" type="submit" id="searchsubmit" value="">
                        </div>
                    </div>
                </div>
            </div>
        </header>

    </div>
<div class="container ">
    <div class="kpicontainer">
        <!-- <h1>KPI Dashboard</h1>
        <p>Welcome to the KPI Dashboard of Bhubaneswar Smart City. The KPI Dashboard compiles the City's economy's most important indicators in one place. Get a quick snapshot of your current economic state or explore each indicator in more detail.</p>
        <div class="col-lg-5 pull-right" style="margin-bottom:20px; padding-right:0px;">
            <div class="form-group">
                <div class="col-lg-6">
                    <select class="form-control" id="year">
                        <option year="-- Select Year --">-- Select Year --</option>
                        <option year="2017">2017</option>
                        <option year="2018">2018</option>
                    </select>
                </div>
                <div class="col-lg-6" style="padding-right:0px;">
                    <select class="form-control" id="month" onChange="show_data()">
                        <option month="-- All Months --">-- All Months --</option>
                        <option month="01">January</option>
                        <option month="02">February</option>
                        <option month="03">March</option>
                        <option month="04">April</option>
                        <option month="05">May</option>
                        <option month="06">June</option>
                        <option month="07">July</option>
                        <option month="08">August</option>
                        <option month="09">September</option>
                        <option month="10">October</option>
                        <option month="11">November</option>
                        <option month="12">December</option>
                    </select>
                </div>
            </div>


        </div> -->
        <!-- <div class="row wow fadeInDown m-t-40">
            <div class="col-sm-12">
                <div class="portletlist">
                <ul>
                    <li><a href="#Economy" title="Economy"><i class="fa fa-line-chart"></i>Economy</a>
                    </li>
                    <li><a href="#Education" title="Education"><i class="fa fa-language"></i>Education</a>
                    </li>
                    <li><a href="#Energy" title="Energy"><i class="fa fa-sun-o"></i>Energy</a>
                    </li>
                    <li><a href="#Enviromental" title="Enviromental"><i class="fa fa-leaf"></i>Enviromental</a>
                    </li>
                    <li><a href="#Finance" title="Finance"><i class="fa fa-money"></i>Finance</a>
                    </li>
                    <li><a href="#Fireandemergency" title="Fire and Emergency Response"><i class="fa fa-fire-extinguisher"></i>Fire and Emergency Response</a>
                    </li>
                    <li><a href="#Governance" title="Governance"><i class="fa fa-sitemap"></i>Governance</a>
                    </li>
                    <li><a href="#Health" title="Health"><i class="fa fa-h-square"></i>Health</a>
                    </li>
                    <li><a href="#Solidwaste" title="Solid Waste"><i class="fa fa-home"></i>Solid Waste</a>
                    </li>
                    <li><a href="#Safety" title="Safety"><i class="fa fa-shield"></i>Safety</a>
                    </li>
                    <li><a href="#Shelter" title="Shelter"><i class="fa fa-building-o"></i>Shelter</a>
                    </li>
                    <li><a href="#Telecommunication" title="Telecommunication and Innovation"><i class="fa fa-wifi"></i>Telecommunication and Innovation</a>
                    </li>
                    <li><a href="#Transportation" title="Transportation"><i class="fa fa-truck"></i>Transportation</a>
                    </li>
                    <li><a href="#Waterandsanitation" title="Water and Sanitation"><i class="fa fa-wheelchair"></i>Water and Sanitation</a>
                    </li>
                    
                </ul>
</div>
            </div>
        </div> -->

        <div class="row wow fadeInDown m-t-40">
            <div class="col-sm-12">

        
                
<!-- <div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a New Post <a href="#" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="#" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Department</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" style="margin-left: -4%" >Authority</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Category</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >Sub Category</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >KPI Name</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >KPI Code</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Type</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >Unit</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Goal</label>
                                <div>
                                    <div class="row">
                                        <label class="control-label col-sm-2" >Upper limit</label>
                                        <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                    </div>
                                    <div class="row">
                                        <label class="control-label col-sm-2" >Lower limit</label>
                                        <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >No Of Parameters</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Calculation</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >Status</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label col-sm-2" >Methodology</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control" style="margin-left: 4%">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label" style="margin-left: 0%" >Description</label>
                                <div>
                                    <input type="text" name="department" id="department" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="append">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 -->
        <div class="row">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        KPI Dashboard Master <a href="javascript:void(0);" onclick="goBack()" class="label label-primary pull-right">Back</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('website.KPIinsert') }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row" style="margin-right: 1%">
                                @if(Session::has('error_msg'))
                                    <div class="alert alert-warning" style="margin-left: 2%">{{ Session::get('error_msg') }}</div>
                                @endif
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Department</label>
                                        <div>
                                            <?php
                                           $department =  DB::table('department')->where('status', 1)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="department" id="department" style="margin-left: 4%" required>
                                                            <option value="" disbled>Select One</option>
                                                <?php
                                                    foreach ($department as $key => $value) { ?>
                                                        
                                                            <option <?php if(isset($return_data['department']) && ($return_data['department'] == $value->id)) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-4">
                                    
                                </div>
                                <!--<div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" style="margin-left: -4%" >Authority</label>
                                        <div>
                                            <?php
                                           $department =  DB::table('authorities')->where('status', 1)->orderBy('authority_name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="authority" id="authority" style="margin-left: 0%" required>
                                                            <option value="" disbled>Select One</option>
                                                <?php

                                                    foreach ($department as $key => $value) { ?>
                                                        
                                                            <option <?php if(isset($return_data['department']) && ($return_data['authority'] == $value->id)) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->authority_name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Sub Category</label>
                                        <div>
                                            <?php
                                           $subcategory =  DB::table('category_sub_category')->where('status', 1)->where('parent_id', 1)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="subcategory" id="subcategory" required>
                                                            <option value="" disbled>Select One</option>
                                                <?php
                                                    foreach ($subcategory as $key => $value) { ?>
                                                        
                                                            <option value="<?= $value->id ?>" <?php if(isset($return_data['subcategory']) && ($return_data['subcategory'] == $value->id)) echo "SELECTED";?> ><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Category</label>
                                        <div>
                                            <?php
                                           $category =  DB::table('category_sub_category')->where('status', 1)->where('parent_id', 2)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="category" id="category" style="margin-left: 4%" required>
                                                            <option value="" disbled>Select One</option>
                                                <?php
                                                    foreach ($category as $key => $value) { ?>
                                                        
                                                            <option value="<?= $value->id ?>" <?php if(isset($return_data['category']) && ($return_data['category'] == $value->id)) echo "SELECTED";?> ><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Status</label>
                                        <div>
                                            <?php
                                           $status =  DB::table('kpi_status')->where('status', 1)->get();
                                             ?>
                                            <select class="form-control" name="status" id="ststus" required>
                                                          <option value="" disbled>Select One</option> 
                                                <?php
                                                    foreach ($status as $key => $value) { ?>
                                                        
                                                            <option value="<?= $value->id ?>" <?php if(isset($return_data['status']) && ($return_data['status'] == $value->id)) echo "SELECTED";?> ><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group" style="">
                                        <label style="margin-left: 4%;" >KPI Name</label>
                                        <div>
                                            <input type="text"  name="kpiname" id="kpiname1" value="<?php if(isset($return_data['kpiname'])) print_r($return_data['kpiname']);?>" onkeyup="validate_kpiName(this)" class="form-control exmptfld" value="" style="margin-left: 4%;;" maxlength="85" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%;" >KPI Code</label>
                                        <div>
                                            <input type="text" name="kpicode" value="<?php if(isset($return_data['kpicode'])) print_r($return_data['kpicode']);?>" style="margin-left: 0%;" maxlength="6" id="kpicode" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 1%;">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Type</label>
                                        <div>
                                            <?php
                                           $graph_type =  DB::table('graph_type')->where('status', 1)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="type" id="type" style="margin-left: 4%" required="">
                                                        <option value="" disbled>Select One</option>
                                                <?php
                                                    foreach ($graph_type as $key => $value) { ?>
                                                        
                                                            <option value="<?= $value->id ?>" <?php if(isset($return_data['type']) && ($return_data['type'] == $value->id)) echo "SELECTED";?> ><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Unit</label>

                                        <div>
                                            <select class="form-control" name="unit" id="unit" style="margin-left: 0%" required>
                                                        <option value="" disbled>Select One</option>
                                                        <option value="db(A)" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "db(A)")) echo "SELECTED";?> >db(A)</option>
                                                        <option value="kwh" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "kwh")) echo "SELECTED";?> >kwh per capita</option>
                                                        <option value="Min" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "Min")) echo "SELECTED";?> >Minutes</option>
                                                        <option value="Nos" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "Nos")) echo "SELECTED";?> >Number</option>
                                                        <option value="No/ks" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "No/ks")) echo "SELECTED";?> >Number per 100000</option>
                                                        <option value="%" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "%")) echo "SELECTED";?> >Percentage</option>
                                                        <option value="ug/m3" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "ug/m3")) echo "SELECTED";?> >ug/m3</option>
                                                        <option value="ug/m5" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "ug/m5")) echo "SELECTED";?> >ug/m5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Goal</label>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-4" style="margin-left: 4%">
                                                    <label >Lower limit</label>
                                                    <input type="number" name="goal_lower" onblur="checkGoal(this)" id="goal_lower" value="<?php if(isset($return_data['goal_lower'])) print_r($return_data['goal_lower']);?>" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label >Upper limit</label>
                                                    <input type="number" name="goal_upper" onblur="checkGoal(this)" id="goal_upper" value="<?php if(isset($return_data['goal_upper'])) print_r($return_data['goal_upper']);?>" class="form-control">
                                                </div>
                                                <span id="err_msg" style="display:none;color:red;">Invalid Limit</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >No Of Parameters</label>
                                        <div>
                                            <input type="number"  name="no_of_parameters" id="title" onblur="validate_nop()" class="form-control" required>
                                            <span id="err_nop" style="color:red;display: none;">Invalid parameter</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="added">
                                <!-- <input type="text"> -->
                               
                            </div>
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" >Calculation</label>
                                        <div>
                                            <input type="text" name="calculation" value="<?php if(isset($return_data['calculation'])) print_r($return_data['calculation']);?>" onkeyup="restrictCalc(this)" id="calculation" class="form-control exmptfld" style="margin-left: 4%" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Unit</label>

                                        <div>
                                            <select class="form-control" name="unit" id="unit" style="margin-left: 0%" required>
                                                        <option value="" disbled>Select One</option>
                                                        <option value="db(A)" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "db(A)")) echo "SELECTED";?> >db(A)</option>
                                                        <option value="kwh" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "kwh")) echo "SELECTED";?> >kwh per capita</option>
                                                        <option value="Min" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "Min")) echo "SELECTED";?> >Minutes</option>
                                                        <option value="Nos" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "Nos")) echo "SELECTED";?> >Number</option>
                                                        <option value="No/ks" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "No/ks")) echo "SELECTED";?> >Number per 100000</option>
                                                        <option value="%" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "%")) echo "SELECTED";?> >Percentage</option>
                                                        <option value="ug/m3" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "ug/m3")) echo "SELECTED";?> >ug/m3</option>
                                                        <option value="ug/m5" <?php if(isset($return_data['unit']) && ($return_data['unit'] == "ug/m5")) echo "SELECTED";?> >ug/m5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" >Methodology</label>
                                        <div>
                                            <textarea name="methodology" rows="4" id="methodology" class="form-control" style="margin-left: 4%;" maxlength="500" required><?php if(isset($return_data['methodology'])) print_r($return_data['methodology']);?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Description</label>
                                        <div>
                                            <textarea  name="description" rows="4" id="description" class="form-control" maxlength="500" required><?php if(isset($return_data['description'])) print_r($return_data['description']);?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="submit">
                                <div class="col-sm-6">

                                <input type="submit" id="submit" onmouseenter="checkGoal();checkLimit();validate_nop()" hidden="true" class="btn btn-default pull-right" style="" value="Submit" /></div>
                                <div class="col-sm-6">
                                <input type="reset" hidden="true" class="btn btn-default pull-left" style="" onclick="resetParam()" value="Reset" /></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><br />
</div>
    </div>
</div>
    </div>
</div>

             
            </div>
        </div>
    </div>
</div>


<?php $parameter = DB::table('parameter_master')->where('status', 1)->where('is_deleted', 0)->orderBy('name', 'ASC')->get(); 
  // foreach ($parameter as $key ) 
  //   {
  //       echo $key->name;
  //   }

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

var $j = jQuery.noConflict();
       $j(document).ready(function(){
        $("#title").change(function(){
            // $('.added').remove();
            $("#added").html("");
            var no = $("#title").val();
            for(var i=0; i<no; i++){
                // $("#added").append('<div><input type="text" name="mytext['+i+']"/>');

                 $("#added").append('<div class="row"> <div class="col-sm-3"><div class="form-group" style="margin-left: 5%"><label class="control-label col-sm-2" >Parameter&nbsp'+(i+1)+'&nbsp(P'+(i+1)+') </label><div><select style="margin-left: 6%" name="parameter[]" id="p_name'+i+'" onchange="get_details(this);dropdown();" class="parameter_name form-control" data-input="'+i+'"><option value="">--Select--</option><?php foreach ($parameter as $key ){ ?><option value="<?php echo $key->name;?>" data-pid="<?php echo $key->id;?>"><?php echo $key->name;?></option><?php } ?></select></div></div></div>  <div class="col-sm-4"><div class="form-group"><div class="row" style="margin-left: 21%"><div class="col-sm-4" style="margin-left: 4%"><label >Min Level</label><input onblur="checkLimit()" type="number" value="" name="minlevel['+i+']" id="lower'+i+'" class="form-control" required></div><div class="col-sm-4"><label >Max Level</label><input type="number" id="upper'+i+'" onblur="checkLimit()" name="maxlevel['+i+']" value="" class="form-control" required><span id="js_err_msg'+i+'" style="color:red;display:none">Invalid</span></div></div></div></div> <div class="col-sm-5"><div class="form-group"><div class="row" style="margin-left: 0%"><div class="col-md-2" style="margin-left: 0%; width:30%"><label >Collect Freq</label><select name="collect_freq['+i+']" id="col_freq'+i+'" class="form-control" required><option value="daily">Daily</option><option value="weekly">Weekly</option><option value="monthly">Monthly</option><option value="quarterly">Quarterly</option><option value="annually">Annually</option></select></div><div class="col-md-3"><label >Target Freq</label><select name="target_freq['+i+']" id="tar_freq'+i+'" class="form-control"><option value="daily" required>Daily</option><option value="weekly">Weekly</option><option value="monthly">Monthly</option><option value="quarterly">Quarterly</option><option value="annually">Annually</option></select></div><div class="col-md-3"><label >Data Source</label><input type="text" id="datasource'+i+'" maxlength="100" name="datasource['+i+']" class="form-control" required><input type="hidden" name="parameter_master_id['+i+']" id="parameter_master_id'+i+'" /></div></div></div></div> </div>');
                
            }
        });
        $(".sort").change(function() {   
            $(".sort").not(this).find("option[value="+ $(this).val() + "]").attr('disabled', true);
        }); 
        // <select id="datasource'+i+'" name="datasource['+i+']" onchange="get_details(this)" class="form-control" data-input="'+i+'"><?php foreach ($parameter as $key ){ ?><option value="<?php echo $key->id;?>"><?php echo $key->name;?></option><?php } ?></select>
// <input  type="text"  name="parameter['+i+']" id="p_name'+i+'" class="form-control" style="margin-left: 6%" required />

        // <input type="text" maxlength="100" name="datasource['+i+']" id="department" class="form-control" required>
        /*$("#category").change(function(){
                alert(1);
        });*/

        /*$("form").submit(function(event){
            var goal_upper = $("#goal_upper").val();
            var goal_lower = $("#goal_lower").val();
            if(goal_lower >= goal_upper){
                alert("Invalid Limit");
                event.preventDefault();
            }else{
                
            }
        });
*/       });

       function checkGoal()
       {
            var goal_upper = $("#goal_upper").val();
            var goal_lower = $("#goal_lower").val();

            //alert(goal_lower);alert(goal_upper);
            if(goal_upper != "" && goal_lower != ""){
                var limit= (goal_upper - goal_lower);
                //alert(limit);
                if(limit < 0)
                {
                    //alert('LBig');
                    document.getElementById("err_msg").style.display = "block";
                    $('#goal_upper').val('');
                }
                else
                {
                    //alert('LSmall');
                    document.getElementById("err_msg").style.display = "none";
                    return true;
                }
            }
            
       }
       function validate_kpiName(text)
       {
            text.value=text.value.replace(/[^a-zA-Z0-9-'\n\r.!@#$%^&*(), ]+/g,'');
       }
       function resetParam()
       {
            $("#added").html("");
       }
       function restrictCalc(text)
       {
           text.value=text.value.replace(/[^pP0-9-'\n\r ]+/g,'');
       }
       function checkLimit()
       {
            var iteration= $("#title").val();
            //alert(iteration);
            for(var i=0;i <iteration;++i)
            {
                var upperId='#upper'+i;
                var uplimit= $(upperId).val();
                var lowerId='#lower'+i;
                var lowlimit= $(lowerId).val();
                if(uplimit != "" && lowlimit != "")
                {
                    var limit=(uplimit - lowlimit);
                    if(limit < 0)
                    {
                        //alert('Not Ok');
                        $(upperId).val('');
                        var err_msg='#js_err_msg'+i;
                        //alert(err_msg);
                        //document.getElementById(err_msg).style.display = "block";
                        $(err_msg).show();
                    }
                    else
                    {
                            var err_msg='#js_err_msg'+i;
                            $(err_msg).hide();
                            //alert('Ok');
                        
                    }
                }
            }
       }
        function restrictCalc(text)
       {
           text.value=text.value.replace(/[^pP0-9-'\n\r-/+*@_^= ]+/g,'');
       }
       function validate_nop()
       {
            var nop=$('#title').val();
            //alert(nop);
            if(nop == 0)
            {
                $('#title').val('');
                $('#err_nop').show();
            }
            else
            {
                $('#err_nop').hide();
            }
       }


</script>
<script type="text/javascript">


function get_details(val)
{
    //alert("hello");
    var parameter_num = $(val).attr('data-input');
    //var parameter_id=$(val).val();
    var parameter_id=$('option:selected', val).attr('data-pid');
    var datasorce='#datasource'+parameter_num;
    var lower_id='#lower'+parameter_num;
    var upper_id='#upper'+parameter_num;
    var col_freq='#col_freq'+parameter_num;
    var tar_freq='#tar_freq'+parameter_num;
    var parameter_master='#parameter_master_id'+parameter_num;

    $.ajax({
        url: '{{ route("website.KPIgetparameterDetails") }}',
        type: 'post',
        data: {parameter_id: parameter_id , _csrf: '{{ csrf_field() }}'},
        success: function(data){
            var val = $.parseJSON(data)
            var length  = val.length;
            //console.log(val);
            console.log(val.name);
            $(datasorce).val(val.datasource_id);
            $(lower_id).val(val.min_level);
            $(upper_id).val(val.max_level);
            $(col_freq).val(val.col_freq);
            $(tar_freq).val(val.tar_freq);
            $(parameter_master).val(val.id);
        },
        complete: function(){
            
          }
    });
 }


 var $j = jQuery.noConflict();
function dropdown(){
    var listOfValues = [];
    $('.parameter_name').each(function()
    {
        if($(this).val()!='')
           listOfValues.push($(this).val());
    });
    var sorted_arr = listOfValues.slice().sort(); 
    var results = [];
    for (var i = 0; i < sorted_arr.length - 1; i++) {
        if (sorted_arr[i + 1] == sorted_arr[i]) {
            results.push(sorted_arr[i]);
        }
    }
    if(results.length > 0){
        //$("#error").css("display", "block");
        alert('Not Ok');
        $(':input[type="submit"]').prop('disabled', true);
       // $(this).val('');
        return false;
    }else{
        $("#error").css("display", "none");
        $("#btn1").click()
    }
}



</script>



@endsection