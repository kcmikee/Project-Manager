<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Project M</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body>
      @extends('layouts.master')
      @section('title','index')

      @section('content')
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    This is the About page
                </div>
                <div class="quote">
                    What can i do for you today? Master Mike.
                </div>


            </div>
        </div>
      @endsection
    </body>
</html>
