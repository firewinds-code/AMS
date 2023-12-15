<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\AmsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ams_info;
use DB;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return Excel::download(new AmsExport, 'Ams_Report.xlsx');
    }
    
	public function dateReport() 
    {
       
        $dt = ams_info::get()->toArray();
        $getJobCard ='';
     
        foreach ($dt as $val) {
            $Job_Card_open_date = $val['Job_Card_open_date'];
            $Job_card_No = $val['Job_card_No'];
            $Registration_of_certificate_upload = $val['Registration_of_certificate_upload'] !=''?$this->removestr($val['Registration_of_certificate_upload']):'';
            $National_Permit_A_B_upload = $val['National_Permit_A_B_upload'] !=''?$this->removestr($val['National_Permit_A_B_upload']):'';
            $Road_Tax_upload = $val['Road_Tax_upload'] !=''?$this->removestr($val['Road_Tax_upload']):'';
            $Claim_Form_upload = $val['Claim_Form_upload'] !=''?$this->removestr($val['Claim_Form_upload']):'';
            $Intimation_2_IC_for_surveyor_deputation = $val['Intimation_2_IC_for_surveyor_deputation'] !=''?$this->removestr($val['Intimation_2_IC_for_surveyor_deputation']):'';
            $Surveyor_initial_inspection_date = $val['Surveyor_initial_inspection_date'] !=''?$this->removestr($val['Surveyor_initial_inspection_date']):'';
            $Written_work_order_approval_2_start_work = $val['Written_work_order_approval_2_start_work'] !=''?$this->removestr($val['Written_work_order_approval_2_start_work']):'';
            $Intimation_2_customer_for_advance_paymen = $val['Intimation_2_customer_for_advance_paymen'] !=''?$this->removestr($val['Intimation_2_customer_for_advance_paymen']):'';
            $Advance_payment_received_onCustomer = $val['Advance_payment_received_onCustomer'] !=''?$this->removestr($val['Advance_payment_received_onCustomer']):'';
            $Customer_written_approval_2_start_of_wor = $val['Customer_written_approval_2_start_of_wor'] !=''?$this->removestr($val['Customer_written_approval_2_start_of_wor']):'';
            $Repair_work_start_date = $val['Repair_work_start_date'] !=''?$this->removestr($val['Repair_work_start_date']):'';
            $Repair_completion_date = $val['Repair_completion_date'] !=''?$this->removestr($val['Repair_completion_date']):'';
            $Intimation_to_IC_for_final_inspection = $val['Intimation_to_IC_for_final_inspection'] !=''?$this->removestr($val['Intimation_to_IC_for_final_inspection']):'';
            $Final_inspection_date = $val['Final_inspection_date'] !=''?$this->removestr($val['Final_inspection_date']):'';
            $Job_Card_open_date = $this->removestr($Job_Card_open_date);

            $Job_Card_open_dateArr = date('Y-m-d',strtotime($Job_Card_open_date));
            
            
            $Registration_of_certificate_upload = $Registration_of_certificate_upload !=''?date('Y-m-d',strtotime($Registration_of_certificate_upload)):'0000-00-00';
            $National_Permit_A_B_upload = $National_Permit_A_B_upload !=''?date('Y-m-d',strtotime($National_Permit_A_B_upload)):'0000-00-00';
            $Road_Tax_upload = $Road_Tax_upload !=''?date('Y-m-d',strtotime($Road_Tax_upload)):'0000-00-00';
            $Claim_Form_upload = $Claim_Form_upload !=''?date('Y-m-d',strtotime($Claim_Form_upload)):'0000-00-00';
            $Intimation_2_IC_for_surveyor_deputation = $Intimation_2_IC_for_surveyor_deputation !=''?date('Y-m-d',strtotime($Intimation_2_IC_for_surveyor_deputation)):'0000-00-00';
            $Surveyor_initial_inspection_date = $Surveyor_initial_inspection_date !=''?date('Y-m-d',strtotime($Surveyor_initial_inspection_date)):'0000-00-00';
            $Written_work_order_approval_2_start_work = $Written_work_order_approval_2_start_work !=''?date('Y-m-d',strtotime($Written_work_order_approval_2_start_work)):'0000-00-00';
            $Intimation_2_customer_for_advance_paymen = $Intimation_2_customer_for_advance_paymen !=''?date('Y-m-d',strtotime($Intimation_2_customer_for_advance_paymen)):'0000-00-00';
            $Advance_payment_received_onCustomer = $Advance_payment_received_onCustomer !=''?date('Y-m-d',strtotime($Advance_payment_received_onCustomer)):'0000-00-00';
            $Customer_written_approval_2_start_of_wor = $Customer_written_approval_2_start_of_wor !=''?date('Y-m-d',strtotime($Customer_written_approval_2_start_of_wor)):'0000-00-00';
            $Repair_work_start_date = $Repair_work_start_date !=''?date('Y-m-d',strtotime($Repair_work_start_date)):'0000-00-00';
            $Repair_completion_date = $Repair_completion_date !=''?date('Y-m-d',strtotime($Repair_completion_date)):'0000-00-00';
            $Intimation_to_IC_for_final_inspection = $Intimation_to_IC_for_final_inspection !=''?date('Y-m-d',strtotime($Intimation_to_IC_for_final_inspection)):'0000-00-00';
            $Final_inspection_date = $Final_inspection_date !=''?date('Y-m-d',strtotime($Final_inspection_date)):'0000-00-00';

            if($Registration_of_certificate_upload < $Job_Card_open_dateArr || $National_Permit_A_B_upload < $Job_Card_open_dateArr || $Road_Tax_upload < $Job_Card_open_dateArr || $Claim_Form_upload < $Job_Card_open_dateArr || $Intimation_2_IC_for_surveyor_deputation < $Job_Card_open_dateArr || $Surveyor_initial_inspection_date < $Job_Card_open_dateArr || $Written_work_order_approval_2_start_work < $Job_Card_open_dateArr || $Intimation_2_customer_for_advance_paymen < $Job_Card_open_dateArr || $Advance_payment_received_onCustomer < $Job_Card_open_dateArr || $Customer_written_approval_2_start_of_wor < $Job_Card_open_dateArr || $Repair_work_start_date < $Job_Card_open_dateArr || $Repair_completion_date < $Job_Card_open_dateArr || $Intimation_to_IC_for_final_inspection < $Job_Card_open_dateArr || $Final_inspection_date < $Job_Card_open_dateArr ){
                $getJobCard .= "'".$Job_card_No."',";
            }
            
        }
        //dd($getJobCard);
        $getJobCard =rtrim($getJobCard,',');
        // $arr = explode(",",$getJobCard);
        // $query = ams_info::whereIn('Job_card_No', ['2016097085'])->get();
        $query = DB::select("select * from ams_info where Job_card_No in ($getJobCard) ");


        $fileName = 'dateReport.csv';
        $tasks = $query;

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array();

        foreach ($tasks as $task) {
            $columns = array();
            foreach ($task as $key=>$val) {
                $columns[]  = $key;
            }
        }

       // $columns

        $callback = function() use($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
                $row = array();
                foreach ($task as $key=>$val) {
                    $row[$key]  = $val;
                }
                
                
                

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);


       // echo $this->exportCsv($query);
        //echo "Hello";
       // dd($query);

        
    }
	public function view()
    {
        return view('report_view');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	public function removestr($str)
	{

		//array("'","(",")","$","@","`","#","$","%","^","&",",",'"',)
		$realRemakrs = str_replace("'", '-', $str);
		$realRemakrs = str_replace("(", '-', $realRemakrs);
		$realRemakrs = str_replace("|", '-', $realRemakrs);
		$realRemakrs = str_replace(")", '-', $realRemakrs);
		$realRemakrs = str_replace("$", '-', $realRemakrs);
		$realRemakrs = str_replace("@", '-', $realRemakrs);
		$realRemakrs = str_replace("`", '-', $realRemakrs);
		$realRemakrs = str_replace("#", '-', $realRemakrs);
		$realRemakrs = str_replace("$", '-', $realRemakrs);
		$realRemakrs = str_replace("%", '-', $realRemakrs);
		$realRemakrs = str_replace("^", '-', $realRemakrs);
		$realRemakrs = str_replace("&", '-', $realRemakrs);
		$realRemakrs = str_replace(",", '-', $realRemakrs);
		$realRemakrs = str_replace('"', '-', $realRemakrs);
		$realRemakrs = str_replace('+', '-', $realRemakrs);
		$realRemakrs = str_replace('-', '-', $realRemakrs);
		$realRemakrs = str_replace('!', '-', $realRemakrs);
		$realRemakrs = str_replace('~', '-', $realRemakrs);
		$realRemakrs = str_replace(';', '-', $realRemakrs);
		$realRemakrs = str_replace('.', '-', $realRemakrs);
		//$realRemakrs=mysql_escape_string($realRemakrs);
		return $realRemakrs;
	}
}