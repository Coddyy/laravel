<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use DB;
use Session;
use Excel;

class PageController extends AppController
{
   

    public function dashboard() {
        return view('dashboard');
    }

    public function KPIdashboard(Request $request) {
        $current_month = date('m');
        $current_year = date('Y'); /*print_r($year);*/
        $no_of_days=cal_days_in_month(CAL_GREGORIAN,$current_month,$current_year);
        $from_date = $current_year.'-'.'01'.'-01';
        $to_date = $current_year.'-'.'12'.'-'.'31';
        $prev_from_date = ($current_year-1).'-'.'01'.'-01';
        $prev_to_date = ($current_year-1).'-'.'12'.'-'.'31';

        $kpi =  DB::table('kpi')->where('status', 1)->where('is_deleted', 0)->get();
        $kpi_details = [];
        $i=0;
        foreach ($kpi as $key => $value) {
            $dashboard_data = DB::table('kpi_dashboard')->where('kpi_id', $value->id)->where('period_from', ">=", date('Y-m-d', strtotime($from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($to_date)))->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
            if(count($dashboard_data)>0){
                    $sum = 0;
                    foreach ($dashboard_data as $key1 => $value1) {
                        $sum = $sum + $value1->calculated_value;
                    }
                    $kpi_details[$i]['calculated_value'] = $sum/count($dashboard_data);
                    $kpi_details[$i]['kpi_id'] = $value->id;
                    $kpi_details[$i]['kpi_name'] = $value->kpi_name;
                    $kpi_details[$i]['goal_upper_limit'] = $value->goal_upper_limit;
                    $kpi_details[$i]['goal_lower_limit'] = $value->goal_lower_limit;
                    $kpi_details[$i]['from_date'] = date('Y-m-d', strtotime($from_date));
                    $kpi_details[$i]['to_date'] = date('Y-m-d', strtotime($to_date));
                    $kpi_details[$i]['unit'] = $value->unit;
                    $subcategory = DB::table('category_sub_category')->where('id', $value->sub_category_id)->first();
                    $kpi_details[$i]['sub_category'] = $subcategory->name;
                    $kpi_details[$i]['sub_category_id'] = $value->sub_category_id;
            }else{
                $kpi_details[$i]['current_year'] = "no";
                $kpi_details[$i]['current_calculated_value'] = 0;
            }
            $prev_dashboard_data = DB::table('kpi_dashboard')->where('kpi_id', $value->id)->where('period_from', ">=", date('Y-m-d', strtotime($prev_from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($prev_to_date)))->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
            if(count($prev_dashboard_data)>0){
                $kpi_details[$i]['prev_year'] = "yes";
                $prev_sum = 0;
                foreach ($prev_dashboard_data as $key1 => $value1) {
                    $prev_sum = $prev_sum + $value1->calculated_value;
                }
                $kpi_details[$i]['prev_calculated_value'] = $prev_sum/count($prev_dashboard_data);
            }else{
                $kpi_details[$i]['prev_year'] = "no";
                $kpi_details[$i]['prev_calculated_value'] = 0;
            }
            $i++;
        } 
        /*echo "<pre>";
        print_r($kpi_details); die();*/

        return view('website.KPIdashboard', ['kpi_details' => $kpi_details
                                            ]);
    }

    public function Kpidetails($parameter) {
        $data = "";
        if($parameter){
            $data = Crypt::decrypt($parameter);
        }
        if ($data) {
            $post = $data;
            $kpi_details = DB::table('kpi')->where('id', $post['id'])->where('status', 1)->where('is_deleted', 0)->first();
            $from_date = '2018'.'-'.'01'.'-01';
            $to_date = '2018'.'-'.'12'.'-'.'31';
            $kpi_dashboard_data = DB::table('kpi_dashboard')->where('kpi_id', $post['id'])->where('period_from', ">=", date('Y-m-d', strtotime($from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($to_date)))->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
            $sum = 0;
            if(count($kpi_dashboard_data)>0){
                foreach ($kpi_dashboard_data as $key => $value) {
                    $sum = $sum + $value->calculated_value;
                }
            }
            $calculated_value = $sum/count($kpi_dashboard_data);
            $graph=[];
            $month = [];
            $data = [];
            $parameter_name = [];
            $parameters = DB::table('parameters')->where('kpi_id', $post['id'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get();
            foreach ($parameters as $key => $value) {
                $dashboard_data = DB::table('kpi_dashboard')->where('kpi_id', $post['id'])->where('parameter_id', $value->id)->where('status', 1)->where('is_deleted', 0)->where('transction_status', 1)->where('period_from', ">=", date('Y-m-d', strtotime($from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($to_date)))->orderBy('kpi_dashboard.created_at', 'DESC')->get();
                foreach ($dashboard_data as $key1 => $value1) {
                    if(array_key_exists($key, $data)){
                        array_push($data[$key], $value1->parameters);
                    }else{
                        $data[$key] = [];
                        array_push($data[$key], $value1->parameters);
                    }
                }
            }
            $parameters = DB::table('parameters')->where('kpi_id', $post['id'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get();
            $check_parameter = 0;
            if(count($parameters)>0){
                $check_parameter = 1;
                foreach ($parameters as $key => $value) {
                    array_push($parameter_name, $value->name);
                }
                $graph = [];
                $i=0;
                foreach ($data as $key => $value) {
                    $graph[$i]['name'] = $parameters[$key]->name;
                    $graph[$i]['series'] = $value;
                    $i++;
                }
            }

            // graph showing month calculation
            foreach ($kpi_dashboard_data as $key => $value) {
                $transction_month = date('d-m-Y', strtotime($value->period_from));
                array_push($month, $transction_month);
            }

            // Table Data Calculation
            $table_parameter = [];
            $parameters = DB::table('parameters')->where('kpi_id', $post['id'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get();
            if(count($parameters)>0){
                foreach ($parameters as $key => $value) {
                    array_push($table_parameter, $value->name);
                }
            }

            $dashboard_data1 = DB::table('kpi_dashboard')->where('kpi_id', $post['id'])->where('period_from', ">=", date('Y-m-d', strtotime($from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($to_date)))->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
            $table_data = [];
            foreach ($dashboard_data1 as $key => $value) {
                $parameters = DB::table('kpi_dashboard')->where('sequence_no', $value->sequence_no)->where('status', 1)->where('is_deleted', 0)->orderBy('parameter_id', 'ASC')->get();
                $parameter_value = [];
                foreach ($parameters as $key1 => $value1) {
                    $parameter_naming = DB::table('parameters')->where('id', $value1->parameter_id)->first();
                    $parameter_value[$parameter_naming->name] = $value1->parameters;
                }
                $table_data[$key]['parameter_value'] = $parameter_value;
                $table_data[$key]['calculated_value'] = $value->calculated_value;
                $table_data[$key]['date'] = date('d-m-Y', strtotime($value->period_from));
                $table_data[$key]['created_at'] = date('d-m-Y', strtotime($value->created_at));
            }
            //echo "<pre>"; print_r($table_data); die();


            //Test 

            

            $kpi_param=DB::table('parameters')->where('kpi_id',$post['id'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get();
            
            $param=array();
            $avg=array();
            foreach ($kpi_param as $key => $valuep) 
            {
                $dashboard_data2 = DB::table('kpi_dashboard')->where('kpi_id', $post['id'])->where('parameter_id',$valuep->id)->where('period_from', ">=", date('Y-m-d', strtotime($from_date)))->where('period_to', "<=", date('Y-m-d', strtotime($to_date)))->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
                $parameter_sum = 0;
                foreach ($dashboard_data2 as $key => $value2) 
                {
                    $parameter_sum = $parameter_sum + $value2->parameters;
                } 
                $average = $parameter_sum/count($dashboard_data2);
                $avg[]=$average;
            }
            //echo count($avg);
            $total_avg=0;
            for ($i=0; $i <count($avg) ; $i++) 
            { 
                $total_avg=($total_avg + $avg[$i]);
            }
            $percentage=array();
            for ($i=0; $i <count($avg) ; $i++) 
            { 
                $percent=($avg[$i] / $total_avg) * 100;
                $percentage[]=$percent;
                //echo $percentage;echo '<br />';
            }/*
            echo "<pre>";
            print_r($percentage); die();*/
            
            //echo "<pre>"; print_r($table_dat);

            //die();
            // End Test


            return view('website.KPIdetails', ['kpi_details' => $kpi_details,
                                                'calculated_value' => $calculated_value,
                                                'graph' => json_encode($graph),
                                                'check_parameter' => $check_parameter,
                                                'month' => json_encode($month),
                                                'table_data' => $table_data,
                                                'table_parameter' => $table_parameter,
                                                'percentage' => $percentage
                        ]);


            


            




        }
    }

    public function KPIaddnew() {
        
            return view('website.KPIaddnew');
        
    }

    public function KPIindex() {
            $kpis =  DB::table('kpi')->where('status', 1)->where('is_deleted', 0)->get();
            return view('website.KPIindex', ['kpis' => $kpis
                        ]);
        
    }


    public function KPIinsert(Request $request) {
            // echo "<pre>";
            // print_r($request->all()); die();
        $post = $request->all();
        $query =  DB::table('kpi')->where('kpi_name', $post['kpiname'])->where('status', 1)->where('is_deleted', 0)->get();
        $query1 =  DB::table('kpi')->where('kpi_code', $post['kpicode'])->where('status', 1)->where('is_deleted', 0)->get();
        if(count($query) > 0){
            Session::flash('error_msg', 'KPI Name Should Be Unique!');
            return view('website.KPIaddnew', ['return_data' => $post]);
        }
        if(count($query1) > 0){
            Session::flash('error_msg', 'KPI Code Should Be Unique!');
            return view('website.KPIaddnew', ['return_data' => $post]);
        }

        // if(DB::table('kpi')->insert(['kpi_name' => $post['kpiname'], 'department_id' => $post['department'], 'category_id' => $post['category'], 'sub_category_id' => $post['subcategory'], 'kpi_name' =>  $post['kpiname'], 'kpi_code' => $post['kpicode'], 'graph_type_id' =>  $post['type'], 'goal_upper_limit' =>  $post['goal_upper'], 'goal_lower_limit' => $post ['goal_lower'], 'unit' =>  $post['unit'], 'methodology' =>  $post['methodology'], 'description' => $post['description'], 'kpi_status_id' => $post['status'], 'no_of_parameters' => $post['no_of_parameters'], 'authorized_person_id' => $post['authority'], 'calculation_formula' => $post['calculation'], 'status' => 1, 'is_deleted' => 0, 'created_at' => date('Y-m-d H:i:s')])){

        // if(DB::table('kpi')->insert(['kpi_name' => $post['kpiname'],'kpi_name' =>  $post['kpiname'], 'kpi_code' => $post['kpicode'], 'goal_upper_limit' =>  $post['goal_upper'], 'goal_lower_limit' => $post ['goal_lower'], 'unit' =>  $post['unit'], 'methodology' =>  $post['methodology'], 'description' => $post['description'], 'no_of_parameters' => $post['no_of_parameters'],'calculation_formula' => $post['calculation'], 'status' => 1, 'is_deleted' => 0, 'created_at' => date('Y-m-d H:i:s')])){

        if(DB::table('kpi')->insert(['kpi_name' => $post['kpiname'], 'department_id' => $post['department'], 'category_id' => $post['category'], 'sub_category_id' => $post['subcategory'], 'kpi_name' =>  $post['kpiname'], 'kpi_code' => $post['kpicode'], 'graph_type_id' =>  $post['type'], 'goal_upper_limit' =>  $post['goal_upper'], 'goal_lower_limit' => $post ['goal_lower'], 'unit' =>  $post['unit'], 'methodology' =>  $post['methodology'], 'description' => $post['description'], 'kpi_status_id' => $post['status'], 'no_of_parameters' => $post['no_of_parameters'],'calculation_formula' => $post['calculation'], 'status' => 1, 'is_deleted' => 0, 'created_at' => date('Y-m-d H:i:s')])){

            $last_inserted_id = DB::getPdo()->lastInsertId();
            //echo $last_inserted_id;die();
            if(array_key_exists("parameter", $post))
            {
                //echo '<pre>';echo $post;die();
                foreach ($post['parameter'] as $key => $value) 
                {
                    if(DB::table('parameters')->insert(['kpi_id' => $last_inserted_id, 'parameter_no' => 'p'.($key+1) , 'name' => $post['parameter'][$key], 'min_level' => $post['minlevel'][$key], 'max_level' =>  $post['maxlevel'][$key], 'datasource_id' => $post['datasource'][$key], 'collection_frequency' =>  $post['collect_freq'][$key], 'target_frequency' =>  $post['target_freq'][$key], 'parameter_master_id' => $post['parameter_master_id'][$key], 'status' => 1, 'is_deleted' => 0, 'created_at' => date('Y-m-d H:i:s')])){

                    }
                }
            }

            Session::flash('success_msg', 'KPI added successfully!');

            return redirect()->route('website.KPIindex');
        }else{
            return view('website.Kpidetails');
        }
    }

    public function KPIedit($parameter){
        if($parameter){
            $data = Crypt::decrypt($parameter);
        }
        $kpi_details = DB::table('kpi')->where('id', $data['id'])->where('status', 1)->where('is_deleted', 0)->first();
        return view('website.KPIedit', ['kpi_details' => $kpi_details]);
    }

    public function KPIupdate($id, Request $request){
        //get post data by id
        $post_data = $request->all();
        // echo "<pre>";
        // print_r($post_data); die();
        $kpi_details = DB::table('kpi')->where('id', $id)->first();

        // if(DB::table('kpi')
        //     ->where('id', $id)
        //     ->update(['department_id' => $post_data['department'],'authorized_person_id' => $post_data['authority'],'category_id' => $post_data['category'],'sub_category_id' => $post_data['subcategory'],'kpi_name' => $post_data['kpiname'],'kpi_code' => $post_data['kpicode'],'graph_type_id' => $post_data['type'],'unit' => $post_data['unit'],'goal_upper_limit' => $post_data['goal_upper'],'goal_lower_limit' => $post_data['goal_lower'],'no_of_parameters' => $post_data['no_of_parameters'],'calculation_formula' => $post_data['calculation'],'kpi_status_id' => $post_data['status'],'methodology' => $post_data['methodology'],'description' => $post_data['description']])){

        // if(DB::table('kpi')
        //     ->where('id', $id)
        //     ->update(['kpi_name' => $post_data['kpiname'],'kpi_code' => $post_data['kpicode'],'unit' => $post_data['unit'],'goal_upper_limit' => $post_data['goal_upper'],'goal_lower_limit' => $post_data['goal_lower'],'no_of_parameters' => $post_data['no_of_parameters'],'calculation_formula' => $post_data['calculation'],'methodology' => $post_data['methodology'],'description' => $post_data['description']])){

        if(DB::table('kpi')
            ->where('id', $id)
            ->update(['department_id' => $post_data['department'],'category_id' => $post_data['category'],'sub_category_id' => $post_data['subcategory'],'kpi_name' => $post_data['kpiname'],'kpi_code' => $post_data['kpicode'],'graph_type_id' => $post_data['type'],'unit' => $post_data['unit'],'goal_upper_limit' => $post_data['goal_upper'],'goal_lower_limit' => $post_data['goal_lower'],'no_of_parameters' => $post_data['no_of_parameters'],'calculation_formula' => $post_data['calculation'],'kpi_status_id' => $post_data['status'],'methodology' => $post_data['methodology'],'description' => $post_data['description']])){


            
        }
        if(array_key_exists("parameter", $post_data)){
            foreach ($post_data['parameter'] as $key => $value) {
                if(DB::table('parameters')->where('id', $key)->where('kpi_id', $id)->where('status', 1)->where('is_deleted', 0)->update(['name' => $post_data['parameter'][$key], 'min_level' => $post_data['minlevel'][$key], 'max_level' =>  $post_data['maxlevel'][$key], 'datasource_id' => $post_data['datasource'][$key], 'parameter_master_id' => $post_data['parameter_master_id'][$key], 'collection_frequency' =>  $post_data['collect_freq'][$key], 'target_frequency' =>  $post_data['target_freq'][$key]])){

                }
            }
        }
        Session::flash('success_msg', 'KPI updated successfully!');

        return redirect()->route('website.KPIindex');
    }

    public function KPIdatamanagement(){
        /*$check_existing_data = DB::table('period_tracker')->where('period_from', ">=", date('Y-m-d', strtotime("2018-01-01")))->where('period_to', "<=", date('Y-m-d', strtotime("2018-12-31")))->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'DESC')->get();
        echo "<pre>";
        print_r($check_existing_data); die();*/
        return view('website.KPIdatamanagement');
    }

    public function KPIgetparameter(Request $request){
        $postData = $request->all();
        $details = array();
        $parameter = DB::table('parameters')->where('kpi_id', $postData['kpi_id'])->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'ASC')->get();
        $j = 0;
        $period_from = date("Y-m-d", strtotime($postData['from_year']."-".$postData['from_month']."-01"));
        $e=cal_days_in_month(CAL_GREGORIAN,$postData['to_month'],$postData['to_year']);
        $period_to = date("Y-m-d", strtotime($postData['to_year']."-".$postData['to_month']."-".$e));
        foreach ($parameter as $key => $value) {
                $details[$j]['name'] = $value->name;
                $details[$j]['min_level'] = $value->min_level; 
                $details[$j]['max_level'] = $value->max_level; 
                $details[$j]['id'] = $value->id; 
                if($value->collection_frequency == "annually"){
                    $period_from = date("Y-m-d", strtotime($postData['from_year']."-"."01"."-01"));
                    $period_to = date("Y-m-d", strtotime($postData['to_year']."-"."12"."-31"));
                    $check_existing_data = DB::table('period_tracker')->where('parameter_master_id', $value->parameter_master_id)->where('period_from', ">=", date('Y-m-d', strtotime($period_from)))->where('period_to', "<=", date('Y-m-d', strtotime($period_to)))->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'DESC')->first();
                    if(count($check_existing_data)>0){
                        $details[$j]['value'] = $check_existing_data->parameter_value;
                    }else{
                        $details[$j]['value'] = "NAN";
                    }
                }else{
                    $period_from = date("Y-m-d", strtotime($postData['from_year']."-".$postData['from_month']."-01"));
                    $e=cal_days_in_month(CAL_GREGORIAN,$postData['to_month'],$postData['to_year']);
                    $period_to = date("Y-m-d", strtotime($postData['to_year']."-".$postData['to_month']."-".$e));
                    $check_existing_data = DB::table('period_tracker')->where('parameter_master_id', $value->parameter_master_id)->where('period_from', $period_from)->where('period_to', $period_to)->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'DESC')->first();
                    if(count($check_existing_data)>0){
                        $details[$j]['value'] = $check_existing_data->parameter_value;
                    }else{
                        $details[$j]['value'] = "NAN";
                    }
                }
                $j++;
        }
        echo json_encode($details);
    }
     public function KPIgetparameterDetails(Request $request){
        $postData = $request->all();
        $details = array();
        $parameter = DB::table('parameter_master')->where('id', $postData['parameter_id'])->where('status', 1)->where('is_deleted', 0)->first();
                $details['name'] = $parameter->name;
                $details['min_level'] = $parameter->min_level; 
                $details['max_level'] = $parameter->max_level; 
                $details['id'] = $parameter->id; 
                $details['col_freq']=$parameter->collection_frequency;
                $details['tar_freq']=$parameter->target_frequency;
                $details['datasource_id']=$parameter->datasource_id;

        echo json_encode($details);
    }

    public function KPIdelete($parameter){
        $data = '';
        if($parameter){
            $data = Crypt::decrypt($parameter);
        }
        $id = $data['id'];
        if(DB::table('kpi')
            ->where('id', $id)
            ->update(['status' =>0, 'is_deleted' => 1])){
                Session::flash('success_msg', 'KPI Deleted successfully!');
                return redirect()->route('website.KPIindex');
        }else{
                return redirect()->route('website.KPIindex');
        }
    }

    public function KPIdatadelete($parameter){
        $data = '';
        if($parameter){
            $data = Crypt::decrypt($parameter);
        }
        $sequence_no = $data['id'];
        if(DB::table('kpi_dashboard')
            ->where('sequence_no', $sequence_no)
            ->update(['status' =>0, 'is_deleted' => 1])){
                Session::flash('success_msg', 'KPI Deleted successfully!');
                return redirect()->route('website.KPIdataindex');
        }else{
                return redirect()->route('website.KPIdataindex');
        }
    }

    public function KPIdatainsert(Request $request){
            $postData = $request->all();
            $kpi_dashboard = DB::table('kpi_dashboard')->where('kpi_id', $postData['kpi'])->where('status', 1)->where('is_deleted', 0)->first();

            // updating previous data record for same kpi with same period to inactive
            $period_from = $postData['fromyear']."-".$postData['frommonth']."-01";
            $e=cal_days_in_month(CAL_GREGORIAN,$postData['tomonth'],$postData['toyear']);
            $period_to = $postData['toyear']."-".$postData['tomonth']."-".$e;
            if(strtotime($period_from)>strtotime($period_to)){
                Session::flash('error_msg', 'Form Date Should be less then to date!');
                return view('website.KPIdatamanagement',['return_data' => $postData]);
            }
            if(DB::table('kpi_dashboard')
            ->where('kpi_id', $postData['kpi'])->where('period_from', ">=", date('Y-m-d', strtotime($period_from)))->where('transction_status', 1)->where('period_to', "<=", date('Y-m-d', strtotime($period_to)))->where('status', 1)->where('is_deleted', 0)->update(['transction_status' =>2])){
            }

            // added if required delete the bellow query
            if(DB::table('kpi_dashboard')
            ->where('kpi_id', $postData['kpi'])->where('period_from', "<=", date('Y-m-d', strtotime($period_from)))->where('transction_status', 1)->where('period_to', ">=", date('Y-m-d', strtotime($period_to)))->where('status', 1)->where('is_deleted', 0)->update(['transction_status' =>2])){

            }

            $parameters = "";
            $kpi = DB::table('kpi')->where('id', $postData['kpi'])->first();
            $formula = strtolower($kpi->calculation_formula);
            $value = 0;
            if(array_key_exists("parameter", $postData)){
                foreach ($postData['parameter'] as $key => $value) {
                    if($value != "" && $value != null){
                        if($value != ""){
                            $parameter = DB::table('parameters')->where('id', $key)->where('status', 1)->where('is_deleted', 0)->first();
                            $formula = str_replace($parameter->parameter_no, $value, $formula);
                        }
                    }
                }
                if(!(preg_match("/[a-z]/i", $formula))){
                    $value = eval('return '.$formula.';');
                }else{
                    $value = "string";
                }
            }
            $formulated_value = $value;

            $sequence_no = DB::table('kpi_dashboard')->orderBy('kpi_dashboard.sequence_no', 'DESC')->first();

            foreach ($postData['parameter'] as $key => $value) {
                if($formulated_value == "string"){
                    if($value!= "" && $value != null){
                        $parameter_master_id = DB::table('parameters')->where('id', $key)->where('status', 1)->where('is_deleted', 0)->first();
                        $get_data = DB::table('period_tracker')->where('period_from', $period_from)->where('period_to', $period_to)->where('parameter_master_id', $parameter_master_id->parameter_master_id)->where('status', 1)->where('is_deleted', 0)->get();
                        if(count($get_data)==0){
                            if(DB::table('period_tracker')->insert(['kpi_id' => $postData['kpi'], 'period_from' => $period_from, 'period_to' => $period_to, 'status' => 1, 'is_deleted' => 0, 'parameter_value' => $value, 'created_at' => date('Y-m-d H:i:s'), 'parameter_master_id' => $parameter_master_id->parameter_master_id])){

                            }
                        }else{
                            if(DB::table('period_tracker')->where('period_from', $period_from)->where('period_to', $period_to)->where('parameter_master_id', $parameter_master_id->parameter_master_id)->where('status', 1)->where('is_deleted', 0)->update(['parameter_value' =>$value])){
                            }
                        }
                    }
                }else{
                    if(DB::table('kpi_dashboard')->insert(['kpi_id' => $postData['kpi'], 'calculated_value' => $formulated_value, 'period_from' => $period_from, 'period_to' => $period_to, 'transction_status' => $postData['transaction_status'], 'status' => 1, 'is_deleted' => 0, 'parameters' => $value, 'created_at' => date('Y-m-d H:i:s'), 'parameter_id' => $key, 'sequence_no' => ($sequence_no->sequence_no+1)])){

                        $parameter_master_id = DB::table('parameters')->where('id', $key)->where('status', 1)->where('is_deleted', 0)->first();
                        $get_data = DB::table('period_tracker')->where('period_from', $period_from)->where('period_to', $period_to)->where('parameter_master_id', $parameter_master_id->parameter_master_id)->where('status', 1)->where('is_deleted', 0)->get();
                        if(count($get_data)==0){
                            if(DB::table('period_tracker')->insert(['kpi_id' => $postData['kpi'], 'period_from' => $period_from, 'period_to' => $period_to, 'status' => 1, 'is_deleted' => 0, 'parameter_value' => $value, 'created_at' => date('Y-m-d H:i:s'), 'parameter_master_id' => $parameter_master_id->parameter_master_id])){

                            }
                        }else{
                            if(DB::table('period_tracker')->where('period_from', $period_from)->where('period_to', $period_to)->where('parameter_master_id', $parameter_master_id->parameter_master_id)->where('status', 1)->where('is_deleted', 0)->update(['parameter_value' =>$value])){
                            }
                        }
                    }
                }
            }

            return redirect()->route('website.KPIdataindex');
    }

    public function KPIdataedit($parameter){
        //get post data by id
        $data = '';
        if($parameter){
            $data = Crypt::decrypt($parameter);
        }
        $sequence_no = $data['id'];
        $kpi_details = DB::table('kpi_dashboard')->where('sequence_no', $sequence_no)->where('status', 1)->where('is_deleted', 0)->get();
        //load form view
        return view('website.KPIdataedit', ['kpi_details' => $kpi_details]);
    }

    public function KPIdataindex() {
        $kpis =  DB::table('kpi_dashboard')->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->get();
        return view('website.KPIdataindex', [
            'kpis' => $kpis
        ]);
        
    }

    public function KPIdataupdate($sequence_no, Request $request){
        //get post data by id
        $post_data = $request->all();
        $kpi_dashboard_details = DB::table('kpi_dashboard')->where('sequence_no', $sequence_no)->first();
        $kpi = DB::table('kpi')->where('id', $kpi_dashboard_details->kpi_id)->first();
        $formula = strtolower($kpi->calculation_formula);
        foreach ($post_data['parameter'] as $key => $value) {
                $parameter = DB::table('parameters')->where('id', $key)->where('status', 1)->where('is_deleted', 0)->first();
                $formula = str_replace($parameter->parameter_no, $value, $formula);
        }

        $formulated_value = eval('return '.$formula.';');

        $period_from = $post_data['fromyear']."-".$post_data['frommonth']."-01";
        $e=cal_days_in_month(CAL_GREGORIAN,$post_data['tomonth'],$post_data['toyear']);
        $period_to = $post_data['toyear']."-".$post_data['tomonth']."-".$e;
        foreach ($post_data['parameter'] as $key => $value) {
            if(DB::table('kpi_dashboard')
            ->where('parameter_id', $key)->where('sequence_no', $sequence_no)
            ->update(['transction_status' => $post_data['transaction_status'],'period_from' => $period_from, 'period_to' => $period_to, 'calculated_value' => $formulated_value, 'parameters' => $value])){
            }
        }
        return redirect()->route('website.KPIdataindex');
    }

    public function importExport()
    {
        return view('website.importExport');
    }
    public function downloadExcel($type)
    {
        $kpi = DB::table('kpi')->where('status', 1)->where('is_deleted', 0)->orderBy('id', 'DESC')->get();
        $kpi_id = "";
        $dashboard_data = "";
        foreach ($kpi as $key => $value) {
            $dashboard_data = DB::table('kpi_dashboard')->where('kpi_id', $value->id)->where('transction_status', 1)->where('status', 1)->where('is_deleted', 0)->groupBy('sequence_no')->orderBy('kpi_dashboard.created_at', 'DESC')->get();
            if(count($dashboard_data)>0){
                $kpi_id = $dashboard_data[0]->id;
                break;
            }
        }
        $data = [];
        foreach ($dashboard_data as $key => $value) {
            $dashboard_data_parameter = DB::table('kpi_dashboard')->where('sequence_no', $value->sequence_no)->orderBy('parameter_id', 'ASC')->get();
            $data1 = [];
            $data1['period'] = date("Y-m-d", strtotime($value->period_from));
            foreach ($dashboard_data_parameter as $key1 => $value1) {
                $parameter = DB::table('parameters')->where('id', $value1->parameter_id)->first();
                $data1[$parameter->name] = $value1->parameters;
            }
            array_push($data, $data1);
        }
        return Excel::create('laravelcode', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }
    public function importExcel(Request $request)
    {
        $id="";
        $str="";
        $return_data = array();
        if($request->hasFile('import_file')){
            $id = $request->all()['kpi'];
            $from_date = date("Y-m-d", strtotime($request->all()['fromyear'].'-'.$request->all()['frommonth'].'-01'));
            $to_date = date("Y-m-d", strtotime($request->all()['toyear'].'-'.$request->all()['tomonth'].'-30'));
            $parameters = DB::table('parameters')->where('kpi_id', $id)->where('status', 1)->where('is_deleted', 0)->get();
            Excel::load($request->file('import_file')->getRealPath(), function ($reader) use ($id, $return_data, &$str, &$from_date, &$to_date) {
                foreach ($reader->toArray() as $key => $value) {
                    if (array_key_exists("period",$value)){
                       if(date("Y-m-d", strtotime($value['period'])) <= $to_date){
                            if(date("Y-m-d", strtotime($value['period'])) >= $from_date){
                                array_push($return_data, $value);
                            }
                       }
                    }
                }
                $str = json_encode($return_data);
            });

            // checking No of parameter in both excel sheet and database wether are they same
            $check_str = json_decode($str, true);
            $count=0;
            if(count($check_str)>0){
                foreach ($check_str[0] as $key => $value) {
                    if($key != "period"){
                        $count++;
                    }
                }
                if($count != count($parameters)){
                    Session::put('error', 'Number of parameter is not correct in excel sheet!!!');
                    return view('website.importExport');
                }
            }

            return view('website.importExport', [
                'return_data' => $str,
                'parameters' => $parameters,
                'id' => $id
            ]);
            
        }
        
        //Session::put('success', 'Youe file successfully import in database!!!');

        //return back();
    }

    public function saveExcel(Request $request)
    {
        $post_data = $request->all();
        $kpi = DB::table('kpi')->where('id', $post_data['kpi_id'])->where('status', 1)->where('is_deleted', 0)->first();
        $formula = strtolower($kpi->calculation_formula);
        if(array_key_exists("labelparameter", $post_data)){
            foreach ($post_data['labelparameter'] as $key => $value) {
                $parameters = DB::table('parameters')->where('kpi_id', $post_data['kpi_id'])->where('id', $value)->first();
                $formula = str_replace($parameters->parameter_no, $parameters->id ,$formula);  
            }
        }
        $derived_formula = $formula;

        $parameter_key = $post_data['labelparameter'];
        sort($parameter_key);

        foreach ($post_data['period'] as $key => $value) {

            // added to make status inactive of previous data
            /*$month_year_data = explode("-", $value);
            $e=cal_days_in_month(CAL_GREGORIAN,$month_year_data[1],$month_year_data[2]);
            $period_from = date('Y-m-d', strtotime($month_year_data[2].'-'.$month_year_data[1].'-01'));
            $period_to = date('Y-m-d', strtotime($month_year_data[2].'-'.$month_year_data[1].'-'.$e));*/
            $period_from = date('Y-m-d', strtotime($value));
            $period_to = date('Y-m-d', strtotime($value));
            //added to make status inactive of previous data
            if(DB::table('kpi_dashboard')
            ->where('kpi_id', $post_data['kpi_id'])->where('period_from', ">=", date('Y-m-d', strtotime($period_from)))->where('transction_status', 1)->where('period_to', "<=", date('Y-m-d', strtotime($period_to)))->where('status', 1)->where('is_deleted', 0)->update(['transction_status' =>2])){
            }

            // added if required delete the bellow query
            if(DB::table('kpi_dashboard')
            ->where('kpi_id', $post_data['kpi_id'])->where('period_from', "<=", date('Y-m-d', strtotime($period_from)))->where('transction_status', 1)->where('period_to', ">=", date('Y-m-d', strtotime($period_to)))->where('status', 1)->where('is_deleted', 0)->update(['transction_status' =>2])){
                
            }

            $sequence_no = DB::table('kpi_dashboard')->orderBy('kpi_dashboard.sequence_no', 'DESC')->first();
            foreach ($parameter_key as $key2 => $value2) {
                $find_key = array_search ($value2, $post_data['labelparameter']);
                $parameter = $post_data['parameter'][$key][$find_key];
                $formula = str_replace($value2, $parameter ,$formula);
            }
            $calculated_value = eval('return '.$formula.';');
            foreach ($parameter_key as $key2 => $value2) {
                $find_key = array_search ($value2, $post_data['labelparameter']);
                $parameter = $post_data['parameter'][$key][$find_key];
                if(DB::table('kpi_dashboard')->insert(['kpi_id' => $post_data['kpi_id'], 'calculated_value' => $calculated_value, 'period_from' => $period_from, 'period_to' => $period_to, 'transction_status' => 1, 'status' => 1, 'is_deleted' => 0, 'sequence_no'=> ($sequence_no->sequence_no+1), 'parameters' => $parameter, 'created_at' => date('Y-m-d H:i:s'), 'parameter_id' => $value2])){
                }
            }
            $formula = $derived_formula;
        }
        Session::put('success', 'Your file has been successfully imported in to database!!!');
        return view('website.importExport');
    }

    public function parametermaster() {
        $parameter = DB::table('parameter_master')->orderBy('id', 'DESC')->first();
        $parameter_code = $parameter->id;
        return view('website.parametermaster',['parameter_code' => $parameter_code]);
    }

    public function parametermasterinsert(Request $request) {
        $post = $request->all();
        $query =  DB::table('parameter_master')->where('name', $post['parameter_name'])->where('status', 1)->where('is_deleted', 0)->get();
        if(count($query) > 0){
            Session::flash('error_msg', 'Parameter Name Should Be Unique!');
            return view('website.parametermaster', ['return_data' => $post]);
        }

        if(DB::table('parameter_master')->insert(['name' => $post['parameter_name'], 'code' => $post['parameter_code'], 'min_level' => $post['min_level'], 'max_level' => $post['max_level'], 'collection_frequency' =>  $post['collection_frequency'], 'target_frequency' => $post['target_frequency'], 'department_id' =>  $post['department'], 'authority_id' =>  $post['authority'], 'datasource_id' => $post ['datasource'], 'unit' =>  $post['unit'], 'status' => 1, 'is_deleted' => 0])){
            Session::put('success', 'Data Saved Successfully');
            //return view('website.KPIaddnew');
            return redirect()->route('website.parametermaster');
        }
    }
}