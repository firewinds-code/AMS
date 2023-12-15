<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>AMS! @yield("title")</title>
	<script src="{{asset('js/jquery-min.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	{{-- <link rel="stylesheet" href="{{asset('public/vendors/css/vendor.bundle.base.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{asset('images/favicon.png')}}" />
	<link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
	<!-- Toastr Css  -->
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
			<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center" style="padding: 0">
				<a class="navbar-brand brand-logo" href="#" style="color: #00A6D7;font-weight: 700;font-size: 24px;">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
					<img src="{{ asset('images/al-logo.svg') }}" alt="logo" width="178.05" height="37.88"  />
                </a>

			</div>

			<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
				<ul class="navbar-nav navbar-nav-right">

					<li class="nav-item nav-profile dropdown">
						<a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
							<i class="fa fa-user fa-1x" aria-hidden="true"></i> {{Auth::user()->name}}
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">

							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
								<i class="fa fa-lock"></i>
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
					<span class="fa fa-bars"></span>
				</button>
			</div>


			{{-- <div class="container"></div> --}}
		</nav>
<nav class="navbar navbar-expand-lg navbar-light" style="background: #00A6D7;">
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
						@if(Session::get('user_type_id') == '5')
							<a class="nav-link" href="{{url('ticket-creation')}}">
								<span class="menu-title">HOME</span>
							</a>
						@elseif(Session::get('user_type_id') == '3')
							<a class="nav-link" href="{{url('case-list')}}">
								<span class="menu-title">HOME</span>
							</a>
						@else
							<a class="nav-link" href="{{url('complaint-list')}}"><span class="menu-title">HOME</span>
							</a>
						@endif

				</li>
				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ strtoupper('Report') }}
						<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					{{--<a class="dropdown-item" href="{{url('admin/create')}}">Create Team Leader</a>
					<a class="dropdown-item" href="{{url('admin/teamleader')}}">Teamleader List</a>--}}
					 <a class="dropdown-item" href="{{url('ams-export-file')}}">Report</a>
					</div>
				</li>
				        {{-- <li class="nav-item ">
							<a class="nav-link" href="{{url('date-report')}}"><span class="menu-title">Date Report</span></a>
						</li> --}}
						<li class="nav-item ">
							<a class="nav-link" href="{{url('search-report')}}"><span class="menu-title">{{ strtoupper('Search Data Job Card') }}</span></a>
						</li>
                       <li class="nav-item ">
							<a class="nav-link" href="{{url('psf-report')}}"><span class="menu-title">{{ strtoupper('Post Service Feedback')}}</span></a>
						</li>
                        <li class="nav-item ">
							<a class="nav-link" href="{{url('job-card-report')}}"><span class="menu-title">{{ strtoupper('Job Card Days History')}}</span></a>
						</li>

				{{-- <li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TICKET
							<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						@if(Session::get('role') == '29' || Session::get('role') == '30' || Session::get('role') == '87')
							<a class="dropdown-item" href="{{url('ticket-creation')}}">Create Ticket</a>
							<a class="dropdown-item" href="{{url('followups')}}">Caller List</a>
						@endif
						<a class="dropdown-item" href="{{url('case-list')}}">Ticket List</a>

					</div>
				</li> --}}
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
				{{-- <li class="nav-item dropdown">
						<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ESCALATION
							<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{url('escalation')}}">Escalation</a>
						<a class="dropdown-item" href="{{url('dealer-escalation')}}">Dealer Escalation</a>
					</div>
				</li> --}}
				@endif
				{{-- <li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REPORT
						<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{url('consolidated-report')}}">Consolidated Report</a>
						<a class="dropdown-item" href="{{url('ticket-report')}}">Single Ticket Report</a>
					</div>
				</li> --}}
				@if(Session::get('role') == '29' || Session::get('role') == '30' || Session::get('role') == '87')

				<li class="nav-item dropdown">
					<a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">General Ticket
						<i class="fa fa-angle-down" style="margin-left: 5px;"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{url('general-ticket')}}">General Ticket</a>
						<a class="dropdown-item" href="{{url('general-ticket-list')}}">General Ticket List</a>
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
				<a href="https://cogenteservices.com/" target="blank">Cogent E-Services Limited</a>. All rights reserved.</span>
		</div>
	</footer>
	<!-- partial -->
</div>

  <!-- Toastr Js -->
   <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
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
	<link rel="stylesheet" href="{{asset('datatable/css/jquery.dataTables.min.css')}}" />
	<link rel="stylesheet" href="{{asset('datatable/css/buttons.dataTables.min.css')}}" />
	<script type="text/javascript" src="{{asset('datatable/js/jquery-1.12.3.js')}}"></script>
	<script type="text/javascript" src="{{asset('datatable/js/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('datatable/js/dataTables.buttons.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('datatable/js/jszip.min.js')}}"></script>
	{{-- <script type="text/javascript" src="{{asset('datatable/js/pdfmake.min.js')}}"></script> --}}
	{{-- <script type="text/javascript" src="{{asset('datatable/js/vfs_fonts.js')}}"></script> --}}
	<script type="text/javascript" src="{{asset('datatable/js/buttons.html5.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('datapicker/js/jquery.datetimepicker.js')}}"></script>
	<link rel="stylesheet" href="{{asset('datapicker/css/jquery.datetimepicker.min.css')}}">
	<script type="text/javascript">
		$(document).ready(function () {
			var options1 = {
				format:'d-M-Y',
				timepicker: false,
			};
		  	/* $('#Repair_work_start_date').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Repair_completion_date').datetimepicker(options1).attr('readonly','readonly');

		  	$('#Registration_of_certificate_upload').datetimepicker(options1).attr('readonly','readonly');
		  	$('#National_Permit_A_B_upload').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Road_Tax_upload').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Claim_Form_upload').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Intimation_2_IC_for_surveyor_deputation').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Surveyor_initial_inspection_date').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Written_work_order_approval_2_start_work').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Intimation_2_customer_for_advance_paymen').datetimepicker(options1).attr('readonly','readonly');
		  	//$('#Advance_payment_received_onCustomer').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Advance_payment_received_onCustomer').datetimepicker(options1);
		  	$('#Customer_written_approval_2_start_of_wor').datetimepicker(options1).attr('readonly','readonly');
		  	// $('#Repair_completion_date').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Intimation_to_IC_for_final_inspection').datetimepicker(options1).attr('readonly','readonly');
		  	$('#Final_inspection_date').datetimepicker(options1).attr('readonly','readonly'); */

			$('#Repair_work_start_date').datetimepicker(options1);
		  	$('#Repair_completion_date').datetimepicker(options1);

		  	$('#Registration_of_certificate_upload').datetimepicker(options1);
		  	$('#National_Permit_A_B_upload').datetimepicker(options1);
		  	$('#Road_Tax_upload').datetimepicker(options1);
		  	$('#Claim_Form_upload').datetimepicker(options1);
		  	$('#Intimation_2_IC_for_surveyor_deputation').datetimepicker(options1);
		  	$('#Surveyor_initial_inspection_date').datetimepicker(options1);
		  	$('#Written_work_order_approval_2_start_work').datetimepicker(options1);
		  	$('#Intimation_2_customer_for_advance_paymen').datetimepicker(options1);
		  	$('#Advance_payment_received_onCustomer').datetimepicker(options1);
		  	$('#Customer_written_approval_2_start_of_wor').datetimepicker(options1);
		  	$('#Intimation_to_IC_for_final_inspection').datetimepicker(options1);
		  	$('#Final_inspection_date').datetimepicker(options1);
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
					}]
			});

		});




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
