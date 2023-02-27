@extends('layout.master2')
@section('content')
    <div class="portfolio">
        <h1 class="heading">my<span> portfolio</span></h1>
        <div class="box-container">
            @if ($portfolios)

            @foreach ($portfolios as $portfolio)
            <div class="box">
                <img src="{{$portfolio->image}}" alt="">
            </div>

            @endforeach
            @endif

        </div>
    </div>
@endsection
