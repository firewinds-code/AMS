@extends("layouts.adminlayout")
@section('title','Complaint List')
@section('bodycontent')



<div class="content-wrapper mobcss">
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<div class="clear"></div>
					<div class="table-responsive">
						<h4 class="card-title" id="title">Complaint List</h4>
						<br>
						<span class="btn btn-info" onclick="getData()" style="border-radius: 14px; cursor: pointer;">Get Data</span>
						
						@if( Auth::user()->email == 'ramjin@dispostable.com')
							<a href="javaScript:void(0)" style="border-radius: 14px; float:right" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Reason</a>
						@endif
						<hr>
						<div id="tableBind"></div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#caller-listing').DataTable({
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
				exportOptions: {
					modifier: {
						page: 'all'
					}
				}
			}]
		});
	});


	function getData(){
		$.ajax({ url: '{{url("reason-get-data")}}',
                 data:{slug:"{{Request::segment(1)}}"},
				success: function(response){
					$('#tableBind').html(response.html);
				}
		});
	}


</script>

@endsection
