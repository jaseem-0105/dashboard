@extends('layout.master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_education">
        Add Details
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">profile_name</th>
                <th scope="col">year</th>
                <th scope="col">course</th>
                <th scope="col">description</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($educations as $education)
                <tr>
                    <td scope="row">{{ $education->id }}</td>
                    <td>{{ $education->profile->name }}</td>
                    <td>{{ $education->year }}</td>
                    <td>{{ $education->course }}</td>
                    <td>{!! $education->description !!}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_education{{ $education->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_education{{ $education->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="Add_education" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addEducation') }}" enctype="multipart/form-data">
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
                            <label> year</label>
                            <input type="text" name="year" class="form-control" placeholder="Enter year">
                        </div>
                        <div class="mb-3">
                            <label> course</label>
                            <input type="text" name="course" class="form-control" placeholder="Enter course">
                        </div>
                        <div class="mb-3">
                            <label> description</label>
                            <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description"></textarea>
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

    @foreach ($educations as $education)
    <div class="modal fade" id="edit_education{{ $education->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.editEducation', $education->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> Select name</label>
                            <select class="form-select" name="profile_name" aria-label="Select textiles">
                                @foreach ($profiles as $profile)
                                    <option @if ($profile->id = $education->profile_id) selected @endif
                                        value={{ $profile->id }}>
                                        {{ $profile->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mb-3">
                            <label> year</label>
                            <input type="text" name="year" class="form-control" placeholder="Enter year"
                                value="{{ $education->year }}">
                        </div>
                        <div class="mb-3">
                            <label> course</label>
                            <input type="text" name="course" class="form-control"
                                placeholder="Enter course" value="{{ $education->course }}">
                        </div>
                        <div class="mb-3">
                            <label> description</label>
                            <textarea type="text" name="description" class="form-control summernote" placeholder="Enter description">{!! $education->description !!}</textarea>
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
@foreach ($educations as $education)
<div class="modal fade" id="delete_education{{ $education->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <a href="{{route('admin.deleteEducation',$education->id)}}" type="button" class="btn btn-primary">Submit</a>
            </div>
        </div>
    </div>
</div>
@endforeach
    @endsection
