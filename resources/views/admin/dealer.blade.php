

@extends("layouts.adminlayout")
@section('title','Dealer')
@section('bodycontent')
<head>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
	<div class="content-wrapper mobcss">
        <div class="card">
            <div class="card-body">
                @if (Request::segment(3) != '')
                 <?php  $data = App\Models\User::where('id', Request::segment(3))->get(); ?>
                <h4 class="card-title">{{ $data[0]->name }} ({{ $data[0]->role }})</h4>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table display" id="callerlisting">
                            <thead>

                              <tr>
								<th>Actions</th> 
                                <th>Job card No</th>
                                <th>Plant Name</th>
                                <th>SAC Code</th>
                                <th>Accident In charge Name</th>
                                <th>Accident In charge contact Number</th>
                                <th>Zone</th>
								
                              </tr>
                            </thead>
                            <tbody>
							@php $i= 0; @endphp
							@isset($amsDetails)
                            @foreach ($amsDetails as $get_data)
                            @php 
								$rowId = base64_encode($get_data->id);
							@endphp
                              <tr>
								<td>
									<a href="{{route('jobcard-delete.jobcardDelete', ['id' => $get_data->id])}}" onclick="return confirm('Do you want to delete?')">
										<i class="fa fa-trash-o" aria-hidden="true" style="cursor: pointer;"></i>
									</a>
								</td> 
                                <td>
									<a href="{{ route('update-case',['id' =>$rowId] ) }}" class="btn btn-sm btn-primary" target="_blank" style="border-radius: 10px;"> {{ $get_data->Job_card_No }} </a>  
								</td>
                                <td>{{ $get_data->Plant_Name }}</td>

                                <td>{{ $get_data->SAC_Code }}</td>
                                <td>{{ $get_data->Accident_In_charge_Name }}</td>
                                <td>{{ $get_data->Accident_In_charge_contact_Number }}</td>
                                <td>{{ $get_data->Zone }}</td>
                                
                              </tr>
                              @endforeach
							  @endisset

                            </tbody>
                          </table>

                   </div>
                   @if (Request::segment(3) != '')
                 <button type="button" style="margin-left:45%" class="btn btn-primary" onclick="assAgentByCheck()">submit</button>
                 @endif
                </div>
            </div>
        </div>
    </div>

<script>

