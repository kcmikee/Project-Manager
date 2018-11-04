@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row">

        <div class="col-sm-2">
          <div class="sidebar-module">
            <div class="sidebar-module">
              <h4>Options</h4>
              <ol class="list-unstyled">
                <li><a href="/companies">View all Companies</a></li>
              </ol>
            </div>

          </div>

        </div><!-- /.blog-sidebar -->

        <div class="col-lg-9 col-md-9 col-sm-9">
          <form method="post" action="{{ route('companies.store') }}">
            {{ csrf_field() }}

          <fieldset class="form-group">
            <label for="company-name">Name<span class="required">*</span></label>
            <input class="form-control" name="name" required id="company-name" required placeholder="Enter name" spellcheck="false" value=""/>
          </fieldset>
          <fieldset class="form-group">
            <label for="company-content">Description</label>
            <textarea name="description" class="form-control autosize-target text-left" rows="5" spellcheck="false" id="company-content" placeholder="Enter description"></textarea>
          </fieldset>
          <fieldset>
            <input type="submit" class="form-control btn btn-primary" value="Submit">
          </fieldset>
          </form>
        </div>
      </div>
    </div>
@endsection
