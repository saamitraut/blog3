@include('includes.header')

<!-- Content wrapper -->
<div class="content-wrapper">
<!-- Content starts -->
<div class="container-xxl flex-grow-1 container-p-y">
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">flight_reviews</h4>

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
>Add flight_reviews </button>

<!-- Modal -->
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Add flight_reviews</h5 >
                <button 
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                 <form role="form" method="post" action="/flight_reviews/add-flight_reviews-post" >
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
        
        <label for="user_id">user_id:</label>
        <select onchange="showStock1(this)" id="user_id" name="user_id" class="form-select">
            <option value="0">Select user</option>
            @foreach($users as $user)
                <option value="{{$user['id']}}">{{ $user['name'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="rating">rating:</label>
        <input type="text" class="form-control" id="rating" name="rating">
    </div>
    <div class="form-group">
        
        <label for="review">review:</label>
        <input type="text" class="form-control" id="review" name="review">
    </div>
    <div class="form-group">
        
        <label for="recommendation">recommendation:</label>
        <input type="text" class="form-control" id="recommendation" name="recommendation">
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
 @if(count($flight_reviews) > 0)
        <?php $i = 1; ?>
        @foreach($flight_reviews as $flight_review)
		<div class="row">
		<div class="col-md">
        <div class='card mb-4'>
            <div class='card-body'>
                <h5 class='card-title'>flight_number : {{$flights[$flight_review->flight_id]['flight_number']}} </h5>
                <h5 class='card-title'>name : {{$users[$flight_review->user_id]['name']}} </h5>
            <h5 class='card-title'>rating : {{$flight_review->rating}}</h5>
            <h5 class='card-title'>review : {{$flight_review->review}}</h5>
            <h5 class='card-title'>recommendation : {{$flight_review->recommendation}}</h5><a class='card-link' href='{{ Request::root() }}/flight_reviews/change-status-flight_reviews/{{ $flight_review->id }}'>
                     <i class='bx bx-windows me-1'></i>
                     @if ($flight_review->status == 0)
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
                     href='{{ Request::root() }}/flight_reviews/delete-flight_reviews/{{ $flight_review->id }}'
                     onclick='return confirm('Are you sure to delete?')'
                 >
                     <i class='bx bx-trash me-1'></i> Delete
                 </a>
             </div>
         </div>
         </div>
		 <div class="col-md">
		 <div class="accordion-item card">
                      <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
                        <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordionIcon-1" aria-controls="accordionIcon-1" aria-expanded="false">
						This review belongs to {{$flight_review->flight->flight_number}} 
                        </button>
                      </h2>
                      <div id="accordionIcon-1" class="accordion-collapse collapse" data-bs-parent="#accordionIcon" style="">
                        <div class="accordion-body">
                          flight_number: {{$flight_review->flight->flight_number}}<br>
                          origin : {{$flight_review->flight->origin }}<br>
                          destination : {{$flight_review->flight->destination}}<br>
                          departure_time   : {{$flight_review->flight->departure_time }}<br>
                          arrival_time    : {{$flight_review->flight->arrival_time  }}<br>
                          
						  price     : {{$flight_review->flight->price   }}<br>
                          capacity     : {{$flight_review->flight->capacity  }}
                        </div>
                      </div>
                    </div>
		 </div>
		 </div>
         
<!-- Modal edit starts -->
<div class='modal fade' id='basicModall{{ $i }}' tabindex='-1' aria-hidden='true'>
    <div class='modal-dialog' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel1'>Edit flight_reviews</h5>
                <button
                    type='button'
                    class='btn-close'
                    data-bs-dismiss='modal'
                    aria-label='Close'
                ></button>
            </div>
            <div class='modal-body'>
            <form role='form' method='post' action='{{Request::root()}}/flight_reviews/edit-flight_reviews-post' enctype='multipart/form-data'>
                    <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                    <input type='hidden' value='<?php echo $flight_review->id ?>'   name='flight_reviews_id'>

    <div class="form-group">
        
        <label for="flight_id">flight_id:</label>
        <select onchange="showStock1(this)" id="flight_id" name="flight_id" class="form-select">
            <option value="0">Select flight</option>
            @foreach($flights as $flight)
                <option value="{{$flight['id']}}" @if($flight_review->flight_id == $flight['id']) selected @endif >{{ $flight['flight_number'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="user_id">user_id:</label>
        <select onchange="showStock1(this)" id="user_id" name="user_id" class="form-select">
            <option value="0">Select user</option>
            @foreach($users as $user)
                <option value="{{$user['id']}}" @if($flight_review->user_id == $user['id']) selected @endif >{{ $user['name'] }}</option>
            @endforeach
        </select></div>
    <div class="form-group">
        
        <label for="rating">rating:</label>
        <input type="text" value="{{ $flight_review->rating}}" class="form-control" id="rating" name="rating">
    </div>
    <div class="form-group">
        
        <label for="review">review:</label>
        <input type="text" value="{{ $flight_review->review}}" class="form-control" id="review" name="review">
    </div>
    <div class="form-group">
        
        <label for="recommendation">recommendation:</label>
        <input type="text" value="{{ $flight_review->recommendation}}" class="form-control" id="recommendation" name="recommendation">
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
    <strong>No flight_reviewss Found!</strong>
</div>
@endif

<!-- ... (pagination) ... -->

</div></div>

@include('includes.footer')