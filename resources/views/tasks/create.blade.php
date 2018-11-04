@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">

        <div class="col-sm-2">
          <div class="sidebar-module">
            <div class="sidebar-module">
              <h4>Options</h4>
              <ol class="list-unstyled">
                <li><a href="/tasks">View all Tasks</a></li>
              </ol>
            </div>

          </div>

        </div><!-- /.blog-sidebar -->

        <div class="col-lg-9 col-md-9 col-sm-9">
          <h1>Create new Task</h1>
          <form method="post" action="{{ route('tasks.store') }}">
            {{ csrf_field() }}

          <fieldset class="form-group">
            <label for="task-name">Name<span class="required">*</span></label>
            <input class="form-control" name="name" required id="task-name" required placeholder="Enter name" spellcheck="false" value=""/>
          </fieldset>
          <input type="hidden" name="project_id" value="{{$project_id}}">

          @if($projects != null)
          <fieldset class="form-group">
            <label for="project-content">Select Project</label>
            <select name="project_id" class="form-control">
              @foreach($projects as $project)
              <option value="{{ $project->id }}"> {{$project->name }}</option>
              @endforeach
            </select>
          </fieldset>
          @endif

          <fieldset>
            <label for="taks-days">Input the number of days</label>
            <input type="integer" class="form-control" name="days" placeholder="Enter number of days it'll take">
          </fieldset>

          <!-- <fieldset class="form-group">
            <label for="task-content">Description</label>
            <textarea name="description" class="form-control autosize-target text-left" rows="5" spellcheck="false" id="task-content" placeholder="Enter description"></textarea>
          </fieldset> -->
          <fieldset>
            <input type="submit" class="form-control btn btn-primary" value="Submit">
          </fieldset>
          </form>
        </div>
      </div>
    </div>
@endsection
