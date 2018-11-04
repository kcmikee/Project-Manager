@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">

        <div class="col-sm-2">
          <div class="sidebar-module">
            <div class="sidebar-module">
              <h4>Options</h4>
              <ol class="list-unstyled">
                <li><a href="/projects">View all Projects</a></li>
              </ol>
            </div>

          </div>

        </div><!-- /.blog-sidebar -->

        <div class="col-lg-9 col-md-9 col-sm-9">
          <h1>Create new Project</h1>
          <form method="post" action="{{ route('projects.store') }}">
            {{ csrf_field() }}

          <fieldset class="form-group">
            <label for="project-name">Name<span class="required">*</span></label>
            <input class="form-control" name="name" required id="project-name" required placeholder="Enter name" spellcheck="false" value=""/>
          </fieldset>
          <input type="hidden" name="company_id" value="{{$company_id}}">

          @if($companies != null)
          <fieldset class="form-group">
            <label for="company-content">Select Company</label>
            <select name="company_id" class="form-control">
              @foreach($companies as $company)
              <option value="{{ $company->id }}"> {{$company->name }}</option>
              @endforeach
            </select>
          </fieldset>
          @endif

          <fieldset class="form-group">
            <label for="project-content">Description</label>
            <textarea name="description" class="form-control autosize-target text-left" rows="5" spellcheck="false" id="project-content" placeholder="Enter description"></textarea>
          </fieldset>
          <fieldset>
            <input type="submit" class="form-control btn btn-primary" value="Submit">
          </fieldset>
          </form>
        </div>
      </div>
    </div>
@endsection
