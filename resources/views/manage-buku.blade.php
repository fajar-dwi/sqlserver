@extends('layouts.main')
@section('title','Manage Buku')
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
                        data-target="#tambah-buku">
                    Tambah Buku <i class="far fa-edit"></i></button>
            </div>
        </div>
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">ISBN</th>
                <th scope="col">Judul</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Jml Halaman</th>
                <th scope="col">Tahun</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @if(!$buku->isEmpty())
                @foreach($buku as $row)
                    <tr class="text-center">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->isbn  }}</td>
                        <td>{{ $row->judul  }}</td>
                        <td>{{ $row->penerbit  }}</td>
                        <td>{{ $row->jml_halaman  }}</td>
                        <td>{{ $row->tahun  }}</td>
                        <td>{{ $row->stok  }}</td>
                        <td>{{ $row->nama_kategori  }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit-buku{{ $row->id }}">
                                <i class="far fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#hapus{{ $row->id }}">
                                <i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <!-- Modal Hapus-->
                    <div class="modal fade" id="hapus{{ $row->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="/manage-buku/hapus/{{ $row->id }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data
                                            Buku {{ $row->judul }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin untuk menghapus data buku ini?
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
                    <div class="modal fade" id="edit-buku{{ $row->id }}" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalScrollableTitle"
                         aria-hidden="true">
                        <form action="/manage-buku/edit" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Detail
                                            Buku {{ $row->judul }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{ $row->id }}">
                                        <div class="form-group">
                                            <label for="isbn">ISBN</label>
                                            <input type="text" value="{{ $row->isbn }}"
                                                   class="form-control @error('isbn') is-invalid @enderror"
                                                   id="isbn"
                                                   name="isbn" placeholder="No Seri Buku">
                                            @error('isbn')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="judul">Judul</label>
                                            <input type="text" value="{{ $row->judul }}"
                                                   class="form-control @error('judul') is-invalid @enderror"
                                                   id="judul"
                                                   name="judul" placeholder="Judul Buku">
                                            @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="penerbit">Penerbit</label>
                                            <input type="text" value="{{ $row->penerbit }}"
                                                   class="form-control @error('penerbit') is-invalid @enderror"
                                                   id="penerbit"
                                                   name="penerbit" placeholder="Penerbit">
                                            @error('penerbit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="pengarang">Pengarang</label>
                                            <input type="text" value="{{ $row->pengarang }}"
                                                   class="form-control @error('pengarang') is-invalid @enderror"
                                                   id="pengarang"
                                                   name="pengarang" placeholder="Pengarang">
                                            @error('pengarang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jml_halaman">Jumlah Halaman</label>
                                            <input type="text" value="{{ $row->jml_halaman }}"
                                                   class="form-control @error('jml_halaman') is-invalid @enderror"
                                                   id="jml_halaman" name="jml_halaman" placeholder="Jumlah Halaman">
                                            @error('jml_halaman')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="tahun">Tahun</label>
                                            <select class="form-control @error('tahun') is-invalid @enderror"
                                                    value="{{ $row->id_tahun }}" id="tahun" name="tahun">
                                                @foreach($tahun as $thn)
                                                    <option
                                                        value="{{ $thn->id  }}"{{ ( $thn->id == $row->id_tahun) ? 'selected' : '' }}>{{ $thn->tahun }}</option>
                                                @endforeach
                                            </select>
                                            @error('tahun')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="stok">Stok</label>
                                            <input type="text" value="{{ $row->stok }}"
                                                   class="form-control @error('stok') is-invalid @enderror"
                                                   id="stok"
                                                   name="stok" placeholder="Stok">
                                            @error('stok')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="no_rak">No Rak</label>
                                            <input type="text" value="{{ $row->no_rak }}"
                                                   class="form-control @error('no_rak') is-invalid @enderror"
                                                   id="no_rak"
                                                   name="no_rak" placeholder="No Rak">
                                            @error('no_rak')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="id_kategori">Kategori</label>
                                            <select class="form-control @error('id_kategori') is-invalid @enderror"
                                                    value="{{ $row->id_kategori }}" id="id_kategori"
                                                    name="id_kategori">
                                                @foreach($kategori as $kat)
                                                    <option
                                                        value="{{ $kat->id  }}"{{ ( $kat->id == $row->id_kategori) ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_kategori')
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
        <div class="modal fade" id="tambah-buku" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalScrollableTitle"
             aria-hidden="true">
            <form action="/manage-buku/tambah" method="post">
                @csrf
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">Form Tambah Buku</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="isbn">ISBN</label>
                                <input type="text" value="{{ old('isbn') }}"
                                       class="form-control @error('isbn') is-invalid @enderror" id="isbn" name="isbn"
                                       placeholder="No Seri Buku">
                                @error('isbn')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" value="{{ old('judul') }}"
                                       class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul"
                                       placeholder="Judul Buku">
                                @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" value="{{ old('penerbit') }}"
                                       class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                       name="penerbit" placeholder="Penerbit">
                                @error('penerbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pengarang">Pengarang</label>
                                <input type="text" value="{{ old('pengarang') }}"
                                       class="form-control @error('pengarang') is-invalid @enderror" id="pengarang"
                                       name="pengarang" placeholder="Pengarang">
                                @error('pengarang')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jml_halaman">Jumlah Halaman</label>
                                <input type="text" value="{{ old('jml_halaman') }}"
                                       class="form-control @error('jml_halaman') is-invalid @enderror" id="jml_halaman"
                                       name="jml_halaman" placeholder="Jumlah Halaman">
                                @error('jml_halaman')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <select class="form-control @error('tahun') is-invalid @enderror"
                                        value="{{ old('tahun') }}" id="tahun" name="tahun">
                                    @foreach($tahun as $thn)
                                        <option
                                            value="{{ $thn->id  }}">{{ $thn->tahun }}</option>
                                    @endforeach
                                </select>
                                @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="text" value="{{ old('stok') }}"
                                       class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok"
                                       placeholder="Stok">
                                @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_rak">No Rak</label>
                                <input type="text" value="{{ old('no_rak') }}"
                                       class="form-control @error('no_rak') is-invalid @enderror" id="no_rak"
                                       name="no_rak" placeholder="No Rak">
                                @error('no_rak')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select class="form-control @error('id_kategori') is-invalid @enderror"
                                        value="{{ old('id_kategori') }}" id="id_kategori" name="id_kategori">
                                    @foreach($kategori as $kat)
                                        <option
                                            value="{{ $kat->id  }}">{{ $kat->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('id_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
