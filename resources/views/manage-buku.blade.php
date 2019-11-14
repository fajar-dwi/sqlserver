@extends('layouts.main')
@section('title','Manage Buku')
@section('content')
    <div class="container-fluid">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ISBN</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th>Jml Halaman</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>No_Rak</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>ISBN</td>
                    <td>Judul</td>
                    <td>Penerbit</td>
                    <td>Pengarang</td>
                    <td>Jml Halaman</td>
                    <td>Tahun</td>
                    <td>Stok</td>
                    <td>No_Rak</td>
                    <td>Kategori</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
