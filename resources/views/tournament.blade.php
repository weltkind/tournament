@extends('index')

@section('content')
    <p>{!!  $story!!}</p>
    <p><a href="{{route('intro')}}">Back</a></p>
@endsection

