@extends('dashboard.layouts.index')
@section('title')
  Users
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Add Users</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/users/{{$user->id}}">
    @csrf
    @method('PATCH')
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Nama</label>
                    <input type="text" id="first-name-vertical" class="form-control"
                        name="name" placeholder="Nama" value="{{$user->name}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="email-id-vertical">Email</label>
                    <input type="email" id="email-id-vertical" class="form-control"
                        name="email" placeholder="Email" value="{{$user->email}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="contact-info-vertical">Password</label>
                    <input type="password" id="contact-info-vertical" class="form-control"
                        name="password" placeholder="Mobile">
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