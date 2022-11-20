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