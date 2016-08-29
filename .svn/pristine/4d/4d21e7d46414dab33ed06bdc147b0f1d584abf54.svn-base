<!DOCTYPE html>
<html>
<head>
    <title>iLRS</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ url('resources/assets/css/bootstrap.min.css') }}">

    <!-- Optional theme -->
    <link rel="stylesheet" href="{{ url('resources/assets/css/bootstrap-theme.min.css') }}">
    <link rel = "stylesheet" href="{{ url('resources/assets/css/app.css') }}">
    <link rel = "stylesheet" href="{{ url('resources/assets/css/select2.min.css') }}" rel="stylesheet" />

</head>
<body>
{{--@include('partials.nav')--}}
<div class="container">
{{-- @if (Session::has('flash_message'))
      <div class = "alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }}">
          @if (Session::has('flash_message_important'))
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          @endif
          {{ Session::get('flash_message') }}
      </div>
  @endif

    @include('flash::message')--}}

  @yield('content')
</div>

<script src="{{ url('resources/assets/js/jquery.min.js') }}"></script>
<script src="{{ url('resources/assets/js/select2.min.js') }}"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="{{ url('resources/assets/js/bootstrap.min.js') }}"></script>
<script>

    // $('div.alert').not('.alert-important').delay(3000).slideUp(300);

    $('#flash-overlay-modal').modal();

</script>
@yield('footer')
</body>
</html>
