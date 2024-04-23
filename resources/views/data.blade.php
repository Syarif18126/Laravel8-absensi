@extends('adminlte::page')

@section('title', 'Data')



@section('content_header')
    <h1>Data Presensi SMK N 1 Bukateja</h1>
@stop

@section('content')
@if (Auth::user()->role_id == 1)
    
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="col-auto">

                    <!-- Button tambah data -->
                    {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#tambahData">
                        <i class="nav-icon fas fa-folder-plus"></i>&nbsp; Presensi
                    </button> --}}
                    <!-- Button import -->
                    {{-- <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                    data-bs-target="#import">
                    <i class="nav-icon fas fa-file"></i>&nbsp; Import Excel
                </button> --}}
                </div>
                {{-- <hr> --}}

                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="data">
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
                            @foreach ($absensi as $absen)
                                <tr>
                                    <td><?= $a ?></td>
                                    <td>{{ $absen->nama }}</td>
                                    <td>{{ $absen->nis }}</td>
                                    <td>{{ $absen->kelas }}</td>
                                    <td>{{ $absen->keahlian }}</td>
                                    {{-- <td>{{ $absen->keterangan }}</td> --}}
                                    <td>
                                        @if ($absen->keterangan == 'Hadir')
                                        <i class="fa fa-circle green"></i>
                                        {{ $absen->keterangan }}
                                        @elseif ($absen->keterangan == 'Sakit')
                                        <i class="fa fa-circle blue"></i>
                                        {{ $absen->keterangan }}
                                        @elseif ($absen->keterangan == 'Ijin')
                                        <i class="fa fa-circle red"></i>
                                        {{ $absen->keterangan }}
                                        @endif
                                    </td>
                                    <td>{{ $absen->alasan }}</td>
                                    <td>{{ $absen->created_at }}</td>
                                    {{-- <td>
    
                                    
    
                                    <button class="btn btn-danger btn-sm"
                                        onclick="deleteConfirmation()"><i
                                            class="nav-icon fas fa-trash-alt"></i> &nbsp;Hapus
                                    </button>
    
                                </td> --}}
                                </tr>
                                <?php $a++; ?>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- Paginate --}}
                    {{-- {{ $absensi->links() }} --}}
                    {{-- <div class="d-flex justify-content-center">
                        {!! $absen->link() !!}
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="tambahData" tabindex="-1" role="dialog">
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
                                <input type="text" id="nama" name="nama" required
                                    class="form-control" disabled value="{{ auth()->user()->name }}">
                            </div>

                            <div class="form-group">
                                <label for="nis" style="font-weight: 500">Nis</label>
                                <input type="text" id="nis" name="nis" required
                                    class="form-control @error('nis') is-invalid @enderror"
                                    placeholder="{{ __('Nis') }}">
                            </div>

                            <div class="form-group">
                                <label for="kelas" style="font-weight: 500">Kelas</label>
                                <input type="text" id="kelas" name="kelas" required
                                    class="form-control @error('kelas') is-invalid @enderror"
                                    placeholder="{{ __('Kelas') }}">
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
</div> -->

@else {
    <script type="text/javascript">
        var data = confirm('Anda tidak punya hak akses untuk menu ini!');
        // var data2 = confirm('Apakah Anda ingin Login sebagai Admin?');
        if(data){
            window.location.href = 'home';
        } else {
            window.location.href ='home';
        }
    </script>
}
@endif
@stop

@section('footer')
@include('adminlte::partials.footer.footer')
@stop

@section('css')

{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- DataTable --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.css" rel="stylesheet">
    
{{-- Font Poppins --}}
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
{{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
        {{-- Jquery --}}
    {{-- <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script> --}}
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/v/bs5/dt-2.0.2/datatables.min.js"></script>
    <script>
        console.log('Hi!');
    </script>
    <script>
        let table = new DataTable('#data');
    </script>
@stop
