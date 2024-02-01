@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All companie</h2>
        <button class="bg-success text-light"><a class="text-light"  href="{{route('add')}}">Add</a></button>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($companies as $companie)
                <div class="col">
                    <div class="card h-100 border border-2 border-primary rounded-3 shadow">
                    <img src='https://www.mee-mife.fr/wp-content/uploads/2022/09/jobdating.jpg' class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-name">{{ $companie->name }}</h5>
                            <p class="card-text">{{ $companie->description }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $companie->id }}">Edit</button>
                            <form action="{{ route('delete', $companie->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{ $companie->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $companie->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-name" id="updateModalLabel{{ $companie->id }}">Update companie</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update', $companie->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="update-name" class="form-label">name</label>
                                        <input type="text" class="form-control" id="update-name" name="name" value="{{ $companie->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="update-description" class="form-label">Description</label>
                                        <textarea class="form-control" id="update-description" name="description" rows="4">{{ $companie->description }}</textarea>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary">Update companie</button>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        No anoonce found!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection