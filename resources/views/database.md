
ALTER TABLE `ams`.`ams_info` 
ADD COLUMN `Plant_Name_remarks` TEXT NULL AFTER `updated_at`,
ADD COLUMN `SAC_Code_remarks` TEXT NULL AFTER `Plant_Name_remarks`,
ADD COLUMN `Job_card_No_remarks` VARCHAR(255) NULL AFTER `SAC_Code_remarks`;
ADD COLUMN `Surveyor_approval_for_dismantling_remarks` VARCHAR(255) NULL AFTER `Job_card_No_remarks`;
ADD COLUMN `Accident_In_charge_Name_remarks` TEXT NULL AFTER `Surveyor_approval_for_dismantling_remarks`,
ADD COLUMN `Accident_In_charge_contact_Number_remarks` TEXT NULL AFTER `Accident_In_charge_Name_remarks`,
ADD COLUMN `Zone_remarks` TEXT NULL AFTER `Accident_In_charge_contact_Number_remarks`,
ADD COLUMN `Area_Office_remarks` TEXT NULL AFTER `Zone_remarks`,
ADD COLUMN `Vehicle_Registration_Number_remarks` TEXT NULL AFTER `Area_Office_remarks`,
ADD COLUMN `Chassis_Number_remarks` TEXT NULL AFTER `Vehicle_Registration_Number_remarks`;
ADD COLUMN `Select_ID_remarks` TEXT NULL AFTER `Chassis_Number_remarks`,
ADD COLUMN `Select_Tier_remarks` TEXT NULL AFTER `Select_ID_remarks`,
ADD COLUMN `Customer_Name_remarks` TEXT NULL AFTER `Select_Tier_remarks`,
ADD COLUMN `Mode_of_Claim_remarks` TEXT NULL AFTER `Customer_Name_remarks`,
ADD COLUMN `Name_of_Insurance_company_remarks` TEXT NULL AFTER `Mode_of_Claim_remarks`,
ADD COLUMN `Initial_Estimate_Value_Rs_remarks` TEXT NULL AFTER `Name_of_Insurance_company_remarks`;
ADD COLUMN `Major_Minor_Quotation_remarks` TEXT NULL AFTER `Initial_Estimate_Value_Rs_remarks`,
ADD COLUMN `Surveyor_Name_remarks` TEXT NULL AFTER `Major_Minor_Quotation_remarks`,
ADD COLUMN `Surveyor_Mobile_no_remarks` TEXT NULL AFTER `Surveyor_Name_remarks`,
ADD COLUMN `Surveyor_E_mail_id_remarks` TEXT NULL AFTER `Surveyor_Mobile_no_remarks`,
ADD COLUMN `Registration_of_certificate_upload_remarks` TEXT NULL AFTER `Surveyor_E_mail_id_remarks`;
ADD COLUMN `National_Permit_A_B_upload_remarks` TEXT NULL AFTER `Registration_of_certificate_upload_remarks`,
ADD COLUMN `Road_Tax_upload_remarks` TEXT NULL AFTER `National_Permit_A_B_upload_remarks`,
ADD COLUMN `Claim_Form_upload_remarks` TEXT NULL AFTER `Road_Tax_upload_remarks`,
ADD COLUMN `Quotation_Date_remarks` TEXT NULL AFTER `Claim_Form_upload_remarks`,
ADD COLUMN `Date_of_Accident_remarks` TEXT NULL AFTER `Quotation_Date_remarks`,
ADD COLUMN `Vehicle_inward_remarks` TEXT NULL AFTER `Date_of_Accident_remarks`;
ADD COLUMN `Job_Card_open_date_remarks` TEXT NULL AFTER `Vehicle_inward_remarks`,
ADD COLUMN `Documents_submitted_remarks` TEXT NULL AFTER `Job_Card_open_date_remarks`,
ADD COLUMN `Intimation_2_IC_for_surveyor_deputation_remarks` TEXT NULL AFTER `Documents_submitted_remarks`,
ADD COLUMN `Surveyor_initial_inspection_date_remarks` TEXT NULL AFTER `Intimation_2_IC_for_surveyor_deputation_remarks`,
ADD COLUMN `Dismantling_completed_on_remarks` TEXT NULL AFTER `Surveyor_initial_inspection_date_remarks`,
ADD COLUMN `Intimation_to_surveyor_for_2nd__inspecti_remarks` TEXT NULL AFTER `Dismantling_completed_on_remarks`,
ADD COLUMN `Salvage_value_agreed_by_Customer_Ins_co_remarks` TEXT NULL AFTER `Intimation_to_surveyor_for_2nd__inspecti_remarks`;
ADD COLUMN `Customer_Portion_payment_received_remarks` TEXT NULL AFTER `Salvage_value_agreed_by_Customer_Ins_co_remarks`,
ADD COLUMN `Customer_payable_amount_remarks` TEXT NULL AFTER `Customer_Portion_payment_received_remarks`,
ADD COLUMN `Final_Bill_value_remarks` TEXT NULL AFTER `Customer_payable_amount_remarks`,
ADD COLUMN `Major_Minor__Final_bill_remarks` TEXT NULL AFTER `Final_Bill_value_remarks`,
ADD COLUMN `Job_card_closed_Date_remarks` TEXT NULL AFTER `Major_Minor__Final_bill_remarks`,
ADD COLUMN `Gate_Pass_Date_remarks` TEXT NULL AFTER `Job_card_closed_Date_remarks`,
ADD COLUMN `Accidental_Stages_remarks` TEXT NULL AFTER `Gate_Pass_Date_remarks`,
ADD COLUMN `No_of_days_taken_as_on_date_remarks` TEXT NULL AFTER `Accidental_Stages_remarks`;
Add COLUMN `Intimation_2_IC_for_advance_payment_remarks` TEXT NULL AFTER `No_of_days_taken_as_on_date_remarks`,
ADD COLUMN `Advance_payment_received_onInsurance_remarks` TEXT NULL AFTER `Intimation_2_IC_for_advance_payment_remarks`;
ADD COLUMN `Supplementary_estimate_Value_Rs_remarks` TEXT NULL AFTER `Advance_payment_received_onInsurance_remarks`,
ADD COLUMN `Supplementary_repair_inspection_date_remarks` TEXT NULL AFTER `Supplementary_estimate_Value_Rs_remarks`,
ADD COLUMN `Written_approval_for_supplementary_Est_remarks` TEXT NULL AFTER `Supplementary_repair_inspection_date_remarks`,
ADD COLUMN `Post_inspection_final_invoice_submit_on_remarks` TEXT NULL AFTER `Written_approval_for_supplementary_Est_remarks`,
ADD COLUMN `No_of_days_inside_the_workshop_remarks` TEXT NULL AFTER `Post_inspection_final_invoice_submit_on_remarks`;




