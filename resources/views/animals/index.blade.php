@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2 class="cart-title text-primary">Animals</h2>
                        <h6 class="card-subtitle mb-2 text-muted">Registered animals</h6>
                        <hr>
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
                                            <td>{{ $animal->status }}</td>
                                            <td>
                                                <div class="d-grid gap-2 d-md-block">
                                                    <a class="btn btn-outline-warning btn-sm"
                                                       href="{{ route('animal.edit', $animal->id) }}">
                                                        <i class="fa-regular fa-pen-to-square"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm" href="">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
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
    </div>
@endsection
