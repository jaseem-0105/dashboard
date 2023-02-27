@extends('layout.master')
@section('content')
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_portfolio">
        Add
    </button>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">profile_name</th>
                <th scope="col">image</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $portfolio)
                <tr>
                    <td scope="row">{{ $portfolio->id }}</td>
                    <td>{{ $portfolio->profile->name }}</td>
                    <td>
                        <img src="{{ asset($portfolio->image) }}" alt="image" style="width: 10vh;height:10vh" />
                    </td>
                    <td>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edit_portfolio{{ $portfolio->id }}">
                            <i class="bi bi-pencil-square"></i>
                        </button>


                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#delete_portfolio{{ $portfolio->id }}">
                            <i class="bi bi-trash3"></i>
                        </button>
                    </td>



                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="Add_portfolio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.addPortfolio') }}" enctype="multipart/form-data">
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
                            <label> image</label>
                            <input type="file" name="image" class="form-control">
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
    @foreach ($portfolios as $portfolio)
    <div class="modal fade" id="edit_portfolio{{ $portfolio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.editPortfolio', $portfolio->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label> Select name</label>
                            <select class="form-select" name="profile_name" aria-label="Select textiles">
                                @foreach ($profiles as $profile)
                                    <option @if ($profile->id = $portfolio->profile_id) selected @endif
                                        value={{ $profile->id }}>
                                        {{ $profile->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label> current image</label>
                            <img src="{{ asset($portfolio->image) }}" alt="image"
                                style="width: 10vh;height:10vh" />
                        </div>

                        <div class="mb-3">
                            <label> image</label>
                            <input type="file" name="image" class="form-control">
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
@foreach ($portfolios as $portfolio)
<div class="modal fade" id="delete_portfolio{{ $portfolio->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                <a href="{{route('admin.deletePortfolio',$portfolio->id)}}" type="button" class="btn btn-primary">Submit</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
