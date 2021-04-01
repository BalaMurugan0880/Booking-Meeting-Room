@extends('layouts.app')

@section('content')

<div class="container">
	 @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif
	<div class="row">
		<table class="table ">
	 <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      {{-- <th scope="col">Person</th> --}}
      <th scope="col">Date</th>
      <th scope="col">Hours</th>
      {{-- <th scope="col">Time</th> --}}
      {{-- <th scope="col">Table No</th> --}}
    </tr>
  </thead>
  <tbody>
  	@foreach($booking as $book)
    <tr>
      <td>{{$book->id}}</td>
      <td>{{$book->name}}</td>
      <td>{{$book->location}}</td>
      {{-- <td>{{$book->person}}</td> --}}
      <td>{{$book->date}}</td>
      <td>{{$book->hours}}</td>
      {{-- <td>{{$book->time}}</td> --}}
      {{-- <td>{{$book->tables_id}}</td> --}}
    </tr>
    @endforeach
  </tbody>
</table>
	</div>	


</div>




@endsection