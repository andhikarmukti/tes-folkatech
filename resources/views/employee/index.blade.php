@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-3">Employee Page</h1>
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
                <form action="/employee" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Firstname</label>
                        <input type="text" class="form-control" id="firstname" name="firstname">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="lastname" name="lastname">
                    </div>
                    <div class="mb-3">
                        <label for="company_id" class="form-label">Company</label>
                        <select class="form-select" name="company_id" id="company_id">
                            @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">phone</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <hr>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Firstname</th>
                            <th scope="col">Lastname</th>
                            <th scope="col">Company</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->firstname }}</th>
                                <td>{{ $employee->lastname }}</td>
                                <td>{{ $employee->hasCompany->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>
                                    <a href="/employee/{{ $employee->id }}/edit" class="badge bg-warning text-decoration-none text-dark">edit</a>
                                    <button class="badge bg-danger border-0 buttonDelete" data-id={{ $employee->id }} type="button">delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
                text: `Semua data employee ini akan dihapus`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : '/employee/' + id,
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
