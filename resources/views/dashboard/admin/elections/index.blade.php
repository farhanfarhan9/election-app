@extends('dashboard.layouts.master')
@section('title')
  Elections
@endsection
@section('content')
<div class="page-header">
  <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">@yield('title')</span></h4>
          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      
      <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
          <a href="{{route('home.elections.create')}}" class="btn btn-primary">Tambah Pemilihan</a>
      </div>
     
  </div>
</div>
<div class="content pt-0">

  <!-- Basic card -->
  <div class="card">
      <div class="card-header header-elements-inline">
          <h5 class="card-title">Elections</h5>
          <div class="header-elements">
              <div class="list-icons">
                  <a class="list-icons-item" data-action="collapse"></a>
                  <a class="list-icons-item" data-action="reload"></a>
                  <a class="list-icons-item" data-action="remove"></a>
              </div>
          </div>
      </div>

      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Voting dimulai</th>
              <th scope="col">Voting berakhir</th>
              @if(Auth::user()->email==='admin@admin.com')
              <th scope="col">Nama owner</th>
              @endif
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($elections as $election)
            <tr>
              <th scope="row">
                <?= $no ?>
              </th>
              <td>{{$election->name}}</td>
              <td>{{$election->desc}}</td>
              <td>{{$election->vote_start}}</td>
              <td>{{$election->vote_end}}</td>
              @if(Auth::user()->email==='admin@admin.com')
              <td>{{$election->user->name}}</td>
              @endif
              <td>
                <div class="btn-group">
                  <a class="btn btn-sm btn-success mr-1" href="{{route('home.elections.edit', $election->id)}}">edit</a>
                  <form method="POST" action="/home/elections/{{ $election->id }}" >
                    @csrf
                    @method('DELETE')
                    <div class="control">
                    <button type="submit" class="btn btn-sm btn-danger" onClick="return confirm('Yakin ingin menghapus?')">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
            @php $no++; @endphp
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
  <!-- /basic card -->

</div>
@endsection
@section('inline-js')

@endsection