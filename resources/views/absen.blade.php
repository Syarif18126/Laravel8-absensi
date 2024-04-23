@extends('adminlte::page')

@section('title', 'Absensi')

@section('content_header')
    <h1>Presensi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-auto">

                        <!-- Button tambah data -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambahData">
                            <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Presensi
                        </button>
                        <!-- Button import -->
                        {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                        data-bs-target="#import">
                        <i class="nav-icon fas fa-file"></i>&nbsp; Import Excel
                    </button> --}}
                    </div>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Nis</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Program Keahlian</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Alasan</th>
                                    <th scope="col">Waktu Absen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                @foreach ($absen as $absensi)
                                    <tr>
                                        <td><?= $a ?></td>
                                        <td>{{ $absensi->nama }}</td>
                                        <td>{{ $absensi->nis }}</td>
                                        <td>{{ $absensi->kelas }}</td>
                                        <td>{{ $absensi->keahlian }}</td>
                                        {{-- <td>{{ $absensi->keterangan }}</td> --}}
                                        <td>
                                            @if ($absensi->keterangan == 'Hadir')
                                            <i class="fa fa-circle green"></i>
                                            {{ $absensi->keterangan }}
                                            @elseif ($absensi->keterangan == 'Sakit')
                                            <i class="fa fa-circle blue"></i>
                                            {{ $absensi->keterangan }}
                                            @elseif ($absensi->keterangan == 'Ijin')
                                            <i class="fa fa-circle red"></i>
                                            {{ $absensi->keterangan }}
                                            @endif
                                        </td>
                                        <td>{{ $absensi->alasan }}</td>
                                        <td>{{ $absensi->created_at }}</td>
                                    </tr>
                                    <?php $a++; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        {{ $absens->links() }}
                        {{-- <div class="d-flex">
                            {!! $absen->links() !!}
                        </div> --}}
          
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahData" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Presensi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('absen.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                            </button>
                                            @foreach ($errors->all() as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="nama" style="font-weight: 500">Nama</label>
                                    <input type="text" id="nama" name="nama" required class="form-control"
                                        readonly value="{{ auth()->user()->name }}">
                                </div>

                                <div class="row">
                                    {{-- <div class="col-6"> --}}
                                        <div class="form-group col-6">
                                            <label for="nis" style="font-weight: 500">Nis</label>
                                            <input type="text" id="nis" name="nis" required
                                                class="form-control @error('nis') is-invalid @enderror"
                                                placeholder="{{ __('Nis') }}">
                                        </div>
        
                                        <div class="form-group col-6">
                                            <label for="kelas" style="font-weight: 500">Kelas</label>
                                            <input type="text" id="kelas" name="kelas" required
                                                class="form-control @error('kelas') is-invalid @enderror"
                                                placeholder="{{ __('Kelas') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="keahlian" style="font-weight: 500">Program Keahlian</label>
                                    <input type="text" id="keahlian" name="keahlian" required
                                        class="form-control @error('keahlian') is-invalid @enderror"
                                        placeholder="{{ __('Program Keahlian') }}">
                                </div>

                                <div class="form-group">
                                    <label for="keterangan" style="font-weight: 500">Keterangan</label>
                                    <select name="keterangan" id="keterangan"
                                        class="form-select @error('keterangan') is-invalid @enderror">
                                        <option value="Hadir">Hadir</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Ijin">Ijin</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="alasan" style="font-weight: 500">Alasan</label>
                                    <input type="text" id="alasan" name="alasan" required
                                        class="form-control @error('keahlian') is-invalid @enderror"
                                        placeholder="{{ __('Beri tanda - jika hadir') }}">
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @stop
@section('footer')
    @include('adminlte::partials.footer.footer')
@stop


    @section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
            .green {
            color: rgb(112, 175, 18);
        }
    
        .blue {
            color: blue;
        }
    
        .red {
            color: red;
        }
        </style>
    @stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        console.log('Hi!');
    </script>
    
@stop
