@include('includes.header')

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content starts -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">flight_bookings</h4>

    @if(Session::has('message'))
    <div class="alert alert-success">
                        <strong><span class="glyphicon glyphicon-ok"></span>{{  Session::get('message') }}</strong>
                    </div>
    @endif
            <!--Button trigger modal -->
<button
    type="button"
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#basicModal" style="margin-bottom: 15px"
>Add flight_bookings </button>

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add flight_bookings</h5 >
                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                 <form role="form" method="post" action="/flight_bookings/add-flight_bookings-post" >
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
           
    <div class="form-group">
        
        <label for="flight_id">flight_id:</label>
        <select onchange="showStock1(this)" id="flight_id" name="flight_id" class="form-select">
            <option value="0">Select flight</option>
            @foreach($flights as $flight)
                <option value="{{$flight['id']}}">{{ $flight['flight_number'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="passenger_name">passenger_name:</label>
        <input type="text" class="form-control" id="passenger_name" name="passenger_name">
    </div>
    <div class="form-group">
        
        <label for="passport_number">passport_number:</label>
        <input type="text" class="form-control" id="passport_number" name="passport_number">
    </div>
    <div class="form-group">
        
        <label for="ticket_class_id">ticket_class_id:</label>
        <select onchange="showStock1(this)" id="ticket_class_id" name="ticket_class_id" class="form-select">
            <option value="0">Select ticket_class</option>
            @foreach($ticket_classes as $ticket_class)
                <option value="{{$ticket_class['id']}}">{{ $ticket_class['name'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="booking_date">booking_date:</label>
        <input type="date" class="form-control" id="booking_date" name="booking_date">
    </div>
                </div >
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save changes</button> </form>
                </div>
            </div>
        </div>
    </div>
<!-- Modal end -->
 @if(count($flight_bookings) > 0)
        <?php $i = 1; ?>
        @foreach($flight_bookings as $flight_booking)
        <div class='card mb-4'>
            <div class='card-body'>
                <h5 class='card-title'>flight_number : {{$flights[$flight_booking->flight_id]['flight_number']}} </h5>
            <h5 class='card-title'>passenger_name : {{$flight_booking->passenger_name}}</h5>
            <h5 class='card-title'>passport_number : {{$flight_booking->passport_number}}</h5>
                <h5 class='card-title'>name : {{$ticket_classes[$flight_booking->ticket_class_id]['name']}} </h5>
            <h5 class='card-title'>booking_date : {{$flight_booking->booking_date}}</h5><a class='card-link' href='{{ Request::root() }}/flight_bookings/change-status-flight_bookings/{{ $flight_booking->id }}'>
                     <i class='bx bx-windows me-1'></i>
                     @if ($flight_booking->status == 0)
                         {{ 'Activate' }}
                     @else
                         {{ 'Deactivate' }}
                     @endif
                 </a>
                 <a
                     data-bs-toggle='modal'
                     data-bs-target='#basicModall{{ $i }}'
                     class='card-link'
                     href='#'
                 >
                     Edit
                 </a>
                 <a
                     class='card-link'
                     href='{{ Request::root() }}/flight_bookings/delete-flight_bookings/{{ $flight_booking->id }}'
                     onclick='return confirm('Are you sure to delete?')'
                 >
                     <i class='bx bx-trash me-1'></i> Delete
                 </a>
             </div>
         </div>
         
<!-- Modal edit starts -->
<div class='modal fade' id='basicModall{{ $i }}' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel1'>Edit flight_bookings</h5>
                <button
                    type='button'
                    class='btn-close'
                    data-bs-dismiss='modal'
                    aria-label='Close'
                ></button>
            </div>
            <div class='modal-body'>
            <form role='form' method='post' action='{{Request::root()}}/flight_bookings/edit-flight_bookings-post' enctype='multipart/form-data'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input type='hidden' value='<?php echo $flight_booking->id ?>'   name='flight_bookings_id'>

    <div class="form-group">
        
        <label for="flight_id">flight_id:</label>
        <select onchange="showStock1(this)" id="flight_id" name="flight_id" class="form-select">
            <option value="0">Select flight</option>
            @foreach($flights as $flight)
                <option value="{{$flight['id']}}" @if($flight_booking->flight_id == $flight['id']) selected @endif >{{ $flight['flight_number'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="passenger_name">passenger_name:</label>
        <input type="text" value="{{ $flight_booking->passenger_name}}" class="form-control" id="passenger_name" name="passenger_name">
    </div>
    <div class="form-group">
        
        <label for="passport_number">passport_number:</label>
        <input type="text" value="{{ $flight_booking->passport_number}}" class="form-control" id="passport_number" name="passport_number">
    </div>
    <div class="form-group">
        
        <label for="ticket_class_id">ticket_class_id:</label>
        <select onchange="showStock1(this)" id="ticket_class_id" name="ticket_class_id" class="form-select">
            <option value="0">Select ticket_class</option>
            @foreach($ticket_classes as $ticket_class)
                <option value="{{$ticket_class['id']}}" @if($flight_booking->ticket_class_id == $ticket_class['id']) selected @endif >{{ $ticket_class['name'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="booking_date">booking_date:</label>
        <input type="date" value="{{ $flight_booking->booking_date}}" class="form-control" id="booking_date" name="booking_date">
    </div>

      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>
          Close
        </button>
        <button type='submit' class='btn btn-primary'>Save changes</button> </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit ends -->

    <!-- ... (rest of the card content) ... -->
    <?php $i++; ?>
@endforeach
@else
<div class='alert alert-info' role='alert'>
    <strong>No flight_bookingss Found!</strong>
</div>
@endif

<!-- ... (pagination) ... -->

</div></div>

@include('includes.footer')