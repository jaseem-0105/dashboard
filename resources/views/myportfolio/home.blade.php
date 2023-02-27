@extends('layout.master2')
@section('content')
    <div class="home">
        @if ($home)

        <h3>{{$home->sub_title}}</h3>
        <h1>I'M <SPAN>{{$home->profile->name}}</SPAN></h1>
        <p>{!!$home->description!!}</p>
        <a href="#about"><button class="btn">about me <i class="fas fa-user"></i></button></a>
        @endif
    </div>
@endsection
