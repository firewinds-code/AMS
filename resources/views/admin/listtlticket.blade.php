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
        <th scope="col">Email</th>
        <th scope="col">Assign Ticket</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($users as $item)
        <tr>
            <th>{{ $item->name }}</th>
            <td>{{ $item->email }}</td>
            <td> <a href="{{ route('assign-ticket-agent', $item->id) }}"> Assign Ticket </a> </td>
          </tr>
        @endforeach

    </tbody>
  </table>
    </div>
</div>
</div>
  @endsection

