@extends('dashboard.layouts.index')
@section('title')
  Users
@endsection
@section('content')
<div class="card-header">
  <h4 class="card-title">Manage Users</h4>

  <div class="ms-auto mb-lg-0">
    <a href="{{route('home.users.create')}}" class="btn btn-primary">Tambah User</a>
  </div>
</div>
<div class="card-body">
  <div class="table-responsive">
    <table class="table table-hover table-lg">
        <thead class="">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach($users as $user)
            <tr class="">
                <td>{{$no}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{route('home.users.edit', $user->id)}}" class="btn btn-success">Edit</a>
                    <form method="POST" action="/home/users/{{ $user->id }}" >
                      @csrf
                      @method('DELETE')
                      <div class="control">
                      <button type="submit" class="btn btn-danger ms-2" onClick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                  </div>
                </td>
            </tr>
            @php $no++ @endphp
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection