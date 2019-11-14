@extends('layouts.main')
@section('title','Manage Buku')
@section('content')
    <div class="container-fluid">
        <button type="button" class="btn btn-success my-4 float-right" data-toggle="modal" data-target="#tambah-buku">
            Tambah Buku <i class="far fa-edit"></i></button>
        <table class="table table-bordered">
            <thead>
            <tr class="text-center">
                <th>#</th>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Jml Halaman</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(!$buku->isEmpty())
                @foreach($buku as $row)
                    <tr>
                        <td>#</td>
                        <td>{{ $row->isbn  }}</td>
                        <td>{{ $row->judul  }}</td>
                        <td>{{ $row->penerbit  }}</td>
                        <td>{{ $row->jml_halaman  }}</td>
                        <td>{{ $row->tahun  }}</td>
                        <td>{{ $row->stok  }}</td>
                        <td>{{ $row->nama_kategori  }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-buku">
                                <i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#exampleModalScrollable"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            @endif
            </tbody>
        </table>

        @if(!$buku->isEmpty())
        <!-- Modal Edit-->
        <div class="modal fade" id="edit-buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Buku {{ $row->judul }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="/manage-buku/edit" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="No Seri Buku"
                                       value="{{ $row->isbn }}">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                       placeholder="No Seri Buku" value="{{ $row->judul }}">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit"
                                       placeholder="Penerbit" value="{{ $row->penerbit }}">
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang"
                                       placeholder="Pengarang" value="{{ $row->pengarang }}">
                            </div>
                            <div class="form-group">
                                <label for="jml_halaman">Jumlah Halaman</label>
                                <input type="text" class="form-control" id="jml_halaman" name="jml_halaman"
                                       placeholder="Jumlah" value="{{ $row->jml_halaman }}">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" id="tahun" name="tahun" value="{{ $row->id_tahun }}">
                                    @foreach($tahun as $thn)
                                        <option
                                            value="{{ $thn->id  }}"{{ ( $thn->id == $row->id_tahun) ? 'selected' : '' }}>{{ $thn->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok"
                                       placeholder="Stok" value="{{ $row->stok }}">
                            </div>
                            <div class="form-group">
                                <label for="no_rak">No Rak</label>
                                <input type="text" class="form-control" id="no_rak" name="no_rak"
                                       placeholder="Stok" value="{{ $row->no_rak }}">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" id="id_kategori" name="id_kategori"
                                        value="{{ $row->id_kategori }}">
                                    @foreach($kategori as $kat)
                                        <option
                                            value="{{ $kat->id  }}"{{ ( $kat->id == $row->id_kategori) ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="modal fade" id="tambah-buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Form Tambah Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form action="/manage-buku/tambah" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" class="form-control" id="isbn" name="isbn" placeholder="No Seri Buku">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                       placeholder="No Seri Buku">
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit"
                                       placeholder="Penerbit">
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" class="form-control" id="pengarang" name="pengarang"
                                       placeholder="Pengarang">
                            </div>
                            <div class="form-group">
                                <label for="jml_halaman">Jumlah Halaman</label>
                                <input type="text" class="form-control" id="jml_halaman" name="jml_halaman"
                                       placeholder="Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control" id="tahun" name="tahun">
                                    @foreach($tahun as $thn)
                                        <option
                                            value="{{ $thn->id  }}">{{ $thn->tahun }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok"
                                       placeholder="Stok">
                            </div>
                            <div class="form-group">
                                <label for="no_rak">No Rak</label>
                                <input type="text" class="form-control" id="no_rak" name="no_rak"
                                       placeholder="Stok">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control" id="id_kategori" name="id_kategori">
                                    @foreach($kategori as $kat)
                                        <option
                                            value="{{ $kat->id  }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Tambah</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
