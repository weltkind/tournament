@extends('index')

@section('content')
    <p>{!!  $intro!!}</p>
    <p>How many knights will we invite (2-100)?</p>
    <form method="post" action="/">
        <input type="text" name="amount">
        <input type="submit">
    </form>

    @isset($error)
        <p>{{$error}}</p>
    @endisset
@endsection
