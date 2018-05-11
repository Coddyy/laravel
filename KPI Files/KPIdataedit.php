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
        

        <div class="row wow fadeInDown m-t-40">
            <div class="col-sm-12">
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
                        KPI Data Management <a href="{{ route('website.KPIdataindex') }}" class="label label-primary pull-right">Back</a>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('website.KPIdataupdate', $kpi_details[0]->sequence_no) }}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="row" style="margin-right: 1%">
                                
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label style="margin-left: 4%" >KPI Name</label>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                                <?php
                                               $kpis =  DB::table('kpi')->where('status', 1)->where('is_deleted', 0)->get();
                                                 ?>
                                                <select class="form-control" name="kpi" id="kpi" style="margin-left: 0%" disabled="true">
                                                    <?php
                                                        foreach ($kpis as $key => $value) { ?>
                                                            
                                                                <option <?php if($value->id == $kpi_details[0]->kpi_id) echo "SELECTED";?> value="<?= $value->id ?>"><?= $value->kpi_name ?></option>
                                                  <?php } 
                                                     ?>
                                                </select> 
                                        </div>
                                        <div class="col-sm-3 form-group">
                                        </div>
                                    </div>
                                    
                                    <div id="added">
                                    <?php $i = 1;?>
                                    <?php foreach ($kpi_details as $key => $value) { 
                                            $input_id='parameter_id'.($i);
                                            //echo $input_id
                                            $min_level_id='min_level_id'.($i);
                                            $max_level_id='max_level_id'.($i);
                                            $err_msg_id='err_msg_id'.($i);
                                        ?>
                                        <input type="hidden" id="iteration" value="<?php echo count($kpi_details);?>" />
                                        <div class="row"> 
                                            <div class="col-sm-4 form-group">
                                                <?php $parameter = DB::table('parameters')->where('id', $value->parameter_id)->where('kpi_id', $value->kpi_id)->where('status', 1)->where('is_deleted', 0)->first(); ?>
                                                <label style="margin-left: 4%" ><?= $parameter->name ?></label> 
                                                <?php //echo $parameter->min_level;echo $parameter->max_level; ?>
                                            </div> 
                                            <div class="col-sm-5 form-group">
                                                <input type="text" onblur="check_limit()" id="<?php echo $input_id;?>" value="<?= $value->parameters ?>" class="form-control" name="parameter[<?=$value->parameter_id?>]" />

                                                <span id="<?php echo $err_msg_id;?>" style="display: none;color:red;">Limit should be in between <?php echo $parameter->min_level;;?> to <?php echo $parameter->max_level; ?></span>

                                                <input type="hidden" id="<?php echo $min_level_id; ?>" name="<?php echo $min_level_id; ?>" value="<?php echo $parameter->min_level;?>" />

                                                <input type="hidden" name="<?php echo $min_level_id;?>" id="<?php echo $max_level_id; ?>" value="<?php echo $parameter->max_level; ?>" />

                                            </div>  
                                            <div class="col-sm-3 form-group"> 
                                            </div> 
                                        </div>
                                        <?php $i++; 
                                    } ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label style="margin-left: 4%" >From</label>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <?php $months=array(
                                                    "01" => "Jan",
                                                    "02" => "Feb",
                                                    "03" => "March",
                                                    "04" => "Apr",
                                                    "05" => "May",
                                                    "06" => "Jun",
                                                    "07" => "Jul",
                                                    "08" => "Aug",
                                                    "09" => "Sep",
                                                    "10" => "Oct",
                                                    "11" => "Nov",
                                                    "12" => "Dec"
                                                );?>
                                                <?php $month_year_data = explode("-", $kpi_details[0]->period_from);
                                                /*echo "<pre>";
                                                print_r($month_year_data); die();*/
                                                ?>
                                            <select class="form-control col-sm-3" name="frommonth" id="month" style="margin-left: 0%; width:50%" required>
                                                    <option>--Select--</option>
                                                <?php foreach ($months as $key => $value) { ?>

                                                    <option value="<?php echo $key;?>" <?php if($month_year_data[1] == $key) echo "SELECTED";?> ><?php echo $value?></option>

                                                <?php } ?>
                                            </select>
                                            <select class="form-control col-sm-3" name="fromyear" id="year" style="margin-left: 0%; width:50%" required>
                                                    <option>--Select--</option>
                                                    <option value="2018" selected>2018</option>
                                            </select>
                                            
                                            <!-- <input type="test" name="period" style="width:74%" class="form-control" required /> --> 
                                        </div>
                                        <div class="col-sm-3 form-group">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label style="margin-left: 4%" >To</label>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                            <?php 
                                            $month_year_data = explode("-", $kpi_details[0]->period_to);
                                            $months=array(
                                                    "01" => "Jan",
                                                    "02" => "Feb",
                                                    "03" => "March",
                                                    "04" => "Apr",
                                                    "05" => "May",
                                                    "06" => "Jun",
                                                    "07" => "Jul",
                                                    "08" => "Aug",
                                                    "09" => "Sep",
                                                    "10" => "Oct",
                                                    "11" => "Nov",
                                                    "12" => "Dec"
                                                );?>
                                            <select class="form-control col-sm-3" name="tomonth" id="month" style="margin-left: 0%; width:50%" required>
                                                <option>--Select--</option>
                                                <?php foreach ($months as $key => $value) { ?>

                                                    <option value="<?php echo $key;?>" <?php if($month_year_data[1] == $key) echo "SELECTED";?> ><?php echo $value?></option>

                                                <?php } ?>
                                            </select>
                                            <select class="form-control col-sm-3" name="toyear" id="toyear" style="margin-left: 0%; width:50%" required>
                                                    <option>--Select--</option>
                                                    <option value="2018" selected>2018</option>
                                            </select>
                                         
                                        </div>
                                        <div class="col-sm-3 form-group">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            <label style="margin-left: 4%" >Status</label>
                                        </div>
                                        <div class="col-sm-5 form-group">
                                                <?php
                                               $transction_status =  DB::table('kpi_status')->where('status', 1)->where('is_deleted', 0)->get();
                                                 ?>
                                                <select class="form-control" name="transaction_status" id="transaction_status" style="margin-left: 0%">
                                                    <?php
                                                        foreach ($transction_status as $key => $value) { ?>
                                                            
                                                                <option <?php if($value->id == $kpi_details[0]->transction_status) echo "SELECTED";?> value="<?= $value->id ?>"><?= $value->name ?></option>
                                                  <?php } 
                                                     ?>
                                                </select>                                        
                                        </div>
                                    </div>

                                    <div id="submit" class="row">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="submit" style="margin-left: 40%" class="btn btn-default" value="Update" />
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-0">
                                    
                                </div>
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