// Create Table vehicle question 

CREATE TABLE `ams`.`question_vehicle` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `third_party` VARCHAR(255) NULL,
  `third_party_dealer` VARCHAR(255) NULL,
  `third_party_customer` VARCHAR(255) NULL,
  `accident_vehicle` VARCHAR(255) NULL,
  `accident_vehicle_dealer` VARCHAR(255) NULL,
  `accident_vehicle_customer` VARCHAR(255) NULL,
  `thermal_incident` VARCHAR(255) NULL,
  `thermal_incident_dealer` VARCHAR(255) NULL,
  `thermal_incident_customer` VARCHAR(255) NULL,
  `Vehicle_towed` VARCHAR(255) NULL,
  `Vehicle_towed_dealer` VARCHAR(255) NULL,
  `Vehicle_towed_customer` VARCHAR(255) NULL,
  `theft_cases` VARCHAR(255) NULL,
  `theft_cases_dealer` VARCHAR(255) NULL,
  `theft_cases_customer` VARCHAR(255) NULL,
  `loss_damage_theft` VARCHAR(255) NULL,
  `loss_damage_theft_customer` VARCHAR(255) NULL,
  `loss_damage_theft_dealer` VARCHAR(255) NULL,
  `PA_claim` VARCHAR(255) NULL,
  `PA_claim_customer` VARCHAR(255) NULL,
  `PA_claim_dealer` VARCHAR(255) NULL,
  `brake_policies` VARCHAR(255) NULL,
  `brake_policies_customer` VARCHAR(255) NULL,
  `brake_policies_dealer` VARCHAR(255) NULL,
  `remarks` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `ams_info_id` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE);

// Created Table for  vehicle_details


CREATE TABLE `ams`.`vehicle_details` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ams_info_id` VARCHAR(255) NULL,
  `model` VARCHAR(255) NULL,
  `model_remarks` VARCHAR(255) NULL,
  `engine_no` VARCHAR(255) NULL,
  `engine_no_remarks` VARCHAR(255) NULL,
  `segment` VARCHAR(255) NULL,
  `segment_remarks` VARCHAR(255) NULL,
  `insurance_policy_no` VARCHAR(255) NULL,
  `insurance_policy_no_remarks` VARCHAR(255) NULL,
  `driver_name` VARCHAR(255) NULL,
  `driver_name_remarks` VARCHAR(255) NULL,
  `driver_contact_no` VARCHAR(255) NULL,
  `driver_contact_no_remarks` VARCHAR(255) NULL,
  `driving_license_number` VARCHAR(255) NULL,
  `driving_license_number_remarks` VARCHAR(255) NULL,
  `DL_validity_date` VARCHAR(255) NULL,
  `DL_validity_date_remarks` VARCHAR(255) NULL,
  `AL_fitment` VARCHAR(255) NULL,
  `AL_fitment_remarks` VARCHAR(255) NULL,
  `verified_in_vahan` VARCHAR(255) NULL,
  `verified_in_vahan_remarks` VARCHAR(255) NULL,
  `bs_nonbs` VARCHAR(255) NULL,
  `bs_nonbs_remarks` VARCHAR(255) NULL,
  `date_of_sale` VARCHAR(255) NULL,
  `date_of_sale_remarks` VARCHAR(255) NULL,
  `name_of_the_insurance` VARCHAR(255) NULL,
  `name_of_the_insurance_remarks` VARCHAR(255) NULL,
  `customer_name` VARCHAR(255) NULL,
  `customer_name_remarks` VARCHAR(255) NULL,
  `mode_of_claims` VARCHAR(255) NULL,
  `mode_of_claims_remarks` VARCHAR(255) NULL,
  `location_of_the_accident` VARCHAR(255) NULL,
  `location_of_the_accident_remarks` VARCHAR(255) NULL,
  `driver_statement` VARCHAR(255) NULL,
  `driver_statement_remarks` VARCHAR(255) NULL,
  `wood_cabin_load` VARCHAR(255) NULL,
  `wood_cabin_load_remarks` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
COMMENT = '	';

alter table `ams`.`vehicle_details`
add column `customer_email_id` varchar(255) null after `location_of_the_accident`, 
add column `customer_email_id_remarks` varchar(255) null after `customer_email_id`;





// general accdent 

CREATE TABLE `ams`.`general_acce_details` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ams_info_id` VARCHAR(255) NULL,
  `accident_charge_mobile_dealer` VARCHAR(255) NULL,
  `accident_charge_mobile_dealer_remarks` VARCHAR(255) NULL,
  `veh_rep_wkshp_dealer` VARCHAR(255) NULL,
  `customer_and_accident_in_charge_email_id` VARCHAR(255) NULL,
  `customer_and_accident_in_charge_email_id_remarks` VARCHAR(255) NULL,
  `veh_rep_wkshp_dealer_remarks` VARCHAR(255) NULL,
  `name_wkshp_dealer` VARCHAR(255) NULL,
  `name_wkshp_dealer_remarks` VARCHAR(255) NULL,
  `region_office` VARCHAR(255) NULL,
  `region_office_remarks` VARCHAR(255) NULL,
  `sac_code_wrkshp` VARCHAR(255) NULL,
  `sac_code_wrkshp_remarks` VARCHAR(255) NULL,
  `auto_upt_sac_code` VARCHAR(255) NULL,
  `auto_upt_sac_code_remarks` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));

