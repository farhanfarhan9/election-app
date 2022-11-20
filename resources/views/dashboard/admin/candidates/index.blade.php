@extends('dashboard.layouts.index')
@section('title')
  Candidates
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Manage Candidates</h4>

  <div class="ms-auto mb-lg-0">
    <a href="{{route('home.candidates.create')}}" class="btn btn-primary">Tambah Kandidat</a>
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
              <th>Foto</th>
              <th>Nama Pemilihan</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
          
            @php $no=1 @endphp
            @foreach($candidates as $candidate)
            <tr class="">
                <td>{{$no}}</td>
                <td>{{$candidate->name}}</td>
                <td>{{$candidate->desc}}</td>
                <td><img src="{{asset('storage/'. $candidate->picture)}}" alt="" width="140px" height="100px"></td>
                <td>{{$candidate->election->name}}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{route('home.candidates.edit', $candidate->id)}}" class="btn btn-success">Edit</a>
                    <form method="POST" action="/home/candidates/{{ $candidate->id }}" >
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