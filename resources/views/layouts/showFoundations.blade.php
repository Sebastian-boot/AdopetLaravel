@extends('Fundaciones')

@section('contentFoundations')
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
                <li class="breadcrumb-item"><a href="/fundaciones">Foundations</a></li>
                <li class="breadcrumb-item active" aria-current="page">Foundation Details</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="cart-title text-primary">Foundations</h2>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Details the <span class="text-primary">{{ $fundacione->name }}</span> fundation
                                </h6>
                            </div>
                            <div class="col text-end">
                                <a href="/fundaciones" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Go back
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Name</label>
                                <p class="form-control">{{ $fundacione->name }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Email</label>
                                <p class="form-control">{{ $fundacione->email }} </p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Website</label>
                                <p class="form-control">{{ $fundacione->website }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Phone</label>
                                <p class="form-control">{{ $fundacione->phone }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Nit</label>
                                <p class="form-control">{{ $fundacione->nit }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Introduction</label>
                                <p class="form-control">{{ $fundacione->introduction }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">History</label>
                                <p class="form-control">{{ $fundacione->history }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Foundation Founding Date</label>
                                <p class="form-control">{{ $fundacione->FoundationFoundingDate }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Employee Count</label>
                                <p class="form-control">{{ $fundacione->employeeCount }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Animals Assited Count</label>
                                <p class="form-control">{{ $fundacione->animalsAssitedCount }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Current Animal Assited Count</label>
                                <p class="form-control">{{ $fundacione->currentAnimalAssitedCount }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Limit Animal Assited Count</label>
                                <p class="form-control">{{ $fundacione->limitAnimalAssitedCount }}</p>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold">Foundation Rating</label>
                                <p class="form-control">{{ $fundacione->foundationrating }}</p>
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
