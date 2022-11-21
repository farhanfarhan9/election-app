@extends('dashboard.layouts.index')
@section('title')
  Candidates
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Add Candidates</h4>
</div>
<div class="card-body">
  <form method="post" action="/home/candidates" enctype="multipart/form-data" class="form form-vertical" id="createCandidate">
    @csrf
    <div class="form-body">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="first-name-vertical">Kategori pemilihan</label>
                    <select name="election_id" class="form-control">
                      <option value="">--Pilih--</option>  
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
                  <input type="file" name="picture" class="form-control" id="inputGroupFile01">
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
$.validator.addMethod('filesize', function(value, element, param) {
  return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0} bytes');

$.validator.addMethod("noSpace", function(value, element){
  return value ==''||value.trim().length !=0
}, "Harap mengisi karakter dengan benar");

$(document).ready(function() {
    $('#createCandidate').validate({
        rules: {
          election_id: {
            required: true,
          },
          name: {
            noSpace: true,
            required: true,
            minlength: 3
          },
          desc: {
            required: true,
            minlength: 10
          },
          picture: {
            filesize: 224288,
            required: true,
            extension: "jpeg|png|jpg"
          }
        },
        messages:{
          election_id: {
            required: "Pilih salah satu kategori pemilihan",
          },
          name: {
            required: "Mohon masukkan name kandidat",
            minlength: "Minimal menggunakan 3 karakter"
          },
          desc:{
            required: "Mohon masukkan deskripsi",
            minlength: "Minimal menggunakan 10 karakter"
          },
          picture:{
            required: "Mohon upload file berupa gambar kandidat",
            extension: "Mohon upload file berupa gambar dengan ekstensi jpg, png atau jpeg",
            filesize: "Ukuran gambar maksimal adalah 2MB"
          }
        },
        errorPlacement: function(error, element) {
            key = element.attr("name");
            console.log(element);
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