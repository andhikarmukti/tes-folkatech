@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-3">Company Page | Edit</h1>
        <div class="row">
            <div class="col">
                <a href="/company" class="btn btn-warning mb-5">kembali</a>
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-6 mb-4 border p-3 rounded shadow-sm">
                <form action="/company/{{ $company->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $company->name) }}">
                        @error('name')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}">
                        @error('email')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                        @error('logo')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                        @if($company->logo)
                            <img src="/storage/images/{{ $company->logo }}" alt="image" width="100" class="mt-3">
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $company->website) }}">
                        @error('website')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
