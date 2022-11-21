@extends('dashboard.layouts.index')
@section('title')
  Elections
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Edit Elections</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/elections/{{$election->id}}" class="form form-vertical" id="editElection">
    @csrf
    @method('PATCH')
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Nama pemilihan</label>
                    <input type="text" id="first-name-vertical" class="form-control"
                        name="name" placeholder="Nama pemilihan" value="{{$election->name}}">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="desc-id-vertical">Deskripsi</label>
                    <textarea name="desc" placeholder="Deskripsi" id="desc-id-vertical" class="form-control" cols="30" rows="10">{{$election->desc}}</textarea>
                </div>
            </div>
            <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="vote-start">Voting dimulai</label>
                      <input type="datetime-local" name="vote_start" class="form-control" id="vote-start" value="{{$election->vote_start}}">
                  </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label for="vote-end">Voting berakhir</label>
                    <input type="datetime-local" name="vote_end" class="form-control" id="vote-end" value="{{$election->vote_end}}">
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
@section('more-js')
<script>
$(document).ready(function() {
    $.validator.addMethod("noSpace", function(value, element){
      return value ==''||value.trim().length !=0
    }, "Harap mengisi karakter dengan benar");

    $('#editElection').validate({
        rules: {
          name: {
            noSpace: true,
            required: true,
            minlength: 5
          },
          desc: {
            required: true,
            minlength: 10
          },
          vote_start: {
            required: true
          },
          vote_end: {
            required: true
          }
        },
        messages:{
          name: {
            required: "Mohon masukkan nama pemilihan",
            minlength: "Minimal menggunakan 5 karakter"
          },
          desc: {
            required: "Mohon masukkan deskripsi pemilihan",
            minlength: "Minimal menggunakan 10 karakter"
          },
          vote_start:{
            required: "Mohon isi tanggal dimulai voting"
          },
          vote_end:{
            required: "Mohon isi tanggal berakhir voting"
          }
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