// add column 
Alter table `ams_uat`.`general_acce_details`
Add Column `customer_and_accident_in_charge_email_id` VARCHAR(255) NULL After `veh_rep_wkshp_dealer`,
Add Column `customer_and_accident_in_charge_email_id_remarks` VARCHAR(255) NULL After `customer_and_accident_in_charge_email_id`;



// Document Status table modified

ALTER TABLE `ams`.`document_status` 
ADD COLUMN `created_at` TIMESTAMP NULL AFTER `ref_id`,
ADD COLUMN `updated_at` TIMESTAMP NULL AFTER `created_at`;



//repair table add column 


Alter table `ams`.`comp_repair_stages`
Add column `repair_work_start_dealer_remarks` VARCHAR(255) NULL AFTER `repair_work_start_dealer`,
Add column `tech_id_mob_remarks` VARCHAR(255) NULL AFTER `tech_id_mob`,
Add column `need_to_be_verify_with_technician_remarks` VARCHAR(255) NULL AFTER `need_to_be_verify_with_technician`,
Add column `detail_damaged_dealer_remarks` VARCHAR(255) NULL AFTER `detail_damaged_dealer`,
Add column `available_at_dealer_remarks` VARCHAR(255) NULL AFTER `available_at_dealer`,
Add column `AOR_need_to_place_remarks` VARCHAR(255) NULL AFTER `AOR_need_to_place`,
Add column `Local_purchase_remarks` VARCHAR(255) NULL AFTER `Local_purchase`,
Add column `Arrange_form_other_branch_remarks` VARCHAR(255) NULL AFTER `Arrange_form_other_branch`,
Add column `TOC_order_remarks` VARCHAR(255) NULL AFTER `TOC_order`,
Add column `sheet_denting_repair_remarks` VARCHAR(255) NULL AFTER `sheet_denting_repair`,
Add column `mech_elec_repair_remarks` VARCHAR(255) NULL AFTER `mech_elec_repair`,
Add column `painting_start_remarks` VARCHAR(255) NULL AFTER `painting_start`,
Add column `painting_start_date_yet_to_collect_remarks` VARCHAR(255) NULL AFTER `painting_start_date_yet_to_collect`,
Add column `cabin_trims_parts_remarks` VARCHAR(255) NULL AFTER `cabin_trims_parts`,
Add column `trim_of_cabin_date_to_collect_remarks` VARCHAR(255) NULL AFTER `trim_of_cabin_date_to_collect`,
Add column `outside_job_remarks` VARCHAR(255) NULL AFTER `outside_job`,
Add column `outside_purpose_remarks` VARCHAR(255) NULL AFTER `outside_purpose`,
Add column `AOR_raised_remarks` VARCHAR(255) NULL AFTER `AOR_raised`,
Add column `so_no_remarks` VARCHAR(255) NULL AFTER `so_no`,
Add column `arrange_mat_remarks` VARCHAR(255) NULL AFTER `arrange_mat`,
Add column `if_yes_no_remarks` VARCHAR(255) NULL AFTER `if_yes_no`,
Add column `receipt_all_parts_remarks` VARCHAR(255) NULL AFTER `receipt_all_parts`,
Add column `intimation_surveyor_remarks` VARCHAR(255) NULL AFTER `intimation_surveyor`,
Add column `supplementary_estimate_remarks` VARCHAR(255) NULL AFTER `supplementary_estimate`,
Add column `supplementary_estimate_val_remarks` VARCHAR(255) NULL AFTER `supplementary_estimate_val`,
Add column `supplementary_inspection_remarks` VARCHAR(255) NULL AFTER `supplementary_inspection`,
Add column `In_Transit_remarks` VARCHAR(255) NULL AFTER `In_Transit`,
Add column `supplementary_written_approval_remarks` VARCHAR(255) NULL AFTER `supplementary_written_approval`,
Add column `inform_to_customer_on_approval_remarks` VARCHAR(255) NULL AFTER `inform_to_customer_on_approval`,
Add column `parts_get_approval_remarks` VARCHAR(255) NULL AFTER `parts_get_approval`,
Add column `repair_completion_remarks` VARCHAR(255) NULL AFTER `repair_completion`,
Add column `inform_to_customer_vehicle_remarks` VARCHAR(255) NULL AFTER `inform_to_customer_vehicle`;

// pre Stage add Column in table 




