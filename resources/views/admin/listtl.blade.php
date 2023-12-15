@extends("layouts.adminlayout")
@section('title','Dealer')
@section('bodycontent')
<div class="content-wrapper mobcss">
    <div class="card">
        <div class="card-body">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Email</th>
        <th scope="col">Date</th>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'tl')
        <th scope="col">Delete</th>
        @endif


      </tr>
    </thead>
    <tbody>

        @foreach ($users as $item)
        <tr>
            <th>{{ $item->name }}</th>
            <td>{{ $item->role }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->created_at }}</td>
            @if (Auth::user()->role == 'admin')
            <td> <a href="{{ route('destroytl', $item->id) }}"> Delete</a> </td>
            @endif
            @if (Auth::user()->role == 'tl')
            <td> <a href="{{ route('destroy-agent', $item->id) }}"> Delete</a> </td>
            @endif
            {{-- <td> <a href="{{  url('admin/'.$item->id) }}"> Assign Ticket </a> </td> --}}
            {{-- <td> <a href="{{ route('assign-agent', $item->id) }}"> Assign Ticket </a> </td> --}}
          </tr>
        @endforeach

    </tbody>
  </table>
    </div>
</div>
</div>
  @endsection

