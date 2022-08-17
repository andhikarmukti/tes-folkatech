@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-3">Company Page</h1>
        <div class="row">
            <div class="col">
                <a href="/home" class="btn btn-warning mb-5">kembali</a>
            </div>
        </div>
        <div class="col-6">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('updated'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('updated') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-6 mb-4 border p-3 rounded shadow-sm">
                <form action="/company" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value={{ old('name') }}>
                        @error('name')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value={{ old('email') }}>
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
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value={{ old('website') }}>
                        @error('website')
                        <div class="invalid-feedback"> {{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <hr>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{ $company->name }}</th>
                                <td>{{ $company->email }}</td>
                                <td><a class="text-decoration-none badge bg-primary" href="/storage/images/{{ $company->logo }}" target="_blank">open image</a></td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="/company/{{ $company->id }}/edit" class="badge bg-warning text-decoration-none text-dark">edit</a>
                                    <button class="badge bg-danger border-0 buttonDelete" data-id={{ $company->id }} data-nama="{{ $company->name }}" type="button">delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $companies->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.buttonDelete').click(function(){
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            console.log(nama);

            Swal.fire({
                title: 'Yakin akan dihapus?',
                text: `Semua data employee yang berada pada ${nama} akan hilang`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : '/company/' + id,
                        method : 'DELETE',
                        data : {
                            '_token' : "{{ csrf_token() }}",
                        },
                        success : function(res){
                            console.log(res);
                            if(!res){
                                Swal.fire(
                                    'Deleted!',
                                    'Berhasil menghapus data company',
                                    'success'
                                ).then(() => {
                                    location.reload()
                                })
                            }else{
                                console.log(res);
                                Swal.fire(
                                    'Error',
                                    'Terjadi Kesalahan! Hubungin Admin.',
                                    'error'
                                )
                            }
                        },
                        error : function(err){
                            console.log(err);
                            Swal.fire(
                                'Error',
                                'Terjadi Kesalahan! Hubungin Admin.',
                                'error'
                            )
                        }
                    });
                }
            })

        });
    </script>
@endsection
