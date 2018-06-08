<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Content Hub | @yield('title')</title>

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/skins/skin-black.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('bower_components/toastr/toastr.min.css') }}">
  <!-- Select2-->
  <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
  <!-- Bootstrap-Vue -->
  <!-- <link src="{{ asset('bower_components/bootstrap-vue/dist/bootstrap-vue.min.css') }}"></link> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') }}"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js') }}"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition skin-black sidebar-mini">

  @include('user.partials.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('user.partials.main_sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="app">
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  @include('user.partials.control_sidebar')
<!-- ./wrapper -->

<!-- Footer -->
@include('user.partials.footer')
<!-- /.wrapper -->


<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!-- Vue -->
<!-- <script src="{{ asset('bower_components/bootstrap-vue/dist/bootstrap-vue.min.js') }}"></script> -->
<!-- Select2 -->
<script src="vendor/select2/dist/js/select2.min.js"></script>
<!-- Bootstrap-Vue -->
<!-- <script src="{{ asset('bower_components/vue/dist/vue.min.js') }}"></script> -->
<!-- jQuery 3 -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.min.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Alertify -->
<script src="{{ asset('bower_components/alertifyjs/dist/js/alertify.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('bower_components/toastr/toastr.min.js') }}"></script>

<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
    @endif

    @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}")
    @endif

    {{--  $(function () {
        $('.confirm').on('click', function (e) {
            e.preventDefault();
            var linkLocation = $(this).attr('href');

            alertify.okBtn("Yes")
                .cancelBtn("No")
                .confirm("Are you sure you want to perform this action?", function () {
                    window.location = linkLocation;
                });
        });
    });  --}}

    $(document).ready(function() {
      $('.js-example-basic-multiple').select2();
  });
</script>
<!-- <script>
  var app = new Vue({
    el: '#app',
    data: {}
  });
</script> -->

@yield('vue')
@stack('scripts')
</body>
</html>
