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
     <!--    <h1>KPI Dashboard</h1>
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


        </div>
        <div class="row wow fadeInDown m-t-40">
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
                        KPI Dashboard Master <a href="{{ route('website.KPIindex') }}" class="label label-primary pull-right">Back</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('website.KPIupdate', $kpi_details->id) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Department</label>
                                        <div>
                                            <?php
                                           $department =  DB::table('department')->where('status', 1)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="department" id="department" style="margin-left: 4%" required>
                                                <?php
                                                    foreach ($department as $key => $value) { ?>
                                                            
                                                            <option <?php if($value->id == $kpi_details->department_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
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
                                        <label class="control-label col-sm-2" style="margin-left: -4%" >Authority</label>
                                        <div>
                                            <?php
                                           $department =  DB::table('authorities')->where('status', 1)->orderBy('authority_name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="authority" id="authority" style="margin-left: 0%" required>
                                                <?php
                                                    foreach ($department as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->authorized_person_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->authority_name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        
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
                                                <?php
                                                    foreach ($category as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->category_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
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
                                        <label class="control-label" style="margin-left: 0%" >Sub Category</label>
                                        <div>
                                            <?php
                                           $subcategory =  DB::table('category_sub_category')->where('status', 1)->where('parent_id', 1)->orderBy('name', 'ASC')->get();
                                             ?>
                                            <select class="form-control" name="subcategory" id="subcategory" required>
                                                <?php
                                                    foreach ($subcategory as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->sub_category_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
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
                                        <label style="margin-left: 4%" >KPI Name</label>
                                        <div>
                                            <input type="text" name="kpiname" id="kpiname" class="form-control exmptfld" style="margin-left: 4%" value="<?= $kpi_details->kpi_name ?>" maxlength="85" readOnly maxlength="250" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >KPI Code</label>
                                        <div>
                                            <input type="text" name="kpicode" maxlength="6" id="kpicode" class="form-control" value="<?= $kpi_details->kpi_code ?>" readOnly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-right: 1%;display:;">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label style="margin-left: 4%" >Type</label>
                                        <div>
                                            <?php
                                           $graph_type =  DB::table('graph_type')->where('status', 1)->get();
                                             ?>
                                            <select class="form-control" name="type" id="type" style="margin-left: 4%" required="">
                                                <?php
                                                    foreach ($graph_type as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->graph_type_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
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
                                                <?php
                                                    foreach ($status as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->kpi_status_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
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
                                        <label style="margin-left: 4%" >Goal</label>
                                        <div>
                                            <div class="row">
                                                <div class="col-md-4" style="margin-left: 4%">
                                                    <label >Lower limit</label>
                                                    <input type="number" name="goal_lower" onblur="checkGoal(this)" id="goal_lower" class="form-control" value="<?= $kpi_details->goal_lower_limit ?>" required>
                                                </div>
                                                <div class="col-md-4" >
                                                    <label >Upper limit</label>
                                                    <input type="number" name="goal_upper" onblur="checkGoal(this)" id="goal_upper" class="form-control" value="<?= $kpi_details->goal_upper_limit ?>" required>
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
                                            <input type="number" name="no_of_parameters" id="title" class="form-control" value="<?= $kpi_details->no_of_parameters ?>" readOnly="true" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <span style="color:red;display: none;" id="duplicate_parameter">Duplicate parameters</span>
                            <div class="row" id="added" style="margin-right: 1%">
                                <!-- <input type="text"> -->
                               <?php 
                                // $parameters = DB::table('kpi')->where('id', $kpi_details->id)->first();
                                $parameters = DB::table('parameters')->where('kpi_id', $kpi_details->id)->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get(); 
                                $i=1;
                                /*foreach($i=1; $i<count($parameters)+1; $i++) {*/
                                foreach ($parameters as $key => $value) {
                                /*
                                    $parameter = DB::table('parameters')->where('kpi_id', $kpi_details->id)->where('parameter_no', 'p'.$i)->where('status', 1)->where('is_deleted', 0)->first();*/ 


                                    $col_freq_id='col_freq'.$i;
                                    $tar_freq_id='tar_freq'.$i;
                                    $datasource_id='datasource'.$i;
                                    $parameter_master_id='parameter_master'.$i;


                                    ?>
                                    <div class="row"> 
                                        <div class="col-sm-3"><div class="form-group" style="margin-left: 0%"><label class="control-label col-sm-2" >Parameter&nbsp<?php echo ($key+1);?></label><div>

                                        <!-- <input type="text" name="parameter[<?= $value->id ?>]" id="<?php //echo $p_name_id;?>" class="form-control" value="<?= $value->name ?>" style="margin-left: 4%" required> -->

                                        <?php $parameter = DB::table('parameter_master')->where('status', 1)->where('is_deleted', 0)->groupBy('name')->orderBy('name', 'ASC')->get(); ?>
                                        <select style="margin-left: 5%;" name="parameter[<?= $value->id ?>]" id="<?php //echo $p_name_id;?>" onchange="get_details(this);dropdown();" class="form-control parameter_name" data-input="<?php echo $i;?>" required>
                                                <?php foreach ($parameter as $key ){ 

                                                    $is_selected=($key->name == $value->name) ? 'selected' : '';

                                                ?>
                                                <option value="<?php echo $key->name;?>" data-pid="<?php echo $key->id;?>" <?php echo $is_selected;?> ><?php //echo $key->id;?><?php echo $key->name;?></option>
                                                <?php } ?>
                                            </select>


                                        </div></div></div>  

                                        <?php $lower_id='lower'.$i ;//echo $lower_id;?>
                                        <div class="col-sm-4"><div class="form-group"><div class="row" style="margin-left: 21%"><div class="col-sm-4" style="margin-left: 4%"><label >Min Level</label><input type="number" name="minlevel[<?= $value->id ?>]" onblur="checkLimit()" id="<?php echo $lower_id;?>" class="form-control" value="<?= $value->min_level ?>" required readonly></div>

                                        <?php $upper_id='upper'.$i ;//echo $upper_id;
                                        $span_id='js_err_msg'.$i ;?>
                                        <div class="col-sm-4"><label >Max Level</label><input type="number" name="maxlevel[<?= $value->id ?>]" id="<?php echo $upper_id;?>" class="form-control" onblur="checkLimit()" value="<?= $value->max_level ?>" required readonly><span id="<?php echo $span_id;?>" style="color:red;display:none;">Invalid</span></div></div></div></div> 

                                        <div class="col-sm-5"><div class="form-group"><div class="row" style="margin-left: 0%"><div class="col-md-2" style="margin-left: 0%; width:30%"><label >Collect Freq</label>
                                            <!-- <input type="text" name="collect_freq['+i+']" id="department" class="form-control" value="<?= $value->collection_frequency ?>"> -->

                                        <input type="text" class="form-control" name="collect_freq[<?= $value->id ?>]" id="<?php echo $col_freq_id;?>" value="<?php echo $value->collection_frequency; ?>" required readonly />

                                        <!-- <select class="form-control" name="collect_freq[<?= $value->id ?>]" id="<?php echo $col_freq_id;?>" required>
                                            <option value="daily" <?php if($value->collection_frequency == "daily") echo "SELECTED";?> >Daily</option>
                                            <option value="weekly" <?php if($value->collection_frequency == "weekly") echo "SELECTED";?>>weekly</option>
                                            <option <?php if($value->collection_frequency == "monthly") echo "SELECTED";?> value="monthly">monthly</option>
                                            <option <?php if($value->collection_frequency == "quarterly") echo "SELECTED";?> value="quarterly">quarterly</option>
                                            <option <?php if($value->collection_frequency == "annually") echo "SELECTED";?> value="annually">annually</option>
                                        </select> -->
                                        </div><div class="col-md-3"><label >Target Freq</label><!-- <input type="text" name="target_freq['+i+']" id="department" class="form-control" value="<?= $value->target_frequency ?>"> -->

                                        <input type="text" class="form-control" name="target_freq[<?= $value->id ?>]" id="<?php echo $tar_freq_id;?>" value="<?php echo $value->target_frequency;?>" required readonly />

                                        <!-- <select class="form-control" name="target_freq[<?= $value->id ?>]" id="<?php echo $tar_freq_id;?>" required>
                                            <option value="daily" <?php if($value->target_frequency == "daily") echo "SELECTED";?> >Daily</option>
                                            <option value="weekly" <?php if($value->target_frequency == "weekly") echo "SELECTED";?>>weekly</option>
                                            <option <?php if($value->target_frequency == "monthly") echo "SELECTED";?> value="monthly">monthly</option>
                                            <option <?php if($value->target_frequency == "quarterly") echo "SELECTED";?> value="quarterly">quarterly</option>
                                            <option <?php if($value->target_frequency == "annually") echo "SELECTED";?> value="annually">annually</option>
                                        </select> -->
                                        </div>
                                        <div class="col-md-3"><label >Data Source</label>

                                            <input type="text" maxlength="100" name="datasource[<?= $value->id ?>]" id="<?php echo $datasource_id;?>" class="form-control" value="<?= $value->datasource_id ?>" required readonly>
                                            <input type="hidden" name="parameter_master_id[<?= $value->id ?>]" id="<?php echo $parameter_master_id;?>" />
                                            <input type="hidden" name="parameter_master_id[<?= $value->id ?>]" id="<?php echo $parameter_master_id;?>" />
                                            
                                        </div>
                                    </div></div></div> 

                                        <!-- <input type="text" maxlength="100" name="datasource[<?= $value->id ?>]" id="department" class="form-control" value="<?= $value->datasource_id ?>" required> -->

                                    </div>

                              <?php  $i++;}
                               ?>
                            </div>
                            <div class="row" style="margin-right: 1%">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2" >Calculation</label>
                                        <div>
                                            <input type="text" name="calculation" onkeyup="restrictCalc(this)" id="calculation" class="form-control exmptfld" style="margin-left: 4%" value="<?= $kpi_details->calculation_formula ?>">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Status</label>
                                        <div>
                                            <?php
                                           $status =  DB::table('kpi_status')->where('status', 1)->get();
                                             ?>
                                            <select class="form-control" name="status" id="ststus" required>
                                                <?php
                                                    foreach ($status as $key => $value) { ?>
                                                        
                                                            <option <?php if($value->id == $kpi_details->kpi_status_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= strtoupper($value->name) ?></option>
                                              <?php } 
                                                 ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                                 <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Unit</label>
                                        <div>
                                            <select class="form-control" name="unit" id="unit" style="margin-left: 0%" required>
                                                        <option value="" disbled>Select One</option>
                                                        
                                                        <option <?php if($kpi_details->unit == 'kwh') echo "SELECTED";?> value="kwh">kwh per capita</option>
                                                        <option <?php if($kpi_details->unit == 'Nos') echo "SELECTED";?> value="Nos">Number per 100000</option>
                                                        <option <?php if($kpi_details->unit == 'db(A)'
                                                        ) echo "SELECTED";?> value="db(A)">db(A)</option>
                                                        <option <?php if($kpi_details->unit == '%') echo "SELECTED";?> value="%">Percentage</option>
                                                        <option value="number" <?php if($kpi_details->unit == 'No/ks') echo "SELECTED";?> value="Nos" >Number</option>
                                                        <option <?php if($kpi_details->unit == 'Min') echo "SELECTED";?> value="Minutes">Min</option>
                                                        <option <?php if($kpi_details->unit == 'ug/m3') echo "SELECTED";?> value="ug/m3">ug/m3</option>
                                                        <option <?php if($kpi_details->unit == 'ug/m5') echo "SELECTED";?> value="ug/m5">ug/m5</option>

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
                                            <!-- <input type="text" name="methodology" id="methodology" class="form-control" style="margin-left: 4%" value=" <?= $kpi_details->methodology ?> " maxlength="500" required> -->
                                            <textarea name="methodology" rows="4" id="methodology" class="form-control" style="margin-left: 4%"><?= $kpi_details->methodology ?></textarea>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label" style="margin-left: 0%" >Description</label>
                                        <div>
                                            <!-- <input type="text" name="description" id="description" class="form-control" value="<?= $kpi_details->description ?>" maxlength="100" required> -->
                                            <textarea name="description" name="description" rows="4" id="description" maxlength="100" class="form-control"><?= $kpi_details->description ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="submit">
                                <div class="col-sm-6">
                                <input type="submit" id="submit" onmouseenter="checkGoal();checkLimit()" hidden="true" class="btn btn-default pull-right" style="" value="Update" /></div>
                                <div class="col-sm-6">
                                <!-- <input type="reset" hidden="true" class="btn btn-default pull-left" style="" onclick="resetParam()" value="Reset" /> --></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
    </div>
</div>
    </div>
</div>

                

             
            </div>
        </div>
    </div>






</div>

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

                 $("#added").append('<div class="row"> <div class="col-sm-3"><div class="form-group" style="margin-left: 0%"><label class="control-label col-sm-2" >Parameter&nbsp'+(i+1)+'</label><div><input type="text" name="parameter['+i+']" id="department" class="form-control" style="margin-left: 4%" required></div></div></div>  <div class="col-sm-4"><div class="form-group"><div class="row" style="margin-left: 21%"><div class="col-sm-4" style="margin-left: 4%"><label >Min Level</label><input type="number" name="minlevel['+i+']" id="department" class="form-control" required></div><div class="col-sm-4"><label >Max Level</label><input type="number" name="maxlevel['+i+']" id="department" class="form-control" required></div></div></div></div> <div class="col-sm-5"><div class="form-group"><div class="row" style="margin-left: 0%"><div class="col-md-2" style="margin-left: 0%; width:30%"><label >Collect Freq</label><select name="collect_freq['+i+']" id="department" class="form-control" required><option value="daily">Daily</option><option value="weekly">Weekly</option><option value="monthly">Monthly</option><option value="quarterly">Quarterly</option><option value="annually">Annually</option></select></div><div class="col-md-3"><label >Target Freq</label><select name="target_freq['+i+']" id="department" class="form-control"><option value="daily" required>Daily</option><option value="weekly">Weekly</option><option value="monthly">Monthly</option><option value="quarterly">Quarterly</option><option value="annually">Annually</option></select></div><div class="col-md-3"><label >Data Source</label><input type="text" maxlength="100" name="datasource['+i+']" id="department" class="form-control" required></div></div></div></div> </div>');
                
            }
        });
       });

       function checkGoal()
       {
            var goal_upper = $("#goal_upper").val();
            var goal_lower = $("#goal_lower").val();

            //alert(goal_lower);
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
            // if(goal_lower > goal_upper)
            // {
            //     //alert(goal_upper);
            //     document.getElementById("err_msg").style.display = "block";
            //     $('#goal_upper').val('');
            //     return false;
            // }
            // else
            // {
            //     document.getElementById("err_msg").style.display = "none";
            //     return true;
            // }
            
       }
       function validate_kpiName(text)
       {
            text.value=text.value.replace(/[^a-zA-Z0-9-'\n\r.!@#$%^&*() ]+/g,'');
       }
       function resetParam()
       {
            $("#added").html("");
       }
       function restrictCalc(text)
       {
           text.value=text.value.replace(/[^pP0-9-'\n\r*(-)/+=%!@#$^&_ ]+/g,''); //=%
       }

       function checkLimit()
       {
            var iteration= $("#title").val();
            //alert(iteration);
            for(var i=1;i <= iteration;++i)
            {
                var upperId='#upper'+i;
                var uplimit= $(upperId).val();
                //alert(uplimit);
                var lowerId='#lower'+i;
                var lowlimit= $(lowerId).val();
                //alert(lowlimit);
                if(uplimit != "" && lowlimit != "")
                {
                    var limit=(uplimit - lowlimit);
                    if(limit < 0)
                    {
                        //alert('Not Ok');
                        $(upperId).val('');
                        var err_msg='#js_err_msg'+i;
                        $(err_msg).show();
                    }
                    else
                    {
                        //alert('Ok');
                        var err_msg='#js_err_msg'+i;
                        $(err_msg).hide();

                        
                    }
                }

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
    var datasource_id='#datasource'+parameter_num;
    var lower_id='#lower'+parameter_num;
    var upper_id='#upper'+parameter_num;
    var col_freq='#col_freq'+parameter_num;
    var tar_freq='#tar_freq'+parameter_num;
    var parameter_master='#parameter_master'+parameter_num;

    $.ajax({
        url: '{{ route("website.KPIgetparameterDetails") }}',
        type: 'post',
        data: {parameter_id: parameter_id , _csrf: '{{ csrf_field() }}'},
        success: function(data){
            var val = $.parseJSON(data)
            var length  = val.length;
            //console.log(val);
            console.log(val.name);
            $(datasource_id).val(val.datasource_id);
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
        //alert('Not Ok');
        $('#duplicate_parameter').show();
        $(':input[type="submit"]').prop('disabled', true);
       // $(this).val('');
        return false;
    }else{
        $('#duplicate_parameter').hide();
        $(':input[type="submit"]').prop('disabled', false);
        
    }
}

</script>

@endsection