Alter table `ams`.`comp_pre_app_stages`
Add column `initial_estimate_dealer_remarks` VARCHAR(255) NULL AFTER `initial_estimate_dealer`,
Add column `need_to_verfy_cust_remarks` VARCHAR(255) NULL AFTER `need_to_verfy_cust`,
Add column `initial_estimate_val_dealer_remarks` VARCHAR(255) NULL AFTER `initial_estimate_val_dealer`,
Add column `need_to_verify_cust_remarks` VARCHAR(255) NULL AFTER `need_to_verify_cust`,
Add column `major_minor_dealer_remarks` VARCHAR(255) NULL AFTER `major_minor_dealer`,
Add column `classfy_based_est_amnt_remarks` VARCHAR(255) NULL AFTER `classfy_based_est_amnt`,
Add column `intimation_insurance_dealer_remarks` VARCHAR(255) NULL AFTER `intimation_insurance_dealer`,
Add column `mail_copy_dealer_remarks` VARCHAR(255) NULL AFTER `mail_copy_dealer`,
Add column `surveyor_name_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_name_dealer`,
Add column `surveyor_mob_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_mob_dealer`,
Add column `surveyor_email_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_email_dealer`,
Add column `surveyor_initial_inspection_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_initial_inspection_dealer`,
Add column `need_to_b_vrfy_srvyr_remarks` VARCHAR(255) NULL AFTER `need_to_b_vrfy_srvyr`,
Add column `approval_dismantling_dealer_remarks` VARCHAR(255) NULL AFTER `approval_dismantling_dealer`,
Add column `need_to_b_vrfy_srvyr_als_remarks` VARCHAR(255) NULL AFTER `need_to_b_vrfy_srvyr_als`,
Add column `dismantling_completion_dealer_remarks` VARCHAR(255) NULL AFTER `dismantling_completion_dealer`,
Add column `intimation_surveyor_dealer_remarks` VARCHAR(255) NULL AFTER `intimation_surveyor_dealer`,
Add column `surveyor_second_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_second_dealer`,
Add column `sva_dealer_remarks` VARCHAR(255) NULL AFTER `sva_dealer`,
Add column `surveyor_written_approval_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_written_approval_dealer`,
Add column `dealer_need_to_upload_approval_copy_remarks` VARCHAR(255) NULL AFTER `dealer_need_to_upload_approval_copy`,
Add column `parts_approved_dealer_remarks` VARCHAR(255) NULL AFTER `parts_approved_dealer`,
Add column `customer_approval_dealer_remarks` VARCHAR(255) NULL AFTER `customer_approval_dealer`,
Add column `need_to_verified_with_customer_remarks` VARCHAR(255) NULL AFTER `need_to_verified_with_customer`,
Add column `dealer_need_to_upload_approval_remarks` VARCHAR(255) NULL AFTER `dealer_need_to_upload_approval`,
Add column `intimation_insurance_dealer_adv_remarks` VARCHAR(255) NULL AFTER `intimation_insurance_dealer_adv`,
Add column `mail_copy_ad_pymnt_dealer_remarks` VARCHAR(255) NULL AFTER `mail_copy_ad_pymnt_dealer`,
Add column `apc_time_dealer_remarks` VARCHAR(255) NULL AFTER `apc_time_dealer`,
Add column `need_to_b_vrfy_custmr_als_remarks` VARCHAR(255) NULL AFTER `need_to_b_vrfy_custmr_als`,
Add column `apc_rs_dealer_remarks` VARCHAR(255) NULL AFTER `apc_rs_dealer`,
Add column `need_to_b_vrfy_cust_als_remarks` VARCHAR(255) NULL AFTER `need_to_b_vrfy_cust_als`,
Add column `api_time_dealer_remarks` VARCHAR(255) NULL AFTER `api_time_dealer`,
Add column `api_rs_dealer_remarks` VARCHAR(255) NULL AFTER `api_rs_dealer`;


//post table add column  

Alter table `ams`.`comp_post_app_stages`
Add column `iicfi_remarks` VARCHAR(255) NULL AFTER `iicfi`,
Add column `mail_copy_final_insption_remarks` VARCHAR(255) NULL AFTER `mail_copy_final_insption`,
Add column `conduct_road_test_remarks` VARCHAR(255) NULL AFTER `conduct_road_test`,
Add column `need_to_vrfy_with_customer_remarks` VARCHAR(255) NULL AFTER `need_to_vrfy_with_customer`,
Add column `final_insption_surveyor_remarks` VARCHAR(255) NULL AFTER `final_insption_surveyor`,
Add column `proforma_submission_remarks` VARCHAR(255) NULL AFTER `proforma_submission`,
Add column `receipt_delivery_order_remarks` VARCHAR(255) NULL AFTER `receipt_delivery_order`,
Add column `Need__be_verified_with_Surveyor_remarks` VARCHAR(255) NULL AFTER `Need__be_verified_with_Surveyor`,
Add column `job_card_closed_remarks` VARCHAR(255) NULL AFTER `job_card_closed`,
Add column `bill_value_customer_remarks` VARCHAR(255) NULL AFTER `bill_value_customer`,
Add column `bal_payment_customer_remarks` VARCHAR(255) NULL AFTER `bal_payment_customer`,
Add column `Need_be_verified_Customer_remarks` VARCHAR(255) NULL AFTER `Need_be_verified_Customer`,
Add column `bill_value_insurance_remarks` VARCHAR(255) NULL AFTER `bill_value_insurance`,
Add column `bal_payment_customer_rs_remarks` VARCHAR(255) NULL AFTER `bal_payment_customer_rs`,
Add column `collecting_satisfaction_voucher_remarks` VARCHAR(255) NULL AFTER `collecting_satisfaction_voucher`,
Add column `veh_delivery_customer_remarks` VARCHAR(255) NULL AFTER `veh_delivery_customer`,
Add column `Need_be_verified_Custmr_remarks` VARCHAR(255) NULL AFTER `Need_be_verified_Custmr_`,
Add column `bal_pymnt_ins_remarks` VARCHAR(255) NULL AFTER `bal_pymnt_ins`,
Add column `bal_pymnt_ins_rs_remarks` VARCHAR(255) NULL AFTER `bal_pymnt_ins_rs`,
Add column `gate_pass_remarks` VARCHAR(255) NULL AFTER `gate_pass`;



