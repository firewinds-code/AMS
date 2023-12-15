<script>
    $(document).ready(function() {
        $("#caller-listing").DataTable({
            dom: "Bfrtip",
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            },
            buttons: [{
                extend: "excel",
                text: "Excel",
                className: "exportExcel",
                filename: "Get_Data_Report",
                exportOptions: {
                    modifier: {
                        page: "all"
                    }
                }
            }]
        });
    });
    </script>
    <table id="caller-listing" class="table">
    <thead>
        <tr>
            <th>Reason</th>
            <th>Action</th>
        </tr>
    </thead><tbody>
        
    @if(isset($repairdata))
    @foreach($repairdata as $row)
    <tr role="row">
        <td> {{$row->_repair_delay_reason}}</td>
        <td name="action" id="action">
        <button   class="btn-default btn primary"><a href="javaScript:void(0)"  onclick="editReason({{$row->id}})" class="btn btn-sm btn-primary"  style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </a> </button>
        <button   class="btn-default btn primary"><a href="javaScript:void(0)" onclick="deleteReason({{$row->id}})"    class="btn btn-sm btn-primary" style="border-radius: 10px;"> Delete </a> </button>
        </td>
    </tr>
    @endforeach
    @endif
    @if(isset($predata))
    @foreach($predata as $row)
    <tr role="row">
        <td> {{$row->delay_reason}}</td>
        <td name="action" id="action">
        <button   class="btn-default btn primary"><a href="javaScript:void(0)" onclick="editReason({{$row->id}})" class="btn btn-sm btn-primary"  style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </a> </button>
        <button   class="btn-default btn primary"><a href="javaScript:void(0)" onclick="deleteReason({{$row->id}})"    class="btn btn-sm btn-primary" style="border-radius: 10px;"> Delete </a> </button>
        </td>
    </tr>
    @endforeach
    @endif
    @if(isset($postdata))
    @foreach($postdata as $row)
    <tr role="row">
        <td> {{$row->post_delay_reason}}</td>
        <td name="action" id="action">
        <button   class="btn-default btn primary"><a href="javaScript:void(0)" onclick="editReason({{$row->id}})" class="btn btn-sm btn-primary"  style="border-radius: 10px;" data-bs-toggle="modal" data-bs-target="#exampleModal"> Edit </a> </button>
        <button   class="btn-default btn primary"><a href="javaScript:void(0)" onclick="deleteReason({{$row->id}})"    class="btn btn-sm btn-primary" style="border-radius: 10px;"> Delete </a> </button>
        </td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
		  ...
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
	</div>
  </div>



@include('includes.common')

     <script>
  function editReason(id)
  {
	alert(id);

  }	
  function deleteReason(id)
  {
	alert('delete'+id);
  }	

  function addReason(id)
  {
	
  }
     </script>