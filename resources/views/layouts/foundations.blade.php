@extends('Fundaciones')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<!-- Include Bootstrap JavaScript and jQuery -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <main>
        <div class="container">
            <div class="mb-5 mt-5 ">
                <h1 class="text-center text-primary">Form Foundations</h1>
                <form action="{{ route('fundaciones.store') }}" method="POST" class="row g-3" id="formAdd">
                    @csrf

                    @if (session('success'))
                        <h6 class="alert alert-success">{{ session('success') }} </h6>
                    @endif

                    @error('title')
                        <h6 class="alert alert-danger">{{ session('message') }} </h6>
                    @enderror

                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="introduction"></textarea>
                            <label for="floatingTextarea">Introduction</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" name="history"></textarea>
                            <label for="floatingTextarea">History</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nit</label>
                        <input type="text" class="form-control" name="nit">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Website</label>
                        <input type="text" class="form-control" name="website">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Foundation Founding Date</label>
                        <input type="date" class="form-control" name="FoundationFoundingDate">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Employee Count</label>
                        <input type="number" class="form-control" name="employeeCount">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Animals Assisted Count</label>
                        <input type="number" class="form-control" name="animalsAssitedCount">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Current Animals Assisted Count</label>
                        <input type="number" class="form-control" name="currentAnimalAssitedCount">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Limit Animals Assisted Count</label>
                        <input type="number" class="form-control" name="limitAnimalAssitedCount">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Foundation Rating</label>
                        <input type="number" class="form-control" name="foundationrating">
                    </div>
                    <div class="col-12">
                        <button type="button" onclick="cleanForm()" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
            <h1 class="text-center text-primary">Table Foundations</h1>

            <table class="table" id="table-foundations">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Nit</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fundaciones as $fundacion)
                        <tr>
                            <th scope="row">{{ $fundacion->id }}</th>
                            <td>{{ $fundacion->name }}</td>
                            <td>{{ $fundacion->nit }}</td>
                            <td>{{ $fundacion->email }}</td>
                            <td>{{ $fundacion->phone }}</td>
                            <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editFundacionModal{{ $fundacion->id }}">Edit</button>
                            <a href="{{ route('fundaciones.destroy', $fundacion->id) }}" class="btn btn-danger btn-sm">Delete</a>
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#fundacionModal">View Details</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

        <!-- Modal -->
        <div class="modal fade" id="fundacionModal" tabindex="-1" role="dialog" aria-labelledby="fundacionModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="fundacionModalLabel">{{ $fundacion->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Email:</strong> {{ $fundacion->email }}</p>
                        <p><strong>Nit:</strong> {{ $fundacion->nit }}</p>
                        <p><strong>Phone:</strong> {{ $fundacion->phone }}</p>
                        <p><strong>Introduction:</strong> {{ $fundacion->introduction }}</p>
                        <p><strong>History:</strong> {{ $fundacion->history }}</p>
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        

    </main>
@endsection