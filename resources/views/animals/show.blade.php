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
                            <div class="col text-end">
                                <button type="button" class="btn btn-outline-primary"
                                        data-bs-toggle="modal" data-bs-target="#vaccine-add-modal">
                                    <i class="fa-solid fa-plus"></i>
                                    Add New Vaccine
                                </button>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="list-group">
                                @forelse ($animal->vaccines as $vaccine)
                                    <li class="list-group-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">
                                                <strong>Name:</strong>
                                                {{ $vaccine->name }}
                                            </h5>
                                            <small class="text-muted">
                                                <strong class="text-primary">It was applied:</strong>
                                                {{ \Carbon\Carbon::parse($vaccine->pivot->apply_date)->diffForHumans() }}
                                            </small>
                                            <form action="{{ route('animal.destroyVaccine', ['animal' => $animal->id, 'vaccine' => $vaccine->id]) }}"
                                                  method="POST" class="position-absolute bottom-0 end-0 m-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger
                                                        btn-sm ">
                                                    <i class="fa-regular fa-trash-can"></i>
                                                </button>
                                            </form>
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
                                    </li>
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

        <!-- Modal -->
        <div class="modal fade" id="vaccine-add-modal" tabindex="-1" data-bs-backdrop="static"
             aria-labelledby="vaccine-modal-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="vaccine-modal-label">Add New Vaccine</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('animal.storeVaccine', $animal->id) }}" id="vaccine-add-form">
                        @csrf
                        <div class="modal-body row g-3">
                            <div class="col-md-6 ">
                                <label for="vaccine-name" class="form-label">Name</label>
                                <input
                                       type="text" class="form-control" name="name" id="vaccine-name"
                                       value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="vaccine-type" class="form-label">Type</label>
                                <input
                                       type="text" class="form-control" name="type" id="vaccine-type"
                                       value="{{ old('type') }}">
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="vaccine-price" class="form-label">Price</label>
                                <input
                                       type="number" class="form-control" name="price" id="vaccine-price"
                                       value="{{ old('price') }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="vaccine-administered-by" class="form-label">Administered By</label>
                                <input
                                       type="text" class="form-control" name="administered_by" id="vaccine-administered-by"
                                       value="{{ old('administered_by') }}">
                                @error('administered_by')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="vaccine-apply-date" class="form-label">Apply Date</label>
                                <input
                                       type="datetime-local" class="form-control"
                                       name="apply_date" id="vaccine-apply-date"
                                       value="{{ old('apply_date') }}">
                                @error('apply_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" name="observations"
                                              id="vaccine-observations" style="height: 100px">
                                        {{ old('observations') }}
                                    </textarea>
                                    <label for="vaccine-observations">Observations</label>
                                    @error('observations')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer p-2 border-top-0">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const formAddVaccine = document.getElementById('vaccine-add-form');
                    const modalElement = document.getElementById('vaccine-add-modal');

                    const modal = new bootstrap.Modal('#vaccine-add-modal')
                    modal.show()

                    modalElement.addEventListener('hide.bs.modal', () => {
                        const errorSpans = formAddVaccine.querySelectorAll('.text-danger');

                        errorSpans.forEach(span => {
                            span.style.display = 'none';
                        });

                        formAddVaccine.reset();
                    });
                })
            </script>
        @endpush
    @endif
@endsection
