@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <form enctype="multipart/form-data" action="{{ route('profile')}}" method="POST">
        {{ csrf_field() }}
        <label>Update Profile Image</label>
        <br>
        <input type="file" name="avatar">
        <br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <br>
        <input type="submit" class="btn btn-sm btn-primary pull-right">
      </form>
    </div>
  </div>
</div>

@endsection
