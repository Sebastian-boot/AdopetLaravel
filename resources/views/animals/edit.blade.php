@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/animal">Animals</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Animal</li>
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
                                <h2 class="cart-title text-primary">Animals</h2>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    Edit the <span class="text-primary">{{ $animal->name }}</span> animal
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
                        <form action="{{ route('animal.update', $animal->id) }}" method="POST" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-6">
                                <label for="animal-name" class="form-label">Name</label>
                                <input
                                       type="text" class="form-control" name="name" id="animal-name"
                                       value="{{ old('name', $animal->name) }}"
                                       autofocus>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="animal-age" class="form-label">Age</label>
                                <input
                                       type="number" class="form-control" name="age" id="animal-age"
                                       value="{{ old('age', $animal->age) }}">
                                @error('age')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="animal-age" class="form-label">Gender</label>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="gender" id="animal-gender-m" value="M"
                                               {{ old('gender', $animal->gender) === 'M' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="animal-gender-m">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio"
                                               name="gender" id="animal-gender-h" value="F"
                                               {{ old('gender', $animal->gender) === 'F' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="animal-gender-h">Female</label>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="animal-coat-color" class="form-label">Coat Color</label>
                                <input
                                       type="text" class="form-control" name="coat_color" id="animal-coat-color"
                                       value="{{ old('coat_color', $animal->coat_color) }}">
                                @error('coat_color')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="animal-weight" class="form-label">Weight</label>
                                <input
                                       type="text" class="form-control" name="weight" id="animal-weight"
                                       value="{{ old('weight', $animal->weight) }}">
                                @error('weight')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="animal-height" class="form-label">Height</label>
                                <input
                                       type="text" class="form-control" name="height" id="animal-height"
                                       value="{{ old('weight', $animal->weight) }}">
                                @error('height')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="animal-breed-or-type" class="form-label">Breed Or Type</label>
                                <input
                                       type="text" class="form-control" name="breed_or_type" id="animal-breed-or-type"
                                       value="{{ old('breed_or_type', $animal->breed_or_type) }}">
                                @error('breed_or_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="animal-rescue-place" class="form-label">Rescue Place</label>
                                <input
                                       type="text" class="form-control" name="rescue_place" id="animal-rescue-place"
                                       value="{{ old('rescue_place', $animal->rescue_place) }}">
                                @error('rescue_place')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="animal-rescue-date" class="form-label">Rescue Date</label>
                                <input
                                       type="datetime-local" class="form-control" name="rescue_date" id="animal-rescue-date"
                                       value="{{ old('rescue_date', $animal->rescue_date) }}">
                                @error('rescue_date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="rescue_history"
                                              id="animal-rescue-history" style="height: 100px">
                                        {{ old('rescue_history', $animal->rescue_history) }}
                                    </textarea>
                                    <label for="animal-rescue-history">Rescue History</label>
                                    @error('rescue_history')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <textarea class="form-control" name="health_condition"
                                              id="animal-health-condition" style="height: 100px">
                                        {{ old('health_condition', $animal->health_condition) }}
                                    </textarea>
                                    <label for="animal-health-condition">Health Condition</label>
                                    @error('health_condition')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="animal-status-id" class="form-label">Status</label>
                                <select id="animal-status-id" class="form-select" name="animal_status_id">
                                    <option selected value="">Choose...</option>
                                    @forelse ($status as $s)
                                        <option value="{{ $s->id }}"
                                                {{ old('animal_status_id', $animal->animal_status_id) == $s->id ? 'selected' : '' }}>
                                            {{ $s->name }}
                                        </option>
                                    @empty
                                        <span class="text-warning">No states to select...</span>
                                    @endforelse
                                </select>
                                @error('animal_status_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           id="animal-is-adoptable" name="is_adoptable"
                                           {{ old('is_adoptable', $animal->is_adoptable) ? 'checked' : '' }} value="1">
                                    <label class="form-check-label" for="animal-is-adoptable">
                                        Is adoptable
                                    </label>
                                </div>
                                @error('is_adoptable')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                    Edit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
