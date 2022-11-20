@extends('dashboard.layouts.index')
@section('title')
  Candidates
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Add Candidates</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/candidates" enctype="multipart/form-data" class="form form-vertical">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Kategori pemilihan</label>
                    <select name="election_id" class="form-control">
                      <option>--Pilih--</option>  
                      @foreach($elections as $election)
                        <option value="{{ $election->id }}">{{$election->name}}</option>  
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Nama Kandidat</label>
                    <input type="text" id="first-name-vertical" class="form-control"
                        name="name" placeholder="Nama Kandidat">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="desc-id-vertical">Deskripsi</label>
                    <textarea name="desc" placeholder="Deskripsi" id="desc-id-vertical" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                  <label for="desc-id-vertical">Foto Kandidat</label>
                  <fieldset>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupFile01"><i
                                    class="bi bi-upload"></i></label>
                            <input type="file" name="picture" class="form-control" id="inputGroupFile01">
                        </div>
                    </div>
                  </fieldset>
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