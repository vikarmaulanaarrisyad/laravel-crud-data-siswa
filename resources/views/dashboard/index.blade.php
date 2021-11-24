@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Ranking 5 Besar</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>RANKING</th>
                                        <th>NAMA</th>
                                        <th>NILAI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $rangking = 1;
                                    @endphp
                                   @foreach (rangking5Besar() as $s )
                                   <tr>
                                    <td>{{ $rangking }}</td>
                                    <td>{{ $s->nama_lengkap() }}</td>
                                    <td>{{ $s->rataRataNilai() }}</td>
                                  </tr>
                                  @php
                                  $rangking++;
                              @endphp
                                   @endforeach
                              

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{ totalsiswa() }}</span>
                            <span class="title">Jumlah Siswa</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <p>
                            <span class="number">{{ totalguru() }}</span>
                            <span class="title">Jumlah Pendidik</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
