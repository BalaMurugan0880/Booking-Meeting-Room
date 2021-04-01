@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book Slots') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                       <div class="form-group row">
                           	<div class="col-sm-10">
                           		<h2>Location: {{ Session('location') }}</h2>
                           		{{-- <h2>Person: {{ Session('person') }}</h2> --}}
                           		<h2>Date: {{ Session('date') }}</h2>
                           		{{-- <h2>Time: {{ Session('time') }}</h2> --}}
                           		<h2>Hours: {{ Session('hours') }}</h2>
                           		{{-- <h2>Table: {{ Session('table') }}</h2> --}}

                           		<h2>Status : Booked</h2>

                           	</div>
                           </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection