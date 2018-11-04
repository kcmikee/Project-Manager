@extends('layouts.app')

@section('content')
        <div class="container">
          <div class="row">
          <div class="jumbotron col-lg-9 col-md-9 col-sm-9">
          <h1>{{ $company->name }}</h1>
          <p>{{ $company->description }}</p>
          <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more »</a></p>-->
        </div>
        <div class="col-sm-3">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <div class="sidebar-module">
              <h4>Elsewhere</h4>
              <ol class="list-unstyled">
                <li><a href="/companies/{{ $company->id }}/edit">Edit</a></li>

                @if($company->user_id == Auth::user()->id)
                <li>
                  <a
                  href="#" onclick="var result=confirm('Are your sure?');
                  if(result){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                  }">
                    Delete
                  </a>

                  <form id="delete-form" action=" {{ route('companies.destroy', [$company->id])}} " method="post" style="dispalay:none;">
                    <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                  </form>

                </li>
              @endif
                <li><a href="/companies">View Companies</a></li>
                <li><a href="/companies/create">Add New Company</a></li>
                <li><a href="/projects/create/{{ $company->id }}">Add New Project</a></li>

                <!-- <li><a href="#">Add new member</a></li> -->
              </ol>
            </div>
            <!-- <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol> -->
          </div>

        </div><!-- /.blog-sidebar -->
      </div>

      <h2 class="text-info text-center">PROJECTS</h2>
<hr>
<div class="container">
   <div class="row">
@foreach($company->projects as $project)
     <div class="col-sm-4 col-md-4 col-lg-4">
       <div class="card">
         <div class="card-body">
           <h5 class="card-title">  {{$project->name}}</h5>
           <p class="card-text">{{ $project->description }}</p>
           <a href="/projects/{{$project->id}}" class="btn btn-primary">View Project</a>
         </div>
       </div>
     </div>
@endforeach

        <hr>

        <div class="col-lg-12 ">
          <form method="post" action="{{ route('comments.store') }}">
            {{ csrf_field() }}

          <input type="hidden" name="commentable_type" value="App\Company">
          <input type="hidden" name="commentable_id" value="{{$company->id}}">
          <hr>
          <h2 class="text-info text-center">MAKE COMMENTS</h2>

          <fieldset class="form-group">
            <textarea name="body" class="form-control autosize-target text-left" rows="3" spellcheck="false" id="comment-content" placeholder="Enter description"></textarea>
          </fieldset>

          <fieldset class="form-group">
            <label for="comment-content">Proof of work(url/photo)</label>
            <textarea name="url" class="form-control autosize-target text-left" rows="3" spellcheck="false" id="commentt-content" placeholder="Enter description"></textarea>
          </fieldset>

          <fieldset>
            <input type="submit" class="form-control btn btn-primary" value="Submit" style="width:20%;">
          </fieldset>
          </form>
        </div>

        <br>
        <hr>
        <div class="panel-heading">
          <hr>
            <h3 class="panel-title text-info text-center">
                <span class="glyphicon glyphicon-comment"></span> 
                Recent Comments
            </h3>
        </div>
        <div class="panel-body">
            <ul class="media-list">
              @foreach($company->comments as $comment)
                <li class="media">
                    <div class="media-left">
                      <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-thumbnail" style="width:50px; height:50px; top:2px; left:10px; border-radius:50%;">
                    </div>
                    <div class="media-body">
                        <h6 class="media-heading">
                          <b>
                          {{$comment->user->name}}
                          </b>
                            <br>
                        </h6>
                        <p>
                          {{ $comment->body }}
                        </p>
                          <b>Proof:</b>
                        <p>
                          {{ $comment->url }}
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        <br>

        <!-- <div class="container">
    <div class="row">
		<div class="col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2">

             Fluid width widget
                 	    <div class="panel panel-default">

            </div>
             End fluid width widget

		</div>
	</div>-->
</div>

<hr>

        <footer>
          <p>© Company 2014</p>
        </footer>
      </div> <!-- /container -->
    </div>

@endsection
