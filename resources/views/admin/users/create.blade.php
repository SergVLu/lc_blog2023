@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Новый пользователь</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
              <li class="breadcrumb-item active">Новый пользователь</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid w-50 ml-0">
        <div class="card card-danger">
          <div class="card-header">
            <h3 class="card-title">Новый пользователь<i class="ion ion-person-add  ml-2"></i></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.user.store') }}" method="POST" >
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label >Имя</label>
                <input type="text" class="form-control" name="name" placeholder="Enter user name" value="{{ old('name') }}">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label >Почта</label>
                <input type="text" class="form-control" name="email" placeholder="Enter user email" value="{{ old('email') }}">
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              {{-- <div class="form-group">
                <label >Пароль</label>
                <input type="text" class="form-control" name="password" placeholder="Enter user password" value="{{ old('password') }}">
                error('password')
                  <div class="text-danger">{{ $message }}</div>
                enderror
              </div> --}}
              <div class="form-group w-50">
                <label>Выберите роль пользователя</label>
                <select name="role" class="form-control">
                  @foreach ($roles as $id => $role)
                    <option  value="{{ $id }}" 
                      {{ $id == old("role") ? ' selected ' : '' }}
                      >{{ $role }}</option>
                  @endforeach
                </select>
                @error('role_id')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-success">Сохранить<i class="ion ion-person-add  ml-2"></i></button>
              <a href="{{ route('admin.user.index') }}" class="btn btn-danger">К пользователям<i class="nav-icon fas fa-users ml-2"></i></a>
            </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection