@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Просмотр пользователя</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
              <li class="breadcrumb-item active">{{ $user->name }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid w-50">
        <div class="card card-danger">
          <div class="card-header d-flex">
            <h3 class="card-title">Пользователь {{ $user->name }}<i class="fas fa-eye ml-2"></i> </h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form >
            <fieldset disabled>
              <div class="card-body">
                <div class="form-group">
                  <label >Имя</label>
                  <input type="text" class="form-control" name="name"  value="{{ $user->name }}">
                </div>
                <div class="form-group">
                  <label >Почта</label>
                  <input type="text" class="form-control" name="email"  value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label >Роль</label>
                  <select  class="form-control">
                    @foreach ($roles as $id => $role)
                      <option  value="{{ $id }}" 
                        {{ $id ==  $user->role ? ' selected ' : '' }}
                        >{{ $role }}</option>
                    @endforeach
                  </select>
                  {{-- <input type="text" class="form-control" name="email"  value="{{ $user->role }}"> --}}
                </div>
              </div>
            </fieldset>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning">Перейти к редактированию <i class="fa fa-edit ml-2"></i></a>
            </div>
          </form>
        </div>
      </div><!-- /.container-fluid -->
      <div class="row">
        <div class="col-10">
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td>ID</td>
                  <td>{{ $user->id}}</td>
                </tr>
                <tr>
                  <td>Имя</td>
                  <td>{{ $user->name}}</td>
                </tr>
                <tr>
                  <td>Почта</td>
                  <td>{{ $user->email}}</td>
                </tr>
                <tr>
                  <td>Created</td>
                  <td>{{ $user->created_at }}</td>
                </tr>
                <tr>
                  <td>Updated</td>
                  <td>{{ $user->updated_at }}</td>
                </tr>
              </tbody>
            </table>
              <div class="card-body">
                <div class="btn-group">
                  <form action="{{ route('admin.user.index') }}" ">
                    <button type="submit" class="btn btn-primary btn-block"> Назад <i class="fas fa-users ml-2"></i></button>
                  </form>
                  <form action="{{ route('admin.user.edit', $user->id) }}" ">
                    <button type="submit" class="btn btn-warning btn-block ml-2"> Редактировать <i class="fa fa-edit"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection