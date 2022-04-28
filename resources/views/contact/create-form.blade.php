@extends('template')

@section('content')
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">The name field must be at least 5 characters long</div>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">The name field must follow the pattern example@mail.com</div>
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone">
            <div id="emailHelp" class="form-text">The name field must be at least 9 characters long</div>
            @error('phone')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
