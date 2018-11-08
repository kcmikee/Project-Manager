@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-3">
  </div>
    <div class="col-lg-6">
        <div class="card border-dark">
            <div class="card-header card bg-primary text-light ">
              <h3> All Users</h3>
             </div>
            <ol class="list-group text-dark">
            @foreach($users as $user)
              <li class="list-group-item"><i class="fa fa-briefcase"></i>
                <a href="users/{{$user->id}}" class="text-dark">
                  <!-- {{ $user->email }} -->
                  {{ $user->name }}
               </a>
              </li>
            @endforeach
          </ol>
            </div>

    </div>
</div>
</div>
@endsection
