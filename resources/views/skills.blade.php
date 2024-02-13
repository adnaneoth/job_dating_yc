@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>skills</h2>
        <a href="{{ route('addskill') }}">
            <button type="button" class="btn btn-primary">Add</button>
        </a>        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($skills as $skill)
                <div class="col">
                    <div class="card h-100 border border-2 border-primary rounded-3 shadow">
                    <img src='https://www.mee-mife.fr/wp-content/uploads/2022/09/jobdating.jpg' class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-name">{{ $skill->name }}</h5>
                        </div>
                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#updateModal{{ $skill->id }}">Edit</button>
                            <form action="{{ route('deleteskill', $skill->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update Modal -->
                <div class="modal fade" id="updateModal{{ $skill->id }}" tabindex="-1" aria-labelledby="updateModalLabel{{ $skill->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-name" id="updateModalLabel{{ $skill->id }}">Update skill</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('updateskill', $skill->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="update-name" class="form-label">name</label>
                                        <input type="text" class="form-control" id="update-name" name="name" value="{{ $skill->name }}">
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Update skill</button>
                                </form>
                            </div>
                        </div>
                     </div>
                </div>
            @empty
                 <div class="col">
                    <div class="alert alert-warning" role="alert">
                        No skill found!
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection