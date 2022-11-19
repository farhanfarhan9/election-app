@extends('dashboard.layouts.index')
@section('title')
  Elections
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Add Elections</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/elections" class="form form-vertical">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Nama pemilihan</label>
                    <input type="text" id="first-name-vertical" class="form-control"
                        name="name" placeholder="Nama pemilihan">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="desc-id-vertical">Deskripsi</label>
                    <textarea name="desc" placeholder="Deskripsi" id="desc-id-vertical" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="vote-start">Voting dimulai</label>
                      <input type="datetime-local" name="vote_start" class="form-control" id="vote-start">
                  </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="vote-end">Voting berakhir</label>
                    <input type="datetime-local" name="vote_end" class="form-control" id="vote-end">
                </div>
              </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
            </div>
        </div>
    </div>
  </form>
</div>
@endsection

{{-- @extends('dashboard.layouts.master')
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
        <form method="post" action="/home/elections">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Nama Pemilihan</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Deskripsi Pemilihan</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Voting Dimulai</label>
            <input type="datetime-local" name="vote_start" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Voting Berakhir </label>
            <input type="datetime-local" name="vote_end" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
  <!-- /basic card -->

</div>
@endsection
@section('inline-js')

@endsection --}}