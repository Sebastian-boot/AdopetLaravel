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
                <div class="card shadow-lg p-3 mb-2 bg-body rounded">
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
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Name</label>
                                <p class="form-control">{{ $animal->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Breed Or Type</label>
                                <p class="form-control">{{ $animal->breed_or_type }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Age</label>
                                <p class="form-control">{{ $animal->age }} years old</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Gender</label>
                                <p class="form-control">{{ $animal->gender == 'F' ? 'Female' : 'Male' }}</p>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Coat Color</label>
                                <p class="form-control">{{ $animal->coat_color }}</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Health Condition</label>
                                <p class="form-control-plaintext">{{ $animal->health_condition }}</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Rescue History</label>
                                <p class="form-control-plaintext">{{ $animal->rescue_history }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="cart-title text-primary">Vaccine Information</h2>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Below you will find the information on the vaccines applied to
                                    <span class="text-primary">{{ $animal->name }}</span>
                                </h6>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="list-group">
                                @forelse ($animal->vaccines as $vaccine)
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">
                                                <strong>Name:</strong>
                                                {{ $vaccine->name }}
                                            </h5>
                                            <small class="text-muted">
                                                <strong class="text-primary">It was applied:</strong>
                                                {{ \Carbon\Carbon::parse($vaccine->pivot->apply_date)->diffForHumans() }}
                                            </small>
                                        </div>
                                        <p class="mb-1">
                                            <strong>Type: </strong>
                                            {{ $vaccine->type }}
                                        </p>
                                        <p class="mb-1">
                                            <strong>Administered By: </strong>
                                            {{ $vaccine->pivot->administered_by }}
                                        </p>

                                        <small class="text-muted">
                                            <strong>Observations:</strong>
                                            {{ $vaccine->pivot->observations }}
                                        </small>
                                    </a>
                                @empty
                                    <span class="text-warning">Vaccines have not yet been registered for the {{ $animal->name }} animal...</span>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="cart-title fw-bold">Animal Adoptable</h5>
                                <div class="form-check form-switch form-switch mt-4 custom-checkbox fw-bold">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                           @checked($animal->is_adoptable)
                                           style="pointer-events: none;">
                                    @if ($animal->is_adoptable)
                                        <label class="form-check-label text-success">
                                            Enabled
                                        </label>
                                    @else
                                        <label class="form-check-label text-danger">
                                            Not Enabled
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-6">
                                <h5 class="cart-title fw-bold">Status</h5>
                                <p class="fw-bold text-primary mt-4">{{ $animal->status->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <h5 class="cart-title fw-bold">Measures:</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">Weight</label>
                                <p class="form-control">{{ $animal->weight }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Height</label>
                                <p class="form-control">{{ $animal->height }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <h5 class="cart-title fw-bold">Measures:</h5>
                        <div class="row g-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">Weight</label>
                                <p class="form-control">{{ $animal->weight }}</p>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Height</label>
                                <p class="form-control">{{ $animal->height }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-lg p-3 mb-2 bg-body rounded">
                    <div class="card-body">
                        <h5 class="cart-title fw-bold">Place and Date of Rescue</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Date</label>
                                <p class="form-control">{{ $animal->rescue_date }}</p>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Place</label>
                                <p class="form-control">{{ $animal->rescue_place }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
