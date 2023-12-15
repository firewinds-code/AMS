<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Ashok Leyland! @yield("title")</title>
	<script src="{{asset('admincss/js/jquery-min.js')}}"></script>
	{{-- <link rel="stylesheet" href="{{asset('admincss/public/vendors/css/vendor.bundle.base.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('admincss/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('admincss/font-awesome/css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{asset('admincss/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admincss/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
	<script src="{{asset('admincss/js/form_validation.js')}}"></script>
	<!-- endinject -->
	<link rel="shortcut icon" href="{{asset('admincss/images/favicon.png')}}" />
	<link href="{{asset('admincss/css/toastr.min.css')}}" rel="stylesheet">
	<!-- Toastr Css  -->

	{{-- <!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADPkns3qwooRo_1WuhIcr0665fQbHNILU&callback=initMap">--> --}}
	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuorWcaZQX549v-nRkklIBo6_Rm1eMrNM&callback=initMap">
</script>
{{-- <!-- <script src="{{asset('admincss/js/google-map.js')}}"></script> --> --}}
<style>

.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('images/loading.gif') center no-repeat #fff;
}

</style>

</head>
<body>

<!-- Paste this code after body tag -->
	<div class="loader"></div>
	<div class="loader" style="display: none;" id="ajaxLoader"></div>
<!-- Ends -->

<div class="container-scroller">

	<!-- partial:partials/_horizontal-navbar.html -->
	<div class="horizontal-menu">

		<nav class="navbar top-navbar col-lg-12 col-12 p-0">
					<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
						@if(Session::get('role') == '29' || Session::get('role') == '30')
						@php $accessView ='Yes'; @endphp
						@else
						@php $accessView='No'; @endphp
						@endif
						{{-- @if(Session::get('role') == '29' || Session::get('role') == '30') --}}
						{{-- @if(Session::get('user_type_id') == '5')
						<a class="navbar-brand brand-logo" href="{{url('ticket-creation')}}">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						<a class="navbar-brand brand-logo-mini" href="{{url('ticket-creation')}}">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						@elseif(Session::get('user_type_id') == '3')
						<a class="navbar-brand brand-logo" href="{{url('case-list')}}">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						<a class="navbar-brand brand-logo-mini" href="{{url('case-list')}}">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						@else --}}
						<a class="navbar-brand brand-logo" href="#">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						<a class="navbar-brand brand-logo-mini" href="#">
							<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  /></a>
						{{-- @endif --}}
						{{--<h4 class="card-title" style="margin-left: 22px;margin-top: 12px">
							<b>Complaint Management System</b> <br>
							<p style="text-align: left;">Cogent CMS</p> </h4>--}}
					</div>
					<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
						<ul class="navbar-nav navbar-nav-right">
							<!--<li class="nav-item nav-profile">

									<i class="fa fa-question-circle-o fa-1x" aria-hidden="true"></i>

							</li>-->
							{{-- <li class="nav-item nav-profile dropdown">
								<a class="nav-link" href="#" data-toggle="dropdown" id="caseEscalation">
									<i class="fa fa-bell-o fa-1x" aria-hidden="true"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="caseEscalation">
								<p class="dropdown-item" style="border-bottom: 1px solid #ddd;">Case Assigned To Me : {{Session::get('caseAssignCount')}}</p>
								<p class="dropdown-item">Case Escalation : {{Session::get('caseEscalateCount')}}</p>
								</div>
							</li> --}}
							{{-- <li class="nav-item nav-profile dropdown">
								<a class="nav-link" href="#" data-toggle="dropdown" id="moduleLink">
									 <img src="images/faces/face5.jpg" alt="profile"/>
									<i class="fa fa-bars fa-1x" aria-hidden="true"></i>
									<i class="fa fa-th fa-1x" aria-hidden="true"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="moduleLink">
									<a class="dropdown-item" href="{{ url('file-settings') }}">
										<i class="fa fa-cogs"></i>
										Settings
									</a>
									<a class="dropdown-item" href="{{ url('cms') }}">
										Complaint Management System
									</a>
									<div style="border: 0.5px solid #ccc"></div>
									<a class="dropdown-item" href="#">
										Customer Satisfaction Survey
									</a>
									<div style="border: 0.5px solid #ccc"></div>
									<a class="dropdown-item" href="#">
										Vehicle Off-Road
									</a>
									<div style="border: 0.5px solid #ccc"></div>
									<a class="dropdown-item" href="#">
										Volvo Action Survice
									</a>
								</div>
							</li> --}}
							<li class="nav-item nav-profile dropdown">
								<a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
									<!--{{-- <img src="images/faces/face5.jpg" alt="profile"/>--}}-->
									<!--{{--<i class="fa fa-bars fa-1x" aria-hidden="true"></i>--}}-->
									<i class="fa fa-user fa-1x" aria-hidden="true"></i> {{ Auth::user()->name; }}
								</a>
								<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
									<!--{{--<a class="dropdown-item" href="{{ url('file-settings') }}">
										<i class="fa fa-cogs"></i>
										Settings
									</a>--}}-->



                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            <i class="fa fa-lock"></i>
											{{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            {{ method_field('POST') }}
                                            @csrf
                                        </form>

								</div>
							</li>
						</ul>
						<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
							<span class="fa fa-bars"></span>
						</button>
					</div>
			<div class="container">
			</div>
		</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #d8d7d5;">
@if(Route::current()->getName() == 'cms')
    	<i class="fa fa-bars" aria-hidden="true" id="slide-toggle" style="cursor: pointer;"></i><a class="nav-link" style="width: 30%;"><span class="menu-title">Complaint Management System</span></a>
@endif
<div class="container">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!--<ul class="navbar-nav mr-auto">-->
    <ul class="navbar-nav mr-auto"> <!--mr-auto,mx-auto-->
      	<li class="nav-item ">
				{{-- @if(Session::get('role') == '29' || Session::get('role') == '30') --}}
				@if(Auth::user()->role == 'admin')
				 	<a class="nav-link" href="{{url('admin')}}">
						<span class="menu-title">HOME</span>
					</a>
                  @endif
                 @if(Auth::user()->role == 'tl')
					<a class="nav-link" href="{{url('team-leader')}}">
						<span class="menu-title">HOME</span>
					</a>
				@endif

		</li>
        @if (Auth::user()->role != 'admin')
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">HOME
					<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="nav-link" href="{{url('complaint-list')}}"><span class="menu-title">HOME</span>
							</a>

			</div>
		</li>
        @endif
        @if (Auth::user()->role == 'admin')
        <li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">UPLOAD FILE
				<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			{{--<a class="dropdown-item" href="{{url('admin/create')}}">Create Team Leader</a>
			<a class="dropdown-item" href="{{url('admin/teamleader')}}">Teamleader List</a>--}}
             <a class="dropdown-item" href="{{url('admin/uploadcase')}}">Upload Case</a>
            </div>
		</li>
        @endif
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Report
				<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			{{--<a class="dropdown-item" href="{{url('admin/create')}}">Create Team Leader</a>
			<a class="dropdown-item" href="{{url('admin/teamleader')}}">Teamleader List</a>--}}
             <a class="dropdown-item" href="{{url('ams-export-file')}}">Report</a>
            </div>
		</li>
        @if (Auth::user()->role == 'tl')
        <li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">AGENTS
					<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{url('team-leader/create')}}">Create Agents</a>

                <a class="dropdown-item" href="{{url('team-leader/agent')}}">Agents List</a>
            </div>
		</li>
        @endif
		@if(Session::get('role') == '29' || Session::get('role') == '30')
		<li class="nav-item dropdown">
				<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">MASTER PAGE
					<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				{{--
				<a class="dropdown-item" href="{{url('customer-master')}}">Customer Master</a>
				<a class="dropdown-item" href="{{url('area')}}">Location</a>
				<a class="dropdown-item" href="{{url('brand')}}">Brand</a>
				<a class="dropdown-item" href="{{url('complaint-type')}}">Complaint Category</a>
				<a class="dropdown-item" href="{{url('vehicle-models')}}">Manage Vehicle Models</a>
				--}}
				<a class="dropdown-item" href="{{url('users')}}">Manage Users</a>
				<a class="dropdown-item" href="{{url('vehicle')}}">Manage Vehicle </a>
				<a class="dropdown-item" href="{{url('role')}}">Manage Roles</a>
				<a class="dropdown-item" href="{{url('dealer')}}">Manage Dealer</a>
				<a class="dropdown-item" href="{{url('owner-view')}}">Manage Owner</a>
				<a class="dropdown-item" href="{{url('owner-contact-view')}}">Manage Customer Contact</a>
				{{-- <a class="dropdown-item" href="{{url('get-caller-view')}}">Manage Caller</a> --}}
				<a class="dropdown-item" href="{{url('escalation')}}">Manage Escalation</a>
				{{--
				<a class="dropdown-item" href="{{url('user-type')}}">User Type</a>
				<a class="dropdown-item" href="{{url('contact-module')}}">Mode Of Complaint</a>
				<a class="dropdown-item" href="{{url('access')}}">Access</a>
				--}}
			</div>
		</li>
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOCATION
					<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
				@if(Session::get('role') == '29' || Session::get('role') == '30')
				<a class="dropdown-item" href="{{url('region-view')}}">Manage Zone</a>
				<a class="dropdown-item" href="{{url('state-view')}}">Manage Region</a>
				<a class="dropdown-item" href="{{url('city-view')}}">Manage Area</a>
				@endif
				{{-- <a class="dropdown-item" href="{{url('case-list')}}">Case List</a> --}}
			</div>
		</li>
		
		@endif


		@if(Auth::user()->role == 'admin')
		<li class="nav-item dropdown">
			<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Master
				<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			 <a class="dropdown-item" href="{{url('pre-stage-reason')}}">Pre - Approval Stage - Delay Reason</a>
			 <a class="dropdown-item" href="{{url('repair-stage-reason')}}">Repair Stage - Delay Reason</a>
			 <a class="dropdown-item" href="{{url('post-approval-stage')}}">Post Approval Stage - Delay Reason</a>
			 <a class="dropdown-item" href="{{url('major-minor-tat')}}">Major Minor TAT</a>
		   </div>
		</li>
	   @endif
		
		
    </ul>

  </div>
</div>
</nav>

	</div>


	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
		<div class="main-panel">
			@section('bodycontent')
			@show
		</div>
	</div>



	<!-- content-wrapper ends -->
	<!-- partial:../../partials/_footer.html -->
	<footer class="footer">
		<div class="w-100 clearfix">
			@php $curYear = date("Y"); @endphp
			<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{$curYear}}
				<a href="#">Cogent E-services Pvt.Ltd</a>. All rights reserved.</span>
		</div>
	</footer>
	<!-- partial -->
</div>
<!-- main-panel ends -->

<!-- page-body-wrapper ends -->

<!-- container-scroller -->

<!-- base:js -->

{{-- <script src="{{asset('admincss/js/off-canvas.js')}}"></script>
<script src="{{asset('admincss/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admincss/js/template.js')}}"></script> --}}

	<script src="{{asset('admincss/vendors/js/vendor.bundle.base.js')}}"></script>

		{{-- <script src="{{asset('admincss/js/data-table.js')}}"></script> --}}
  <!-- Toastr Js -->
   <script type="text/javascript" src="{{asset('admincss/js/toastr.min.js')}}"></script>
   	<script>
		@if(Session::has('message'))
			var type="{{Session::get('alert-type','info')}}";
			switch(type){
				case 'info':
			         toastr.info("{{ Session::get('message') }}");
			         break;
		        case 'success':
		            toastr.success("{{ Session::get('message') }}");
		            break;
	         	case 'warning':
		            toastr.warning("{{ Session::get('message') }}");
		            break;
		        case 'error':
			        toastr.error("{{ Session::get('message') }}");
			        break;
			}
		@endif
	</script>
	<link rel="stylesheet" href="{{asset('admincss/datatable/css/jquery.dataTables.min.css')}}" />
	<link rel="stylesheet" href="{{asset('admincss/datatable/css/buttons.dataTables.min.css')}}" />
	<script type="text/javascript" src="{{asset('admincss/datatable/js/jquery-1.12.3.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datatable/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datatable/js/dataTables.buttons.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('admincss/datatable/js/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datatable/js/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datatable/js/vfs_fonts.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datatable/js/buttons.html5.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('admincss/datapicker/js/jquery.datetimepicker.js')}}"></script>
	<link rel="stylesheet" href="{{asset('admincss/datapicker/css/jquery.datetimepicker.min.css')}}">
	<script type="text/javascript">
		$(document).ready(function () {

	        $("#slide-toggle").click(function(){
	            $(".box").animate({
	                width: "toggle"
	            });
	        });
			$('#order-listing').DataTable({
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
						exportOptions: { modifier: { page: 'all'} }
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
	</script>


<script type="text/javascript">
$('#complaintcategory').change(function()
	    {
	    	var comp=this.value;
	$.ajax({ url: '{{url("get-complaint-type")}}',
	data: { 'comp':comp },
	success: function(data){
	var Result = data.split(",");var str = '';
	Result.pop();
	for (item in Result)
	{
			str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
	}
	document.getElementById('subcategory').innerHTML =str;
	}});
});
/* fn_get_zone('');
function fn_get_zone(el)
{
		$.ajax({ url: '{{url("get-zone2")}}',
			 success: function(data) {

				 var Result = data.split(",");var str = ''; // Central,East,North,South,West
				 Result.pop();
				 var custIds = new Array(el.trim());
				 var selectedIds = custIds.join(',').split(',');
				 for (item1 in Result) {
					 var Result2 = Result[item1].split("~");
					 if (el!='') {
						 if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
							str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
							}
							else
							{
							str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
							}
					}
					 else
					  {
						 str += "<option value='" + Result2[0]+ "'>" + Result2[1] + "</option>";
					 }
				 }
	document.getElementById('zone').innerHTML = str;
			 }
		 });
	}
 */
function fn_user_type_change(el,ell)
{
		var id='';
		if(ell==''){id=el.value;}else{id=el;}
		if(id == '3'){
			$('#td_dealer_id').show();
			$('#td_dealer_id1').hide();
			$('#td_State').hide();$('#td_City').hide();$('#td_zone').hide();
		}else{
			$('#td_dealer_id').hide();
			$('#td_dealer_id1').show();
			$('#td_State').show();$('#td_City').show();$('#td_zone').show();$('#td_dealer_id').hide();
		}
		if (ell!=''){
			id=el;
		}
		$.ajax({ url: '{{url("get-role")}}',data :{'id':id},
			 success: function(data) {
				var Result = data.split(",");var str = '';
				Result.pop();
				for (item in Result) {
				 	var Result2 = Result[item].split("~");
					if (ell!='') {
						if (ell==Result2['0']) {
							str += "<option value='" + Result2['0'] + "' selected>" + Result2['1'] + "</option>";
						} else {
							str += "<option value='" + Result2['0'] + "'>" + Result2['1'] + "</option>";
						}
					}else {
						str += "<option value='" + Result2['0'] + "'>" + Result2['1'] + "</option>";
					}
				}
				document.getElementById('role').innerHTML =str;
			 }
		 });
	}
function getCcRole(el){

	$.ajax({ url: '{{url("get-cc-role")}}',
	success: function(data){
	var Result = data.split(",");var str = '';
	Result.pop();
		var custIds = new Array(el.trim());
		var selectedIds = custIds.join(',').split(',');
		for (item1 in Result) {
			var Result2 = Result[item1].split("~");
			if (el!='') {
				if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
				str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
				}
				else
				{
				str += "<option value='" + Result2[0] + "'>" +Result2[1] + "</option>";
				}
			}
			else
			{
			str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
			}
	}
	document.getElementById('cc_to').innerHTML =str;
	}});
}
function fn_Zone_change(el,ell){
			var myarray= [];
			var favorite = [];
			if(ell!='')
			{
	            $('#zone :selected').each(function(i, sel)
	            {
	    			//favorite.push($(this).val());
	    			favorite.push(el);
				});
				var zz=favorite.join(",");
			}
			else
			{
				var zz=el;
			}

            $.ajax({ url: '{{url("get-state")}}',data: { 'zone':zz},success: function(data){
			var Result = data.split(",");var str = '';
			Result.pop();
				var custIds = new Array(ell.trim());
				var selectedIds = custIds.join(',').split(',');
			for (item1 in Result) {
					var Result2 = Result[item1].split("~");
				if (ell!='') {
					if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
						str += "<option value='" +Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else
					{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else
				{
					str += "<option value='" +Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			document.getElementById('state').innerHTML = str;
		}
	});
}
function fn_State_change(el,ell,elll)// Zone ID,State ID,Edit
{
	var state = ell;
	var favorite = [];
			if(elll!='')
			{
            $('#state :selected').each(function(i, sel)
            {
    			//favorite.push($(this).val());
    			favorite.push(elll);
			});
			var state=favorite.join(",");
			}
			else
			{
				var state=ell;
			}

	$.ajax({ url: '{{url("get-city")}}',
	data: { 'r_id':el,'s_id':ell },
	success: function(data){

	var Result = data.split(",");var str = '';
	Result.pop();
	for (item in Result)
	{	Result2 = Result[item].split("~");
		var mith = elll.split(",");
		if(elll!='')
			{
				if (jQuery.inArray(Result2[0], mith)!=='-1') //if(ell==Result[item])
				{
				str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
				}
				else
				{
				str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			else
			{
			str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
			}
	}
	document.getElementById('City').innerHTML = str;
	}});
}

function Dealer_Zone_change(el,ell){
	var myarray= [];
	var favorite = [];
	if(ell!=''){
		$('#zone :selected').each(function(i, sel){
		//favorite.push(ell);
		});
		var zz=el;
	}else{
		$('#zone :selected').each(function(i, sel){
		favorite.push($(this).val());
		});
		var zz=favorite.join(",");
	}
	$.ajax({ url: '{{url("get-multi-id-state")}}',data: { 'zone':zz},
		success: function(data){
			console.log(data);
			var Result = data.split(",");var str = '';
			Result.pop();
			for (item in Result){
				Result2 = Result[item].split("~");
				var mith = ell.split(",");
				if(ell!=''){
					if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			document.getElementById('state').innerHTML =str;
		}
	});
}
/* function Dealer_State_change(el,ell,elll)
{

	var favorite = [];
	var AllZone_ = [];
	var AllState_ = [];
			if(elll!='')
			{
			//var state=favorite.join(",");

			AllZone = el;
			AllState=ell;
			}
			else
			{

				$('#zone :selected').each(function(i, sel)
	            {
	    			AllZone_.push($(this).val());
				});
				var AllZone = AllZone_.join(',');

				$('#state :selected').each(function(i, sel)
	            {
	    			AllState_.push($(this).val());
				});

				var AllState = AllState_.join(',');
			}

	//$('#City').val('NA');



	$.ajax({ url: '{{url("get-multi-id-city")}}',
	data: { 'r_id':AllZone,'s_id':AllState },
	success: function(data){
	var Result = data.split(",");var str = '';
	Result.pop();
	for (item in Result)
	{	Result2 = Result[item].split("~");
		var mith = elll.split(",");
		if(elll!='')
			{
				if (jQuery.inArray(Result2[0], mith)!='-1') //if(ell==Result[item])
				{
				str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
				}
				else
				{
				str += "<option value='" + Result2[0] + "'>" +Result2[1] + "</option>";
				}
			}
			else
			{
			str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
			}
	}
	document.getElementById('City').innerHTML = str;
	}});
}
 */
/* function Dealer_get_zone(ell)
{

		$.ajax({ url: '{{url("get-multi-zone")}}',
			 success: function(data) {
				 var Result = data.split(",");var str = '';
				 Result.pop();
				 for (item in Result){
				  	Result2 = Result[item].split("~");

					var mith = ell.split(",");
					if (ell!=''){
			  			if (jQuery.inArray(Result2[0], mith)!='-1')
						{
							$('#zone').val(mith);
						}
					}
				 }
			 }
		 });
	} */
function fn_City_change(el,ell,elll)
{
	$('#Dealer').val('');$('#DealerCode').val('');$('#tdDealerCode').hide();
	var state = el.value;
	var city = ell.value;
	//alert(state+city);
	if(elll!=''){var state = el;var city = ell;}
	$.ajax({ url: '{{url("get-zone")}}',
		data: { 'state':state,'city':city},
		success: function(data){
			var Result = data.split(",");var str = '';
			Result.pop();
			for (item in Result){
				if(elll!=''){
					if(elll==Result[item]){
						str += "<option value='" + Result[item] + "' selected>" + Result[item] + "</option>";
					}
					else{
						str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
				}
			}
			document.getElementById('Zone').innerHTML =str;
		}
	});
}


function get_dealer(zone,state,city,product)
{
	var Zone_ = zone.value;
	var State_ = state.value;
	var City_ = city.value;
	var Product_ = product.value;
	$.ajax({ url: '{{url("get-dealer")}}',
	data: {'zone':Zone_,'state':State_,'city':City_,'product':Product_},
	success: function(data){
	var Result = data.split(",");var str = '';
	Result.pop();
	for (item in Result){
		str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
	}
	document.getElementById('Dealer').innerHTML =str;
	}
	});
	// alert(Zone+State+City+Product);
}
function fn_dealer_change(el,ell,elll,ellll,elllll)
{
	$('#tdDealerCode').hide();
	$('#DealerCode').val('');
	var state = el.value;
	var city = ell.value;
	var zone = elll.value;
	var dealer = ellll.value;
	if(elllll!=''){var state = el;var city = ell;var zone = elll;var dealer = ellll;}
	$.ajax({ url: '{{url("get-dealercode")}}',
	data: { 'state':state,'city':city,'zone':zone,'DN':dealer},
	success: function(data){
		if(elllll!=''){
			$('#tdDealerCode').show();
			$('#DealerCode').val(elllll);
		}
		else{
			$('#tdDealerCode').show();
			$('#DealerCode').val(data);
		}
	}
	});
}
function fun_loc(el)
{
	var  Zone_=el.value;
	$.ajax({ url: '{{url("get-location")}}',
	data: {'zone':Zone_},
	success: function(data){
		var Result = data.split(",");var str = '';
			//Result.pop();
			for (item in Result)
			{
				str += "<option value='" + Result[item] + "'>" + Result[item] + "</option>";
			}
	document.getElementById('location').innerHTML = str;
	}
	});
}

	function fn_get_brand(el){
		$.ajax({ url: '{{url("get-brand")}}',success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();
			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");
					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			document.getElementById('brand').innerHTML = str;
		}
		});
	}
	function fn_get_city_zone_id(el,ell){
		$.ajax({ url: '{{url("get-city-zone-id")}}',data: {'zone_id':el},success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
			Result2 = Result[item].split("~");
				if (ell!=''){
					//var mith = el.split(",");
		  			//if (jQuery.inArray(Result2[0], ell)!='-1'){
		  			if (Result2[0]==ell){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			document.getElementById('city').innerHTML =str;
		}
		});
	}
	function fn_get_product(el){
		$.ajax({ url: '{{url("get-product")}}',success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");
					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}

			document.getElementById('product').innerHTML = str;
		}
		});
	}
	function fn_get_complaint_cat(el){
		$.ajax({ url: '{{url("get-complaint-cat")}}',success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");
					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}

			document.getElementById('complaint_cat').innerHTML = str;
		}
		});
	}
	function fn_get_dealer(el){
		$.ajax({ url: '{{url("get-multi-dealer")}}',success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");
					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}

			document.getElementById('dealer_code_asoc').innerHTML =str;

		}
		});
	}
	function fn_get_scope_Service(el){

		$.ajax({ url: '{{url("get-scope-service")}}',success: function(data) {

			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");

					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}

			document.getElementById('scope_of_services').innerHTML = str;

		}
		});
	}
	function fn_get_support_type(el){
		$.ajax({ url: '{{url("get-support-type")}}',success: function(data) {
			var Result = data.split(",");var str = '';
			Result.pop();
			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");

					var mith = el.split(",");
		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}
			document.getElementById('scope_of_services').innerHTML = str;
		}
		});
	}
	function fn_get_dealer_user(el){
		$.ajax({ url: '{{url("get-multi-dealer")}}',success: function(data) {
					  ;
			var Result = data.split(",");var str = '';
			Result.pop();

			for (item in Result){
				if (el!=''){
					Result2 = Result[item].split("~");
					var mith = el.split(",");

		  			if (jQuery.inArray(Result2[0], mith)!='-1'){
						str += "<option value='" + Result2[0] + "' selected>" + Result2[1] + "</option>";
					}
					else{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
				else{
					str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
				}
			}


			document.getElementById('dealer_id').innerHTML = str;
		}
		});
	}
function fn_product_change(el,ell,segment1,segment2)
{
			$('#segment').val('NA');
			var myarray= [];
			var favorite = [];
			if(ell!='' || segment1!='' || segment2!='')
			{
            $('#vehicle :selected').each(function(i, sel)
            {
    			favorite.push($(this).val());
			});
			var zz=favorite.join(",");
			}
			else
			{
				var zz=el;
				$('#model').val('');
			}

            $.ajax({ url: '{{url("get-product-segment")}}',
            data: { 'product_id':zz},
			success: function(data){
				// alert(data);// 1,Mining~2,C & I~3,On-Road~4,Special App~
				var Result = data.split("~");var str = '';var str1 = '';var str2= '';
				Result.pop();
				var custIds = new Array(ell.trim());
				var selectedIds = custIds.join(',').split(',');
				for (item1 in Result) {
					var Result2 = Result[item1].split(",");
					if (ell!='') {
						if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
							str += "<option value='" + Result2[0] + "' selected>" +Result2[1] + "</option>";
						}
						else
						{
							str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					else
					{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
					if(segment1!='')
					{
						var mith = segment1.split(",");
						if (jQuery.inArray( Result2[0], mith)!=='-1') //if(ell==Result[item])
						{
							str1 += "<option value='" + Result2[0] + "' selected>" +Result2[1] + "</option>";
						}
						else
						{
							str1 += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					else
					{
						str1 += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
					if(segment2!='')
					{
						var mith = segment2.split(",");
						if (jQuery.inArray( Result2[0], mith)!=='-1') //if(ell==Result[item])
						{
							str2 += "<option value='" + Result2[0] + "' selected>" +Result2[1] + "</option>";
						}
						else
						{
							str2 += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					else
					{
						str2 += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
			document.getElementById('segment').innerHTML = "<optgroup>" + str + "</optgroup>";
			document.getElementById('segment1').innerHTML = "<optgroup>" + str1 + "</optgroup>";
			document.getElementById('segment2').innerHTML = "<optgroup>" + str2 + "</optgroup>";
			}
	});
}

function User_get_product(el){

		$.ajax({ url: '{{url("get-multi-product")}}',success: function(data) {

				 var Result = data.split(",");var str = '';
				 Result.pop();
				for (item in Result){
				  	Result2 = Result[item].split("~");

					var mith = el.split(",");
					if (el!=''){
			  			if (jQuery.inArray(Result2[0], mith)!=='-1')
						{
							$('#product').val(mith);
							$('#vehicle').val(mith);
						}
					}
				}
			}
		});
	}
function User_product_change(el,ell)
{
			//alert(ell);
			var myarray= [];
			var favorite = [];
			if(ell!='')
			{
			var zz='';
			}
			else
			{
				 $('#product :selected').each(function(i, sel)
	            {
	    			favorite.push($(this).val());
				});
				var zz=favorite.join(",");

			}
			zz = zz !=''?zz:el;

            $.ajax({ url: '{{url("get-multi-product-segment")}}',
            data: { 'product_id':zz},
			success: function(data){
				// alert(data);// 1,Mining~2,C & I~3,On-Road~4,Special App~
				var Result = data.split("~");var str = '';
				Result.pop();
				var custIds = new Array(ell.trim());
				var selectedIds = custIds.join(',').split(',');
				for (item1 in Result) {
					var Result2 = Result[item1].split(",");
					if (ell!='') {
						if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
							str += "<option value='" + Result2[0] + "' selected>" +Result2[1] + "</option>";
						}
						else
						{
							str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					else
					{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}
				}
			document.getElementById('segment').innerHTML = str;
			}
	});
}
function getSubComplaint(el,ell)
{
		$.ajax({ url: '{{url("get-sub-complaint")}}',data: {'complaint_type_id':el},
			 success: function(data) {

				 var Result = data.split(",");var str = '';
				 Result.pop();
				 var custIds = new Array(ell.trim());
				 var selectedIds = custIds.join(',').split(',');
				 for (item1 in Result) {
					 var Result2 = Result[item1].split("~");
					 if (ell!='') {
						 if (jQuery.inArray( Result2[0], selectedIds ) !== -1 ) {
							str += "<option value='" + Result2[0] + "' selected>" +Result2[1] + "</option>";
						}
						else
						{
							str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
						}
					}
					else
					{
						str += "<option value='" + Result2[0] + "'>" + Result2[1] + "</option>";
					}

				 }
				document.getElementById('sub_complaint_type').innerHTML = str;
			 }
		 });
	}
	function reloadPage(){
		location.reload(true);
	}
</script>

 <script>
		$(window).load(function(){
		     $('.loader').fadeOut();
		});
</script>
</body>

</html>
<style>
.box-header{
    color: #eee;
    display: block;
    padding: 0px;
    position: relative;
    background-color: #19aec4;
}

.line_box{
    border: 1px solid #0089DA;
    padding: 20px;
}
.checkbox label, .radio label{
    min-height: 20px;
    padding-left: 8px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.wpsp-gender-field .radio{
    display: inline-block;
    margin: 5px 0 8px;
}

.radio{
    padding-left: 20px;
}
</style>

 <style>
	.form-control {
    display: block;
    width: 100%;
    height: 24px;
    padding: 1px 7px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    font-weight: 400;
}

label {
    display: inline-block;
    max-width: 100%;
    margin-bottom: 0px;
    font-weight: 500;
        margin-top: 2px;
}

.form-group {
    margin-bottom: 2px;
}

.shivv{
	padding: 4px;
}
.fatch{
	font-weight: 500!important;
}
</style>
