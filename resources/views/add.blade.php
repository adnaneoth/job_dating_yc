@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="path/to/select2.css">
    <script src="path/to/select2.js"></script>
    <title>Document</title>
</head>


@section('content')
    <div class="container">
        <h2 style="text-align: center; margin-bottom: 30px;  font-family: 'Indie Flower', cursive;">Create annonce</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <ul>
                        <li>{{ $error }}</li>
                    </ul>
                @endforeach
            </div>
        @endif

        <form action="{{ route('store') }}" method="POST" style="max-width: 500px; margin: 0 auto;">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label"
                    style="font-weight: bold; font-family: 'Indie Flower', cursive;">Title</label>
                <input type="text" class="form-control" id="title" name="title" style="border-radius: 10px;">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"
                    style="font-weight: bold; font-family: 'Indie Flower', cursive; ">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" style="border-radius: 10px;"></textarea>
            </div>
            <div class="mb-3">
                <label for="companie_id" class="form-label">companie_name:</label>
                <select name="companie_id" class="form-select">
                    <option value=""></option>
                    @foreach ($companies as $companie)
                        <option value="{{ $companie->id }}">{{ $companie->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="update-skills" class="form-label">Select Skills</label>
                <select class="form-select" id="update-skills" name="skill_ids[]" multiple>
                    @foreach ($allskills as $oneskill)
                        <option value="{{ $oneskill->id }}">
                            {{ $oneskill->name }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div style="text-align: center;">
                <button type="submit" class="btn btn-primary" style="padding: 10px 40px; border-radius: 20px;">Create
                    annonce</button>
            </div>
        </form>
        <script>
            $(document).ready(function() {
                $('#update-skills').select2();
            });
        </script>
    </div>
@endsection
