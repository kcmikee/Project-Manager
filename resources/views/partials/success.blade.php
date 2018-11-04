@if(session()->has('success'))
  <div class="alert alert-dismissible alert-success show">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
      <strong> {!!session()->get('success')!!}  </strong>
  </div>
@endif
