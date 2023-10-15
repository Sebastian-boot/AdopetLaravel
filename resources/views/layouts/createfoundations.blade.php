@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/fundaciones">Fundaciones</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nueva Fundación</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="cart-title text-primary">Foundations</h2>
                                <h6 class="card-subtitle mb-2 text-muted">Add new Foundation</h6>
                            </div>
                            <div class="col text-end">
                                <a href="/fundaciones" class="btn btn-outline-secondary">
                                    <i class="fa-solid fa-arrow-left"></i>
                                    Go back
                                </a>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('fundaciones.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="fundaciones-name" class="form-label">Name</label>
                                <input
                                       type="text" class="form-control" name="name" id="fundaciones-name"
                                       value="{{ old('name') }}"
                                       autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="fundaciones-email" class="form-label">Email</label>
                                <input
                                       type="email" class="form-control" name="email" id="fundaciones-email"
                                       value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="introduction"
                                              id="fundaciones-introduction" style="height: 100px">
                                        {{ old('introduction') }}
                                    </textarea>
                                    <label for="fundaciones-introduction">Introduction</label>
                                    @error('introduction')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="history"
                                              id="fundaciones_history" style="height: 100px">
                                        {{ old('history') }}
                                    </textarea>
                                    <label for="fundaciones_history">History</label>
                                    @error('history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="fundaciones-nit" class="form-label">Nit</label>
                                <input
                                       type="text" class="form-control" name="nit" id="fundaciones-nit"
                                       value="{{ old('nit') }}">
                                @error('nit')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="fundaciones-phone" class="form-label">Phone</label>
                                <input
                                       type="number" class="form-control" name="phone" id="fundaciones-phone"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="fundaciones-website" class="form-label">Website</label>
                                <input
                                       type="text" class="form-control" name="website" id="fundaciones-website"
                                       value="{{ old('website') }}">
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="fundaciones-foundationFoundingDate" class="form-label">Founding Date</label>
                                <input
                                       type="date" class="form-control" name="foundationFoundingDate" id="fundaciones-foundationFoundingDate"
                                       value="{{ old('foundationFoundingDate') }}">
                                @error('foundationFoundingDate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fundaciones-employee-count" class="form-label">Employee Count</label>
                                <input
                                       type="number" class="form-control" name="employeeCount" id="fundaciones-employeecount"
                                       value="{{ old('employeeCount') }}">
                                @error('employeeCount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fundaciones-animals-assited-count" class="form-label">Animals Assisted Count</label>
                                <input
                                       type="number" class="form-control" name="animalsAssitedCount" id="fundaciones-animals-assited-count"
                                       value="{{ old('animalsAssitedCount') }}">
                                @error('animalsAssitedCount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fundaciones-current-animals-assited-count" class="form-label">Current Animals Assisted Count</label>
                                <input
                                       type="number" class="form-control" name="currentAnimalAssitedCount" id="fundaciones-current-animals-assited-count"
                                       value="{{ old('currentAnimalAssitedCount') }}">
                                @error('currentAnimalAssitedCount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fundaciones-limit-animals-assited-count" class="form-label">Limit Animals Assisted Count</label>
                                <input
                                       type="number" class="form-control" name="limitAnimalAssitedCount" id="fundaciones-limit-animals-assited-count"
                                       value="{{ old('limitAnimalAssitedCount') }}">
                                @error('limitAnimalAssitedCount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="fundaciones-foundation-rating" class="form-label">Foundation Rating</label>
                                <input
                                       type="number" class="form-control" name="foundationrating" id="fundaciones-foundation-rating"
                                       value="{{ old('foundationrating') }}">
                                @error('foundationrating')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-12 text-end">
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
    </div>
@endsection
