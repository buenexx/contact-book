@extends('template')

@section('content')
    <form action="{{ route('contact.update', $contact->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" class="form-control" id="name" aria-describedby="nameHelp">
            <div id="emailHelp" class="form-text">The name field must be at least 5 characters long</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">The name field must follow the pattern example@mail.com</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control" id="phone">
            <div id="emailHelp" class="form-text">The name field must be at least 9 characters long</div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
