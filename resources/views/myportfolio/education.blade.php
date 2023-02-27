@extends('layout.master2')
@section('content')

<div class="education">

    <h1 class="heading">my<span> education</span></h1>

    <div class="box-container">
        @if ($educations)
        @foreach ($educations as $education)

        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span>{{$education->year}}</span>
            <h3>{{$education->course}}</h3>
            <p>{!!$education->description!!}</p>
        </div>
        @endforeach
        @endif



    </div>
</div>
@endsection
