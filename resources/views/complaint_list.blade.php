@extends('layouts.masterlayout')
@section('title', 'Complaint List')
@section('bodycontent')



    <div class="content-wrapper mobcss">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="clear message"></div>
                        <form action="{{ url('search-data-report') }}" id="searchForm">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label>Veh Reg No.</label>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="text" name="veh_reg_no" id="veh_reg_no" class="form-control"
                                        value="" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Chassis Number</label>
                                    <input type="text" name="chassis_number" id="chassis_number" class="form-control"
                                        value="" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Engine No </label>
                                    <input type="text" name="engine_no" id="engine_no" class="form-control"
                                        value="" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Owner/ Customer Name </label>
                                    <input type="text" name="customer_name" id="customer_name " class="form-control"
                                        value="" />
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Job Card No</label>
                                    <input type="text" name="job_card_no" id="job_card_no" class="form-control"
                                        value="" />
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="submit" class="btn btn-success" style="margin: 20px; border-radius:28px;"
                                        value="search" />
                                </div>
                            </div>
                        </form>
                        <div class="table-responsive">
                            <h4 class="card-title">Complaint List</h4>
                            <br>
                            <span class="btn btn-info" onclick="getData()" style="border-radius: 14px; cursor: pointer;">Get
                                Data</span>
                            @if (Auth::user()->email == 'ramjin@dispostable.com')
                                <a href="{{ url('recycle-data') }}" class="btn btn-info"
                                    style="border-radius: 14px; float:right"
                                    onclick="return confirm('Are you sure want to Recycle Data?');">Recycle Data</a>
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
                    filename: '@yield('title')',
                    exportOptions: {
                        modifier: {
                            page: 'all'
                        }
                    }
                }]
            });
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this).serialize();
            var url = $(this).attr('action');

            $.post(url, form, function(response) {
                if (response.success) {
                    $('#tableBind').html(response.html);
                    $('.message').addClass('btn btn-success').html(response.message).fadeIn("slow").fadeIn(
                        3000).fadeOut(3000);
                }
                if (response.error) {
                    $('.message').addClass('btn btn-danger').html(response.message).fadeIn("slow").fadeIn(
                        3000).fadeOut(3000);
                }
                if (response.warning) {
                    $('.message').addClass('btn btn-danger').html(response.message).fadeIn("slow").fadeIn(
                        3000).fadeOut(3000);
                }
            });

        });


        function getData() {
            $.ajax({
                url: '{{ url('get-data') }}',
                success: function(response) {
                    /* var dt = response.split('##');
                    for (item in dt ) {
                    	var row = dt[item].split('~~');
                    	alert(row[1]);
                    } */
                    $('#tableBind').html(response);
                }
            });
        }
    </script>

@endsection
