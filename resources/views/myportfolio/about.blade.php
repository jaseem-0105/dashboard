@extends('layout.master2')
@section('content')
    <div class="about">

        <h1 class="heading"><span>about</span>me</h1>
        @if ($about)

        <div class="row">
            <div class="info">
                <h3><span>name:</span>{{$about->profile->name}}</h3>
                <h3><span>age:</span> {{$about->age}}</h3>
                <h3><span>qualification:</span> {{$about->qualification}}</h3>
                <h3><span>post:</span> {{$about->post}}</h3>
                <a href="#"><button class="btn"> download cv <i class="fas fa-download"></i></button></a>
            </div>
            <div class="counter">
                <div class="box">
                    <span>{{$about->experience}}</span>
                    <h3>years of experience</h3>
                </div>

                <div class="box">
                    <span>{{$about->projects_completed}}</span>
                    <h3>project completed</h3>
                </div>

            </div>
        </div>
        @endif
    @endsection