// pre Approvel delay Annalysys 


Alter table `ams`.`comp_pre_app_delays`
Add column `delay_prepare_dealer_remarks` VARCHAR(255) NULL AFTER `delay_prepare_dealer`,
Add column `delay_submsn_docs_remarks` VARCHAR(255) NULL AFTER `delay_submsn_docs`,
Add column `surveyor_deputation_dealer_remarks` VARCHAR(255) NULL AFTER `surveyor_deputation_dealer`,
Add column `delay_surveyor_deputation_remarks` VARCHAR(255) NULL AFTER `delay_surveyor_deputation`,
Add column `approval_dismantling_surveyor_remarks` VARCHAR(255) NULL AFTER `approval_dismantling_surveyor`,
Add column `delay_dismantling_completion_remarks` VARCHAR(255) NULL AFTER `delay_dismantling_completion`,
Add column `intimation_to_surveyor_for_second_inspection_remarks` VARCHAR(255) NULL AFTER `intimation_to_surveyor_for_second_inspection`,
Add column `delay_surveyor_completion_remarks` VARCHAR(255) NULL AFTER `delay_surveyor_completion`,
Add column `surveyor_approval_remarks` VARCHAR(255) NULL AFTER `surveyor_approval`,
Add column `approval_delay_remarks` VARCHAR(255) NULL AFTER `approval_delay`,
Add column `advance_payment_delay_remarks` VARCHAR(255) NULL AFTER `advance_payment_delay`,
Add column `delay_intimation_nsurance_remarks` VARCHAR(255) NULL AFTER `delay_intimation_nsurance`,
Add column `advance_payment_delay_ins_remarks` VARCHAR(255) NULL AFTER `advance_payment_delay_ins`,
Add column `pre_delay_dealer_remarks` VARCHAR(255) NULL AFTER `pre_delay_dealer`,
Add column `pre_delay_customer_remarks` VARCHAR(255) NULL AFTER `pre_delay_customer`,
Add column `pre_surveyor_company_remarks` VARCHAR(255) NULL AFTER `pre_surveyor_company`,
Add column `created_at` timestamp NOT NULL AFTER `pre_surveyor_company_remarks`,
Add column `updated_at` timestamp NOT NULL AFTER `created_at`;

// post Approval  analysys

Alter table `ams`.`comp_post_approval_delays`
Add column `delay_final_inspection_remarks` varchar(255) null after `delay_final_inspection`,
Add column `delay_road_test_remarks` varchar(255) null after `delay_road_test`,
Add column `delay_final_inspection_surveyor_remarks` varchar(255) null after `delay_final_inspection_surveyor`,
Add column `delay_submission_invoice_remarks` varchar(255) null after `delay_submission_invoice`,
Add column `receipt_delivery_report_remarks` varchar(255) null after `receipt_delivery_report`,
Add column `job_card_open_close_remarks` varchar(255) null after `job_card_open_close`,
Add column `delay_final_payment_customer_remarks` varchar(255) null after `delay_final_payment_customer`,
Add column `delay_collect_vehicle_remarks` varchar(255) null after `delay_collect_vehicle`,
Add column `delay_final_payment_insurance_remarks` varchar(255) null after `delay_final_payment_insurance`,
Add column `vehicle_inward_wards_remarks` varchar(255) null after `vehicle_inward_wards`,
Add column `gigo_remarks` varchar(255) null after `gigo`,
Add column `post_delay_dealer_remarks` varchar(255) null after `post_delay_dealer`,
Add column `post_delay_customer_remarks` varchar(255) null after `post_delay_customer`,
Add column `post_surveyor_company_remarks` varchar(255) null after `post_surveyor_company`,
Add column `created_at` timestamp not null after `post_surveyor_company_remarks`,
Add column `updated_at` timestamp not null after `created_at`;


// Repair Approval analysys

