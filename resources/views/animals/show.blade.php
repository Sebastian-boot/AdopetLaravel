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
                <li class="breadcrumb-item"><a href="/animal">Animals</a></li>
                <li class="breadcrumb-item active" aria-current="page">Animal Details</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="cart-title text-primary">Animals</h2>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Details the <span class="text-primary">{{ $animal->name }}</span> animal
                                </h6>
                            </div>
                            <div class="col text-end">
                                <a href="/animal" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Go back
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Name</label>
                                <p class="form-control">{{ $animal->name }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Age</label>
                                <p class="form-control">{{ $animal->age }} years old</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Gender</label>
                                <p class="form-control">{{ $animal->gender == 'F' ? 'Female' : 'Male' }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Breed Or Type</label>
                                <p class="form-control">{{ $animal->breed_or_type }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Coat Color</label>
                                <p class="form-control">{{ $animal->coat_color }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Weight and Height</label>
                                <p class="form-control">
                                    <strong>Weight:</strong> {{ $animal->weight }} -
                                    <strong>Height:</strong> {{ $animal->height }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
