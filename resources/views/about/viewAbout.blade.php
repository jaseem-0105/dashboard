@extends('layout.master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_aboute">
        Add Details
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">profile_name</th>
                <th scope="col">age</th>
                <th scope="col">qualification</th>
                <th scope="col">post</th>
                <th scope="col">experience</th>
                <th scope="col">projects_completed</th>
                <th scope="col">cv</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($abouts as $about)
                <tr>
                    <td scope="row">{{ $about->id }}</td>
                    <td>{{ $about->profile->name }}</td>
                    <td>{{ $about->age }}</td>
                    <td>{{ $about->qualification }}</td>
                    <td>{{ $about->post }}</td>
                    <td>{{ $about->experience }}</td>
                    <td>{{ $about->projects_completed }}</td>
                    <td> <a href="{{ asset($about->cv) }}" type="button" class="btn btn-success" download=""><i
                                class="bi bi-download"></i> cv</a></td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_about{{$about->id}}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_about{{ $about->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="Add_aboute" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addAbout') }}" enctype="multipart/form-data">
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
                            <label> age</label>
                            <input type="text" name="age" class="form-control" placeholder="Enter age">
                        </div>
                        <div class="mb-3">
                            <label> qualification</label>
                            <input type="text" name="qualification" class="form-control" placeholder="Enter qualification">
                        </div>
                        <div class="mb-3">
                            <label> post</label>
                            <input type="text" name="post" class="form-control" placeholder="Enter post">
                        </div>
                        <div class="mb-3">
                            <label> experience</label>
                            <input type="text" name="experience" class="form-control" placeholder="Enter experience">
                        </div>
                        <div class="mb-3">
                            <label> projects_completed</label>
                            <input type="text" name="projects_completed" class="form-control" placeholder="Enter projects_completed">
                        </div>


                        <div class="mb-3">
                            <label> cv</label>
                            <input type="file" name="cv" class="form-control">
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

    @foreach ($abouts as $about)
    <div class="modal fade" id="edit_about{{ $about->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.editAbout', $about->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> Select name</label>
                            <select class="form-select" name="profile_name" aria-label="Select textiles">
                                @foreach ($profiles as $profile)
                                    <option @if ($profile->id = $about->profile_id) selected @endif
                                        value={{ $profile->id }}>
                                        {{ $profile->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label> age</label>
                            <input type="text" name="age" class="form-control" placeholder="Enter age"
                                value="{{ $about->age }}">
                        </div>
                        <div class="mb-3">
                            <label> qualification</label>
                            <input type="text" name="qualification" class="form-control"
                                placeholder="Enter qualification" value="{{ $about->qualification }}">
                        </div>
                        <div class="mb-3">
                            <label> post</label>
                            <input type="text" name="post" class="form-control" placeholder="Enter post"
                                value="{{ $about->post }}">
                        </div>
                        <div class="mb-3">
                            <label> experience</label>
                            <input type="text" name="experience" class="form-control" placeholder="Enter experience"
                                value="{{ $about->experience }}">
                        </div>
                        <div class="mb-3">
                            <label> projects_completed</label>
                            <input type="text" name="projects_completed" class="form-control" placeholder="Enter projects_completed"
                                value="{{ $about->projects_completed }}">
                        </div>
                        <div class="mb-3">
                            <label> Current CV File</label>
                            <div>{{substr($about->cv,10)}}</div>
                       </div>
                       <div class="mb-3">
                        <label> cv</label>
                        <input type="file" name="cv" class="form-control">
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
@foreach ($abouts as $about)
<div class="modal fade" id="delete_about{{ $about->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <a href="{{route('admin.deleteAbout',$about->id)}}" type="button" class="btn btn-primary">Submit</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
