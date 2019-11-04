@if ($message = Session::get('success'))
    <div class="flash-message alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="flash-message alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="flash-message alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="flash-message alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif


@if ($errors->any())
    <div class="flash-message alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Computer monkeys for error!
    </div>
@endif