$("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>


    <script>



const assAgentByCheck = () => {

  $('input[name^="ticket_id"]:checked').each(function() {
  
	 let filed_value = $(this).val();
	 let tl_id = '{{Auth::user()->id}}';
	 let agent_id = '{{Request::segment(3)}}';
	 let id = filed_value;
	 let makeUrl = "{{route('updateAssgnTicketAgent')}}";
	// let makeUrl = "{{url('api/operation/0?tl_id='.Auth::user()->id.'&agent_id='.Request::segment(3).'&id=')}}"+filed_value;
    //alert(makeUrl);
     var settings = {
           "url": makeUrl,
           "method": "GET",
		   "data":{ 
					"tl_id": tl_id, 
					"agent_id": agent_id, 
					"id": id
                  },
           "timeout": 0,
    };
    $.ajax(settings).done(function (response) {console.log(response);

        $(`#ticket_id_${filed_value}`).remove();
        $(`#view_status_${filed_value}`).css("display", "block").text(`Assigned Succesfully `);
        $(`#as_status_${filed_value}`).css({"display" : "block", "color": "green"}).text(`ASSIGN`);

     });


    });

}
const  assAgent = (value, count) =>{
	alert(count);
	// let filed_value = $(this).val();
	 let tl_id = '{{Auth::user()->id}}';
	 let agent_id = value;
	 let id = count;
	 let makeUrl = "{{route('updateAssgnTicketAgent')}}";


// var settings = {
//            "url": `http://45.79.123.250/ams/public/api/operation/0?tl_id={{ Auth::user()->id }}&agent_id=${value}&id=${count}`,
//            "method": "PUT",
//            "timeout": 0,
//     };

var settings = {
           "url": makeUrl,
           "method": "GET",
		   "data":{ 
					"tl_id": tl_id, 
					"agent_id": agent_id, 
					"id": id
                  },
           "timeout": 0,
    };

$.ajax(settings).done(function (response) {
    $(`#view_status_${count}`).css("display", "block").text(`Assigned Succesfully (${value})`);
    $(`#as_status_${count}`).css({"display" : "block", "color": "green"}).text(`ASSIGN`);
    $(`#ticket_id_${count}`).remove();
});




}
    </script>

<script>
	function bulkUpload(){
		$("#sh").slideToggle();
	}
	function addWorkingHour(param1,param2,param3){
		var workingHour = 'Mon - Fri : '+param1+', Sat : '+param2+', Sun : '+param3;
		$('#working_hours').val(workingHour);
	}
	function getSubDealer(e){
		if (e=='Site Support') {
			$('#sub_dealer_div').show();
			$('#type_support_div').show();
		}else{
			$('#sub_dealer_div').hide();
			$('#type_support_div').hide();
		}
	}

/*fn_get_zone('');
function fn_get_zone(el)
{

		$.ajax({ url: '{{url("get-zone2")}}',
			 success: function(data) {
				 var Result = data.split(",");var str = ''; // Central,East,North,South,West
				 Result.pop();
				 var mith = el.split(","); // East,Central
				 for (item in Result)
				  {
					 if (el!='')
					 {
				  			if (jQuery.inArray(Result[item], mith)!='-1')
							{
							str += "<option value='" + Result[item] + "' selected>" + Result[item] + "</option>";
							}
							else
							{
							str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
							}
					}
					 else
					  {
						 str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
					 }
				 }
	//document.getElementById('Zone').innerHTML = "<optgroup><option value='NA'>--Select--</option>" + str + "</optgroup>";
			 }
		 });
	}*/
function EditDealer(el){
	var dealername =$(el).parents('td').parents('tr').find('.cls_dealername').text();
	var phone =$(el).parents('td').parents('tr').find('.cls_phone').text();
	var address =$(el).parents('td').parents('tr').find('.cls_address').text();
	var pincode =$(el).parents('td').parents('tr').find('.cls_pincode').text();
	var zone =$(el).parents('td').parents('tr').find('.cls_zone').text();
	var state =$(el).parents('td').parents('tr').find('.cls_state').text();
	var city =$(el).parents('td').parents('tr').find('.cls_city').text();
	var latitude =$(el).parents('td').parents('tr').find('.cls_latitude').text();
	var longitude =$(el).parents('td').parents('tr').find('.cls_longitude').text();

	var plant_code =$(el).parents('td').parents('tr').find('.cls_plant_code').text();
	var sac_code =$(el).parents('td').parents('tr').find('.cls_sac_code').text();
	var mail =$(el).parents('td').parents('tr').find('.cls_mail').text();
	var working_mon_fri =$(el).parents('td').parents('tr').find('.cls_working_mon_fri').text();
	var working_sat =$(el).parents('td').parents('tr').find('.cls_working_sat').text();
	var working_sun =$(el).parents('td').parents('tr').find('.cls_working_sun').text();
	var working_hours =$(el).parents('td').parents('tr').find('.cls_working_hours').text();
	var sunday_working =$(el).parents('td').parents('tr').find('.cls_sunday_working').text();
	var dealer_type =$(el).parents('td').parents('tr').find('.cls_dealer_type').text();

	var SC_State_Name =$(el).parents('td').parents('tr').find('.cls_SC_State_Name').text();
	var SC_City_Name =$(el).parents('td').parents('tr').find('.cls_SC_City_Name').text();
	var bsvi =$(el).parents('td').parents('tr').find('.cls_bsvi').text();
	var area_champion =$(el).parents('td').parents('tr').find('.cls_area_champion').text();
	var region_champion =$(el).parents('td').parents('tr').find('.cls_region_champion').text();
	var flg=$(el).parents('td').parents('tr').find('.cls_flag').text();
	if(flg.trim()=='Active'){
		flg='1';
	}else{
		flg='0';
	}
	$('#flag').val(flg);
	addWorkingHour(working_mon_fri,working_sat,working_sun);

	$('#DealerName').val(dealername);
	$('#phone').val(phone);
	$('#address').val(address);
	$('#pincode').val(pincode);
	$('#latitude').val(latitude);
	$('#longitude').val(longitude);
	$('#zone').val(zone);

	$('#plant_code').val(plant_code);
	$('#sac_code').val(sac_code);
	$('#working_mon_fri').val(working_mon_fri);
	$('#working_sat').val(working_sat);
	$('#working_sun').val(working_sun);
	$('#working_hours').val(working_hours);
	$('#mail').val(mail);
	$('#sunday_working').val(sunday_working);

	$('#SC_State_Name').val(SC_State_Name);
	$('#SC_City_Name').val(SC_City_Name);
	$('#bsvi').val(bsvi);
	$('#area_champion').val(area_champion);
	$('#region_champion').val(region_champion);
	//alert(dealer_type);
		$('#dealer_type').prop('checked',false);
		$('#dealer_type1').prop('checked',false);
		$('#dealer_type2').prop('checked',false);
		$('#dealer_type3').prop('checked',false);
		$('#dealer_type4').prop('checked',false);
	if(dealer_type == 'ALASC'){
		$('#dealer_type').prop('checked',true);
//		$('#dealer_type1').prop('checked',false);
//		$('#dealer_type2').prop('checked',false);
//		$('#dealer_type3').prop('checked',false);
//		$('#dealer_type4').prop('checked',false);
	}else if(dealer_type == 'DASC'){
		$('#dealer_type1').prop('checked',true);
	}	else if(dealer_type == 'SASSY'){
		$('#dealer_type2').prop('checked',true);
	}else if(dealer_type == 'VD'){
		$('#dealer_type3').prop('checked',true);
	}else if(dealer_type == 'WOW'){
		$('#dealer_type4').prop('checked',true);
	}
//		$('#dealer_type1').prop('checked',false);
//		$('#dealer_type2').prop('checked',false);
//		$('#dealer_type3').prop('checked',false);
//		$('#dealer_type4').prop('checked',false);

//}else{
//		$('#dealer_type1').prop('checked',false);
//		$('#dealer_type').prop('checked',false)
//	}

	$('#DataID').val(el.id);
	//Dealer_get_zone(zone);
	//On_Dealer_Zone(zone,state);
	fn_zone_change(zone,state);
	//Dealer_Reg_Office(zone,state,city);
	Dealer_State_change(zone,state,city);
}
	function fn_zone_change(zoneId,ell){
		$.ajax({ url: '{{url("get-zone-change")}}',
				data: { 'zoneId':zoneId},
				success: function(response){

					var Result = response.split(",");var str = '';
					Result.pop();
					str += "<option value='NA'>--Select--</option>";
					for (item1 in Result) {
					var Result2 = Result[item1].split("~~");
					if (ell!='') {
						if ( Result2[0] == ell ) {
								str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
							}
							else
							{
								str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
							}
					}else{
						str += "<option value='" + Result2[0]+ "'>" + Result2[1] + "</option>";
					}
				}
				document.getElementById('state').innerHTML = str;
				}
		});
	}
</script>
	{{-- <link rel="stylesheet" href="datatable/cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> --}}
	{{-- <link rel="stylesheet" href="datatable/cdn.datatables.net/1.10.12/css/buttons.dataTables.min.css" /> --}}
	{{-- <script src="plugin/jquery/dist/jquery.min.js"></script> --}}
	{{-- <script src="plugin/datatables.net/js/jquery.dataTables.min.js"></script> --}}
	{{-- <script src="datatable/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script> --}}
	{{-- <script src="datatable/ajax/libs/jszip/2.5.0/jszip.min.js"></script> --}}
	{{-- <script src="datatable/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script> --}}
	{{-- <script src="datatable/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('#order-dealer').DataTable({
				dom: 'Bfrtip',
				"language": {
					"paginate": {
						"previous": "<",
						"next": ">"
					}
				},
				buttons: [{
						extend: 'excel',
						text: 'Excel',
						className: 'exportExcel',
						filename: '@yield("title")',
						exportOptions: { columns: [ 1,2,3,4,5,6,7 ] }
					}/*,
							{
						extend: 'csv',
						text: 'CSV',
						className: 'exportExcel',
						filename: 'Test_Csv',
						exportOptions: { modifier: { page: 'all'} }
					},
							{
						extend: 'pdf',
						text: 'PDF',
						className: 'exportExcel',segment
						filename: 'Test_Pdf',
						exportOptions: { modifier: { page: 'all'} }
					}*/]
			});

        });
		function On_Dealer_Zone(el,ell){
			var myarray= [];
			var favorite = [];
			if(ell!='')
			{
            $('#zone :selected').each(function(i, sel)
            {
    			//favorite.push(ell);
			});

			//var zz=favorite.join(",");
			var zz=el;
			}
			else
			{
				 $('#zone :selected').each(function(i, sel){
				favorite.push($(this).val());
				});
				var zz=favorite.join(",");
			}

            $.ajax({ url: '{{url("get-multi-id-reg-office")}}',
            data: { 'zone':zz},
				success: function(data){
					var Result = data.split(",");var str = '';
					Result.pop();
					str += "<option value='NA' selected>--Select--</option>";
					for (item in Result)
					{
						Result2 = Result[item].split("~");
						var mith = ell.split(",");

						if(ell!='')
						{
							if (jQuery.inArray(Result2[0], mith)!='-1') //if(ell==Result[item])
							{
								str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
							}
							else
							{
								str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
							}
						}
						else{
							str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					document.getElementById('reg_office').innerHTML =str;
				}
			});
		}
function Dealer_Reg_Office(el,ell,elll){

	$.ajax({ url: '{{url("get-area-office")}}',
		data: { 'r_id':el,'s_id':ell },
		success: function(data){
		var Result = data.split(",");var str = '';
		Result.pop();
		str += "<option value='NA' selected>--Select--</option>";
		for (item in Result){
			Result2 = Result[item].split("~");
			var mith = elll.split(",");
			if(elll!=''){
				if (jQuery.inArray(Result2[0], mith)!='-1'){
					str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
				}else{
					str += "<option value='" + Result2[0] + "'>" +Result2[1] + "</option>";
				}
			}else{
				str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
			}
		}
		document.getElementById('city').innerHTML = str;
	}});
}

function Dealer_State_change(el,ell,elll)
{

	$.ajax({ url: '{{url("get-state-id-city")}}',
	data: { 'r_id':el,'s_id':ell },
	success: function(data){
	var Result = data.split(",");var str = '';
	Result.pop();
	for (item in Result){
			Result2 = Result[item].split("~");
			var value = elll.split(",");
			if(elll!=''){
				if (jQuery.inArray(Result2[0], value)!='-1'){
					str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
				}else{
					str += "<option value='" + Result2[0] + "'>" +Result2[1] + "</option>";
				}
			}else{
				str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
			}
		}
		document.getElementById('city').innerHTML = str;
	}});
}
    </script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
	// $(document).ready(function() {
	// 	$('#callerlisting').DataTable({
	// 		dom: 'Bfrtip',
	// 		"language": {
	// 			"paginate": {
	// 				"previous": "<",
	// 				"next": ">"
	// 			}
	// 		},
	// 		buttons: [{
	// 				extend: 'excel',
	// 				text: 'Excel',
	// 				className: 'exportExcel',
	// 				filename: '@yield("title")',
	// 				exportOptions: { modifier: { page: 'all'} }
	// 			}]
	// 	});
	// });
    $(document).ready( function () {
    $('#callerlisting').DataTable();
} );

</script>


@endsection