<script type="text/javascript">
    
    function check_limit()
    {
        var iteration=$('#iteration').val();
        //alert(iteration);
        for(var i=1; i <= iteration;++i)
        {
            var min_level_id='#min_level_id'+i;
            var max_level_id='#max_level_id'+i;
            var input_id='#parameter_id'+i;
            //alert(min_level_id);
            var min_level= $(min_level_id).val();
            var max_level=$(max_level_id).val();
            var input=$(input_id).val();

            // alert(min_level);
            // alert(max_level);
            // alert(input); 
            var min_chk=(input - min_level);
            var max_chk=(max_level - input);
            if(min_chk < 0 || max_chk < 0)
            {
                //alert('not ok');
                $(input_id).val('');
                var err_msg='#err_msg_id'+i;
                $(err_msg).show();
            }       
            else
            {
                //alert('ok');
                var err_msg='#err_msg_id'+i;
                $(err_msg).hide();
            }
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
       $j(document).ready(function(){
        $("#kpi").change(function(){
            // $('.added').remove();
            $("#added").html("");
            var kpi_id = $("#kpi").val();
            $.ajax({
                url: '{{ route("website.KPIgetparameter") }}',
                type: 'post',
                data: {kpi_id: kpi_id , _csrf: '{{ csrf_field() }}'},
                success: function(data){
                    var val = $.parseJSON(data)
                    var length  = val.length;
                    console.log(val);
                    console.log(length);
                    for(var i=0; i<length; i++){
                        $("#added").append('<div class="row"> <div class="col-sm-6 form-group"><label style="margin-left: 4%" >'+val[i].name+'</label> </div> <div class="col-sm-6 form-group"><input type="text" class="form-control" name="parameter['+val[i].id+'] id="'+val[i].name+'" /> </div>  <div class="col-sm-4 form-group"> </div> </div>');
                    }
                },
                complete: function(){
                    
                  }
            });
        });
       });
</script>

@endsection

Abhra Sarkar <abhrasarkar.official@gmail.com>
May 1 (10 days ago)
to Abhrasarkar.job 

                                            <select class="form-control col-sm-3" name="frommonth" onblur="check_month()" id="fromMonth" style="margin-left: 0%; width:50%" required>
                                                    <option value="">--Select--</option>
                                                <?php foreach ($months as $key => $value) { ?>

                                                    <option value="<?php echo $key;?>" <?php if($month_year_data[1] == $key) echo "SELECTED";?> ><?php echo $value?></option>

                                                <?php } ?>
                                            </select>
                                            <select class="form-control col-sm-3" name="fromyear" id="year" style="margin-left: 0%; width:50%" required>
                                                    <option value="">--Select--</option>
                                            <select class="form-control col-sm-3" name="tomonth" onblur="check_month()" id="toMonth" style="margin-left: 0%; width:50%" required>
                                                <option value="">--Select--</option>
                                                <?php foreach ($months as $key => $value) { ?>

                                                    <option value="<?php echo $key;?>" <?php if($month_year_data[1] == $key) echo "SELECTED";?> ><?php echo $value?></option>

                                                <?php } ?>
                                            </select>
                                            <select class="form-control col-sm-3" name="toyear" id="toyear" style="margin-left: 0%; width:50%" required>
                                                    <option value="">--Select--</option>
                                                    <option value="2018" selected>2018</option>
                                            </select>
                                            <span style="color:red;display:none ;" id="month_err_msg">Please Provide a valid Date</span>
                                            <input type="submit" style="margin-left: 40%" class="btn btn-default" onmouseenter="check_month()" value="Update" />
    function check_month()
    {
        var f_month=$('#fromMonth').val();
        var t_month=$('#toMonth').val();
        // alert(f_month);
        // alert(t_month);
        month=(t_month - f_month);
        if(month < 0)
        {
            //alert('Not ok');
            $('#toMonth').val('');
            $('#month_err_msg').show();
            return false;
        }
        else
        {
            //alert('Ok');
            $('#month_err_msg').hide();
            return true;

        }
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
var $j = jQuery.noConflict();
       $j(document).ready(function(){
        $("#kpi").change(function(){
            // $('.added').remove();
            $("#added").html("");
            var kpi_id = $("#kpi").val();
            $.ajax({
                url: '{{ route("website.KPIgetparameter") }}',
                type: 'post',
                data: {kpi_id: kpi_id , _csrf: '{{ csrf_field() }}'},
                success: function(data){
                    var val = $.parseJSON(data)
                    var length  = val.length;
                    console.log(val);
                    console.log(length);
                    for(var i=0; i<length; i++){
                        $("#added").append('<div class="row"> <div class="col-sm-6 form-group"><label style="margin-left: 4%" >'+val[i].name+'</label> </div> <div class="col-sm-6 form-group"><input type="text" class="form-control" name="parameter['+val[i].id+'] id="'+val[i].name+'" /> </div>  <div class="col-sm-4 form-group"> </div> </div>');
                    }
                },
                complete: function(){
                    
                  }
            });
        });
       });
</script>

@endsection