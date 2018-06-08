@if(Session::has('success'))
  <div class="alert alert-dismissible alert-success fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('success') }}
  </div>
@endif
@if(Session::has('error'))
  <div class="alert alert-dismissible alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('error') }}
  </div>
@endif
@if(Session::has('warning'))
  <div class="alert alert-dismissible alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('warning') }}
  </div>
@endif
@if(Session::has('info'))
  <div class="alert alert-dismissible alert-info fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ Session::get('info') }}
  </div>
@endif

@if(isset($success))
  <div class="alert alert-dismissible alert-success fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $success }}
  </div>
@endif
@if(isset($error))
  <div class="alert alert-dismissible alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $error }}
  </div>
@endif
@if(isset($warning))
  <div class="alert alert-dismissible alert-warning fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $warning }}
  </div>
@endif
@if(isset($info))
  <div class="alert alert-dismissible alert-info fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    {{ $info }}
  </div>
@endif