@extends('layouts.app')

@section('content')
    @switch(Auth::user()->type)
        @case('user'):
        @include('layouts.user.userHome')
        @break
        @case('admin'):
        @include('layouts.admin.adminHome')
        @break
        @case('accountant'):
        @include('layouts.accountant.techHome')
        @break
    @endswitch
@endsection
