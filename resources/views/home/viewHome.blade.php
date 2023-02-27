@extends('layout.master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_home">
        Add Details
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">profile_name</th>
                <th scope="col">sub_title</th>
                <th scope="col">description</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($homes as $home)
                <tr>
                    <td scope="row">{{ $home->id }}</td>
                    <td>{{ $home->profile->name }}</td>
                    <td>{{ $home->sub_title }}</td>
                    <td>{!! $home->description !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_home{{ $home->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_home{{ $home->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="Add_home" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addHome') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> Select name</label>
                            <select class="form-select" name="profile_name" aria-label="Select textiles">
                                @foreach ($profiles as $profile)
                                    <option value={{ $profile->id }}>{{ $profile->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label> sub_title</label>
                            <input type="text" name="sub_title" class="form-control" placeholder="Enter sub_title">
                        </div>


                        <div class="mb-3">
                            <label> Description</label>
                            <textarea type="text" name="description" class="form-control summernote" placeholder="Enter name"></textarea>
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

    @foreach ($homes as $home)
        <div class="modal fade" id="edit_home{{ $home->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('admin.editHome', $home->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label> Select name</label>
                                <select class="form-select" name="profile_name" aria-label="Select textiles">
                                    @foreach ($profiles as $profile)
                                        <option @if ($profile->id = $home->profile_id) selected @endif
                                            value={{ $profile->id }}>
                                            {{ $profile->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="mb-3">
                                <label> sub_title</label>
                                <input type="text" name="sub_title" class="form-control" placeholder="Enter name"
                                    value="{{ $home->sub_title }}">
                            </div>
                            <div class="mb-3">
                                <label> Description</label>
                                <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description">{!! $home->description !!}</textarea>
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


    @foreach ($homes as $home)
        <div class="modal fade" id="delete_home{{ $home->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <a href="{{ route('admin.deleteHome', $home->id) }}" type="button"
                            class="btn btn-primary">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
