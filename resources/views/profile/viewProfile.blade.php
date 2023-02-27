@extends('layout.master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_profile">
        Add Profile
    </button>
    <a type="button" href="{{ route('admin.deleatedUser') }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i>Deleated
        User</a>
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
                    <td>{!! $profile->description !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_profile{{ $profile->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_profile{{ $profile->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="Add_profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addProfile') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="mb-3">
                            <label> Profile_image</label>
                            <input type="file" name="profile_image" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label> Background_image</label>
                            <input type="file" name="background_image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label> Description</label>
                            <textarea id="summernote" type="text" name="description" class="form-control" placeholder="Enter name"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    {{-- edit --}}
    @foreach ($profiles as $profile)
        <div class="modal fade" id="edit_profile{{ $profile->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.editProfile', $profile->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label> name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter name"
                                    value="{{ $profile->name }}">
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label> current profile_image</label>
                                <img src="{{ asset($profile->profile_image) }}" alt="profile_image"
                                    style="width: 10vh;height:10vh" />
                            </div>

                            <div class="mb-3">
                                <label> Profile_image</label>
                                <input type="file" name="profile_image" class="form-control">
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label> current background_image</label>
                                <img src="{{ asset($profile->background_image) }}" alt="profile_image"
                                    style="width: 10vh;height:10vh" />
                            </div>

                            <div class="mb-3">
                                <label> Background_image</label>
                                <input type="file" name="background_image" class="form-control"
                                    value="{{ $profile->background_image }}">
                            </div>
                            <div class="mb-3">
                                <label> Description</label>
                                <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description">{!! $profile->description !!}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    {{-- delete --}}
    @foreach ($profiles as $profile)
        <div class="modal fade" id="delete_profile{{ $profile->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        do you want to delete
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('admin.deleteProfile', $profile->id) }}" type="button"
                            class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
        $('.summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
