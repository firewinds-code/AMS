@extends("layouts.adminlayout")
@section('title','Dealer')
@section('bodycontent')
<div class="content-wrapper mobcss">
    <div class="card">
        <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-secondary" role="alert">
                {{ $message  }}
              </div>
            @endif
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form method="POST" action="{{ route('submlitUpload') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">select csv file</label>
                        <input type="file" class="form-control" id="case_file" placeholder="case file" name="case_file">
                      </div>

                </div>
                <a href="{{ asset('images/case_detail_info.csv') }}" download>Download Format</a><br>
                <br>
             <button type="submit" class="btn btn-primary">Upload file</button>
              </form>
        </div>
    </div>
</div>
@endsection
