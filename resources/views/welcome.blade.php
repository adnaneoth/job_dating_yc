@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text text-center text-primary">All annonce</h2>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($announcments as $annonce)
                <div class="col">
                    <div class="card h-100 border border-2 border-primary rounded-3 shadow">
                    <img src='https://www.mee-mife.fr/wp-content/uploads/2022/09/jobdating.jpg' class="card-img-top" alt="Book Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $annonce->title }}</h5>
                            <p class="card-text">{{ $annonce->description }}</p>
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