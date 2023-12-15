<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleDetail;
use App\Models\GenDetail;
use App\Models\Question;
use App\Models\Doc_Stat;
use App\Models\Pre_App_Stage;
use App\Models\Repair_Stage;
use App\Models\Post_App_Stage;
use App\Models\Post_Approval_Delay_Analysis;
use App\Models\Pre_App_Delay;
use App\Models\Repair_Delay;
use App\Models\Cases;
use App\Models\Complaint;
use App\Models\Case_Detail_Infos;
use App\Models\Case_history;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\ElseIf_;
use Illuminate\support\facades\Validator;
use Illuminate\Support\Facades\Auth;


class CreateComplaint extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // $random=rand(100,100000);
		
		//dd($request->all());

        function generate_uuid()
        {
            return sprintf(
                '%04x%04x%04x%04x',
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0C2f) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0x2Aff),
                mt_rand(0, 0xffD3),
                mt_rand(0, 0xff4B)
            );
        }
        $random = generate_uuid();

        if ($request->veh_reg_no || $request->verified_in_vahan || $request->bs_nonbs ||  $request->model || $request->chassis_number || $request->engine_no || $request->driver_name ||   $request->driver_contact_no || $request->customer_contact ||  $request->customer_contact || $request->DL_validity_date ||  $request->date_of_accident || $request->driver_statement || $request->location_of_the_accident || $request->driving_license_number || $request->date_of_sale ||  $request->segment || $request->name_of_the_insurance ||   $request->insurance_policy_no || $request->customer_name  ||  $request->wood_cabin_load || $request->AL_fitment || $request->mode_of_claims || $random) {


            $data = new VehicleDetail();

            $data->veh_reg_no     = $request->veh_reg_no;
            $data->verified_in_vahan   = $request->verified_in_vahan;
            $data->bs_nonbs   = $request->bs_nonbs;
            $data->model   = $request->model;
            $data->chassis_number   = $request->chassis_number;
            $data->engine_no   = $request->engine_no;
            $data->driver_name   = $request->driver_name;
            $data->driver_contact_no   = $request->driver_contact_no;
            $data->customer_contact   = $request->customer_contact;
            $data->DL_validity_date   = $request->DL_validity_date;
            $data->date_of_accident   = $request->date_of_accident;
            $data->driver_statement   = $request->driver_statement;
            $data->location_of_the_accident   = $request->location_of_the_accident;
            $data->driving_license_number   = $request->driving_license_number;
            $data->date_of_sale   = $request->date_of_sale;
            $data->segment   = $request->segment;
            $data->name_of_the_insurance   = $request->name_of_the_insurance;
            $data->insurance_policy_no   = $request->insurance_policy_no;
            $data->customer_name   = $request->customer_name;
            $data->wood_cabin_load   = $request->wood_cabin_load;
            $data->AL_fitment   = $request->AL_fitment;
            $data->mode_of_claims   = $request->mode_of_claims;
            $data->ref_id   =  $random;
            $data->save();

            $data->id;

            // return Response()->json($data);
        }

        // General Details


        if ($request->accident_charge_name_dealer || $request->accident_charge_mobile_dealer || $request->veh_rep_wkshp_dealer || $request->name_wkshp_dealer ||  $request->auto_upt_sac_code || $request->sac_code_wrkshp ||  $request->zone ||  $request->auto_updt_frm_sac || $request->region_office || $request->auto_updt_frm_sac_cod || $request->area_office || $request->auto_updt_frm_sac_code ||  $request->job_card_open || $request->job_card_no || $random) {

            $gen_detail = new GenDetail();
            $gen_detail->accident_charge_name_dealer = $request->accident_charge_name_dealer;
            $gen_detail->accident_charge_mobile_dealer = $request->accident_charge_mobile_dealer;
            $gen_detail->veh_rep_wkshp_dealer = $request->veh_rep_wkshp_dealer;
            $gen_detail->name_wkshp_dealer = $request->name_wkshp_dealer;
            $gen_detail->auto_upt_sac_code = $request->auto_upt_sac_code;
            $gen_detail->sac_code_wrkshp = $request->sac_code_wrkshp;
            $gen_detail->zone = $request->zone;
            $gen_detail->auto_updt_frm_sac = $request->auto_updt_frm_sac;
            $gen_detail->region_office = $request->region_office;
            $gen_detail->auto_updt_frm_sac_cod = $request->auto_updt_frm_sac_cod;
            $gen_detail->area_office   = $request->area_office;
            $gen_detail->auto_updt_frm_sac_code = $request->auto_updt_frm_sac_code;
            $gen_detail->job_card_open = $request->job_card_open;
            $gen_detail->job_card_no = $request->job_card_no;
            $gen_detail->ref_id = $random;
            $gen_detail->save();
            $gen_detail->id;
        }



        // Questions

        if ($request->third_party || $request->third_party_dealer || $request->third_party_customer || $request->accident_vehicle ||  $request->accident_vehicle_dealer || $request->accident_vehicle_customer ||  $request->thermal_incident ||  $request->thermal_incident_dealer || $request->thermal_incident_customer || $request->Vehicle_towed || $request->Vehicle_towed_dealer || $request->Vehicle_towed_customer ||  $request->theft_cases || $request->theft_cases_dealer || $request->theft_cases_customer || $request->loss_damage_theft || $request->loss_damage_theft_customer || $request->loss_damage_theft_dealer ||  $request->PA_claim || $request->PA_claim_dealer || $request->PA_claim_customer || $request->brake_policies || $request->brake_policies_dealer || $request->brake_policies_customer || $request->question_remarks || $random) {

            $quest = new Question();
            $quest->third_party   = $request->third_party;
            $quest->third_party_dealer   = $request->third_party_dealer;
            $quest->third_party_customer   = $request->third_party_customer;
            $quest->accident_vehicle   = $request->accident_vehicle;
            $quest->accident_vehicle_dealer   = $request->accident_vehicle_dealer;
            $quest->accident_vehicle_customer   = $request->accident_vehicle_customer;
            $quest->thermal_incident   = $request->thermal_incident;
            $quest->thermal_incident_dealer   = $request->thermal_incident_dealer;
            $quest->thermal_incident_customer   = $request->thermal_incident_customer;
            $quest->Vehicle_towed   = $request->Vehicle_towed;
            $quest->Vehicle_towed_dealer   = $request->Vehicle_towed_dealer;
            $quest->Vehicle_towed_customer   = $request->Vehicle_towed_customer;
            $quest->theft_cases   = $request->theft_cases;
            $quest->theft_cases_dealer   = $request->theft_cases_dealer;
            $quest->theft_cases_customer   = $request->theft_cases_customer;
            $quest->loss_damage_theft   = $request->loss_damage_theft;
            $quest->loss_damage_theft_customer   = $request->loss_damage_theft_customer;
            $quest->loss_damage_theft_dealer   = $request->loss_damage_theft_dealer;
            $quest->PA_claim   = $request->PA_claim;
            $quest->PA_claim_dealer   = $request->PA_claim_dealer;
            $quest->PA_claim_customer   = $request->PA_claim_customer;
            $quest->brake_policies   = $request->brake_policies;
            $quest->brake_policies_dealer   = $request->brake_policies_dealer;
            $quest->brake_policies_customer   = $request->brake_policies_customer;
            $quest->question_remarks   = $request->question_remarks;
            $quest->ref_id   =  $random;
            $quest->save();

            $quest->id;
            // return Response()->json($quest);
        }


        // Document Status

        if (
            $request->claim_form_dealer || $request->claim_form_customer || $request->KYC_documents_dealer || $request->KYC_documents_customer || $request->aadhaar_card_no_dealer || $request->aadhaar_card_no_customer || $request->pan_card_owner_dealer || $request->pan_card_owner_customer || $request->policy_copy_dealer || $request->policy_copy_customer || $request->driving_license_deale || $request->driving_license_customer || $request->npr_dealer || $request->npr_customer || $request->road_tax_dealer || $request->road_tax_customer || $request->fitness_certificate_dealer || $request->fitness_certificate_customer || $request->reg_certification_dealer || $request->reg_certification_customer || $request->form_twothree_dealer || $request->form_twothree_custome || $request->all_docs_dealer || $request->all_docs_customer || $request->last_docs_dealer_date || $request->last_docs_customer_date || $request->spot_surveyor_dealer || $request->spot_surveyor_customer || $request->spot_surveyor_mob_dealer || $request->spot_surveyor_mob_customer || $request->spot_surveyor_email_dealer || $request->spot_surveyor_email_customer || $request->spot_surveyor_report_dealer || $request->spot_surveyor_report_customer || $request->towing_bill_dealer || $request->towing_bill_customer || $request->load_challan_dealer || $request->load_challan_customer || $request->decrtn_letter_dealer || $request->decrtn_letter_customer || $request->motor_vehicle_insp_dealer || $request->motor_vehicle_insp_customer || $request->fire_brigade_dealer || $request->fire_brigade_customer || $request->ntc_dealer || $request->ntc_customer || $request->fir_copy_dealer || $request->fir_copy_customer || $request->postmortem_report_dealer || $request->postmortem_report_customer || $request->docs_remarks || $request->ref_id || $random
        ) {

            $Doc = new Doc_Stat();
            $Doc->claim_form_dealer   = $request->claim_form_dealer;
            $Doc->claim_form_customer   = $request->claim_form_customer;
            $Doc->KYC_documents_dealer   = $request->KYC_documents_dealer;
            $Doc->KYC_documents_customer   = $request->KYC_documents_customer;
            $Doc->aadhaar_card_no_dealer   = $request->aadhaar_card_no_dealer;
            $Doc->aadhaar_card_no_customer   = $request->aadhaar_card_no_customer;
            $Doc->pan_card_owner_dealer   = $request->pan_card_owner_dealer;
            $Doc->pan_card_owner_customer   = $request->pan_card_owner_customer;
            $Doc->policy_copy_dealer   = $request->policy_copy_dealer;
            $Doc->policy_copy_customer   = $request->policy_copy_customer;
            $Doc->driving_license_dealer   = $request->driving_license_dealer;
            $Doc->driving_license_customer   = $request->driving_license_customer;
            $Doc->npr_dealer   = $request->npr_dealer;
            $Doc->npr_customer   = $request->npr_customer;
            $Doc->road_tax_dealer   = $request->road_tax_dealer;
            $Doc->road_tax_customer   = $request->road_tax_customer;
            $Doc->fitness_certificate_dealer   = $request->fitness_certificate_dealer;
            $Doc->fitness_certificate_customer   = $request->fitness_certificate_customer;
            $Doc->reg_certification_dealer   = $request->reg_certification_dealer;
            $Doc->reg_certification_customer   = $request->reg_certification_customer;
            $Doc->form_twothree_dealer   = $request->form_twothree_dealer;
            $Doc->form_twothree_customer   = $request->form_twothree_customer;
            $Doc->all_docs_dealer   = $request->all_docs_dealer;
            $Doc->all_docs_customer   = $request->all_docs_customer;
            $Doc->last_docs_dealer_date   = $request->last_docs_dealer_date;
            $Doc->last_docs_customer_date   = $request->last_docs_customer_date;
            $Doc->spot_surveyor_dealer   = $request->spot_surveyor_dealer;
            $Doc->spot_surveyor_customer   = $request->spot_surveyor_customer;
            $Doc->spot_surveyor_mob_dealer   = $request->spot_surveyor_mob_dealer;
            $Doc->spot_surveyor_mob_customer   = $request->spot_surveyor_mob_customer;
            $Doc->spot_surveyor_email_dealer   = $request->spot_surveyor_email_dealer;
            $Doc->spot_surveyor_email_customer   = $request->spot_surveyor_email_customer;
            $Doc->spot_surveyor_report_dealer   = $request->spot_surveyor_report_dealer;
            $Doc->spot_surveyor_report_customer   = $request->spot_surveyor_report_customer;
            $Doc->towing_bill_dealer   = $request->towing_bill_dealer;
            $Doc->towing_bill_customer   = $request->towing_bill_customer;
            $Doc->load_challan_dealer   = $request->load_challan_dealer;
            $Doc->load_challan_customer   = $request->load_challan_customer;
            $Doc->decrtn_letter_dealer   = $request->decrtn_letter_dealer;
            $Doc->decrtn_letter_customer   = $request->decrtn_letter_customer;
            $Doc->motor_vehicle_insp_dealer   = $request->motor_vehicle_insp_dealer;
            $Doc->motor_vehicle_insp_customer   = $request->motor_vehicle_insp_customer;
            $Doc->fire_brigade_dealer   = $request->fire_brigade_dealer;
            $Doc->fire_brigade_customer   = $request->fire_brigade_customer;
            $Doc->ntc_dealer   = $request->ntc_dealer;
            $Doc->ntc_customer   = $request->ntc_customer;
            $Doc->fir_copy_dealer   = $request->fir_copy_dealer;
            $Doc->fir_copy_customer   = $request->fir_copy_customer;
            $Doc->postmortem_report_dealer   = $request->postmortem_report_dealer;
            $Doc->postmortem_report_customer   = $request->postmortem_report_customer;
            $Doc->docs_remarks   = $request->docs_remarks;
            $Doc->ref_id   =  $random;
            $Doc->save();

            $Doc->id;
            // return Response()->json($Doc);
        }

        // repair stage

        if ($request->repair_work_start_dealer || $request->tech_id_mob || $request->need_to_be_verify_with_technician || $request->detail_damaged_dealer || $request->available_at_dealer || $request->AOR_need_to_place || $request->In_Transit ||  $request->Local_purchase || $request->Arrange_form_other_branch || $request->TOC_order || $request->sheet_denting_repair ||  $request->mech_elec_repair || $request->painting_start ||  $request->painting_start_date_yet_to_collect ||  $request->cabin_trims_parts || $request->trim_of_cabin_date_to_collect || $request->outside_job ||  $request->outside_purpose || $request->AOR_raised ||  $request->so_no ||  $request->arrange_mat || $request->if_yes_no || $request->receipt_all_parts || $request->intimation_surveyor || $request->supplementary_estimate || $request->supplementary_estimate_val || $request->supplementary_inspection || $request->supplementary_written_approval ||  $request->inform_to_customer_on_approval || $request->parts_get_approval || $request->repair_completion || $request->inform_to_customer_vehicle || $request->repair_delay_reason || $random) {

            $repair = new Repair_Stage();
            $repair->repair_work_start_dealer   = $request->repair_work_start_dealer;
            $repair->tech_id_mob   = $request->tech_id_mob;
            $repair->need_to_be_verify_with_technician   = $request->need_to_be_verify_with_technician;
            $repair->detail_damaged_dealer   = $request->detail_damaged_dealer;
            $repair->available_at_dealer   = $request->available_at_dealer;
            $repair->AOR_need_to_place   = $request->AOR_need_to_place;
            $repair->In_Transit   = $request->In_Transit;
            $repair->Local_purchase   = $request->Local_purchase;
            $repair->Arrange_form_other_branch   = $request->Arrange_form_other_branch;
            $repair->TOC_order   = $request->TOC_order;
            $repair->sheet_denting_repair   = $request->sheet_denting_repair;
            $repair->mech_elec_repair   = $request->mech_elec_repair;
            $repair->painting_start   = $request->painting_start;
            $repair->painting_start_date_yet_to_collect   = $request->painting_start_date_yet_to_collect;
            $repair->cabin_trims_parts   = $request->cabin_trims_parts;
            $repair->trim_of_cabin_date_to_collect   = $request->trim_of_cabin_date_to_collect;
            $repair->outside_job   = $request->outside_job;
            $repair->outside_purpose   = $request->outside_purpose;
            $repair->AOR_raised   = $request->AOR_raised;
            $repair->so_no   = $request->so_no;
            $repair->arrange_mat   = $request->arrange_mat;
            $repair->if_yes_no   = $request->if_yes_no;
            $repair->receipt_all_parts   = $request->receipt_all_parts;
            $repair->intimation_surveyor   = $request->intimation_surveyor;
            $repair->supplementary_estimate   = $request->supplementary_estimate;
            $repair->supplementary_estimate_val   = $request->supplementary_estimate_val;
            $repair->supplementary_inspection   = $request->supplementary_inspection;
            $repair->supplementary_written_approval   = $request->supplementary_written_approval;
            $repair->inform_to_customer_on_approval   = $request->inform_to_customer_on_approval;
            $repair->parts_get_approval   = $request->parts_get_approval;
            $repair->repair_completion   = $request->repair_completion;
            $repair->inform_to_customer_vehicle   = $request->inform_to_customer_vehicle;
            $repair->repair_delay_reason   = $request->repair_delay_reason;
            $repair->ref_id   =  $random;



            $repair->save();

            $repair->id;
            // return Response()->json($repair);
        }


        // post approval stage

        if ($request->iicfi || $request->mail_copy_final_insption || $request->conduct_road_test || $request->need_to_vrfy_with_customer || $request->final_insption_surveyor || $request->proforma_submission || $request->Need__be_verified_with_Surveyor || $request->receipt_delivery_order || $request->job_card_closed ||  $request->bill_value_customer ||  $request->bill_value_insurance || $request->bal_payment_customer ||  $request->Need_be_verified_Customer || $request->bal_payment_customer_rs || $request->Need_be_verified_Customer_ || $request->collecting_satisfaction_voucher ||  $request->veh_delivery_customer ||  $request->Need_be_verified_Custmr_ || $request->bal_pymnt_ins || $request->bal_pymnt_ins_rs || $request->gate_pass ||  $request->post_delay_reason || $random) {

            $postapp = new Post_App_Stage();
            $postapp->iicfi     = $request->iicfi;
            $postapp->mail_copy_final_insption     = $request->mail_copy_final_insption;
            $postapp->conduct_road_test     = $request->conduct_road_test;
            $postapp->need_to_vrfy_with_customer     = $request->need_to_vrfy_with_customer;
            $postapp->final_insption_surveyor     = $request->final_insption_surveyor;
            $postapp->proforma_submission     = $request->proforma_submission;
            $postapp->Need__be_verified_with_Surveyor     = $request->Need__be_verified_with_Surveyor;
            $postapp->receipt_delivery_order     = $request->receipt_delivery_order;
            $postapp->job_card_closed     = $request->job_card_closed;
            $postapp->bill_value_customer     = $request->bill_value_customer;
            $postapp->bill_value_insurance     = $request->bill_value_insurance;
            $postapp->bal_payment_customer     = $request->bal_payment_customer;
            $postapp->Need_be_verified_Customer     = $request->Need_be_verified_Customer;
            $postapp->bal_payment_customer_rs     = $request->bal_payment_customer_rs;
            $postapp->Need_be_verified_Customer_     = $request->Need_be_verified_Customer_;
            $postapp->collecting_satisfaction_voucher     = $request->collecting_satisfaction_voucher;
            $postapp->veh_delivery_customer     = $request->veh_delivery_customer;
            $postapp->Need_be_verified_Custmr_     = $request->Need_be_verified_Custmr_;
            $postapp->bal_pymnt_ins     = $request->bal_pymnt_ins;
            $postapp->bal_pymnt_ins_rs     = $request->bal_pymnt_ins_rs;
            $postapp->gate_pass     = $request->gate_pass;
            $postapp->post_delay_reason     = $request->post_delay_reason;
            $postapp->ref_id     =  $random;

            $postapp->save();

            $postapp->id;

            //return Response()->json($postapp);
        }

        // pre approval delay


        if ($request->delay_prepare_dealer || $request->delay_submsn_docs || $request->doc_1 || $request->doc_2 || $request->doc_3 ||  $request->doc_4 ||   $request->doc_5 ||  $request->surveyor_deputation_dealer ||  $request->delay_surveyor_deputation ||  $request->approval_dismantling_surveyor ||  $request->delay_dismantling_completion ||  $request->intimation_to_surveyor_for_second_inspection ||  $request->delay_surveyor_completion ||   $request->surveyor_approval ||  $request->approval_delay ||  $request->advance_payment_delay ||  $request->delay_intimation_nsurance || $request->advance_payment_delay_ins || $request->pre_delay_dealer || $request->pre_delay_customer ||  $request->pre_surveyor_company || $random) {

            $preappdelay = new Pre_App_Delay();
            $preappdelay->delay_prepare_dealer     = $request->delay_prepare_dealer;
            $preappdelay->delay_submsn_docs     = $request->delay_submsn_docs;
            $preappdelay->doc_1     = $request->doc_1;
            $preappdelay->doc_2     = $request->doc_2;
            $preappdelay->doc_3     = $request->doc_3;
            $preappdelay->doc_4     = $request->doc_4;
            $preappdelay->doc_5     = $request->doc_5;
            $preappdelay->surveyor_deputation_dealer     = $request->surveyor_deputation_dealer;
            $preappdelay->delay_surveyor_deputation     = $request->delay_surveyor_deputation;
            $preappdelay->approval_dismantling_surveyor     = $request->approval_dismantling_surveyor;
            $preappdelay->delay_dismantling_completion     = $request->delay_dismantling_completion;
            $preappdelay->intimation_to_surveyor_for_second_inspection     = $request->intimation_to_surveyor_for_second_inspection;
            $preappdelay->delay_surveyor_completion     = $request->delay_surveyor_completion;
            $preappdelay->surveyor_approval     = $request->surveyor_approval;
            $preappdelay->approval_delay     = $request->approval_delay;
            $preappdelay->advance_payment_delay     = $request->advance_payment_delay;
            $preappdelay->delay_intimation_nsurance     = $request->delay_intimation_nsurance;
            $preappdelay->advance_payment_delay_ins     = $request->advance_payment_delay_ins;
            $preappdelay->pre_delay_dealer     = $request->pre_delay_dealer;
            $preappdelay->pre_delay_customer     = $request->pre_delay_customer;
            $preappdelay->pre_surveyor_company     = $request->pre_surveyor_company;
            $preappdelay->ref_id     =  $random;
            $preappdelay->save();

            $preappdelay->id;

            // return Response()->json($preappdelay);
        }

        // Repair Stage Delay Analysis

        if ($request->delay_start || $request->Manpower ||  $request->Crane_facility ||  $request->Power_not_available ||  $request->Equipment ||   $request->delay_preparing ||  $request->AOR_need_place ||  $request->In_Transit_ ||  $request->Local_purchase_ ||  $request->Arrange_form_other_branch_ ||  $request->TOC_order_ ||  $request->no_days_taken_metal ||  $request->no_days_taken_works ||   $request->no_days_taken_painting ||  $request->no_days_taken_cabin ||  $request->repair_receipt_all_parts ||  $request->_AOR_need_place ||  $request->_In_Transit_ ||   $request->_Local_purchase_ ||  $request->_Arrange_form_other_branch_ ||  $request->_TOC_order_ ||  $request->repair_outside_job ||  $request->delay_supp_estimate ||   $request->delay_report_workshop ||   $request->delay_approval_supp_est ||  $request->approval_delay_customer ||  $request->repair_completion_bibo ||  $request->inform_to_customer_work_completed ||   $request->repaire_delay_customer ||    $request->repaire_surveyor_company || $random) {

            $repairdelay = new Repair_Delay();
            $repairdelay->delay_start     = $request->delay_start;
            $repairdelay->Manpower     = $request->Manpower;
            $repairdelay->Crane_facility     = $request->Crane_facility;
            $repairdelay->Power_not_available     = $request->Power_not_available;
            $repairdelay->Equipment     = $request->Equipment;
            $repairdelay->delay_preparing     = $request->delay_preparing;
            $repairdelay->AOR_need_place     = $request->AOR_need_place;
            $repairdelay->In_Transit_     = $request->In_Transit_;
            $repairdelay->Local_purchase_     = $request->Local_purchase_;
            $repairdelay->Arrange_form_other_branch_     = $request->Arrange_form_other_branch_;
            $repairdelay->TOC_order_     = $request->TOC_order_;
            $repairdelay->no_days_taken_metal     = $request->no_days_taken_metal;
            $repairdelay->no_days_taken_works     = $request->no_days_taken_works;
            $repairdelay->no_days_taken_painting     = $request->no_days_taken_painting;
            $repairdelay->no_days_taken_cabin     = $request->no_days_taken_cabin;
            $repairdelay->repair_receipt_all_parts     = $request->repair_receipt_all_parts;
            $repairdelay->_AOR_need_place     = $request->_AOR_need_place;
            $repairdelay->_In_Transit_     = $request->_In_Transit_;
            $repairdelay->_Local_purchase_     = $request->_Local_purchase_;
            $repairdelay->_Arrange_form_other_branch_     = $request->_Arrange_form_other_branch_;
            $repairdelay->_TOC_order_     = $request->_TOC_order_;
            $repairdelay->repair_outside_job     = $request->repair_outside_job;
            $repairdelay->delay_supp_estimate     = $request->delay_supp_estimate;
            $repairdelay->delay_report_workshop     = $request->delay_report_workshop;
            $repairdelay->delay_approval_supp_est     = $request->delay_approval_supp_est;
            $repairdelay->approval_delay_customer     = $request->approval_delay_customer;
            $repairdelay->repair_completion_bibo     = $request->repair_completion_bibo;
            $repairdelay->inform_to_customer_work_completed     = $request->inform_to_customer_work_completed;
            $repairdelay->repaire_delay_customer     = $request->repaire_delay_customer;
            $repairdelay->repaire_surveyor_company     = $request->repaire_surveyor_company;
            $repairdelay->ref_id     =  $random;

            $repairdelay->save();

            $repairdelay->id;
            // return Response()->json($repairdelay);
        }

        // Post Approval Delay Analysis

        if (
            $request->delay_final_inspection || $request->delay_road_test || $request->delay_final_inspection_surveyor || $request->delay_submission_invoice || $request->receipt_delivery_report ||  $request->job_card_open_close || $request->delay_final_payment_customer || $request->delay_final_payment_insurance || $request->delay_collect_vehicle || $request->vehicle_inward_wards ||
            $request->gigo ||  $request->post_delay_dealer || $request->post_delay_customer || $request->post_surveyor_company || $random
        ) {
            $postappdelayan = new Post_Approval_Delay_Analysis();

            $postappdelayan->delay_final_inspection     = $request->delay_final_inspection;
            $postappdelayan->delay_road_test     = $request->delay_road_test;
            $postappdelayan->delay_final_inspection_surveyor     = $request->delay_final_inspection_surveyor;
            $postappdelayan->delay_submission_invoice     = $request->delay_submission_invoice;
            $postappdelayan->receipt_delivery_report     = $request->receipt_delivery_report;
            $postappdelayan->job_card_open_close     = $request->job_card_open_close;
            $postappdelayan->delay_final_payment_customer     = $request->delay_final_payment_customer;
            $postappdelayan->delay_final_payment_insurance     = $request->delay_final_payment_insurance;
            $postappdelayan->delay_collect_vehicle     = $request->delay_collect_vehicle;
            $postappdelayan->vehicle_inward_wards     = $request->vehicle_inward_wards;
            $postappdelayan->gigo     = $request->gigo;
            $postappdelayan->post_delay_dealer     = $request->post_delay_dealer;
            $postappdelayan->post_delay_customer     = $request->post_delay_customer;
            $postappdelayan->post_surveyor_company     = $request->post_surveyor_company;
            $postappdelayan->ref_id     =  $random;

            $postappdelayan->save();
            $postappdelayan->id;

            // return Response()->json($postappdelayan);
        }


        // pre approval stage

        if ($request->initial_estimate_dealer || $request->need_to_verfy_cust || $request->initial_estimate_val_dealer   || $request->need_to_verify_cust || $request->major_minor_dealer || $request->classfy_based_est_amnt || $request->intimation_insurance_dealer  || $request || $request->mail_copy_dealer || $request->surveyor_name_dealer || $request->surveyor_mob_dealer || $request->surveyor_email_dealer || $request->surveyor_initial_inspection_dealer || $request->need_to_b_vrfy_srvyr || $request->approval_dismantling_dealer || $request->need_to_b_vrfy_srvyr_als || $request->dismantling_completion_dealer || $request->intimation_surveyor_dealer || $request->surveyor_second_dealer || $request->sva_dealer || $request->surveyor_written_approval_dealer || $request->dealer_need_to_upload_approval_copy || $request->parts_approved_dealer || $request->customer_approval_dealer || $request->need_to_verified_with_customer || $request->dealer_need_to_upload_approval || $request->intimation_insurance_dealer_adv || $request->mail_copy_ad_pymnt_dealer || $request->apc_time_dealer || $request->need_to_b_vrfy_custmr_als || $request->apc_rs_dealer || $request->need_to_b_vrfy_cust_als || $request->api_time_dealer || $request->api_rs_dealer || $request->pre_delay_reason  || $random) {


            $preapp = new  Pre_App_Stage();

            $preapp->initial_estimate_dealer   = $request->initial_estimate_dealer;
            $preapp->need_to_verfy_cust     = $request->need_to_verfy_cust;
            $preapp->initial_estimate_val_dealer     = $request->initial_estimate_val_dealer;
            $preapp->need_to_verify_cust     = $request->need_to_verify_cust;
            $preapp->major_minor_dealer     = $request->major_minor_dealer;
            $preapp->classfy_based_est_amnt     = $request->classfy_based_est_amnt;
            $preapp->intimation_insurance_dealer     = $request->intimation_insurance_dealer;
            $preapp->mail_copy_dealer     = $request->mail_copy_dealer;
            $preapp->surveyor_name_dealer     = $request->surveyor_name_dealer;
            $preapp->surveyor_mob_dealer     = $request->surveyor_mob_dealer;
            $preapp->surveyor_email_dealer     = $request->surveyor_email_dealer;
            $preapp->surveyor_initial_inspection_dealer     = $request->surveyor_initial_inspection_dealer;
            $preapp->need_to_b_vrfy_srvyr     = $request->need_to_b_vrfy_srvyr;
            $preapp->approval_dismantling_dealer     = $request->approval_dismantling_dealer;
            $preapp->need_to_b_vrfy_srvyr_als     = $request->need_to_b_vrfy_srvyr_als;
            $preapp->dismantling_completion_dealer     = $request->dismantling_completion_dealer;
            $preapp->intimation_surveyor_dealer     = $request->intimation_surveyor_dealer;
            $preapp->surveyor_second_dealer     = $request->surveyor_second_dealer;
            $preapp->sva_dealer     = $request->sva_dealer;
            $preapp->surveyor_written_approval_dealer     = $request->surveyor_written_approval_dealer;
            $preapp->dealer_need_to_upload_approval_copy     = $request->dealer_need_to_upload_approval_copy;
            $preapp->parts_approved_dealer     = $request->parts_approved_dealer;
            $preapp->customer_approval_dealer     = $request->customer_approval_dealer;
            $preapp->need_to_verified_with_customer     = $request->need_to_verified_with_customer;
            $preapp->dealer_need_to_upload_approval     = $request->dealer_need_to_upload_approval;
            $preapp->intimation_insurance_dealer_adv     = $request->intimation_insurance_dealer_adv;
            $preapp->mail_copy_ad_pymnt_dealer     = $request->mail_copy_ad_pymnt_dealer;
            $preapp->apc_time_dealer     = $request->apc_time_dealer;
            $preapp->need_to_b_vrfy_custmr_als     = $request->need_to_b_vrfy_custmr_als;
            $preapp->apc_rs_dealer     = $request->apc_rs_dealer;
            $preapp->need_to_b_vrfy_cust_als     = $request->need_to_b_vrfy_cust_als;
            $preapp->api_time_dealer     = $request->api_time_dealer;
            $preapp->api_rs_dealer     = $request->api_rs_dealer;
            $preapp->pre_delay_reason     = $request->pre_delay_reason;
            $preapp->ref_id     =  $random;
            $preapp->save();
            $preapp->id;
            // return Response()->json($preapp);

        }



        $complaint = new Complaint();

        $complaint->job_card = $gen_detail->job_card_no;
        $complaint->reg_no = $data->id;
        $complaint->verified_in_vahan = $data->verified_in_vahan;
        $complaint->model = $request->model;
        // $complaint->fuel_type = $data->id;
        $complaint->chassis_number = $data->chassis_number;
        $complaint->owner_name = $data->customer_name;
        // $complaint->driver_name_contact = $data->id;
        $complaint->driving_license_number = $data->driving_license_number;
        $complaint->driver_statement = $data->driver_statement;
        $complaint->insurance_policy_number = $data->insurance_policy_no;
        $complaint->name_of_the_insurance = $data->name_of_the_insurance;
        // $complaint->type_of_insurance = $data->id;
        // $complaint->policy_validity_date = $data->id;
        $complaint->date_of_accident = $data->date_of_accident;
        $complaint->location_of_the_accident = $data->location_of_the_accident;
        $complaint->is_third_party_involved = $quest->third_party;
        // $complaint->third_party = $data->id;
        // $complaint->third_party_response = $data->id;
        // $complaint->spot_survey_remarks = $data->id;
        $complaint->vehicle_reporting_date_at_workshop = $gen_detail->veh_rep_wkshp_dealer;
        $complaint->name_of_the_workshop = $gen_detail->name_wkshp_dealer;
        $complaint->sac_code_of_the_workshop = $gen_detail->sac_code_wrkshp;
        $complaint->mode_of_claims = $data->mode_of_claims;
        // $complaint->job_card_datetime = $data->id;
        // $complaint->estimated_datetime = $data->id;
        // $complaint->estimate_amount = $data->id;
        $complaint->major_minor = $preapp->major_minor_dealer;
        // $complaint->list_of_pending_documents = $data->id;
        // $complaint->all_documents_submitted_date = $data->id;
        // $complaint->surveyor_name_contact = $data->id;
        $complaint->surveor_initial_inspection = $preapp->surveyor_initial_inspection_dealer;
        $complaint->approval_for_dismantling = $preapp->approval_dismantling_dealer;
        $complaint->dismantling_completion = $preapp->dismantling_completion_dealer;
        $complaint->salvage_value_agreed = $preapp->sva_dealer;
        $complaint->surveyor_approval_for_start_of_work = $preapp->surveyor_written_approval_dealer;
        $complaint->advance_payment_from_customer = $preapp->apc_rs_dealer;
        // $complaint->advance_payment_from_customer_datetime = $data->id;
        $complaint->advance_payment_from_insurance = $preapp->api_rs_dealer;
        // $complaint->advance_payment_from_insurance_datetime = $data->id;
        // $complaint->start_of_work = $data->id;
        $complaint->supplimentary_estimate = $repair->supplementary_estimate;
        $complaint->supplimentary_approval = $repair->supplementary_written_approval;
        $complaint->repair_completion = $repair->repair_completion;
        $complaint->intimation_for_final_inspection = $postapp->iicfi;
        $complaint->final_inspection = $postapp->final_insption_surveyor;
        $complaint->proforma_submission = $postapp->proforma_submission;
        // $complaint->delivery_order = $data->id;
        $complaint->jc_closed = $postapp->job_card_closed;
        $complaint->balance_payment_from_customer = $postapp->bal_payment_customer;
        $complaint->vehicle_delivery = $postapp->veh_delivery_customer;
        $complaint->bill_value_to_customer = $postapp->bill_value_customer;
        $complaint->bill_value_to_insurance = $postapp->bill_value_insurance;
        // $complaint->current_repair_stage = $data->id;
        // $complaint->status = $data->id;
        $complaint->save();
        $complaint->id;

        // Case Detail Info

        // $case_detail_info = new Case_Detail_Infos();
        // $case_detail_info->complaint_id = $complaint->id;
        // $case_detail_info->save();
        // Cases Id

        $cases = new  Cases();
        $cases->job_card_no = $gen_detail->job_card_no;
        $cases->comp_doc_stats_id = $Doc->id;
        $cases->comp_gendetails_id = $gen_detail->id;
        $cases->comp_post_approval_delays_id = $postappdelayan->id;
        $cases->comp_post_app_stages_id = $postapp->id;
        $cases->comp_pre_app_delays_id = $preappdelay->id;
        $cases->comp_pre_app_stages_id = $preapp->id;;
        $cases->comp_questions_id = $quest->id;
        $cases->comp_repair_delays_id = $repairdelay->id;
        $cases->comp_repair_stages_id = $repair->id;
        $cases->comp_vehicledetails_id = $data->id;
        $cases->complaint_id = $complaint->id;
        $cases->save();


        // if ($data) {
        //     echo $data;
        //     #Display Success Message in Blade File
        //     $arr = array('msg' => 'Your query has been submitted Successfully, we will contact you soon!', 'status' => true);
        // }
        // return Response()->json('succesful');
        redirect('create_complaint');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id, $btype)
    // {
    //     $data['query'] = DB::select("SELECT *  from complaint Where job_card = job_card");
    //     // dd($data);

    //     // $data['query']  = DB::select(" select * from complaint  ");
    //     return redirect('create_complaint', $data);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function updateComplaint($request, $id)
    {
        if (isset($_POST['update'])) {
            function generate_uid()
            {
                return sprintf(
                    '%04x%04x%04x%04x',
                    mt_rand(0, 0xffff),
                    mt_rand(0, 0xffff),
                    mt_rand(0, 0xffff),
                    mt_rand(0, 0x0C2f) | 0x4000,
                    mt_rand(0, 0x3fff) | 0x8000,
                    mt_rand(0, 0x2Aff),
                    mt_rand(0, 0xffD3),
                    mt_rand(0, 0xff4B)
                );
            }
            $random = generate_uuid();
            //dd($id);
            $rowId = base64_decode($id);


            $case_detail_info =  Case_Detail_Infos::find($request->$id);

            $case_detail_info->Job_Card_No = $request->Job_Card_No;
            $case_detail_info->Quotation_Number = $request->Quotation_Number;
            $case_detail_info->Quotation_Date = $request->Quotation_Date;
            $case_detail_info->Dealer_Order_No = $request->Dealer_Order_No;
            $case_detail_info->Name_of_the_workshop = $request->Name_of_the_workshop;
            $case_detail_info->Plant_Code = $request->Plant_Code;
            $case_detail_info->SAC_Code_of_the_workshop = $request->SAC_Code_of_the_workshop;
            $case_detail_info->Accident_in_charge_Name  = $request->Accident_in_charge_Name;
            $case_detail_info->Accident_in_charge_Mobile  = $request->Accident_in_charge_Mobile;
            $case_detail_info->Zone  = $request->Zone;
            $case_detail_info->Region_Office  = $request->Region_Office;
            $case_detail_info->Area_Office  = $request->Area_Office;
            $case_detail_info->Veh_Reg_No  = $request->Veh_Reg_No;
            $case_detail_info->Chassis_Number  = $request->Chassis_Number;
            $case_detail_info->Engine_No  = $request->Engine_No;
            $case_detail_info->Segment  = $request->Segment;
            $case_detail_info->Date_of_Sale  = $request->Date_of_Sale;
            $case_detail_info->Model  = $request->Model;
            $case_detail_info->BS6_Non_BS6 = $request->BS6_Non_BS6;
            $case_detail_info->Select_Tier = $request->Select_Tier;
            $case_detail_info->Owner_Customer_Name  = $request->Owner_Customer_Name;
            $case_detail_info->Owner_Customer_Name_Mobile_No  = $request->Owner_Customer_Name_Mobile_No;
            $case_detail_info->Spot_Surveyor_Name  = $request->Spot_Surveyor_Name;
            $case_detail_info->Spot_Surveyor_Mobile_No  = $request->Spot_Surveyor_Mobile_No;
            $case_detail_info->Spot_Surveyor_E_mail_ID  = $request->Spot_Surveyor_E_mail_ID;
            $case_detail_info->Mode_of_Claims = $request->Mode_of_Claims;
            $case_detail_info->Name_of_the_Insurance  = $request->Name_of_the_Insurance;
            $case_detail_info->Insurance_Policy_No  = $request->Insurance_Policy_No;
            $case_detail_info->Claim_No  = $request->Claim_No;
            $case_detail_info->Initial_Estimate_Value = $request->Initial_Estimate_Value;
            $case_detail_info->Major_Minor = $request->Major_Minor;
            $case_detail_info->Surveyor_Name  = $request->Surveyor_Name;
            $case_detail_info->Surveyor_Mobile_No  = $request->Surveyor_Mobile_No;
            $case_detail_info->Surveyor_E_mail_ID  = $request->Surveyor_E_mail_ID;
            $case_detail_info->Date_of_Accident  = $request->Date_of_Accident;
            $case_detail_info->Vehicle_reported_at_workshop  = $request->Vehicle_reported_at_workshop;
            $case_detail_info->Job_Card_Open  = $request->Job_Card_Open;
            $case_detail_info->ALL_Document_submitted  = $request->ALL_Document_submitted;
            $case_detail_info->Surveyor_initial_inspection  = $request->Surveyor_initial_inspection;
            $case_detail_info->Approval_for_Dismantling  = $request->Approval_for_Dismantling;
            $case_detail_info->Dismantling_completion  = $request->Dismantling_completion;
            $case_detail_info->Salvage_value_agreed_by_Customer_Ins_co = $request->Salvage_value_agreed_by_Customer_Ins_co;
            $case_detail_info->Surveyor_written_approval_for_start_of_work = $request->Surveyor_written_approval_for_start_of_work;
            $case_detail_info->Advance_payment_from_Insurance  = $request->Advance_payment_from_Insurance;
            $case_detail_info->Advance_payment_from_Insurance_Rs = $request->Advance_payment_from_Insurance_Rs;
            $case_detail_info->Advance_payment_from_customer  = $request->Advance_payment_from_customer;
            $case_detail_info->Advance_payment_from_customer_Rs  = $request->Advance_payment_from_customer_Rs;
            $case_detail_info->Repair_work_start  = $request->Repair_work_start;
            $case_detail_info->Supplementary_estimate_Value  = $request->Supplementary_estimate_Value;
            $case_detail_info->Supplementary_estimate  = $request->Supplementary_estimate;
            $case_detail_info->Supplementary_written_approval  = $request->Supplementary_written_approval;
            $case_detail_info->Repair_completion  = $request->Repair_completion;
            $case_detail_info->Intimation_to_Insurance_company_final_inspection  = $request->Intimation_to_Insurance_company_final_inspection;
            $case_detail_info->Final_Inspection_from_surveyor  = $request->Final_Inspection_from_surveyor;
            $case_detail_info->Proforma_Submission_to_surveyor_post_inspection  = $request->Proforma_Submission_to_surveyor_post_inspection;
            $case_detail_info->Salvage_value_agreed_by_Customer_Ins_co_1 = $request->Salvage_value_agreed_by_Customer_Ins_co_1;
            $case_detail_info->Balance_payment_from_Customer  = $request->Balance_payment_from_Customer;
            $case_detail_info->Balance_payment_from_Customer_Value_Rs  = $request->Balance_payment_from_Customer_Value_Rs;
            $case_detail_info->Final_Bill_value = $request->Final_Bill_value;
            $case_detail_info->Job_Card_Closed  = $request->Job_Card_Closed;
            $case_detail_info->Gate_Pass = $request->Gate_Pass;
            $case_detail_info->Accidental_Stages  = $request->Accidental_Stages;
            $case_detail_info->Pre_Approval_Stage_Dealy_Reason  = $request->Pre_Approval_Stage_Dealy_Reason;
            $case_detail_info->Repair_Stage_Dealy_Reason  = $request->Repair_Stage_Dealy_Reason;
            $case_detail_info->Post_Approval_Stage_Dealy_Reason  = $request->Post_Approval_Stage_Dealy_Reason;
            $case_detail_info->Pre_Approval_Stage_Remarks  = $request->Pre_Approval_Stage_Remarks;
            $case_detail_info->Post_Approval_Stage_Remarks  = $request->Post_Approval_Stage_Remarks;
            $case_detail_info->Claim_Form  = $request->Claim_Form;
            $case_detail_info->KYC_documents_as_per_insurer  = $request->KYC_documents_as_per_insurer;
            $case_detail_info->Aadhaar_Card_No  = $request->Aadhaar_Card_No;
            $case_detail_info->Pan_Card_of_owner  = $request->Pan_Card_of_owner;
            $case_detail_info->Driving_License  = $request->Driving_License;
            $case_detail_info->National_Permit_Route_A_B  = $request->National_Permit_Route_A_B;
            $case_detail_info->Road_Tax_challan  = $request->Road_Tax_challan;
            $case_detail_info->Fitness_Certificate  = $request->Fitness_Certificate;
            $case_detail_info->Registration_of_Certification  = $request->Registration_of_Certification;
            $case_detail_info->Load_Challan_Trip_sheet  = $request->Load_Challan_Trip_sheet;
            $case_detail_info->Form_23  = $request->Form_23;
            $case_detail_info->Declaration_letter_if_NO_Load_on_Rs_100_Stamp_Paper  = $request->Declaration_letter_if_NO_Load_on_Rs_100_Stamp_Paper;
            $case_detail_info->Policy_Copy  = $request->Policy_Copy;
            $case_detail_info->Motor_Vehicle_Inspection_Report  = $request->Motor_Vehicle_Inspection_Report;
            $case_detail_info->Towing_bill_original = $request->Towing_bill_original;
            $case_detail_info->FIR_copy = $request->FIR_copy;
            $case_detail_info->Postmortem_Report  = $request->Postmortem_Report;
            $case_detail_info->Non_Traceable_Certificate  = $request->Non_Traceable_Certificate;
            $case_detail_info->Spot_Surveyor_Report = $request->Spot_Surveyor_Report;
            $case_detail_info->update();
            return Response()->json($case_detail_info);
            redirect('create_complaint');

        }
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







          ///* update cases*////

    public function update(Request $request)
    {

        $vehicledetails_id = $request->vehicledetails_id;
        $veh_reg_no = $request->veh_reg_no;
        $verified_in_vahan = $request->verified_in_vahan;
        $bs_nonbs = $request->bs_nonbs;
        $model = $request->model;
        $chassis_number = $request->chassis_number;
        $engine_no = $request->engine_no;
        $driver_name = $request->driver_name;
        $driver_contact_no = $request->driver_contact_no;
        $customer_contact = $request->customer_contact;
        $DL_validity_date = $request->DL_validity_date;
        $date_of_accident = $request->date_of_accident;
        $driver_statement = $request->driver_statement;
        $location_of_the_accident = $request->location_of_the_accident;
        $driving_license_number = $request->driving_license_number;
        $date_of_sale = $request->date_of_sale;
        $segment = $request->segment;
        $name_of_the_insurance = $request->name_of_the_insurance;
        $insurance_policy_no = $request->insurance_policy_no;
        $customer_name = $request->customer_name;
        $wood_cabin_load  = $request->wood_cabin_load;
        $AL_fitment = $request->AL_fitment;
        $mode_of_claims = $request->mode_of_claims;




      $arr_vehical_detail = ['veh_reg_no' => $veh_reg_no, 'verified_in_vahan' => $verified_in_vahan, 'bs_nonbs' => $bs_nonbs, 'model' => $model, 'chassis_number' => $chassis_number, 'engine_no' => $engine_no, 'driver_name' => $driver_name, 'driver_contact_no' => $driver_contact_no, 'customer_contact' => $customer_contact, 'DL_validity_date' => $DL_validity_date, 'date_of_accident' => $date_of_accident, 'driver_statement' => $driver_statement, 'location_of_the_accident' => $location_of_the_accident, 'driving_license_number' => $driving_license_number, 'date_of_sale' => $date_of_sale, 'segment' => $segment, 'name_of_the_insurance' => $name_of_the_insurance, 'insurance_policy_no' => $insurance_policy_no, 'customer_name' => $customer_name, 'wood_cabin_load' => $wood_cabin_load, 'AL_fitment' => $AL_fitment, 'mode_of_claims' => $mode_of_claims];

       VehicleDetail::where('id',$vehicledetails_id)->update($arr_vehical_detail);


        $question_id = $request->question_id;
        $third_party = $request->third_party;
        $third_party_dealer = $request->third_party_dealer;
        $third_party_customer = $request->third_party_customer;
        $accident_vehicle = $request->accident_vehicle;
        $accident_vehicle_dealer = $request->accident_vehicle_dealer;
        $accident_vehicle_customer = $request->accident_vehicle_customer;
        $thermal_incident = $request->thermal_incident;
        $thermal_incident_dealer = $request->thermal_incident_dealer;
        $thermal_incident_customer = $request->thermal_incident_customer;
        $Vehicle_towed = $request->Vehicle_towed;
        $Vehicle_towed_dealer = $request->Vehicle_towed_dealer;
        $Vehicle_towed_customer = $request->Vehicle_towed_customer;
        $theft_cases = $request->theft_cases;
        $theft_cases_dealer = $request->theft_cases_dealer;
        $theft_cases_customer = $request->theft_cases_customer;
        $loss_damage_theft = $request->loss_damage_theft;
        $loss_damage_theft_customer = $request->loss_damage_theft_customer;
        $loss_damage_theft_dealer = $request->loss_damage_theft_dealer;
        $PA_claim = $request->PA_claim;
        $PA_claim_dealer = $request->PA_claim_dealer;
        $PA_claim_customer = $request->PA_claim_customer;
        $brake_policies = $request->brake_policies;
        $brake_policies_dealer = $request->brake_policies_dealer;
        $brake_policies_customer = $request->brake_policies_customer;
        $question_remarks = $request->question_remarks;



       $arr_question = ['third_party' => $third_party, 'third_party_dealer' => $third_party_dealer, 'third_party_customer' => $third_party_customer, 'accident_vehicle' => $accident_vehicle, 'accident_vehicle_dealer' => $accident_vehicle_dealer, 'accident_vehicle_customer' => $accident_vehicle_customer, 'thermal_incident' => $thermal_incident, 'thermal_incident_dealer' => $thermal_incident_dealer, 'thermal_incident_customer' => $thermal_incident_customer, 'Vehicle_towed' => $Vehicle_towed, 'Vehicle_towed_dealer' => $Vehicle_towed_dealer, 'Vehicle_towed_customer' => $Vehicle_towed_customer, 'theft_cases' => $theft_cases, 'theft_cases_dealer' => $theft_cases_dealer, 'theft_cases_customer' => $theft_cases_customer, 'loss_damage_theft' => $loss_damage_theft, 'loss_damage_theft_customer' => $loss_damage_theft_customer, 'loss_damage_theft_dealer' => $loss_damage_theft_dealer, 'PA_claim' => $PA_claim, 'PA_claim_dealer' => $PA_claim_dealer, 'PA_claim_customer' => $PA_claim_customer, 'brake_policies' => $brake_policies, 'brake_policies_dealer' => $brake_policies, 'brake_policies_dealer' => $brake_policies_dealer, 'brake_policies_customer' => $brake_policies_customer, 'question_remarks' => $question_remarks];

        Question::where('id',$question_id)->update($arr_question);


        $claim_form_dealer = $request->claim_form_dealer;
        $claim_form_customer = $request->claim_form_customer;
        $KYC_documents_dealer = $request->KYC_documents_dealer;
        $KYC_documents_customer = $request->KYC_documents_customer;
        $aadhaar_card_no_dealer = $request->aadhaar_card_no_dealer;
        $aadhaar_card_no_customer = $request->aadhaar_card_no_customer;
        $pan_card_owner_dealer = $request->pan_card_owner_dealer;
        $pan_card_owner_customer = $request->pan_card_owner_customer;
        $policy_copy_dealer = $request->policy_copy_dealer;
        $policy_copy_customer = $request->policy_copy_customer;
        $driving_license_dealer = $request->driving_license_dealer;
        $driving_license_customer = $request->driving_license_customer;
        $npr_dealer = $request->npr_dealer;
        $npr_customer = $request->npr_customer;
        $road_tax_dealer = $request->road_tax_dealer;
        $road_tax_customer = $request->road_tax_customer;
        $fitness_certificate_dealer = $request->fitness_certificate_dealer;
        $fitness_certificate_customer = $request->fitness_certificate_customer;
        $reg_certification_dealer = $request->reg_certification_dealer;
        $reg_certification_customer = $request->reg_certification_customer;
        $form_twothree_dealer = $request->form_twothree_dealer;
        $form_twothree_customer = $request->form_twothree_customer;
        $all_docs_dealer = $request->all_docs_dealer;
        $all_docs_customer = $request->all_docs_customer;
        $last_docs_dealer_date = $request->last_docs_dealer_date;
        $last_docs_customer_date = $request->last_docs_customer_date;
        $spot_surveyor_dealer = $request->spot_surveyor_dealer;
        $spot_surveyor_customer = $request->spot_surveyor_customer;
        $spot_surveyor_mob_dealer = $request->spot_surveyor_mob_dealer;
        $spot_surveyor_mob_customer = $request->spot_surveyor_mob_customer;
        $spot_surveyor_email_dealer = $request->spot_surveyor_email_dealer;
        $spot_surveyor_email_customer = $request->spot_surveyor_email_customer;
        $spot_surveyor_report_dealer = $request->spot_surveyor_report_dealer;
        $spot_surveyor_report_customer = $request->spot_surveyor_report_customer;
        $towing_bill_dealer = $request->towing_bill_dealer;
        $towing_bill_customer = $request->towing_bill_customer;
        $load_challan_dealer = $request->load_challan_dealer;
        $load_challan_customer = $request->load_challan_customer;
        $decrtn_letter_dealer = $request->decrtn_letter_dealer;
        $decrtn_letter_customer = $request->decrtn_letter_customer;
        $motor_vehicle_insp_dealer = $request->motor_vehicle_insp_dealer;
        $motor_vehicle_insp_customer = $request->motor_vehicle_insp_customer;
        $fire_brigade_dealer = $request->fire_brigade_dealer;
        $fire_brigade_customer = $request->fire_brigade_customer;
        $ntc_dealer = $request->ntc_dealer;
        $ntc_customer = $request->ntc_customer;
        $fir_copy_dealer = $request->fir_copy_dealer;
        $fir_copy_customer = $request->fir_copy_customer;
        $postmortem_report_dealer = $request->postmortem_report_dealer;
        $postmortem_report_customer = $request->postmortem_report_customer;
        $docs_remarks = $request->docs_remarks;


        $doc_status_arr = ['claim_form_dealer' => $claim_form_dealer, 'claim_form_customer' => $claim_form_customer, 'KYC_documents_dealer' => $KYC_documents_dealer, 'KYC_documents_customer' => $KYC_documents_customer, 'aadhaar_card_no_dealer' => $aadhaar_card_no_dealer, 'aadhaar_card_no_customer' => $aadhaar_card_no_customer, 'pan_card_owner_dealer' => $pan_card_owner_dealer, 'pan_card_owner_customer' => $pan_card_owner_customer, 'policy_copy_dealer' => $policy_copy_dealer, 'policy_copy_customer' => $policy_copy_customer, 'driving_license_dealer' => $driving_license_dealer, 'driving_license_customer' => $driving_license_customer, 'npr_dealer' => $npr_dealer, 'npr_customer' => $npr_customer, 'road_tax_dealer' => $road_tax_dealer, 'road_tax_customer' => $road_tax_customer, 'fitness_certificate_dealer' => $fitness_certificate_dealer, 'fitness_certificate_customer' => $fitness_certificate_customer, 'reg_certification_dealer' => $reg_certification_dealer, 'reg_certification_customer' => $reg_certification_customer, 'form_twothree_dealer' => $form_twothree_dealer, 'form_twothree_customer' => $form_twothree_customer, 'all_docs_dealer' => $all_docs_dealer, 'all_docs_customer' => $all_docs_customer, 'last_docs_dealer_date' => $last_docs_dealer_date, 'last_docs_customer_date' => $last_docs_customer_date, 'spot_surveyor_dealer' => $spot_surveyor_dealer, 'spot_surveyor_customer' => $spot_surveyor_customer, 'spot_surveyor_mob_dealer' => $spot_surveyor_mob_dealer, 'spot_surveyor_mob_customer' => $spot_surveyor_mob_customer, 'spot_surveyor_email_dealer' => $spot_surveyor_email_dealer, 'spot_surveyor_email_customer' => $spot_surveyor_email_customer, 'spot_surveyor_report_dealer' => $spot_surveyor_report_dealer, 'spot_surveyor_report_customer' => $spot_surveyor_report_customer, 'towing_bill_dealer' => $towing_bill_dealer, 'towing_bill_customer' => $towing_bill_customer, 'load_challan_dealer' => $load_challan_dealer, 'load_challan_customer' => $load_challan_customer, 'decrtn_letter_dealer' => $decrtn_letter_dealer, 'decrtn_letter_customer' => $decrtn_letter_customer, 'motor_vehicle_insp_dealer' => $motor_vehicle_insp_dealer, 'motor_vehicle_insp_customer' => $motor_vehicle_insp_customer, 'fire_brigade_dealer' => $fire_brigade_dealer, 'fire_brigade_customer' => $fire_brigade_customer, 'ntc_dealer' => $ntc_dealer, 'ntc_customer' => $ntc_customer, 'fir_copy_dealer' => $fir_copy_dealer, 'fir_copy_customer' => $fir_copy_customer, 'postmortem_report_dealer' => $postmortem_report_dealer, 'postmortem_report_customer' => $postmortem_report_customer, 'docs_remarks' => $docs_remarks];


        Doc_Stat::where('id', $question_id)->update($doc_status_arr);



        $initial_estimate_dealer = $request->initial_estimate_dealer;
        $pre_app_stage_get_id = $request->pre_app_stage_get_id;
        $need_to_verfy_cust = $request->need_to_verfy_cust;
        $initial_estimate_val_dealer = $request->initial_estimate_val_dealer;
        $need_to_verify_cust = $request->need_to_verify_cust;
        $major_minor_dealer = $request->major_minor_dealer;
        $classfy_based_est_amnt = $request->classfy_based_est_amnt;
        $intimation_insurance_dealer = $request->intimation_insurance_dealer;
        $mail_copy_dealer = $request->mail_copy_dealer;
        $surveyor_name_dealer = $request->surveyor_name_dealer;
        $surveyor_mob_dealer = $request->surveyor_mob_dealer;
        $surveyor_email_dealer = $request->surveyor_email_dealer;
        $surveyor_initial_inspection_dealer = $request->surveyor_initial_inspection_dealer;
        $need_to_b_vrfy_srvyr = $request->need_to_b_vrfy_srvyr;
        $approval_dismantling_dealer = $request->approval_dismantling_dealer;
        $need_to_b_vrfy_srvyr_als = $request->need_to_b_vrfy_srvyr_als;
        $dismantling_completion_dealer = $request->dismantling_completion_dealer;
        $intimation_surveyor_dealer = $request->intimation_surveyor_dealer;
        $surveyor_second_dealer  = $request->surveyor_second_dealer;
        $sva_dealer = $request->sva_dealer;
        $surveyor_written_approval_dealer = $request->surveyor_written_approval_dealer;
        $dealer_need_to_upload_approval_copy = $request->dealer_need_to_upload_approval_copy;
        $parts_approved_dealer = $request->parts_approved_dealer;
        $customer_approval_dealer = $request->customer_approval_dealer;
        $need_to_verified_with_customer = $request->need_to_verified_with_customer;
        $dealer_need_to_upload_approval = $request->dealer_need_to_upload_approval;
        $intimation_insurance_dealer_adv = $request->intimation_insurance_dealer_adv;
        $mail_copy_ad_pymnt_dealer = $request->mail_copy_ad_pymnt_dealer;
        $apc_time_dealer = $request->apc_time_dealer;
        $need_to_b_vrfy_custmr_als = $request->need_to_b_vrfy_custmr_als;
        $apc_rs_dealer = $request->apc_rs_dealer;
        $need_to_b_vrfy_cust_als = $request->need_to_b_vrfy_cust_als;
        $api_time_dealer = $request->api_time_dealer;
        $api_rs_dealer = $request->api_rs_dealer;
        $pre_delay_reason = $request->pre_delay_reason;

        // return response()->json(['Program updated successfully.']);



        $pre_app_stage_arr = ['initial_estimate_dealer' => $initial_estimate_dealer, 'need_to_verfy_cust' => $need_to_verfy_cust, 'initial_estimate_val_dealer' => $initial_estimate_val_dealer, 'need_to_verify_cust' => $need_to_verify_cust, 'major_minor_dealer' => $major_minor_dealer, 'classfy_based_est_amnt' => $classfy_based_est_amnt, 'intimation_insurance_dealer' => $intimation_insurance_dealer, 'mail_copy_dealer' => $mail_copy_dealer, 'surveyor_name_dealer' => $surveyor_name_dealer, 'surveyor_mob_dealer' => $surveyor_mob_dealer, 'surveyor_email_dealer' => $surveyor_email_dealer, 'surveyor_initial_inspection_dealer' => $surveyor_initial_inspection_dealer, 'need_to_b_vrfy_srvyr' => $need_to_b_vrfy_srvyr, 'approval_dismantling_dealer' => $approval_dismantling_dealer, 'need_to_b_vrfy_srvyr_als' => $need_to_b_vrfy_srvyr_als, 'dismantling_completion_dealer' => $dismantling_completion_dealer, 'intimation_surveyor_dealer' => $intimation_surveyor_dealer, 'surveyor_second_dealer' => $surveyor_second_dealer,'sva_dealer' => $sva_dealer, 'surveyor_written_approval_dealer' => $surveyor_written_approval_dealer, 'dealer_need_to_upload_approval_copy' => $dealer_need_to_upload_approval_copy, 'parts_approved_dealer' => $parts_approved_dealer, 'customer_approval_dealer' => $customer_approval_dealer, 'need_to_verified_with_customer' => $need_to_verified_with_customer, 'dealer_need_to_upload_approval' => $dealer_need_to_upload_approval, 'intimation_insurance_dealer_adv' => $intimation_insurance_dealer_adv, 'mail_copy_ad_pymnt_dealer' => $mail_copy_ad_pymnt_dealer, 'apc_time_dealer' => $apc_time_dealer, 'need_to_b_vrfy_custmr_als' => $need_to_b_vrfy_custmr_als, 'apc_rs_dealer' => $apc_rs_dealer, 'need_to_b_vrfy_cust_als' => $need_to_b_vrfy_cust_als, 'api_time_dealer' => $api_time_dealer, 'api_rs_dealer' => $api_rs_dealer, 'pre_delay_reason' => $pre_delay_reason ];


        Pre_App_Stage::where('id', $pre_app_stage_get_id)->update($pre_app_stage_arr);

       $rep_stage_get_id = $request->rep_stage_get_id;
       $repair_work_start_dealer = $request->repair_work_start_dealer;
       $tech_id_mob = $request->tech_id_mob;
       $need_to_be_verify_with_technician = $request->need_to_be_verify_with_technician;
       $detail_damaged_dealer = $request->detail_damaged_dealer;
       $available_at_dealer = $request->available_at_dealer;
       $AOR_need_to_place = $request->AOR_need_to_place;
       $In_Transit = $request->In_Transit;
       $Local_purchase = $request->Local_purchase;
       $Arrange_form_other_branch = $request->Arrange_form_other_branch;
       $TOC_order = $request->TOC_order;
       $sheet_denting_repair = $request->sheet_denting_repair;
       $mech_elec_repair = $request->mech_elec_repair;
       $painting_start = $request->painting_start;
       $painting_start_date_yet_to_collect = $request->painting_start_date_yet_to_collect;
       $cabin_trims_parts = $request->cabin_trims_parts;
       $trim_of_cabin_date_to_collect = $request->trim_of_cabin_date_to_collect;
       $outside_job = $request->outside_job;
       $outside_purpose = $request->outside_purpose;
       $AOR_raised = $request->AOR_raised;
       $so_no = $request->so_no;
       $arrange_mat = $request->arrange_mat;
       $if_yes_no = $request->if_yes_no;
       $receipt_all_parts = $request->receipt_all_parts;
       $intimation_surveyor = $request->intimation_surveyor;
       $supplementary_estimate = $request->supplementary_estimate;
       $supplementary_estimate_val = $request->supplementary_estimate_val;
       $supplementary_inspection = $request->supplementary_inspection;
       $supplementary_written_approval = $request->supplementary_written_approval;
       $inform_to_customer_on_approval = $request->inform_to_customer_on_approval;
       $parts_get_approval = $request->parts_get_approval;
       $repair_completion = $request->repair_completion;
       $inform_to_customer_vehicle = $request->inform_to_customer_vehicle;
       $repair_delay_reason = $request->repair_delay_reason;


       $arr_repair_stage = ['repair_work_start_dealer' => $repair_work_start_dealer, 'tech_id_mob' => $tech_id_mob,'need_to_be_verify_with_technician' => $need_to_be_verify_with_technician, 'detail_damaged_dealer' => $detail_damaged_dealer, 'available_at_dealer' => $available_at_dealer, 'AOR_need_to_place' => $AOR_need_to_place, 'In_Transit' => $In_Transit, 'Local_purchase' => $Local_purchase, 'Arrange_form_other_branch' => $Arrange_form_other_branch, 'TOC_order' => $TOC_order, 'sheet_denting_repair' => $sheet_denting_repair, 'mech_elec_repair' => $mech_elec_repair, 'painting_start' => $painting_start, 'painting_start_date_yet_to_collect' => $painting_start_date_yet_to_collect, 'cabin_trims_parts' => $cabin_trims_parts, 'trim_of_cabin_date_to_collect' => $trim_of_cabin_date_to_collect, 'outside_job' => $outside_job, 'outside_purpose' => $outside_purpose, 'AOR_raised' => $AOR_raised, 'so_no' => $so_no, 'arrange_mat' => $arrange_mat, 'if_yes_no' => $if_yes_no, 'receipt_all_parts' => $receipt_all_parts, 'intimation_surveyor' => $intimation_surveyor, 'supplementary_estimate' => $supplementary_estimate, 'supplementary_estimate_val' => $supplementary_estimate_val, 'supplementary_inspection' => $supplementary_inspection, 'supplementary_written_approval' => $supplementary_written_approval, 'inform_to_customer_on_approval' => $inform_to_customer_on_approval, 'parts_get_approval' => $parts_get_approval, 'repair_completion' => $repair_completion, 'inform_to_customer_vehicle' => $inform_to_customer_vehicle, 'repair_delay_reason' => $repair_delay_reason];

       Repair_Stage::where('id', $rep_stage_get_id)->update($arr_repair_stage);


       $iicfi = $request->iicfi;
       $comp_post_app_stages_get_id = $request->comp_post_app_stages_get_id;
       $mail_copy_final_insption = $request->mail_copy_final_insption;
       $conduct_road_test = $request->conduct_road_test;
       $need_to_vrfy_with_customer = $request->need_to_vrfy_with_customer;
       $final_insption_surveyor = $request->final_insption_surveyor;
       $proforma_submission = $request->proforma_submission;
       $Need__be_verified_with_Surveyor = $request->Need__be_verified_with_Surveyor;
       $receipt_delivery_order = $request->receipt_delivery_order;
       $job_card_closed = $request->job_card_closed;
       $bill_value_customer = $request->bill_value_customer;
       $bill_value_insurance = $request->bill_value_insurance;
       $bal_payment_customer = $request->bal_payment_customer;
       $Need_be_verified_Customer = $request->Need_be_verified_Customer;
       $bal_payment_customer_rs = $request->bal_payment_customer_rs;
       $Need_be_verified_Customer_ = $request->Need_be_verified_Customer_;
       $collecting_satisfaction_voucher = $request->collecting_satisfaction_voucher;
       $veh_delivery_customer = $request->veh_delivery_customer;
       $Need_be_verified_Custmr_ = $request->Need_be_verified_Custmr_;
       $bal_pymnt_ins = $request->bal_pymnt_ins;
       $bal_pymnt_ins_rs = $request->bal_pymnt_ins_rs;
       $gate_pass = $request->gate_pass;
       $post_delay_reason = $request->post_delay_reason;



       $post_app_stage_arr= ['iicfi' => $iicfi, 'mail_copy_final_insption' => $mail_copy_final_insption,'conduct_road_test' => $conduct_road_test,  'need_to_vrfy_with_customer' => $need_to_vrfy_with_customer, 'final_insption_surveyor' => $final_insption_surveyor, 'proforma_submission' => $proforma_submission, 'Need__be_verified_with_Surveyor' => $Need__be_verified_with_Surveyor, 'receipt_delivery_order' => $receipt_delivery_order, 'job_card_closed' => $job_card_closed, 'bill_value_customer' => $bill_value_customer, 'bill_value_insurance' => $bill_value_insurance, 'bal_payment_customer' => $bal_payment_customer, 'Need_be_verified_Customer' => $Need_be_verified_Customer, 'bal_payment_customer_rs' => $bal_payment_customer_rs, 'Need_be_verified_Customer_' => $Need_be_verified_Customer_, 'collecting_satisfaction_voucher' => $collecting_satisfaction_voucher, 'veh_delivery_customer' => $veh_delivery_customer, 'Need_be_verified_Custmr_' => $Need_be_verified_Custmr_, 'bal_pymnt_ins' => $bal_pymnt_ins, 'bal_pymnt_ins_rs' => $bal_pymnt_ins_rs, 'gate_pass' => $gate_pass, 'post_delay_reason' => $post_delay_reason];

       Post_App_Stage::where('id', $comp_post_app_stages_get_id)->update($post_app_stage_arr);


        //Pre_App_Delay();
       $delay_prepare_dealer_get_id = $request->delay_prepare_dealer_get_id;
       $delay_prepare_dealer = $request->delay_prepare_dealer;
       $delay_submsn_docs = $request->delay_submsn_docs;
       $doc_1 = $request->doc_1;
       $doc_2 = $request->doc_2;
       $doc_3 = $request->doc_3;
       $doc_4 = $request->doc_4;
       $doc_5 = $request->doc_5;
       $surveyor_deputation_dealer = $request->surveyor_deputation_dealer;
       $delay_surveyor_deputation = $request->delay_surveyor_deputation;
       $approval_dismantling_surveyor = $request->approval_dismantling_surveyor;
       $delay_dismantling_completion = $request->delay_dismantling_completion;
       $intimation_to_surveyor_for_second_inspection = $request->intimation_to_surveyor_for_second_inspection;
       $delay_surveyor_completion = $request->delay_surveyor_completion;
       $surveyor_approval = $request->surveyor_approval;
       $approval_delay = $request->approval_delay;
       $advance_payment_delay = $request->advance_payment_delay;
       $delay_intimation_nsurance = $request->delay_intimation_nsurance;
       $advance_payment_delay_ins = $request->advance_payment_delay_ins;
       $pre_delay_dealer = $request->pre_delay_dealer;
       $pre_delay_customer = $request->pre_delay_customer;
       $pre_surveyor_company = $request->pre_surveyor_company;
       $send_user_id  = $request->send_user_id;

      // dd(Auth::id());

       $arr_pre_app_delay = ['delay_prepare_dealer' => $delay_prepare_dealer, 'delay_submsn_docs' => $delay_submsn_docs,'doc_1' => $doc_1,  'doc_2' => $doc_2, 'doc_3' => $doc_3, 'doc_4' => $doc_4, 'doc_5' => $doc_5, 'surveyor_deputation_dealer' => $surveyor_deputation_dealer, 'delay_surveyor_deputation' => $delay_surveyor_deputation, 'approval_dismantling_surveyor' => $approval_dismantling_surveyor, 'delay_dismantling_completion' => $delay_dismantling_completion, 'intimation_to_surveyor_for_second_inspection' => $intimation_to_surveyor_for_second_inspection, 'delay_surveyor_completion' => $delay_surveyor_completion, 'surveyor_approval' => $surveyor_approval, 'approval_delay' => $approval_delay, 'advance_payment_delay' => $advance_payment_delay, 'delay_intimation_nsurance' => $delay_intimation_nsurance, 'advance_payment_delay_ins' => $advance_payment_delay_ins, 'pre_delay_dealer' => $pre_delay_dealer, 'pre_delay_customer' => $pre_delay_customer, 'pre_surveyor_company' => $pre_surveyor_company];

       Pre_App_Delay::where('id', $delay_prepare_dealer_get_id)->update($arr_pre_app_delay);


      // $repairdelay = new Repair_Delay();
       $comp_repair_delays_get_id = $request->comp_repair_delays_get_id;
       $delay_start = $request->delay_start;
       $Manpower = $request->Manpower;
       $Crane_facility = $request->Crane_facility;
       $Power_not_available = $request->Power_not_available;
       $Equipment = $request->Equipment;
       $delay_preparing = $request->delay_preparing;
       $AOR_need_place = $request->AOR_need_place;
       $In_Transit_ = $request->In_Transit_;
       $Local_purchase_ = $request->Local_purchase_;
       $Arrange_form_other_branch_ = $request->Arrange_form_other_branch_;
       $TOC_order_ = $request->TOC_order_;
       $no_days_taken_metal = $request->no_days_taken_metal;
       $no_days_taken_works = $request->no_days_taken_works;
       $no_days_taken_painting = $request->no_days_taken_painting;
       $no_days_taken_cabin = $request->no_days_taken_cabin;
       $repair_receipt_all_parts = $request->repair_receipt_all_parts;
       $_AOR_need_place = $request->_AOR_need_place;
       $_In_Transit_ = $request->_In_Transit_;
       $_Local_purchase_ = $request->_Local_purchase_;
       $_Arrange_form_other_branch_ = $request->_Arrange_form_other_branch_;
       $_TOC_order_ = $request->_TOC_order_;
       $repair_outside_job = $request->repair_outside_job;
       $delay_supp_estimate = $request->delay_supp_estimate;
       $delay_report_workshop = $request->delay_report_workshop;
       $delay_approval_supp_est = $request->delay_approval_supp_est;
       $approval_delay_customer = $request->approval_delay_customer;
       $repair_completion_bibo = $request->repair_completion_bibo;
       $inform_to_customer_work_completed = $request->inform_to_customer_work_completed;
       $repaire_delay_customer = $request->repaire_delay_customer;
       $repaire_surveyor_company = $request->repaire_surveyor_company;
       $ref_id = $request->ref_id;


       $arr_repair_delays  = ['delay_start' => $delay_start, 'Manpower' => $Manpower, 'Crane_facility' => $Crane_facility, 'Power_not_available' => $Power_not_available, 'Equipment' => $Equipment, 'delay_preparing' => $delay_preparing, 'AOR_need_place' => $AOR_need_place, 'In_Transit_' => $In_Transit_, 'Local_purchase_' => $Local_purchase_, 'Arrange_form_other_branch_' => $Arrange_form_other_branch_, 'TOC_order_' => $TOC_order_, 'no_days_taken_metal' => $no_days_taken_metal, 'no_days_taken_works' =>  $no_days_taken_works, 'no_days_taken_painting' => $no_days_taken_painting, 'no_days_taken_cabin' => $no_days_taken_cabin, 'repair_receipt_all_parts' => $repair_receipt_all_parts, '_AOR_need_place' => $_AOR_need_place, '_In_Transit_' => $_In_Transit_, '_Local_purchase_' => $_Local_purchase_, '_Arrange_form_other_branch_' => $_Arrange_form_other_branch_, '_TOC_order_' => $_TOC_order_, 'repair_outside_job' => $repair_outside_job, 'delay_supp_estimate' => $delay_supp_estimate, 'delay_report_workshop' => $delay_report_workshop, 'delay_approval_supp_est' => $delay_approval_supp_est, 'approval_delay_customer' => $approval_delay_customer, 'repair_completion_bibo' => $repair_completion_bibo, 'inform_to_customer_work_completed'=> $inform_to_customer_work_completed, 'repaire_delay_customer' => $repaire_delay_customer, 'repaire_surveyor_company' => $repaire_surveyor_company];

       Repair_Delay::where('id', $comp_repair_delays_get_id)->update($arr_repair_delays);

        $comp_post_approval_delays_get_id = $request->comp_post_approval_delays_get_id;
        $delay_final_inspection = $request->delay_final_inspection;
        $delay_road_test = $request->delay_road_test;
        $delay_final_inspection_surveyor = $request->delay_final_inspection_surveyor;
        $delay_submission_invoice = $request->delay_submission_invoice;
        $receipt_delivery_report = $request->receipt_delivery_report;
        $job_card_open_close = $request->job_card_open_close;
        $delay_final_payment_customer = $request->delay_final_payment_customer;
        $delay_final_payment_insurance = $request->delay_final_payment_insurance;
        $delay_collect_vehicle = $request->delay_collect_vehicle;
        $vehicle_inward_wards = $request->vehicle_inward_wards;
        $gigo = $request->gigo;
        $post_delay_dealer = $request->post_delay_dealer;
        $post_delay_customer = $request->post_delay_customer;
        $post_surveyor_company = $request->post_surveyor_company;

        $arr_post_approval_delay_analysis = ['delay_final_inspection' => $delay_final_inspection, 'delay_road_test' => $delay_road_test, 'delay_final_inspection_surveyor' => $delay_final_inspection_surveyor, 'delay_submission_invoice' => $delay_submission_invoice, 'receipt_delivery_report' => $receipt_delivery_report, 'job_card_open_close' => $job_card_open_close, 'delay_final_payment_customer' => $delay_final_payment_customer, 'delay_final_payment_insurance' => $delay_final_payment_insurance, 'delay_collect_vehicle' => $delay_collect_vehicle, 'vehicle_inward_wards' => $vehicle_inward_wards, 'gigo' => $gigo, 'post_delay_dealer' => $post_delay_dealer, 'post_delay_customer' => $post_delay_customer, 'post_surveyor_company' => $post_surveyor_company];

        Post_Approval_Delay_Analysis::where('id', $comp_post_approval_delays_get_id)->update($arr_post_approval_delay_analysis);

       $case_history_data = new Case_history();
       $case_history_data->complaint_id =  '00';
       $case_history_data->comp_doc_stats =  json_encode($doc_status_arr);
       $case_history_data->ref_id =  $ref_id;
       $case_history_data->comp_post_approval_delays = json_encode($arr_post_approval_delay_analysis);
       $case_history_data->comp_post_app_stages = json_encode($post_app_stage_arr);
       $case_history_data->comp_pre_app_delays = json_encode($arr_pre_app_delay);
       $case_history_data->comp_pre_app_stages = json_encode($pre_app_stage_arr);
       $case_history_data->comp_questions = json_encode($arr_question);
       $case_history_data->comp_repair_delays = json_encode($arr_repair_delays);
       $case_history_data->comp_repair_stages = json_encode($arr_repair_stage);
       $case_history_data->comp_vehicledetails = json_encode($arr_vehical_detail);
       $case_history_data->creater_id = $send_user_id;
       $case_history_data->server_detail = json_encode($_SERVER);
       $case_history_data->save();

       return response()->json(['Case updated successfully.']);


    }

}