Alter table  `ams`.`comp_repair_delays`
Add column `delay_start_remarks` varchar(255) null after `delay_start`,
Add column `Manpower_remarks` varchar(255) null after `Manpower`,
Add column `Crane_facility_remarks` varchar(255) null after `Crane_facility`,
Add column `Power_not_available_remarks` varchar(255) null after `Power_not_available`,
Add column `Equipment_remarks` varchar(255) null after `Equipment`,
Add column `delay_preparing_remarks` varchar(255) null after `delay_preparing`,
Add column `AOR_need_place_remarks` varchar(255) null after `AOR_need_place`,
Add column `In_Transit_remarks` varchar(255) null after `In_Transit_`,
Add column `Local_purchase_remarks` varchar(255) null after `Local_purchase_`,
Add column `Arrange_form_other_branch_remarks` varchar(255) null after `Arrange_form_other_branch_`,
Add column `TOC_order_remarks` varchar(255) null after `TOC_order_`,
Add column `no_days_taken_metal_remarks` varchar(255) null after `no_days_taken_metal`,
Add column `no_days_taken_works_remarks` varchar(255) null after `no_days_taken_works`,
Add column `no_days_taken_painting_remarks` varchar(255) null after `no_days_taken_painting`,
Add column `no_days_taken_cabin_remarks` varchar(255) null after `no_days_taken_cabin`,
Add column `repair_receipt_all_parts_remarks` varchar(255) null after `repair_receipt_all_parts`,
Add column `_AOR_need_place_remarks` varchar(255) null after `_AOR_need_place`,
Add column `_In_Transit_remarks` varchar(255) null after `_In_Transit_`,
Add column `_Local_purchase_remarks` varchar(255) null after `_Local_purchase_`,
Add column `_Arrange_form_other_branch_remarks` varchar(255) null after `_Arrange_form_other_branch_`,
Add column `_TOC_order_remarks` varchar(255) null after `_TOC_order_`,
Add column `repair_outside_job_remarks` varchar(255) null after `repair_outside_job`,
Add column `delay_supp_estimate_remarks` varchar(255) null after `delay_supp_estimate`,
Add column `delay_report_workshop_remarks` varchar(255) null after `delay_report_workshop`,
Add column `delay_approval_supp_est_remarks` varchar(255) null after `delay_approval_supp_est`,
Add column `approval_delay_customer_remarks` varchar(255) null after `approval_delay_customer`,
Add column `repair_completion_bibo_remarks` varchar(255) null after `repair_completion_bibo`,
Add column `inform_to_customer_work_completed_remarks` varchar(255) null after `inform_to_customer_work_completed`,
Add column `repaire_delay_customer_remarks` varchar(255) null after `repaire_delay_customer`,
Add column `repaire_surveyor_company_remarks` varchar(255) null after `repaire_surveyor_company`,
Add column `created_at` timestamp not null after `repaire_surveyor_company_remarks`,
Add column `updated_at` timestamp not null after `created_at`;



ALTER TABLE `ams`.`document_status` 
ADD COLUMN `Claim_Form_remarks` VARCHAR(255) NULL AFTER `remarks`,
ADD COLUMN `KYC_remarks` VARCHAR(255) NULL AFTER `Claim_Form_remarks`,
ADD COLUMN `aadhar_remarks` VARCHAR(255) NULL AFTER `KYC_remarks`,
ADD COLUMN `pan_remarks` VARCHAR(255) NULL AFTER `aadhar_remarks`,
ADD COLUMN `Policy_remarks` VARCHAR(255) NULL AFTER `pan_remarks`,
ADD COLUMN `DL_remarks` VARCHAR(255) NULL AFTER `Policy_remarks`,
ADD COLUMN `National_Permit_remarks` VARCHAR(255) NULL AFTER `DL_remarks`,
ADD COLUMN `road_tax_remarks` VARCHAR(255) NULL AFTER `National_Permit_remarks`,
ADD COLUMN `fitness_remarks` VARCHAR(255) NULL AFTER `road_tax_remarks`,
ADD COLUMN `registration_remarks` VARCHAR(255) NULL AFTER `fitness_remarks`,
ADD COLUMN `form23_remarks` VARCHAR(255) NULL AFTER `registration_remarks`,
ADD COLUMN `all_doc_submitted_remarks` VARCHAR(255) NULL AFTER `form23_remarks`,
ADD COLUMN `last_doc_submitted_date_remarks` VARCHAR(255) NULL AFTER `all_doc_submitted_remarks`,
ADD COLUMN `spot_surveyor_name_remarks` VARCHAR(255) NULL AFTER `last_doc_submitted_date_remarks`,
ADD COLUMN `spot_surveyor_mobile_remarks` VARCHAR(255) NULL AFTER `spot_surveyor_name_remarks`,
ADD COLUMN `spot_surveyor_email_remarks` VARCHAR(255) NULL AFTER `spot_surveyor_mobile_remarks`,
ADD COLUMN `spot_surveyor_reportl_remarks` VARCHAR(255) NULL AFTER `spot_surveyor_email_remarks`,
ADD COLUMN `towing_bill_remarks` VARCHAR(255) NULL AFTER `spot_surveyor_reportl_remarks`,
ADD COLUMN `load_challan_remarks` VARCHAR(255) NULL AFTER `towing_bill_remarks`,
ADD COLUMN `dec_letter_remarks` VARCHAR(255) NULL AFTER `load_challan_remarks`,
ADD COLUMN `veh_ins_report_remarks` VARCHAR(255) NULL AFTER `dec_letter_remarks`,
ADD COLUMN `fire_brigade_report_remarks` VARCHAR(255) NULL AFTER `veh_ins_report_remarks`,
ADD COLUMN `non_trace_cert_remarks` VARCHAR(255) NULL AFTER `fire_brigade_report_remarks`,
ADD COLUMN `fir_copy_remarks` VARCHAR(255) NULL AFTER `non_trace_cert_remarks`,
ADD COLUMN `postmortem_report_remarks` VARCHAR(255) NULL AFTER `fir_copy_remarks`,
ADD COLUMN `document_statuscol` VARCHAR(255) NULL AFTER `postmortem_report_remarks`;

//repair  table add column  callcenter data

