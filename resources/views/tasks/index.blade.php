@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-3">
  <a class="btn btn-outline-info col-lg-7 col-md-7 col-sm-7" href="tasks/create">Add Tasks</a>
  </div>
    <div class="col-lg-6">
        <div class="card border-dark">
            <div class="card-header card h3 bg-dark text-light">Tasks</div>
            <ol class="list-group text-dark">
            @foreach($tasks as $task)
              <li class="list-group-item"><i class="fa fa-briefcase"></i>
                <a href="/tasks/{{ $task->id }}" class="text-dark">
                 {{ $task->name }}
               </a>
              </li>
            @endforeach
          </ol>
            </div>

    </div>
</div>
</div>
@endsection
