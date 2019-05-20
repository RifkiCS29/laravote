@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="card-title">Manajemen Data Kandidat</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('candidates.create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Ketua</th>
                                    <th>Nama Wakil</th>
                                    <th>Foto Pasangan Calon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidates as $candidate)
                                <tr>
                                    <td>{{$candidate->nama_ketua}}</td>
                                    <td>{{$candidate->nama_wakil}}</td>
                                    <td>
                                        @if ($candidate->photo_paslon)
                                            <img src="{{asset('storage/'.$candidate->photo_paslon)}}" width="100px"/>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-info text-white btn-sm" href="{{route('candidates.edit',['id'=>$candidate->id])}}">Edit</a>
                                            <form onsubmit="return confirm('Delete this candidate permanently ?')" class="d-inline" action="{{route('candidates.destroy',['id'=>$candidate->id])}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tfoot>
                                    <tr>
                                        <td colspan=10>
                                            {{$candidates->appends(Request::all())->links()}}
                                        </td>
                                    </tr>
                                </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
