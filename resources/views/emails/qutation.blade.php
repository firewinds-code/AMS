<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
   <div class="container">
        <div class="card">
          <h6><b>Dear Sir</b></h6>
          @if($row->Repair_work_start_date !='' && $workstart == true)
          <p>Repair work has been started on {{$row->Repair_work_start_date}}</p>
          <p>Mention vehicle report to "Name of the workshop" on "Vehicle reported at workshop"</p>
          @endif
          @if($row->Repair_completion_date != '' && $completion == true)
          <p>Mention vehicle report to "Name of the workshop" on "Vehicle reported at workshop"</p>
          <p>Repair work has been completed on {{$row->Repair_completion_date}}.</p>
          @endif
          @if($row->Job_Card_open_date != '' && $jobcardopen == true)
          <p>Mention vehicle report to "Name of the workshop" on "Vehicle reported at workshop"</p>
          <p>The cost of estimate Rs. @if(isset($row->initial_estimate_val_dealer)) {{$row->initial_estimate_val_dealer}} @else {{__('0')}} @endif 
          <p>Request you submit all related documents and written approval to start of work</p>
          @endif
          <table class="table table-bordered">
            <tr>
                <th colspan="1">Vehicle details</th>
                <th colspan="2"></th>
                <th colspan="1">General Details</th>
                <th colspan="2"></th>
            </tr>
            <tr>
                <td colspan="1">Veh Reg No.</td>
                <td colspan="2">{{$row->Vehicle_Registration_Number}}</td>
                <td colspan="1">Accident in charge Name</td>
                <td colspan="2">{{$row->Accident_In_charge_Name}}</td>
              
            </tr>
            <tr>
                <td colspan="1">Model</td>
                <td colspan="2">{{$row->model}}</td>
                <td colspan="1">Accident in charge Mobile</td>
                <td colspan="2">{{$row->accident_charge_mobile_dealer}}</td>
              
            </tr>
            <tr>
                <td colspan="1">BS6/Non BS6</td>
                <td colspan="2">{{$row->bs_nonbs}}</td> 
                <td colspan="1">SAC Code of the workshop</td>
                <td colspan="2">{{$row->SAC_Code}}</td>
              
            </tr>
            <tr>
                <td colspan="1">Chassis Number</td>
                <td colspan="2">{{$row->Chassis_Number}}</td>
                <td colspan="1">Job Card Open</td>
                <td colspan="2">{{$row->Job_Card_open_date}}</td>
            </tr>
            <tr>
                <td colspan="1">Segment</td>
                <td colspan="2">{{$row->segment}}</td>
                <td colspan="1">Job Card No.</td>
                <td colspan="2">{{$row->Job_card_No}}</td>
            </tr>
            <tr>
                <td colspan="1">Date of Sale</td>
                <td colspan="2">{{$row->date_of_sale}}</td>
                <td colspan="1">Customer Name</td>
                <td colspan="2">{{$row->customer_name}}</td>
            </tr>
            <tr>
                <td colspan="1">Name of the Insurance</td>
                <td colspan="2">{{$row->name_of_the_insurance}}</td>
                <td colspan="1">Customer Contact</td>
                <td colspan="2">{{$row->customer_email_id}}</td>
            </tr>
          </table>
          </div>
        </div>
</body>
</html>








