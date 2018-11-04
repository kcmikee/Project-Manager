@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-3">
  <a class="btn btn-outline-info col-lg-7 col-md-7 col-sm-7" href="projects/create">Add Projects</a>
  </div>
    <div class="col-lg-6">
        <div class="card border-dark">
            <div class="card-header card h3 bg-dark text-light">Projects</div>
            <ol class="list-group text-dark">
            @foreach($projects as $project)
              <li class="list-group-item"><i class="fa fa-briefcase"></i>
                <a href="/projects/{{ $project->id }}" class="text-dark">
                 {{ $project->name }}
               </a>
              </li>
            @endforeach
          </ol>
            </div>

    </div>
</div>
</div>
@endsection
