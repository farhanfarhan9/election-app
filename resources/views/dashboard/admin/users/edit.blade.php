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
        <form method="post" action="/home/users/{{$user->id}}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$user->name}}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
  <!-- /basic card -->

</div>
@endsection
@section('inline-js')

@endsection