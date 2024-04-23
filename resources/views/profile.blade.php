@extends('adminlte::page')
@section('title', 'Profile')

@section('content_header')
<h1>Profile <b>{{ Auth::user()->name }}</b></h1>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @stop

    @section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        
                        <img src="@if (Auth::user()->foto > 1)
                        {{ asset('image/profile/' . Auth::user()->foto) }}
                        @else
                        {{ asset('favicon.ico') }}
                        @endif" 
                        width="150px" height="100px" class="profile img-fluid" alt="" style="border-radius: 20px">
                        <h3 class="text-title mt-2">{{ Auth::user()->name }}</h3>
                        <h4 class="profile-username">{{ Auth::user()->role->name }}</h4>
                        <h6 class="profile-email">{{ Auth::user()->email }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.updateData') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" name="current_password" id="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password">Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('footer')
@include('adminlte::partials.footer.footer')
@stop