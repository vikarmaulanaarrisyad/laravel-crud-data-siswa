@extends('layouts.master')


@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Inputs</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                {{-- Menyertakan TOken --}}
                                @csrf
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input type="text" class="form-control" id="nama_depan" placeholder="Nama Depan" name="nama_depan"
                                        value="{{ $siswa->nama_depan }}">
                                </div>
                    
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang"
                                        name="nama_belakang" name="nama_belakang" value="{{ $siswa->nama_belakang }}">
                                </div>
                    
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
                                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif >Perempuan</option>
                                    </select>
                                </div>
                    
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <input type="text" class="form-control" id="agama" placeholder="Agama" name="agama"
                                        value="{{ $siswa->agama }}">
                                </div>
                    
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="alamat">{{ $siswa->alamat }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="agama">Avatar</label>
                                    <input type="file" class="form-control" id="avatar" placeholder="Avaatar" name="avatar"
                                        value="{{ $siswa->avatar }}">
                                </div>
                    
                                <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop

@section('content1')

<h1>Edit Data Siswa</h1>
@if (session('sukses'))
<div class="alert alert-success" role="alert">
    {{ session('sukses') }}
</div>
@endif
<div class="row">
    <div class="col-lg-12">
       
    </div>
</div>
{{-- </div> --}}

@endsection