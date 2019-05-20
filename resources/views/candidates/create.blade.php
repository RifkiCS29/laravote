@extends('layouts.app')
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Kandidat</h3>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form enctype="multipart/form-data" action="{{route('candidates.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Nama Ketua</label>
                                <input type="text" name="nama_ketua" id="nama_ketua" class="form-control {{ $errors->first('nama_ketua') ? "is-invalid" : ""}}" placeholder="Masukkan Nama Ketua">
                                <p class="text-danger">{{ $errors->first('nama_ketua') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Wakil</label>
                                <input type="text" name="nama_wakil" id="nama_wakil" class="form-control {{ $errors->first('nama_wakil') ? "is-invalid" : ""}}" placeholder="Masukkan Nama Wakil">
                                <p class="text-danger">{{ $errors->first('nama_wakil') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Visi</label>
                                <textarea name="visi"  id="visi" cols="5" rows="5" class="ckeditor form-control {{ $errors->first('visi') ? "is-invalid" : ""}}"></textarea>
                                <p class="text-danger">{{ $errors->first('visi') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Misi</label>
                                <textarea name="misi"  id="misi" cols="5" rows="5" class="ckeditor form-control {{ $errors->first('misi') ? "is-invalid" : ""}}"></textarea>
                                <p class="text-danger">{{ $errors->first('misi') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Program Kerja</label>
                                <textarea name="program_kerja"  id="program_kerja" cols="5" rows="5" class="ckeditor form-control {{ $errors->first('program_kerja') ? "is-invalid" : ""}}"></textarea>
                                <p class="text-danger">{{ $errors->first('program_kerja') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="">Foto Pasangan Calon</label>
                                <input type="file" name="photo_paslon" id="photo_paslon" class="form-control {{ $errors->first('photo_paslon') ? "is-invalid" : ""}}">
                                <p class="text-danger">{{ $errors->first('photo_paslon') }}</p>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection