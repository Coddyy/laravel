<?php 
use App\Models\Authority;
use Illuminate\Support\Facades\Crypt;
?>
<html>
<head>

@extends( 'layouts.website' )
@section( 'innercontent' )

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<style type="text/css">
    tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
        margin-top:0px;
        display: table-header-group;
    }
    .dataTables_wrapper 
    {
        float: left;
        color:blue;
    }
    .dataTables_wrapper .dataTables_filter 
    {
        float: right;
        text-align: right;
    }



    .dataTables_paginate .paginate_button:hover {
  color: white !important;
  border: none;
  background-color: #585858;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
  letter-spacing: 3px;
}
</style>
</head>
<body>

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
<div class="container">
    <div class="kpicontainer">
        

        <div class="row wow fadeInDown m-t-40">
            <div class="col-sm-12">


    <!-- start -->
    <div class="row">
    <div class="col-lg-12">
        @if(Session::has('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
        @endif
    <!-- Posts list -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>KPI List </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('website.KPIaddnew') }}"> Add New</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table id="example" class="display table-striped table" style="width:100%;float:right;">
                    
                    <thead>
                        <tr>
                            <th>KPI Name</th>
                            <th>Code</th>
                            <th>Unit</th>
                            <th>Type</th>
                            <th>Upper Limit</th>
                            <th>Lower Limit</th>
                            <th>Calculation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            /*$kpis =  DB::table('kpi')->where('status', 1)->get();*/
                        ?>
                        <?php foreach ($kpis as $key => $value) { ?>
                            <tr>
                                <td><?= $value->kpi_name ?></td>
                                <td><?= $value->kpi_code ?></td>
                                <td><?= $value->unit ?></td>
                                <td><?php 
                                    if($value->graph_type_id != null && $value->graph_type_id != ""){
                                    $graph =  DB::table('graph_type')->where('id', $value->graph_type_id)->first();
                                    print_r($graph->name);
                                }
                                 ?></td>
                                <td><?= $value->goal_upper_limit ?></td>
                                <td><?= $value->goal_lower_limit ?></td>
                                <td><?= $value->calculation_formula ?></td>
                                <td><?php
                                if($value->kpi_status_id != null && $value->kpi_status_id != ""){
                                    $status =  DB::table('kpi_status')->where('id', $value->kpi_status_id)->first();
                                    print_r($status->name);
                                } ?>
                                    
                                </td>
                                <td>
                                    <!-- <a href="" class="label label-success"><span class="glyphion glyphicon-eye-open"></span></a> -->
                                    <?php 
                                        $parameter =[
                                            'id' =>  $value->id
                                        ];
                                        $parameter= Crypt::encrypt($parameter);
                                    ?>
                                    <a href="{{ route('website.KPIedit', $parameter) }}" title="edit"><span class="glyphion glyphicon-pencil"></span></a>
                                    <a href="{{ route('website.KPIdelete', $parameter) }}" onclick="return confirm('Are you sure to delete?')" title="delete"><span class="glyphion glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="display:none">KPI Name</th>
                            <th style="display:none">Code</th>
                            <th style="display:none">Unit</th>
                            <th style="display:none">Type</th>
                            <th style="display:none">Upper Limit</th>
                            <th style="display:none">Lower Limit</th>
                            <th style="display:none">Calculation</th>
                            <th style="display:none">Status</th>
                            <th style="display:none">Action</th>
                        </tr>
                    </tfoot>
                    
                </table>
 </div></div></div></div></div></div></div></div>

</body>
</html>
<script type="text/javascript">
    /*$(document).ready(function() {
    $('#example').DataTable();
} );*/
$(document).ready(function() {
    // // Setup - add a text input to each footer cell
    // $('#example tfoot th').each( function () {
    //     var title = $(this).text();
    //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    // } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
</script>

@endsection