@extends('errors::minimal')

@section('title', __('500'))
@section('message1', __('Something went wrong on our end. Please try again later.'))
@section('code', '500')
@section('message', __('Internal Server Error'))

@section('content')
    <a href="javascript:void(0);" onclick="window.location.reload(true);" class="button is-info">Try again</a>
    <p class="subtitle mt-5">Or</p>
@endsection
