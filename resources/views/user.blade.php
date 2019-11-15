@extends('layouts.main')
@section('title','Manage User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                @if (session('status'))
                    <div class="alert alert-success my-4">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-success my-4 float-right" data-toggle="modal"
                        data-target="#tambah-user">
                    Tambah User <i class="far fa-edit"></i></button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(!$user->isEmpty())
                @foreach($user as $row)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->name  }}</td>
                        <td>{{ $row->email  }}</td>
                        <td>{{ $row->password  }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-user{{ $row->id }}">
                                <i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#hapus-user{{ $row->id }}">
                                <i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <!-- Modal Hapus-->
                    <div class="modal fade" id="hapus-user{{ $row->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="/manage-user/hapus/{{ $row->id }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data {{ $row->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin untuk menghapus data user ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Modal Edit-->
                    <div class="modal fade" id="edit-user{{ $row->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalScrollableTitle"
                         aria-hidden="true">
                        <form action="/manage-user/edit" method="post" autocomplete="off">
                            @csrf
                            @method('put')
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail User
                                            {{ $row->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" value="{{ $row->name }}"
                                                   class="form-control @error('nama') is-invalid @enderror"
                                                   id="nama"
                                                   name="nama" placeholder="Nama User">
                                            @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" value="{{ $row->email }}"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="email"
                                                   name="email" placeholder="Email">
                                            @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   id="password"
                                                   name="password" placeholder="Password" autocomplete="new-password">
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            @endif
            </tbody>
        </table>

        {{--Modal Tambah--}}
        <div class="modal fade" id="tambah-user" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle"
             aria-hidden="true">
            <form action="/manage-user/tambah" method="post" autocomplete="off">
                @csrf
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" value="{{ old('nama') }}"
                                       class="form-control @error('nama') is-invalid @enderror"
                                       id="nama"
                                       name="nama" placeholder="Nama User">
                                @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" value="{{ old('email') }}"
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email"
                                       name="email" placeholder="Email">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password"
                                       name="password" placeholder="Password" autocomplete="new-password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
