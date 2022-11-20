@extends('dashboard.layouts.index')
@section('title')
  Elections
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Manage Elections</h4>

  <div class="ms-auto mb-lg-0">
    <a href="{{route('home.elections.create')}}" class="btn btn-primary">Tambah Pemilihan</a>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-hover table-lg">
        <thead class="">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Deskripsi</th>
              <th>Kode pemilihan</th>
              <th>Voting dimulai</th>
              <th>Voting berakhir</th>
              @if(Auth::user()->email==='admin@admin.com')
              <th>Nama owner</th>
              @endif
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach($elections as $election)
            <tr class="">
                <td>{{$no}}</td>
                <td>{{$election->name}}</td>
                <td>{{$election->desc}}</td>
                <td>{{$election->election_code}}</td>
                <td>{{$election->vote_start}}</td>
                <td>{{$election->vote_end}}</td>
                @if(Auth::user()->email==='admin@admin.com')
                <td>{{$election->user->name}}</td>
                @endif
                <td>
                  <div class="btn-group">
                    <a href="{{route('home.elections.edit', $election->id)}}" class="btn btn-success">Edit</a>
                    <form method="POST" action="/home/elections/{{ $election->id }}" >
                      @csrf
                      @method('DELETE')
                      <div class="control">
                      <button type="submit" class="btn btn-danger ms-2" onClick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                  </div>
                </td>
            </tr>
            @php $no++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection