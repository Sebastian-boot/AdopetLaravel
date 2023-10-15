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
                <li class="breadcrumb-item active" aria-current="page">Adoptions</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h2 class="cart-title text-primary">Animals For Adoption</h2>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Below you will find a list of all the animals we have for adoption so you can help
                                </h6>
                            </div>
                            <div class="col-4 offset-2 text-end">
                                <form method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" value="{{ request('search') }}" placeholder="Search..." name="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            @forelse ($animals as $animal)
                                <div class="col-md-4">
                                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6>{{ $animal->name }}</h6>
                                                    <p class="fst-italic">
                                                        {{ $animal->breed_or_type }}
                                                    </p>
                                                </div>
                                                <p class="text-primary fw-semibold">{{ $animal->status->name }}</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="accordion mb-4" id="accordion-animal-{{ $animal->id }}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse-health-condition-{{ $animal->id }}" aria-expanded="true"
                                                                aria-controls="collapse-health-condition-{{ $animal->id }}">
                                                            <i class="fa-solid fa-bandage me-2 text-primary"></i>
                                                            Health Condition
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-health-condition-{{ $animal->id }}" class="accordion-collapse collapse show"
                                                         aria-labelledby="headingOne" data-bs-parent="#accordion-animal-{{ $animal->id }}">
                                                        <div class="accordion-body">
                                                            {{ $animal->health_condition }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="heading-{{ $animal->id }}">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                                data-bs-target="#collapse-rescue-history-{{ $animal->id }}" aria-expanded="false"
                                                                aria-controls="collapse-rescue-history-{{ $animal->id }}">
                                                            <i class="fa-solid fa-book me-2 text-primary"></i>
                                                            Rescue History
                                                        </button>
                                                    </h2>
                                                    <div id="collapse-rescue-history-{{ $animal->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $animal->id }}"
                                                         data-bs-parent="#accordion-animal-{{ $animal->id }}">
                                                        <div class="accordion-body">
                                                            {{ $animal->rescue_history }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="text-end"><span class="fw-semibold text-primary">
                                                    <i class="fa-regular fa-calendar"></i>
                                                    Rescue Date</span> {{ $animal->rescue_date }}
                                            </p>
                                            <h5 class="card-title fw-bold">Animal data:</h5>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <strong>Age:</strong>
                                                    {{ $animal->age }} years old
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Gender:</strong>
                                                    {{ $animal->gender == 'F' ? 'Female' : 'Male' }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Measures:</strong>
                                                    Weight {{ $animal->weight }} -
                                                    Height {{ $animal->height }}
                                                </li>
                                                <li class="list-group-item">
                                                    <strong>Fur:</strong> {{ $animal->coat_color }}
                                                </li>
                                            </ul>
                                        </div>
                                        <a href="#" class="btn btn-primary mt-3">
                                            I want to help
                                            <strong>
                                                {{ $animal->name }}
                                            </strong>
                                        </a>
                                    </div>
                                </div>
                            @empty
                                @if (request()->has('search'))
                                    <span class="text-warning">
                                        No results found...
                                    </span>
                                @else
                                    <span class="text-success">
                                        Right now we do not have any animals for adoption... please check back later.
                                    </span>
                                @endif
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
