@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 30px;  font-family: 'Indie Flower', cursive;">Create companie</h2>

        <form action="{{ route('storecompanie') }}" method="POST" style="max-width: 500px; margin: 0 auto;">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label"
                    style="font-weight: bold; font-family: 'Indie Flower', cursive;">name</label>
                <input type="text" class="form-control" id="name" name="name" style="border-radius: 10px;">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"
                    style="font-weight: bold; font-family: 'Indie Flower', cursive; ">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" style="border-radius: 10px;"></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label"
                    style="font-weight: bold; font-family: 'Indie Flower', cursive;">location</label>
                <input type="text" class="form-control" id="location" name="location" style="border-radius: 10px;">
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 40px; border-radius: 20px;">Create
                    companie</button>
            </div>
        </form>
    </div>
@endsection
