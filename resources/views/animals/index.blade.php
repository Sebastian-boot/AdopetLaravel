@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fa-regular fa-thumbs-up"></i>
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Animals</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="cart-title text-primary">Animals</h2>
                                <h6 class="card-subtitle mb-2 text-muted">Registered animals</h6>
                            </div>
                            <div class="col text-end">
                                <a href="{{ route('animal.create') }}" class="btn btn-outline-primary">
                                    <i class="fa-solid fa-plus"></i>
                                    Add new
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-4 offset-8 text-end">
                                <form method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ request('search') }}" placeholder="search..." name="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Weight And Height</th>
                                        <th>Breed Or Type</th>
                                        <th>Rescue Date</th>
                                        <th>Is Adoptable</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($animals as $animal)
                                        <tr>
                                            <td>{{ $animal->id }}</td>
                                            <td>
                                                <a href="{{ route('animal.show', $animal->id) }}">{{ $animal->name }}</a>
                                            </td>
                                            <td>{{ $animal->age }} years old</td>
                                            <td>{{ $animal->gender }}</td>
                                            <td>
                                                <strong>Weight:</strong> {{ $animal->weight }} -
                                                <strong>Height:</strong> {{ $animal->height }}
                                            </td>
                                            <td>{{ $animal->breed_or_type }}</td>
                                            <td>{{ $animal->rescue_date }}</td>
                                            <td>
                                                @if ($animal->is_adoptable)
                                                    <span class="badge text-bg-success">can be adopted</span>
                                                @else
                                                    <span class="badge text-bg-danger">cannot be adopted</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($animal->status)
                                                    {{ $animal->status->name }}
                                                @else
                                                    <span class="text-warning">No state assigned</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a class="btn btn-outline-warning btn-sm"
                                                       href="{{ route('animal.edit', $animal->id) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <button class="btn btn-outline-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#animal-remove-modal">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <span class="text-danger">There are no animals registered in the database yet...</span>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $animals->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="animal-remove-modal" tabindex="-1" aria-labelledby="animal-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-danger fw-bold" id="animal-modal-label">Remove Animal</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-4">Are you sure you want to eliminate the animal?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">
                            <i class="fa-regular fa-trash-can"></i>
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
