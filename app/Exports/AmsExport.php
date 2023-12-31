<?php

namespace App\Exports;
use DB;
use App\Models\ams_info;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Schema;
class AmsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    /*public $selectArr = array(
        'Job_card_No', 'Plant_Name', 'SAC_Code', 'Accident_In_charge_Name', 'Accident_In_charge_contact_Number', 'Zone', 'Area_Office', 'Vehicle_Registration_Number', 'Chassis_Number', 'Select_ID', 'Select_Tier', 'Customer_Name', 'Mode_of_Claim', 'Name_of_Insurance_company', 'Initial_Estimate_Value_Rs', 'Major_Minor_Quotation', 'Surveyor_Name', 'Surveyor_Mobile_no', 'Surveyor_E_mail_id', 'Registration_of_certificate_upload', 'National_Permit_A_B_upload', 'Road_Tax_upload', 'Claim_Form_upload', 'Quotation_Date', 'Date_of_Accident', 'Vehicle_inward', 'Job_Card_open_date', 'Documents_submitted', 'Intimation_2_IC_for_surveyor_deputation', 'Surveyor_initial_inspection_date', 'Surveyor_approval_for_dismantling', 'Dismantling_completed_on', 'Intimation_to_surveyor_for_2nd__inspecti', 'Salvage_value_agreed_by_Customer_Ins_co', 'Written_work_order_approval_2_start_work', 'Intimation_2_IC_for_advance_payment', 'Advance_payment_received_onInsurance', 'Advance_payment_Value_RsInsurance', 'Intimation_2_customer_for_advance_paymen', 'Advance_payment_received_onCustomer', 'Advance_payment_Value_RsCustomer', 'Customer_written_approval_2_start_of_wor', 'Repair_work_start_date', 'Supplementary_estimate_Value_Rs', 'Supplementary_repair_inspection_date', 'Written_approval_for_supplementary_Est', 'Repair_completion_date', 'Intimation_to_IC_for_final_inspection', 'Final_inspection_date', 'Post_inspection_final_invoice_submit_on', 'Salvage_value_agreed_by_Customer_Insco', 'Customer_Portion_payment_received', 'Customer_payable_amount', 'Final_Bill_value', 'Major_Minor__Final_bill', 'Job_card_closed_Date', 'Gate_Pass_Date', 'Accidental_Stages', 'No_of_days_taken_as_on_date', 'No_of_days_inside_the_workshop', 'status', 'case_status', 'stage', 'remarks','additional_remark','open_close', 'created_at','updated_at'

    );*/
	public $heading = array(
        'Job card No', 'Plant Name', 'SAC Code', 'Accident In charge Name', 'Accident In charge contact Number', 'Zone', 'Area Office', 'Vehicle Registration Number', 'Chassis Number', 'Select ID', 'Select Tier', 'Customer Name', 'Mode of Claim', 'Name of Insurance company', 'Initial Estimate Value Rs', 'Major Minor Quotation', 'Surveyor Name', 'Surveyor Mobile no', 'Surveyor E mail id', 'Registration of certificate upload', 'National Permit A B upload', 'Road Tax upload', 'Claim Form upload', 'Quotation Date', 'Date of Accident', 'Vehicle inward', 'Job Card open date', 'Documents submitted', 'Intimation 2 IC for surveyor deputation', 'Intimation 2 IC for surveyor deputation Reason', 'Surveyor initial inspection date', 'Surveyor approval for dismantling', 'Dismantling completed on', 'Intimation to surveyor for 2nd  inspecti', 'Salvage value agreed by Customer Ins co', 'Written work order approval 2 start work', 'Written work order approval 2 start work reason', 'Intimation 2 IC for advance payment', 'Advance payment received onInsurance', 'Advance payment Value RsInsurance', 'Intimation 2 customer for advance paymen', 'Advance payment received onCustomer', 'Advance payment received onCustomer Reason', 'Advance payment Value RsCustomer', 'Customer written approval 2 start of wor', 'Customer written approval 2 start of wor Reason', 'Repair work start date', 'Repair work start date Reason', 'Supplementary estimate Value Rs', 'Supplementary repair inspection date', 'Written approval for supplementary Est', 'Repair completion date', 'Repair completion date Reason', 'Intimation to IC for final inspection', 'Final inspection date', 'Final inspection date Reason', 'Post inspection final invoice submit on', 'Salvage value agreed by Customer Insco', 'Customer Portion payment received', 'Customer payable amount', 'Final Bill value', 'Major Minor  Final bill', 'Job card closed Date', 'Gate Pass Date', 'Accidental Stages', 'No of days taken as on date', 'No of days inside the workshop', 'pre_delay_reaosn', 'pre_overall_delay',  'repair_delay_reaosn', 'repair_overall_delay', 'post_delay_reason', 'post_overall_delay', 'overall_delay_by', 'status', 'case status', 'stage', 'remarks','additional remark','Created By', 'created at','updated at'
    );
    public $selectArr = array(
        'ams_info.Job_card_No as Job_card_No', 'ams_info.Plant_Name', 'ams_info.SAC_Code', 'ams_info.Accident_In_charge_Name', 'ams_info.Accident_In_charge_contact_Number', 'ams_info.Zone', 'ams_info.Area_Office', 'ams_info.Vehicle_Registration_Number', 'ams_info.Chassis_Number', 'ams_info.Select_ID', 'ams_info.Select_Tier', 'ams_info.Customer_Name', 'ams_info.Mode_of_Claim', 'ams_info.Name_of_Insurance_company', 'ams_info.Initial_Estimate_Value_Rs', 'ams_info.Major_Minor_Quotation', 'ams_info.Surveyor_Name', 'ams_info.Surveyor_Mobile_no', 'ams_info.Surveyor_E_mail_id', 'ams_info.Registration_of_certificate_upload', 'ams_info.National_Permit_A_B_upload', 'ams_info.Road_Tax_upload', 'ams_info.Claim_Form_upload', 'ams_info.Quotation_Date', 'ams_info.Date_of_Accident', 'ams_info.Vehicle_inward', 'ams_info.Job_Card_open_date', 'ams_info.Documents_submitted', 'ams_info.Intimation_2_IC_for_surveyor_deputation', 'ams_info.Intimation_2_IC_for_surveyor_deputation_reason', 'ams_info.Surveyor_initial_inspection_date', 'ams_info.Surveyor_approval_for_dismantling', 'ams_info.Dismantling_completed_on', 'ams_info.Intimation_to_surveyor_for_2nd__inspecti', 'ams_info.Salvage_value_agreed_by_Customer_Ins_co', 'ams_info.Written_work_order_approval_2_start_work', 'ams_info.Written_work_order_approval_2_start_work_reason', 'ams_info.Intimation_2_IC_for_advance_payment', 'ams_info.Advance_payment_received_onInsurance', 'ams_info.Advance_payment_Value_RsInsurance', 'ams_info.Intimation_2_customer_for_advance_paymen', 'ams_info.Advance_payment_received_onCustomer', 'ams_info.Advance_payment_received_onCustomer_reason', 'ams_info.Advance_payment_Value_RsCustomer', 'ams_info.Customer_written_approval_2_start_of_wor', 'ams_info.Customer_written_approval_2_start_of_wor_reason', 'ams_info.Repair_work_start_date', 'ams_info.Repair_work_start_date_reason', 'ams_info.Supplementary_estimate_Value_Rs', 'ams_info.Supplementary_repair_inspection_date', 'ams_info.Written_approval_for_supplementary_Est', 'ams_info.Repair_completion_date', 'ams_info.Repair_completion_date_reason', 'ams_info.Intimation_to_IC_for_final_inspection', 'ams_info.Final_inspection_date', 'ams_info.Final_inspection_date_reason', 'ams_info.Post_inspection_final_invoice_submit_on', 'ams_info.Salvage_value_agreed_by_Customer_Insco', 'ams_info.Customer_Portion_payment_received', 'ams_info.Customer_payable_amount', 'ams_info.Final_Bill_value', 'ams_info.Major_Minor__Final_bill', 'ams_info.Job_card_closed_Date', 'ams_info.Gate_Pass_Date', 'ams_info.Accidental_Stages', 'ams_info.No_of_days_taken_as_on_date', 'ams_info.No_of_days_inside_the_workshop', 'ams_info.status', 'pre_approval_delay_reason.delay_reason', 'ams_info.pre_overall_delay',  'repair_approval_delay_reason.repair_delay_reason', 'ams_info.repair_overall_delay', 'post_approval_delay_reason.post_delay_reason', 'ams_info.post_overall_delay', 'ams_info.overall_delay_by',  'ams_info.case_status', 'ams_info.stage', 'ams_info.remarks','ams_info.additional_remark','ams_info_log.created_by', 'ams_info.created_at','ams_info.updated_at'
    );
    public function headings(): array
        {
            return $this->heading;
        }
    public function collection()
    {
 		return ams_info::select($this->selectArr)
        ->leftJoin('ams_info_log','ams_info.Job_card_No','=','ams_info_log.Job_card_No')
        ->leftJoin('repair_approval_delay_reason','ams_info.repair_delay_reaosn','=','repair_approval_delay_reason.id')
        ->leftJoin('post_approval_delay_reason','ams_info.post_delay_reason','post_approval_delay_reason.id')
        ->leftJoin('pre_approval_delay_reason','ams_info.pre_delay_reaosn','pre_approval_delay_reason.id')
        ->groupBy('ams_info.Job_card_No')->get();
    }
    /* public function getTableColumns()
    {


        return Schema::getColumnListing('ams_info');

    } */
}
