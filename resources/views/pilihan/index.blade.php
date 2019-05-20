@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
        @if(Auth::user()->status == "BELUM")
        <form enctype="multipart/form-data" action="{{route('users.pilih',['id'=>Auth::user()->id])}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT" class="form-control">
            <div class="card-group">
                @foreach ($candidates as $candidate)
                <div class="card">
                    <h1 align="center">{{$candidate->id}}</h1>
                    <img class="card-img-top" src="{{asset('storage/'.$candidate->photo_paslon)}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 align="center" class="card-title">{{$candidate->nama_ketua}} dan {{$candidate->nama_wakil}}</h5>
                    </div>
                    <div class="form-group" align="center">
                        <button name="candidate_id" value="{{$candidate->id}}" class="btn btn-primary">PILIH</button>
                    </div>
                </div>

                @endforeach
            </div>
        </form>
        @else 
            <h1 align="center">SUDAH MEMILIH</h1>
        @endif
        </div>
    </div>
</div>
@endsection