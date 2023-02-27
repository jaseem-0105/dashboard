@php
    use App\Models\Profile;
    $profile = Profile::latest()->first();
    // dd($profile);
@endphp
<header>
    <div class="user">
        <img src="{{ asset($profile->profile_image) }}" alt="image"
        {{-- style="width: 10vh;height:10vh" --}}
         />
        <h3 class="name">{{ $profile->name }}</h3>
        <p class="post">Front end developer</p>
    </div>
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('admin.home') }}">home</a></li>
            <li><a href="{{ route('admin.about') }}">about</a></li>
            <li><a href="{{ route('admin.education') }}">education</a></li>
            <li><a href="{{ route('admin.portfolio') }}">portfolio</a></li>
            <li><a href="#contact">contact</a>"</li>
        </ul>
    </nav>
</header>
