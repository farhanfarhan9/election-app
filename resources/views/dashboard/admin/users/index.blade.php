@extends('dashboard.layouts.master')
@section('title')
  Users
@endsection
@section('content')
<div class="page-header">
  <div class="page-header-content header-elements-md-inline">
      <div class="page-title d-flex">
          <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">@yield('title')</span></h4>
          <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
      </div>

      
      <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
          <a href="{{route('home.users.create')}}" class="btn btn-primary">Tambah User</a>
      </div>
     
  </div>
</div>
<div class="content pt-0">

  <!-- Basic card -->
  <div class="card">
      <div class="card-header header-elements-inline">
          <h5 class="card-title">Users</h5>
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
              <th scope="col">Email</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no=1 @endphp
            @foreach($users as $user)
            <tr>
              <th scope="row">
                <?= $no ?>
              </th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                <div class="btn-group">
                  <a class="btn btn-sm btn-success mr-1" href="{{route('home.users.edit', $user->id)}}">edit</a>
                  <form method="POST" action="/home/users/{{ $user->id }}" >
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