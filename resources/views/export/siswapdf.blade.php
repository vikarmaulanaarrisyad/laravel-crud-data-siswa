<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	{{-- <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style> --}}
    <style>
        @page { size: A4 }
      
        h1 {
            font-weight: bold;
            font-size: 20pt;
            text-align: center;
        }
      
        table {
            border-collapse: collapse;
            width: 100%;
        }
      
        .table th {
            padding: 8px 8px;
            border:1px solid #000000;
            text-align: center;
        }
      
        .table td {
            padding: 3px 3px;
            border:1px solid #cecccc;
        }
      
        .text-center {
            text-align: center;
        }
    </style>
	<center>
		<h5>LAPORAN DATA SISWA MI IKHSANIYAH LEBETENG</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Rata Rata Nilai</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($siswa as $s)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{ $s->nama_lengkap()}}</td>
                <td class="text-center">{{ $s->jenis_kelamin}}</td>
                <td class="text-center">{{ $s->agama}}</td>
                <td class="text-center">{{ $s->rataRataNilai()}}</td>		
			</tr>
			@endforeach
		</tbody>
	</table>


    <div style="width: 50%; text-align: right; float: right;">Lebeteng,   {{ date (' d-m-Y') }}</div><br>
 
</body>
</html>

