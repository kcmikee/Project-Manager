@extends('layouts.app')

@section('content')
        <div class="container">
          <div class="row">
          <div class="jumbotron col-lg-9 col-md-9 col-sm-9">
          <h1>{{ $project->name }}</h1>
          <hr class="my-3">
          <p>{{ $project->description }}</p>
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
                <li>
                  <a href="/companies/{{ $project->id }}/edit">
                    <i class="fa fa-edit"></i> Edit
                  </a>
                </li>

      @if($project->user_id == Auth::user()->id)
                <li>
                  <a
                  href="#" onclick="var result=confirm('Are your sure?');
                  if(result){
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                  }">
                  <i class="fa fa-building" aria-hidden="true"></i>
                    Delete
                  </a>

                  <form id="delete-form" action=" {{ route('projects.destroy', [$project->id])}} " method="post" style="dispalay:none;">
                    <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                  </form>

                </li>

    @endif
                <li><a href="/companies"><i class="fa fa-building"></i>View Companies</a></li>
                <li><a href="/companies/create"><i class="fa fa-plus-circle"></i>Add New Company</a></li>
                <li><a href="/projects/create/{{ $project->id }}"><i class="fa fa-briefcase"></i>Add New Project</a></li>

                <!-- <li><a href="#">Add new member</a></li> -->
              </ol>
            </div>

            <hr>

            <h4>Add new memebers</h4>
            <div class="row">
              <div class="col-lg-12 col-sm-12">
                <form id="add-user" action=" {{ route('projects.adduser')}} " method="POST">
                                        {{csrf_field()}}
                <div class="input-group">
                  <input type="hidden" name="project_id" value="{{$project->id}}" class="form-control">
                  <input type="text" class="form-control" name="email" placeholder="Email">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">Add</button>
                  </span>
                </div>
              </form>
              </div>
            </div>

            <br>
            <hr>

             <h4>Team Members</h4>

            <ol class="list-unstyled" id="member-list">
              @foreach($project->users as $user)
                <li>
                  <a href="#"><i class="fa fa-user"></i> {{$user->email}}</a>
                </li>
              @endforeach
            </ol>
          </div>

        </div><!-- /.blog-sidebar -->
      </div>


      <div class="container">
        <!-- Example row of columns -->



        <!--commentform-->

      <div class="col-lg-12 ">
        <form method="post" action="{{ route('comments.store') }}">
          {{ csrf_field() }}

        <input type="hidden" name="commentable_type" value="App\Project">
        <input type="hidden" name="commentable_id" value="{{$project->id}}">

        <fieldset class="form-group">
          <h2 class="text-info text-center">MAKECOMMENTS</h2>
          <hr>
          <label for="comment-content">Comments</label>
          <textarea name="body" class="form-control autosize-target text-left" rows="3" spellcheck="false" id="comment-content" placeholder="Enter description"></textarea>          <label for="comment-content">Proof of work(url/photo)</label>

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
      <!--End of form -->
        </div>

        <br>
        <hr>
        <br>

        <div class="container">
    <div class="row justify-content-center">
		<div class="col-md-9 col-md-offset-4 col-sm-6 col-sm-offset-2 col-xs-8 col-xs-offset-2">

            <!-- Fluid width widget -->
    	    <div class="panel panel-default border border-secondary rounded">
                <div class="panel-heading">
                    <h3 class="panel-title  text-center bg-dark text-light">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                      @foreach($project->comments as $comment)
                        <li class="media border-bottom">
                            <div class="media-left">
                              <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-thumbnail" style="width:50px; height:50px; top:2px; left:10px; border-radius:50%;">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                  <small>
                                    <a class="disabled" href="users/{{$comment->user->id}}">{{$comment->user->name}}</a>
                                    <br>
                                    commented on {{ $comment->created_at}}
                                    </small>
                                </h4>
                                <p>
                                  {{ $comment->body }}
                                </p>
                                Proof:
                                <p>
                                  {{ $comment->url }}
                                </p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <a href="#" class="btn btn-dark btn-block">More Events »</a>
                </div>
            </div>
            <!-- End fluid width widget -->

		</div>
	</div>
</div>


          <hr>

        <footer class="text-center">
          <p>© Company 2014</p>
        </footer>
       <!-- /container -->
    </div>

@endsection
