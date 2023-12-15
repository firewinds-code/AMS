@extends('layouts.masterlayout')
@section('title', 'Create Complaint')
{{-- <link rel="stylesheet" href="{{ asset('css/tab.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<style>
    #pageloader {
        background: rgba(255, 255, 255, 0.8);
        display: none;
        height: 100%;
        position: fixed;
        width: 100%;
        z-index: 9999;
    }

    #pageloader img {
        left: 50%;
        margin-left: -32px;
        margin-top: -32px;
        position: absolute;
        top: 50%;
    }


    * {
        box-sizing: border-box;
    }

    /* Style the search field */
    .example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: right;
        width: 10%;
        background: #f1f1f1;
    }

    /* Style the submit button */
    .example button {
        float: right;
        width: 8%;
        padding: 3px;
        background: #00A6D7;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        /* Prevent double borders */
        cursor: pointer;
    }

    .example button:hover {
        background: #0b7dda;
    }

    /* Clear floats */
    form.example::after {
        content: "";
        clear: both;
        display: table;
    }
</style>
@section('bodycontent')
   
    <div class="content-wrapper mobcss">

        <div id="pageloader">
            <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clear"></div>
                        <h4 class="card-title">Create Complaint</h4>
                      
                        <form name="myFormaa" method="post" id="myFormaa" enctype="multipart/form-data" action="{{route('store-form')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}" />
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Veh Reg No.</label>
                                    <input type="text" name="Vehicle_Registration_Number" id="Vehicle_Registration_Number" class="form-control" readonly
                                        value="{{ $data[0]->Vehicle_Registration_Number }}" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Chassis Number</label>
                                    <input type="text" name="chassis_number" id="chassis_number" class="form-control"
                                        readonly value="{{ $data[0]->Chassis_Number }}" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Plant Name</label>
                                    <input type="text" name="Plant_Name" id="Plant_Name" class="form-control" readonly
                                        value="{{ $data[0]->Plant_Name }}" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>SAC Code</label>
                                    <input type="text" name="SAC_Code" id="SAC_Code" class="form-control"
                                        value="{{ $data[0]->SAC_Code }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Job Card No</label>
                                    <input type="text" name="Job_card_No" id="Job_card_No" class="form-control" readonly
                                        value="{{ $data[0]->Job_card_No }}" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Accident In Charge Name</label>
                                    <input type="text" name="Accident_In_charge_Name" id="Accident_In_charge_Name" class="form-control"
                                        value="{{ $data[0]->Accident_In_charge_Name }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Accident In charge Contact Number</label>
                                    <input type="text" name="Accident_In_charge_contact_Number" id="Accident_In_charge_contact_Number" class="form-control"
                                        value="{{ $data[0]->Accident_In_charge_contact_Number }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zone</label>
                                    <input type="text" name="Zone" id="Zone" class="form-control"
                                        value="{{ $data[0]->Zone }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Area Office</label>
                                    <input type="text" name="Area_Office" id="Area_Office" class="form-control"
                                        value="{{ $data[0]->Area_Office }}" readonly />
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Chassis Number</label>
                                    <input type="text" name="Chassis_Number" id="Chassis_Number" class="form-control"
                                        value="{{ $data[0]->Chassis_Number }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Select ID</label>
                                    <input type="text" name="Select_ID" id="Select_ID" class="form-control"
                                        value="{{ $data[0]->Select_ID }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Select Tier</label>
                                    <input type="text" name="Select_Tier" id="Select_Tier" class="form-control"
                                        value="{{ $data[0]->Select_Tier }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Customer_Name</label>
                                    <input type="text" name="Customer_Name" id="Customer_Name" class="form-control"
                                        value="{{ $data[0]->Customer_Name }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Mode Of Claim</label>
                                    <input type="text" name="Mode_of_Claim" id="Mode_of_Claim" class="form-control"
                                        value="{{ $data[0]->Mode_of_Claim }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Name Of Insurance Company</label>
                                    <input type="text" name="Name_of_Insurance_company" id="Name_of_Insurance_company" class="form-control"
                                        value="{{ $data[0]->Name_of_Insurance_company }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Initial Estimate Value Rs</label>
                                    <input type="text" name="Initial_Estimate_Value_Rs" id="Initial_Estimate_Value_Rs" class="form-control"
                                        value="{{ $data[0]->Initial_Estimate_Value_Rs }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Major Minor Quotation</label>
                                    <input type="text" name="Major_Minor_Quotation" id="Major_Minor_Quotation" class="form-control"
                                        value="{{ $data[0]->Major_Minor_Quotation }}" readonly />
                                </div>
                               
                                <div class="form-group col-md-2">
                                    <label>Surveyor E Mail Id</label>
                                    <input type="text" name="Surveyor_E_mail_id" id="Surveyor_E_mail_id" class="form-control"
                                        value="{{ $data[0]->Surveyor_E_mail_id }}" readonly />
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Quotation Date</label>
                                    <input type="text" name="Quotation_Date" id="Quotation_Date" class="form-control"
                                        value="{{ $data[0]->Quotation_Date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Date Of Accident</label>
                                    <input type="text" name="Date_of_Accident" id="Date_of_Accident" class="form-control"
                                        value="{{ $data[0]->Date_of_Accident }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Vehicle Inward</label>
                                    <input type="text" name="Vehicle_inward" id="Vehicle_inward" class="form-control"
                                        value="{{ $data[0]->Vehicle_inward }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Job Card Open Date</label>
                                    <input type="text" name="Job_Card_open_date" id="Job_Card_open_date" class="form-control"
                                        value="{{ $data[0]->Job_Card_open_date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Documents Submitted</label>
                                    <input type="text" name="Documents_submitted" id="Documents_submitted" class="form-control"
                                        value="{{ $data[0]->Documents_submitted }}" readonly />
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Surveyor Approval For Dismantling</label>
                                    <input type="text" name="Surveyor_approval_for_dismantling" id="Surveyor_approval_for_dismantling" class="form-control"
                                        value="{{ $data[0]->Surveyor_approval_for_dismantling }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Dismantling Completed On</label>
                                    <input type="text" name="Dismantling_completed_on" id="Dismantling_completed_on" class="form-control"
                                        value="{{ $data[0]->Dismantling_completed_on }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Intimation To Surveyor For 2nd Inspecti</label>
                                    <input type="text" name="Intimation_to_surveyor_for_2nd__inspecti" id="Intimation_to_surveyor_for_2nd__inspecti" class="form-control"
                                        value="{{ $data[0]->Intimation_to_surveyor_for_2nd__inspecti }}" readonly />
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Intimation 2 IC For Advance Payment</label>
                                    <input type="text" name="Intimation_2_IC_for_advance_payment" id="Intimation_2_IC_for_advance_payment" class="form-control"
                                        value="{{ $data[0]->Intimation_2_IC_for_advance_payment }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Advance Payment Received OnInsurance</label>
                                    <input type="text" name="Advance_payment_received_onInsurance" id="Advance_payment_received_onInsurance" class="form-control"
                                        value="{{ $data[0]->Advance_payment_received_onInsurance }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Advance Payment Value RsInsurance</label>
                                    <input type="text" name="Advance_payment_Value_RsInsurance" id="Advance_payment_Value_RsInsurance" class="form-control"
                                        value="{{ $data[0]->Advance_payment_Value_RsInsurance }}" readonly />
                                </div>
                                
                               
                                <div class="form-group col-md-2">
                                    <label>Supplementary Estimate Value Rs</label>
                                    <input type="text" name="Supplementary_estimate_Value_Rs" id="Supplementary_estimate_Value_Rs" class="form-control"
                                        value="{{ $data[0]->Supplementary_estimate_Value_Rs }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Supplementary Repair Inspection Date</label>
                                    <input type="text" name="Supplementary_repair_inspection_date" id="Supplementary_repair_inspection_date" class="form-control"
                                        value="{{ $data[0]->Supplementary_repair_inspection_date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Written Approval For Supplementary Est</label>
                                    <input type="text" name="Written_approval_for_supplementary_Est" id="Written_approval_for_supplementary_Est" class="form-control"
                                        value="{{ $data[0]->Written_approval_for_supplementary_Est }}" readonly />
                                </div>
                                
                                
                                <div class="form-group col-md-2">
                                    <label>Post Inspection Final Invoice Submit On</label>
                                    <input type="text" name="Post_inspection_final_invoice_submit_on" id="Post_inspection_final_invoice_submit_on" class="form-control"
                                        value="{{ $data[0]->Post_inspection_final_invoice_submit_on }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Customer Portion Payment Received</label>
                                    <input type="text" name="Customer_Portion_payment_received" id="Customer_Portion_payment_received" class="form-control"
                                        value="{{ $data[0]->Customer_Portion_payment_received }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Customer Payable Amount</label>
                                    <input type="text" name="Customer_payable_amount" id="Customer_payable_amount" class="form-control"
                                        value="{{ $data[0]->Customer_payable_amount }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Final Bill Value</label>
                                    <input type="text" name="Final_Bill_value" id="Final_Bill_value" class="form-control"
                                        value="{{ $data[0]->Final_Bill_value }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Major Minor Final Bill</label>
                                    <input type="text" name="Major_Minor__Final_bill" id="Major_Minor__Final_bill" class="form-control"
                                        value="{{ $data[0]->Major_Minor__Final_bill }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Job Card Closed Date</label>
                                    <input type="text" name="Job_card_closed_Date" id="Job_card_closed_Date" class="form-control"
                                        value="{{ $data[0]->Job_card_closed_Date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Gate Pass Date</label>
                                    <input type="text" name="Gate_Pass_Date" id="Gate_Pass_Date" class="form-control"
                                        value="{{ $data[0]->Gate_Pass_Date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Accidental Stages</label>
                                    <input type="text" name="Accidental_Stages" id="Accidental_Stages" class="form-control"
                                        value="{{ $data[0]->Accidental_Stages }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>No Of Days Taken As On Date</label>
                                    <input type="text" name="No_of_days_taken_as_on_date" id="No_of_days_taken_as_on_date" class="form-control"
                                        value="{{ $data[0]->No_of_days_taken_as_on_date }}" readonly />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>No Of Days Inside The Workshop</label>
                                    <input type="text" name="No_of_days_inside_the_workshop" id="No_of_days_inside_the_workshop" class="form-control"
                                        value="{{ $data[0]->No_of_days_inside_the_workshop }}" readonly />
                                </div>
                            </div>
                            <hr>
                            <div class="tab">
                                <h5><b> Details:</b></h5>
                                <div class="row">
                                    <div class="form-group col-md-2 hide">
                                        <label>Surveyor Name</label>
                                        <input type="text" name="Surveyor_Name" id="Surveyor_Name" class="form-control"
                                            value="{{ $data[0]->Surveyor_Name }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Surveyor Mobile No</label>
                                        <input type="text" name="Surveyor_Mobile_no" id="Surveyor_Mobile_no" class="form-control"
                                            value="{{ $data[0]->Surveyor_Mobile_no }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Registration of certificate (upload)</label>
                                        <input type="text" name="Registration_of_certificate_upload" id="Registration_of_certificate_upload" class="form-control"
                                            value="{{ $data[0]->Registration_of_certificate_upload }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>National Permit A & B (upload)</label>
                                        <input type="text" name="National_Permit_A_B_upload" id="National_Permit_A_B_upload" class="form-control"
                                            value="{{ $data[0]->National_Permit_A_B_upload }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Road Tax (upload)</label>
                                        <input type="text" name="Road_Tax_upload" id="Road_Tax_upload" class="form-control"
                                            value="{{ $data[0]->Road_Tax_upload }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Claim Form (upload)</label>
                                        <input type="text" name="Claim_Form_upload" id="Claim_Form_upload" class="form-control"
                                            value="{{ $data[0]->Claim_Form_upload }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Intimation 2 IC for surveyor deputation</label>
                                        <input type="text" name="Intimation_2_IC_for_surveyor_deputation" id="Intimation_2_IC_for_surveyor_deputation" class="form-control"
                                            value="{{ $data[0]->Intimation_2_IC_for_surveyor_deputation }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Surveyor Initial Inspection Date</label>
                                        <input type="text" name="Surveyor_initial_inspection_date" id="Surveyor_initial_inspection_date" class="form-control"
                                            value="{{ $data[0]->Surveyor_initial_inspection_date }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Salvage Value Agreed By Customer & Ins Co</label>
                                        <input type="text" name="Salvage_value_agreed_by_Customer_Ins_co" id="Salvage_value_agreed_by_Customer_Ins_co" class="form-control"
                                            value="{{ $data[0]->Salvage_value_agreed_by_Customer_Ins_co }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Written work order approval 2 start work</label>
                                        <input type="text" name="Written_work_order_approval_2_start_work" id="Written_work_order_approval_2_start_work" class="form-control"
                                            value="{{ $data[0]->Written_work_order_approval_2_start_work }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Intimation to IC for final inspection</label>
                                        <input type="text" name="Intimation_to_IC_for_final_inspection" id="Intimation_to_IC_for_final_inspection" class="form-control"
                                            value="{{ $data[0]->Intimation_to_IC_for_final_inspection }}" />
                                    </div>
                                    <div class="form-group col-md-2 hide">
                                        <label>Final inspection date</label>
                                        <input type="text" name="Final_inspection_date" id="Final_inspection_date" class="form-control"
                                            value="{{ $data[0]->Final_inspection_date }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Intimation 2 customer for advance payment</label>
                                        <input type="text" name="Intimation_2_customer_for_advance_paymen" id="Intimation_2_customer_for_advance_paymen" class="form-control"
                                            value="{{ $data[0]->Intimation_2_customer_for_advance_paymen }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Advance payment received on(Customer)</label>
                                        <input type="text" name="Advance_payment_received_onCustomer" id="Advance_payment_received_onCustomer" class="form-control"
                                            value="{{ $data[0]->Advance_payment_received_onCustomer }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Advance payment Value Rs.(Customer)</label>
                                        <input type="text" name="Advance_payment_Value_RsCustomer" id="Advance_payment_Value_RsCustomer" class="form-control"
                                            value="{{ $data[0]->Advance_payment_Value_RsCustomer }}" />
                                    </div>
                                     <div class="form-group col-md-2">
                                        <label>Customer written approval 2 start of work</label>
                                        <input type="text" name="Customer_written_approval_2_start_of_wor" id="Customer_written_approval_2_start_of_wor" class="form-control"
                                            value="{{ $data[0]->Customer_written_approval_2_start_of_wor }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Repair work start date</label>
                                        <input type="text" name="Repair_work_start_date" id="Repair_work_start_date" class="form-control"
                                            value="{{ $data[0]->Repair_work_start_date }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Repair completion date</label>
                                        <input type="text" name="Repair_completion_date" id="Repair_completion_date" class="form-control"
                                            value="{{ $data[0]->Repair_completion_date }}" />
                                    </div>
                                    
                                    <div class="form-group col-md-2">
                                        <label>Status</label>
                                        <select name="case_status" id="case_status" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="InProgress" {{ $data[0]->case_status == 'InProgress'?'selected':''}}>In Progress</option>
                                            <option value="Completed" {{ $data[0]->case_status  == 'Completed'?'selected':''}}>Completed</option>   
                                        </select>                                     
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Remarks</label>
                                        <textarea name="remarks" id="remarks" class="form-control">{{ $data[0]->remarks }}</textarea>
                                        
                                    </div>

                                </div>
                                </br>
                                <div class="row justify-content-center">
                                    <div class="col-md-2">
                                        <input type="submit" name="update" id="update" class="btn btn-block btn-info btn-sm" value="Update" />
                                    </div>
                                </div>
                            </div>
                            <br />
                            <hr>
                    </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <span class="btn-primary"  style="padding-left: 5px;padding-right: 5px;padding-top: 2px;padding-bottom: 2px;cursor: pointer;position: relative;top: 13px;" title="History" data-toggle="collapse" data-target=".history" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">History</span> 
                                </p>
                                <div class="collapse multi-collapse history" id="multiCollapseExample2" style="position: relative;top: 10px;">
                                    <div class="card card-body" style="width: 100%;overflow: auto;">
                                        <table style="font-size: 11px;" class="table table-bordered">
                                            <tr>
                                                <th style="text-align: left;">Job Card Number</th>
                                                <th style="text-align: left;">Created By</th>
                                                <th style="text-align: left;">Status</th>
                                                
                                                <th style="text-align: left;">Remarks</th>
                                                <th style="text-align: left;">Date</th>
                                            </tr>
                                            @isset($history)
                                            @foreach($history as $row)
                                            @php
                                            $dataVAlue = json_decode($row->data);
                                            @endphp
                                            <tr>
                                                <td style="text-align: left;">{{$row->Job_card_No}}</td>
                                                <td style="text-align: left;">{{$row->created_by}}</td>
                                                <td style="text-align: left;">{{$dataVAlue->case_status}}</td>
                                                <td style="text-align: left;">{{$dataVAlue->remarks}}</td>
                                                <td style="text-align: left;">{{$row->created_at!=''?date('d-m-Y H:i:s',strtotime($row->created_at)):'NA'}}</td>
                                            </tr>
                                            @endforeach
                                            @endisset

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
       $( document ).ready(function() {
            var Mode_of_Claim = "{{ $data[0]->Mode_of_Claim }}";
            if(Mode_of_Claim == 'Customer'){
                $('.hide').hide();
            }else{
                $('.hide').show();
            }
        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <div id="pageloader">
        <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
    </div>

    
    <script src="{{ asset('js/tab.js') }}"></script>
   
@endsection

<div class="modal">
    <!-- Place at bottom of page -->
</div>
