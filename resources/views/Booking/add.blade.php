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

                        <form method="POST" action="{{url('store-booking')}}">
                              @csrf

                           <div class="form-group row">
                           	<div class="col-sm-10">
                           		<h2>Location: {{ Session('location') }}</h2>
                           		<h2>Person: {{ Session('person') }}</h2>
                           		<h2>Date: {{ Session('date') }}</h2>
                           		<h2>Time: {{ Session('time') }}</h2>
                           		<h2>Hours: {{ Session('hours') }}</h2>
                           		<h2>Table: {{ Session('table') }}</h2>

                           	</div>
                           </div>
                          <input type="text" name="gridRadios" value="{{ Session('location') }}" style="display: none;">
                          <div class="form-group row" id="person1" style="display: none;">
                            <label for="person" class="col-sm-2 col-form-label">Person</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="person" id="person" value="{{ Session('person') }}" placeholder="How Many Person" min="1" max="3">
                            </div>
                          </div>
                          <div class="form-group row" style="display: none;">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                              <input id="date1" name="date1" size="60" type="date" format="MM/DD/YYYY" placeholder="MM/DD/YYYY" value="{{ Session('date') }}" />
                            </div>
                          </div>
                          <div class="form-group row" style="display: none;">
                            <label for="hours" class="col-sm-2 col-form-label">Hours</label>
                            <div class="col-sm-10">
                                  <select class="form-control" id="select1" name="hours" onchange="myFunction()">
                             <option value="{{ Session('hours') }}"  selected>Select Hours</option>
                               {{--             <option value="1 Hours">1 Hours</option>
                                    <option value="2 Hours">2 Hours</option> --}}
                                    <option value="3 Hours">3 Hours</option>
                                  </select>
                          </div>
                      </div>
                      
                      <div class="form-group row" id="time1">
                            <label for="Time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                  <select class="form-control" id="Time" name="time" >
                                    <option value="{{ Session('time') }}"  selected>Select Time</option>
                                    <option value="9am-10am">9am-10am</option>
                                    <option value="10am-11am">10am-11am</option>
                                    <option value="11am-12pm">11am-12pm</option>
                                    <option value="13pm-14pm">13pm-14pm</option>
                                    <option value="14pm-15pm">14pm-15pm</option>
                                    <option value="15pm-16pm">15pm-16pm</option>
                                    <option value="16pm-17pm">16pm-17pm</option>
                                    <option value="17pm-18pm">17pm-18pm</option>
                                    <option value="18pm-19pm">18pm-19pm</option>
                                    <option value="19pm-20pm">19pm-20pm</option>


                                  </select>
                          </div>
                      </div>
                      <div class="form-group row" id="time2">
                            <label for="Time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                  <select class="form-control" id="Time" name="time">
                                     <option value="{{ Session('time') }}" selected>Select Time</option>
                                    <option value="9am-11am">9am-11am</option>
                                    <option value="11am-13pm">11am-13pm</option>
                                    <option value="13pm-15pm">13pm-15pm</option>
                                    <option value="15pm-17pm">15pm-17pm</option>
                                    <option value="17pm-19pm">17pm-19pm</option>
                                    <option value="18pm-20pm">18pm-20pm</option>

                                  </select>
                          </div>
                      </div>
                      <div class="form-group row" id="time3">
                            <label for="Time" class="col-sm-2 col-form-label">Time</label>
                            <div class="col-sm-10">
                                  <select class="form-control" id="Time" name="time">
                                     <option value="{{ Session('time') }}"  selected>Select Time</option>
                                    <option value="9am-12pm">9am-12pm</option>
                                    <option value="12pm-15pm">12pm-15pm</option>
                                    <option value="15pm-18pm">15pm-18pm</option>
                                    <option value="17pm-20pm">17pm-20pm</option>

                                  </select>
                          </div>
                      </div>
                      <div class="form-group row" id="tablerow" style="display: none;">
                            <label for="table" class="col-sm-2 col-form-label">Table No</label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" name="table" id="table" value="{{ Session('table') }}" placeholder="Which Table" min="1" max="9">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Book Now</button>
                            </div>
                          </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('javascript')
<script>
function myFunction() {

    var x = document.getElementById("select1").value;
  
    if( x == "1 Hours" ){
        document.getElementById("time1").style.display="block";
         
         document.getElementById("time2").style.display="none";
         document.getElementById("time3").style.display="none";
    }else if( x == "2 Hours" ){
    document.getElementById("time2").style.display="block";
    document.getElementById("time1").style.display="none";
    document.getElementById("time3").style.display="none";
}else if( x == "3 Hours" ){
    document.getElementById("time3").style.display="block";
    document.getElementById("time1").style.display="none";
    document.getElementById("time2").style.display="none";

}


}


</script>
{{-- <script type="text/javascript">
   $(function() {
    $('#date1').datetimepicker({
        format: "YYYY-MM-DD",
        isInvalidDate: function(date) {
            if (date.day() == 0 || date.day() == 6) {
                return true; 
            }
        }
    });
});
</script> --}}
<script type="text/javascript">
    function locationFunction() {

    var x = document.getElementById("gridRadios1").value;
  
    if( x == "Library" ){
        document.getElementById("person1").style.display="block";
        document.getElementById("tablerow").style.display="block";
    }else if( x == "The Hub" ){
        document.getElementById("person1").style.display="none";
    }
    else{
        document.getElementById("person1").style.display="none";

    }


}
</script>
<script type="text/javascript">
    function location1Function() {

    var x = document.getElementById("gridRadios2").value;
  
    if( x == "The Hub" ){
        document.getElementById("person").value =1;
        document.getElementById("tablerow").style.display="none";
        document.getElementById("person1").style.display="none";
    }
    else{
        document.getElementById("person1").style.display="none";

    }


}
</script>
@endsection