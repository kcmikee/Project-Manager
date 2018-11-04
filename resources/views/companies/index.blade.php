@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
  <div class="col-lg-3">
  <a class="btn btn-outline-info col-lg-7 col-md-7 col-sm-7" href="companies/create">Add Company</a>
  </div>
    <div class="col-lg-6">
        <div class="card border-dark">
            <div class="card-header card h3 bg-dark text-light">Companies</div>
            <ol class="list-group text-dark">
            @foreach($companies as $company)
              <li class="list-group-item">
                <a href="/companies/{{ $company->id }}" class="text-dark">
                <i class="fa fa-building"></i> {{ $company->name }}
               </a>
              </li>
            @endforeach
          </ol>
            </div>

    </div>
</div>
</div>
@endsection
