@extends('dashboard.layouts.index')
@section('title')
  Users
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Edit Users</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/users/{{$user->id}}" id="editUser">
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
                        name="password" placeholder="Password">
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
@section('more-js')
<script>
    $(document).ready(function() {
        $('#editUser').validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3
                },
                email:{
                    required:true,
                    email:true
                }
            },
            messages: {
                name: {
                    required: "Mohon isi nama anda",
                    minlength: "Minimal menggunakan 3 karakter"
                },
                email: {
                    required: "Mohon isi email anda",
                    email: "Mohon menggunakan format email yang valid"
                },
            },
            errorPlacement: function(error, element) {
                key = element.attr("name");
                paragraph = element.closest("div.form-group");
                paragraph.append("<p class='invalid-feedback error-"+key+"'><p>")
                message = error.text();
                $(".error-"+key).text(message);
                $(".error-"+key).next('p').remove();
                element.removeClass('error').addClass('is-invalid');
            },
            success: function(label, element) {
                key = label.attr("for");
                $(".error-"+key).hide();
                $(element).removeClass('is-invalid');
            }
        });
    });
    </script>
@endsection