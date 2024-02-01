@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 30px;  font-family: 'Indie Flower', cursive;">Create annonce</h2>
       
        <form action="{{ route('store') }}" method="POST" style="max-width: 500px; margin: 0 auto;">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label" style="font-weight: bold; font-family: 'Indie Flower', cursive;">Title</label>
                <input type="text" class="form-control" id="title" name="title" style="border-radius: 10px;">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label" style="font-weight: bold; font-family: 'Indie Flower', cursive; ">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" style="border-radius: 10px;"></textarea>
            </div>
            <div class="mb-3">
                <label for="companie_id" class="form-label">companie_name:</label>
                <select name="companie_id" class="form-select">
                    <option value=""></option>
                    @foreach($companies as $companie)
                        <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                    @endforeach
                </select>
                </div>
            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 40px; border-radius: 20px;">Create annonce</button>
            </div>
        </form>
    </div>
@endsection








{{-- @if($errors->any())
<div class="alert alert-danger">
  @foreach ($errors->all() as $error)
      <ul>
          <li>{{$error}}</li>
      </ul>
  @endforeach
</div>
@endif --}}