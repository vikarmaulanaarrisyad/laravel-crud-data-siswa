@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Data Siswa </h3>
                            <div class="right">
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-primary float-right btn-sm"
                                    data-toggle="modal" data-target="#exampleModal">
                                    Tambah Data Siswa
                                </button> --}}
                                <a href="/siswa/exportpdf" class="btn btn-sm btn-danger">PDF </a>
                                <a href="/siswa/exportExcel" class="btn btn-sm btn-primary">EXCEL </a>


                                <button type="button" data-toggle="modal" data-target="#exampleModal"><i
                                        class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NAMA DEPAN</th>
                                        <th>NAMA BELAKANG</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>RATA2 NILAI</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_siswa as $siswa )
                                    <tr>
                                        <td> <a href="/siswa/{{ $siswa->id }}/profile">{{ $siswa->nama_depan }}</a></td>
                                        <td> <a href="/siswa/{{ $siswa->id }}/profile"> {{ $siswa->nama_belakang }} </a>
                                        </td>
                                        <td>{{ $siswa->jenis_kelamin }}</td>
                                        <td>{{ $siswa->agama }}</td>
                                        <td>{{ $siswa->alamat }}</td>
                                        <td>{{ $siswa->rataRatanilai() }}</td>
                                        <td>
                                            <a href="/siswa/{{ $siswa->id }}/edit"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="/siswa/{{ $siswa->id }}/delete" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Siswa?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                    {{-- Menyertakan TOken --}}
                    @csrf
                    <div class="form-group {{ $errors->has(" nama_depan") ? 'has-error' : "" }}">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control" id="nama_depan" placeholder="Nama Depan"
                            name="nama_depan" value="{{ old('nama_depan') }}">
                        @if ($errors->has('nama_depan') )
                        <span class="help-block">{{ $errors->first('nama_depan') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" nama_belakang") ? 'has-error' : "" }}">
                        <label for="nama_belakang">Nama Belakang</label>
                        <input type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang"
                            name="nama_belakang" value="{{ old('nama_belakang') }}">
                        @if ($errors->has('nama_belakang') )
                        <span class="help-block">{{ $errors->first('nama_belakang') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" email") ? 'has-error' : "" }}">
                        <label for="email">email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                            value="{{ old('email') }}">
                        @if ($errors->has('email') )
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" jenis_kelamin") ? 'has-error' : "" }}">
                        <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin"
                            value="{{ old('jenis_kelamin') }}">
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @if ($errors->has('jenis_kelamin') )
                        <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" agama") ? 'has-error' : "" }}">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" placeholder="Agama" name="agama"
                            value="{{ old('agama') }}">
                        @if ($errors->has('agama') )
                        <span class="help-block">{{ $errors->first('agama') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" alamat") ? 'has-error' : "" }}">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="alamat">{{ old('alamat') }}</textarea>
                        @if ($errors->has('alamat') )
                        <span class="help-block">{{ $errors->first('alamat') }}</span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has(" avatar") ? 'has-error' : "" }}">
                        <label for="agama">Avatar</label>
                        <input type="file" class="form-control" id="avatar" placeholder="Avaatar" name="avatar"
                            value="{{ $siswa->avatar }}">
                        @if ($errors->has('avatar') )
                        <span class="help-block">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection