@if(Session::has('message.level'))
  <div class="alert alert-{{ session('message.level') }}">
                    <strong><span class="glyphicon glyphicon-ok"></span>{{  Session::get('message.content') }}</strong>
                </div>
@endif