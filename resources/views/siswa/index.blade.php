<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Data Siswa</title>
</head>

<body>
    <div class="container">
        @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h2>Data Siswa</h2>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Data Siswa
                </button>
            </div>
        </div>

        <table class="table table-hover">
            <tr>
                <th>NAMA DEPAN</th>
                <th>NAMA BELAKANG</th>
                <th>JENIS KELAMIN</th>
                <th>AGAMA</th>
                <th>ALAMAT</th>
            </tr>
            @foreach ($data_siswa as $siswa )
            <tr>
                <td>{{ $siswa->nama_depan }}</td>
                <td>{{ $siswa->nama_belakang }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->agama }}</td>
                <td>{{ $siswa->alamat }}</td>
            </tr>
            @endforeach
        </table>
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
                    <form action="/siswa/create" method="POST">
                        {{-- Menyertakan TOken --}}
                        @csrf
                        <div class="form-group">
                            <label for="nama_depan">Nama Depan</label>
                            <input type="text" class="form-control" id="nama_depan" placeholder="Nama Depan"
                                name="nama_depan">
                        </div>

                        <div class="form-group">
                            <label for="nama_belakang">Nama Belakang</label>
                            <input type="text" class="form-control" id="nama_belakang" placeholder="Nama Belakang"
                                name="nama_belakang">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" id="agama" placeholder="Agama" name="agama">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                name="alamat"></textarea>
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
    {{-- Akhir Dari Modal --}}



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>