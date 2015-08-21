@extends('layouts.master')

@section('content')
    

    @if($name == 'one')
    	<h1>Come on cuh</h1>
    @else
    	<h1>Hello, {{{ $name }}}</h1>
    @endif

@stop