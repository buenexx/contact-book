@extends('template')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success mb-4">
            {{ session()->get('message') }}
        </div>
    @endif

    <div style="position: relative">

        <form action="{{ route('contact.update', $contact->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" value="{{ old('name', $contact->name ?? '') }}" class="form-control"
                       id="name" aria-describedby="nameHelp">
                <div id="emailHelp" class="form-text">The name field must be at least 5 characters long</div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <input type="email" name="email" value="{{ old('email', $contact->email) }}" class="form-control"
                       id="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">The name field must follow the pattern example@mail.com</div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" value="{{ old('phone', $contact->phone ?? '') }}" class="form-control"
                       id="phone">
                <div id="emailHelp" class="form-text">The name field must be at least 9 characters long</div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <form style="position: absolute; right: 0; top: -1rem" action="{{ route('contact.delete', $contact->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#mymodal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path
                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                </svg>
            </button>
        </form>

    </div>
@endsection
