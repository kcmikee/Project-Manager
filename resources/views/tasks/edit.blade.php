@extends('layouts.app')

@section('content')
        <!-- <div class="container">
          <div class="row">
          <div class="jumbotron col-lg-9 col-md-9 col-sm-9">
           -->


      <div class="container">
        <!-- Example row of columns -->
        <div class="row">

          <div class="col-sm-2">
            <div class="sidebar-module">
              <div class="sidebar-module">
                <h4>Options</h4>
                <ol class="list-unstyled">
                  <li><a href="/projects/{{ $project->id }}/edit">Edit</a></li>
                  <li><a href="/projects/{{ $project->id }}">View Project</a></li>
                  <li><a href="/projects/{{ $project->id}}">View all Project</a></li>
                </ol>
              </div>

            </div>

          </div><!-- /.blog-sidebar -->

        <div class="col-lg-9 col-md-9 col-sm-9">
          <form method="post" action="{{ route('projects.update',[$project->id]) }}">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">

            <fieldset class="form-group">
              <label for="project-name">Name<span class="required">*</span></label>
              <input class="form-control" name="name" required id="project-name" required placeholder="Enter name" spellcheck="false" value="{{ $project->name }}"/>
            </fieldset>
            <fieldset class="form-group">
              <label for="project-content">Description</label>
              <textarea name="description" class="form-control autosize-target text-left" rows="5" spellcheck="false" id="project-content" placeholder="Enter description">{{ $project->description }}</textarea>
            </fieldset>
            <fieldset>
              <input type="submit" class="form-control btn btn-primary" value="Submit">
            </fieldset>
          </form>


        </div>
        </div>

        </div>

        <hr>


      </div> <!-- /container -->

@endsection