Alter table `ams`.`comp_repair_stages`
Add column `repair_work_start_dealer_callcenter` VARCHAR(255) NULL AFTER `repair_work_start_dealer`,
Add column `tech_id_mob_callcenter` VARCHAR(255) NULL AFTER `tech_id_mob`,
Add column `need_to_be_verify_with_technician_callcenter` VARCHAR(255) NULL AFTER `need_to_be_verify_with_technician`,
Add column `detail_damaged_dealer_callcenter` VARCHAR(255) NULL AFTER `detail_damaged_dealer`,
Add column `available_at_dealer_callcenter` VARCHAR(255) NULL AFTER `available_at_dealer`,
Add column `AOR_need_to_place_callcenter` VARCHAR(255) NULL AFTER `AOR_need_to_place`,
Add column `Local_purchase_callcenter` VARCHAR(255) NULL AFTER `Local_purchase`,
Add column `Arrange_form_other_branch_callcenter` VARCHAR(255) NULL AFTER `Arrange_form_other_branch`,
Add column `TOC_order_callcenter` VARCHAR(255) NULL AFTER `TOC_order`,
Add column `sheet_denting_repair_callcenter` VARCHAR(255) NULL AFTER `sheet_denting_repair`,
Add column `mech_elec_repair_callcenter` VARCHAR(255) NULL AFTER `mech_elec_repair`,
Add column `painting_start_callcenter` VARCHAR(255) NULL AFTER `painting_start`,
Add column `painting_start_date_yet_to_collect_callcenter` VARCHAR(255) NULL AFTER `painting_start_date_yet_to_collect`,
Add column `cabin_trims_parts_callcenter` VARCHAR(255) NULL AFTER `cabin_trims_parts`,
Add column `trim_of_cabin_date_to_collect_callcenter` VARCHAR(255) NULL AFTER `trim_of_cabin_date_to_collect`,
Add column `outside_job_callcenter` VARCHAR(255) NULL AFTER `outside_job`,
Add column `outside_purpose_callcenter` VARCHAR(255) NULL AFTER `outside_purpose`,
Add column `AOR_raised_callcenter` VARCHAR(255) NULL AFTER `AOR_raised`,
Add column `so_no_callcenter` VARCHAR(255) NULL AFTER `so_no`,
Add column `arrange_mat_callcenter` VARCHAR(255) NULL AFTER `arrange_mat`,
Add column `if_yes_no_callcenter` VARCHAR(255) NULL AFTER `if_yes_no`,
Add column `receipt_all_parts_callcenter` VARCHAR(255) NULL AFTER `receipt_all_parts`,
Add column `intimation_surveyor_callcenter` VARCHAR(255) NULL AFTER `intimation_surveyor`,
Add column `supplementary_estimate_callcenter` VARCHAR(255) NULL AFTER `supplementary_estimate`,
Add column `supplementary_estimate_val_callcenter` VARCHAR(255) NULL AFTER `supplementary_estimate_val`,
Add column `supplementary_inspection_callcenter` VARCHAR(255) NULL AFTER `supplementary_inspection`,
Add column `In_Transit_callcenter` VARCHAR(255) NULL AFTER `In_Transit`,
Add column `supplementary_written_approval_callcenter` VARCHAR(255) NULL AFTER `supplementary_written_approval`,
Add column `inform_to_customer_on_approval_callcenter` VARCHAR(255) NULL AFTER `inform_to_customer_on_approval`,
Add column `parts_get_approval_callcenter` VARCHAR(255) NULL AFTER `parts_get_approval`,
Add column `repair_completion_callcenter` VARCHAR(255) NULL AFTER `repair_completion`,
Add column `inform_to_customer_vehicle_callcenter` VARCHAR(255) NULL AFTER `inform_to_customer_vehicle`;

// pre Stage add Column in table callcenter data

Alter table `ams`.`comp_pre_app_stages`
Add column `initial_estimate_dealer_callcenter` VARCHAR(255) NULL AFTER `initial_estimate_dealer`,
Add column `need_to_verfy_cust_callcenter` VARCHAR(255) NULL AFTER `need_to_verfy_cust`,
Add column `initial_estimate_val_dealer_callcenter` VARCHAR(255) NULL AFTER `initial_estimate_val_dealer`,
Add column `need_to_verify_cust_callcenter` VARCHAR(255) NULL AFTER `need_to_verify_cust`,
Add column `major_minor_dealer_callcenter` VARCHAR(255) NULL AFTER `major_minor_dealer`,
Add column `classfy_based_est_amnt_callcenter` VARCHAR(255) NULL AFTER `classfy_based_est_amnt`,
Add column `intimation_insurance_dealer_callcenter` VARCHAR(255) NULL AFTER `intimation_insurance_dealer`,
Add column `mail_copy_dealer_callcenter` VARCHAR(255) NULL AFTER `mail_copy_dealer`,
Add column `surveyor_name_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_name_dealer`,
Add column `surveyor_mob_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_mob_dealer`,
Add column `surveyor_email_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_email_dealer`,
Add column `surveyor_initial_inspection_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_initial_inspection_dealer`,
Add column `need_to_b_vrfy_srvyr_callcenter` VARCHAR(255) NULL AFTER `need_to_b_vrfy_srvyr`,
Add column `approval_dismantling_dealer_callcenter` VARCHAR(255) NULL AFTER `approval_dismantling_dealer`,
Add column `need_to_b_vrfy_srvyr_als_callcenter` VARCHAR(255) NULL AFTER `need_to_b_vrfy_srvyr_als`,
Add column `dismantling_completion_dealer_callcenter` VARCHAR(255) NULL AFTER `dismantling_completion_dealer`,
Add column `intimation_surveyor_dealer_callcenter` VARCHAR(255) NULL AFTER `intimation_surveyor_dealer`,
Add column `surveyor_second_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_second_dealer`,
Add column `sva_dealer_callcenter` VARCHAR(255) NULL AFTER `sva_dealer`,
Add column `surveyor_written_approval_dealer_callcenter` VARCHAR(255) NULL AFTER `surveyor_written_approval_dealer`,
Add column `dealer_need_to_upload_approval_copy_callcenter` VARCHAR(255) NULL AFTER `dealer_need_to_upload_approval_copy`,
Add column `parts_approved_dealer_callcenter` VARCHAR(255) NULL AFTER `parts_approved_dealer`,
Add column `customer_approval_dealer_callcenter` VARCHAR(255) NULL AFTER `customer_approval_dealer`,
Add column `need_to_verified_with_customer_callcenter` VARCHAR(255) NULL AFTER `need_to_verified_with_customer`,
Add column `dealer_need_to_upload_approval_callcenter` VARCHAR(255) NULL AFTER `dealer_need_to_upload_approval`,
Add column `intimation_insurance_dealer_adv_callcenter` VARCHAR(255) NULL AFTER `intimation_insurance_dealer_adv`,
Add column `mail_copy_ad_pymnt_dealer_callcenter` VARCHAR(255) NULL AFTER `mail_copy_ad_pymnt_dealer`,
Add column `apc_time_dealer_callcenter` VARCHAR(255) NULL AFTER `apc_time_dealer`,
Add column `need_to_b_vrfy_custmr_als_callcenter` VARCHAR(255) NULL AFTER `need_to_b_vrfy_custmr_als`,
Add column `apc_rs_dealer_callcenter` VARCHAR(255) NULL AFTER `apc_rs_dealer`,
Add column `need_to_b_vrfy_cust_als_callcenter` VARCHAR(255) NULL AFTER `need_to_b_vrfy_cust_als`,
Add column `api_time_dealer_callcenter` VARCHAR(255) NULL AFTER `api_time_dealer`,
Add column `api_rs_dealer_callcenter` VARCHAR(255) NULL AFTER `api_rs_dealer`;

