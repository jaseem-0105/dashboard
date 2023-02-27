@extends('layout.master')
@section('content')

    <a type="button" href="{{route('admin.viewProfile')}}" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i></a>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Profile_image</th>
                <th scope="col">Background_image</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
                <tr>
                    <td scope="row">{{ $profile->id }}</td>
                    <td>{{ $profile->name }}</td>
                    <td>
                        <img src="{{ asset($profile->profile_image) }}" alt="profile_image"
                            style="width: 10vh;height:10vh" />
                    </td>
                    <td>
                        <img src="{{ asset($profile->background_image) }}" alt="background_image"
                            style="width: 10vh;height:10vh" />
                    </td>
                    <td>{{ $profile->description }}</td>
                    <td>

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#restore_profile{{ $profile->id }}">
                            <i class="bi bi-recycle"></i>
                        </button>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($profiles as $profile)
    <div class="modal fade" id="restore_profile{{ $profile->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    do you want to restore
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="{{route('viewDeleatedUser',$profile->id)}}" type="button" class="btn btn-success">Restore</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
    @endsection
