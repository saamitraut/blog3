@include('includes.header')

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content starts -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">flights</h4>

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
>Add flights </button>

<div class="btn-group" style="margin-bottom: 15px">
                      <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        Pagination
                      </button>
                      
					  <ul id="pagination_limit" class="dropdown-menu" style="">
                        <li><a value="5" class="dropdown-item" href="javascript:void(0);">5</a></li>
                        <li><a value="10" class="dropdown-item" href="javascript:void(0);">10</a></li>
                      </ul>
                    </div>
	<script>
    document.getElementById('pagination_limit').addEventListener('click', function(event) {
        if (event.target.nodeName === 'A') {
            window.location.href = '{{ Request::url() }}?pagination_limit=' + event.target.getAttribute('value');
        }
    });
</script>
					
<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add flights</h5 >
                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                 <form role="form" method="post" action="/flights/add-flights-post" >
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
           
    <div class="form-group">
        
        <label for="flight_number">flight_number:</label>
        <input type="text" class="form-control" id="flight_number" name="flight_number">
    </div>
    <div class="form-group">
        
        <label for="origin">origin:</label>
        <input type="text" class="form-control" id="origin" name="origin">
    </div>
    <div class="form-group">
        
        <label for="destination">destination:</label>
        <input type="text" class="form-control" id="destination" name="destination">
    </div>
    <div class="form-group">
        
        <label for="departure_time">departure_time:</label>
        <input type="text" class="form-control" id="departure_time" name="departure_time">
    </div>
    <div class="form-group">
        
        <label for="arrival_time">arrival_time:</label>
        <input type="text" class="form-control" id="arrival_time" name="arrival_time">
    </div>
    <div class="form-group">
        
        <label for="price">price:</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
        
        <label for="capacity">capacity:</label>
        <input type="text" class="form-control" id="capacity" name="capacity">
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
 @if(count($flights) > 0)	
        <nav aria-label="Page navigation">{{ $flights->links() }}	</nav>
        
		<?php $i = 1; ?>
        @foreach($flights as $flight)
        <div class='card mb-4'>            
			<div class='card-body'>
            <div class="row">
			<div class="col-lg-6 mb-4 mb-xl-0">
			<h5 class='card-title'>flight_number : {{$flight->flight_number}}</h5>
            <h5 class='card-title'>origin : {{$flight->origin}}</h5>
            <h5 class='card-title'>destination : {{$flight->destination}}</h5>
            <h5 class='card-title'>departure_time : {{$flight->departure_time}}</h5>
            <h5 class='card-title'>arrival_time : {{$flight->arrival_time}}</h5>
            <h5 class='card-title'>price : {{$flight->price}}</h5>
            <h5 class='card-title'>capacity : {{$flight->capacity}}</h5>
			</div>
			<!--<div>{{$reviews[$flight->id]}}</div>-->
			<div class="col-lg-6">
                      <small class="text-light fw-semibold">Reviews</small>
                      <div class="mt-3">
                        <div class="row">
                          <div class="col-md-4 col-12 mb-3 mb-md-0">
                            <div class="list-group">
                              @php	$counter=1;	@endphp
							  @foreach($reviews[$flight->id] as $review)
							  <a class="list-group-item list-group-item-action" id="list-{{$review->id}}-list" data-bs-toggle="list" href="#list-{{$review->id}}">Review {{$counter}}</a>
							  @php	$counter++;	@endphp
							  @endforeach
                            </div>
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="tab-content p-0">
							@foreach($reviews[$flight->id] as $review)
                              <div class="tab-pane fade" id="list-{{$review->id}}">
								Rating : {{$review->rating}}<br>
								Review : {{$review->review}}<br>
								Recommendation : {{$review->recommendation}}
                              </div>
							@endforeach
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
			<div class="col-lg-6">
				<div class="row">
				</div></div>
			<div class="col-lg-6">
                      <small class="text-light fw-semibold">Bookings</small>
                      <div class="mt-3">
                        <div class="row">
                          <div class="col-md-4 col-12 mb-3 mb-md-0">
                            <div class="list-group">
                              @php	$counter=1;	@endphp
							  @foreach($bookings[$flight->id] as $booking)
							  <a class="list-group-item list-group-item-action" id="list-{{$booking->id}}-list" data-bs-toggle="list" href="#list2-{{$booking->id}}">Booking {{$counter}}</a>
							  @php	$counter++;	@endphp
							  @endforeach
                            </div>
                          </div>
                          <div class="col-md-8 col-12">
                            <div class="tab-content p-0">
							@foreach($bookings[$flight->id] as $booking)
                              <div class="tab-pane fade" id="list2-{{$booking->id}}">
								 passenger_name  : {{$booking->passenger_name }}<br>
								  passport_number  : {{$booking->passport_number }}<br>
								  booking_date  : {{$booking->booking_date }}
                              </div>
							@endforeach
                            </div>
                          </div>
                        </div>
                      </div>
            </div>
			<div class="col-lg-6 d-none">
				<div class="row">
					@php $counter=1; @endphp
					@foreach($bookings[$flight->id] as $booking)
					<div class="col-md mb-3 mb-md-0">
					<div class="accordion mt-3" id="accordionExample">
							<div class="card accordion-item">
							  <h2 class="accordion-header" id="headingOne">
								<button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion{{$booking->id}}" aria-expanded="false" aria-controls="accordionOne">
								  Booking {{$counter}}
								</button>
							  </h2>

							  <div id="accordion{{$booking->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample" style="">
								<div class="accordion-body">
								  passenger_name  : {{$booking->passenger_name }}<br>
								  passport_number  : {{$booking->passport_number }}<br>
								  booking_date  : {{$booking->booking_date }}
								</div>
							  </div>
							</div>
					</div></div>
					@php $counter++; @endphp
					@endforeach
				</div><br>				
            </div>
			</div>
            <a class='card-link' href='{{ Request::root() }}/flights/change-status-flights/{{ $flight->id }}'>
                     <i class='bx bx-windows me-1'></i>
                     @if ($flight->status == 0)
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
                     href='{{ Request::root() }}/flights/delete-flights/{{ $flight->id }}'
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
                <h5 class='modal-title' id='exampleModalLabel1'>Edit flights</h5>
                <button
                    type='button'
                    class='btn-close'
                    data-bs-dismiss='modal'
                    aria-label='Close'
                ></button>
            </div>
            <div class='modal-body'>
            <form role='form' method='post' action='{{Request::root()}}/flights/edit-flights-post' enctype='multipart/form-data'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input type='hidden' value='<?php echo $flight->id ?>'   name='flights_id'>

    <div class="form-group">
        
        <label for="flight_number">flight_number:</label>
        <input type="text" value="{{ $flight->flight_number}}" class="form-control" id="flight_number" name="flight_number">
    </div>
    <div class="form-group">
        
        <label for="origin">origin:</label>
        <input type="text" value="{{ $flight->origin}}" class="form-control" id="origin" name="origin">
    </div>
    <div class="form-group">
        
        <label for="destination">destination:</label>
        <input type="text" value="{{ $flight->destination}}" class="form-control" id="destination" name="destination">
    </div>
    <div class="form-group">
        
        <label for="departure_time">departure_time:</label>
        <input type="text" value="{{ $flight->departure_time}}" class="form-control" id="departure_time" name="departure_time">
    </div>
    <div class="form-group">
        
        <label for="arrival_time">arrival_time:</label>
        <input type="text" value="{{ $flight->arrival_time}}" class="form-control" id="arrival_time" name="arrival_time">
    </div>
    <div class="form-group">
        
        <label for="price">price:</label>
        <input type="text" value="{{ $flight->price}}" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
        
        <label for="capacity">capacity:</label>
        <input type="text" value="{{ $flight->capacity}}" class="form-control" id="capacity" name="capacity">
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
    <strong>No flightss Found!</strong>
</div>
@endif

<!-- ... (pagination) ... -->

{{ $flights->links() }}
</div></div>

@include('includes.footer')