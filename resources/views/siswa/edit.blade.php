<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Siswa</title>
</head>

<body>
    <div class="container">
        <h1>Edit Data Siswa</h1>
        @if (session('sukses'))
        <div class="alert alert-success" role="alert">
            {{ session('sukses') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/siswa/{{$siswa->id}}/update" method="POST">
                    {{-- Menyertakan TOken --}}
                    @csrf
                    <div class="form-group">
                        <label for="nama_depan">Nama Depan</label>
                        <input type="text" class="form-control" id="nama_depan" placeholder="Nama Depan"
                            name="nama_depan" value="{{ $siswa->nama_depan }}">
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
                        <input type="text" class="form-control" id="agama" placeholder="Agama" name="agama" value="{{ $siswa->agama }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                            name="alamat">{{ $siswa->alamat }}</textarea>
                    </div>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>
        </div>
    </div>




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