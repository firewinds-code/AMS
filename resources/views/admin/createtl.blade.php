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
            <form method="POST" action="{{ route('store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                      </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirm Password</label>
                    <input type="password" class="form-control" id="con_Password4" placeholder="Password" name="con_Password4">
                  </div>
                </div>


                <div class="form-group col-md-6">
                    <label for="inputPassword4">Role Type</label>
                    {{-- <input type="password" class="form-control" id="inputPassword4" placeholder="Password"> --}}
                    <select name="role" id="role" class="form-control">
                      <option value="tl" selected="selected" disabled>-----select----</option>
                      @if (Auth::user()->role == 'admin')
                      <option value="tl">Team Leader</option>
                      @endif
                      <option value="agent">Agent</option>

                    </select>
                  </div>
                </div>
                 <br>
                <button type="submit" class="btn btn-primary">Create User</button>
              </form>



        </div>
    </div>
</div>
@endsection