//post table add column   callcenter data

Alter table `ams`.`comp_post_app_stages`
Add column `iicfi_callcenter` VARCHAR(255) NULL AFTER `iicfi`,
Add column `mail_copy_final_insption_callcenter` VARCHAR(255) NULL AFTER `mail_copy_final_insption`,
Add column `conduct_road_test_callcenter` VARCHAR(255) NULL AFTER `conduct_road_test`,
Add column `need_to_vrfy_with_customer_callcenter` VARCHAR(255) NULL AFTER `need_to_vrfy_with_customer`,
Add column `final_insption_surveyor_callcenter` VARCHAR(255) NULL AFTER `final_insption_surveyor`,
Add column `proforma_submission_callcenter` VARCHAR(255) NULL AFTER `proforma_submission`,
Add column `receipt_delivery_order_callcenter` VARCHAR(255) NULL AFTER `receipt_delivery_order`,
Add column `Need__be_verified_with_Surveyor_callcenter` VARCHAR(255) NULL AFTER `Need__be_verified_with_Surveyor`,
Add column `job_card_closed_callcenter` VARCHAR(255) NULL AFTER `job_card_closed`,
Add column `bill_value_customer_callcenter` VARCHAR(255) NULL AFTER `bill_value_customer`,
Add column `bal_payment_customer_callcenter` VARCHAR(255) NULL AFTER `bal_payment_customer`,
Add column `bill_value_insurance_callcenter` VARCHAR(255) NULL AFTER `bill_value_insurance`,
Add column `bal_payment_customer_rs_callcenter` VARCHAR(255) NULL AFTER `bal_payment_customer_rs`,
Add column `Need_be_verified_Customer_callcenter` VARCHAR(255) NULL AFTER `Need_be_verified_Customer_`,
Add column `collecting_satisfaction_voucher_callcenter` VARCHAR(255) NULL AFTER `collecting_satisfaction_voucher`,
Add column `veh_delivery_customer_callcenter` VARCHAR(255) NULL AFTER `veh_delivery_customer`,
Add column `Need_be_verified_Custmr_callcenter` VARCHAR(255) NULL AFTER `Need_be_verified_Custmr_`,
Add column `bal_pymnt_ins_callcenter` VARCHAR(255) NULL AFTER `bal_pymnt_ins`,
Add column `bal_pymnt_ins_rs_callcenter` VARCHAR(255) NULL AFTER `bal_pymnt_ins_rs`,
Add column `gate_pass_callcenter` VARCHAR(255) NULL AFTER `gate_pass`;

// post_service_feedback

CREATE TABLE `ams_uat`.`post_service_feedback` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quality_of_work` VARCHAR(20) NULL,
  `quality_of_work_remarks` VARCHAR(255) NULL,
  `labour_work_satisfied` VARCHAR(20) NULL,
  `labour_work_satisfied_remarks` VARCHAR(255) NULL,
  `vehicle_deliverd_on_time` VARCHAR(20) NULL,
  `vehicle_deliverd_on_time_remarks` VARCHAR(255) NULL,
  `liked_most_about_the_servicing_remarks` VARCHAR(255) NULL,
  `suggest_to_the_improve_the_services_remarks` VARCHAR(255) NULL,
  `Is_there_any_other_feedback` VARCHAR(255) NULL,
  `liked_most_about_the_servicing_services` VARCHAR(255) NULL,
  `comfortable_overall_process_remarks` VARCHAR(255) NULL,
  `job_card_id` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`));



  CREATE TABLE `ams`.`user_log` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` VARCHAR(45) NULL,
  `updated_by` VARCHAR(45) NULL,
  `label` VARCHAR(45) NULL,
  `updated_data` VARCHAR(255) NULL,
  `created_at` TIMESTAMP,
  `updated_at` TIMESTAMP,
  PRIMARY KEY (`id`));