@extends('layout.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 col-offset-2">
                <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data User</h3>
        </div>
        <div class="panel-body">
        <form action="/user/{{$user->id}}/update" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nis</label>
            <input name="nis" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIS" value="{{$user->nis}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Peran</label>
            <select name="role" class="form-control" id="exampleFormControlSelect1">
            <option value="Admin" @if($user->role == 'Admin') selected @endif >Admin</option>
            <option value="PV" @if($user->role == 'PV') selected @endif >PV</option>
            <option value="Legal" @if($user->role == 'Legal') selected @endif >Legal</option>
            <option value="GP" @if($user->role == 'GP') selected @endif >GP</option>
            <option value="QA" @if($user->role == 'QA') selected @endif >QA</option>
            <option value="NR" @if($user->role == 'NR') selected @endif >NR</option>
            <option value="RND" @if($user->role == 'GP') selected @endif >RND</option>
            <option value="PRO" @if($user->role == 'PRO') selected @endif >PRO</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
        </div>
        </div>
        </div>
    </div>
</div>
</div>
</div>
@stop

@section('content1')
    <h1>Edit Data user</h1>

        @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
        @endif
        <div class="row">
        <div class="col-lg-12">
        <form action="/user/{{$user->id}}/update" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="{{$user->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input name="email"  type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$user->email}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Pilih Jenis ROLE</label>
            <select name="role" class="form-control" id="exampleFormControlSelect1">
            <option value="Admin" @if($user->role == 'Admin') selected @endif >Admin</option>
            <option value="User" @if($user->role == 'User') selected @endif >User</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        </form>
        </div>

        </div>
@endsection
