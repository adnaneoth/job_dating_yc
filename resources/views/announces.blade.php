@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>annonces</h2>
        <a href="{{route('add')}}">
            <button type="button" class="btn btn-primary">Add</button>
        </a>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($announcments as $annonce)
                <div class="col">
                    <div class="card h-100 border border-2 border-primary rounded-3 shadow">
                    <img src='https://www.mee-mife.fr/wp-content/uploads/2022/09/jobdating.jpg' class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $annonce->title }}</h5>
                            <p class="card-text">{{ $annonce->description }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $annonce->id }}">Edit</button>
                            <form action="{{ route('delete', $annonce->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{ $annonce->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $annonce->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="updateModalLabel{{ $annonce->id }}">Update annonce</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update', $annonce->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="update-title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="update-title" name="title" value="{{ $annonce->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="update-description" class="form-label">Description</label>
                                        <textarea class="form-control" id="update-description" name="description" rows="4">{{ $annonce->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="advert_id" class="form-label">companie_name:</label>
                                        <select name="advert_id" class="form-select">
                                            <option value=""></option>
                                            @foreach($companies as $companie)
                                                <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    <button type="submit" class="btn btn-primary">Update annonce</button>
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