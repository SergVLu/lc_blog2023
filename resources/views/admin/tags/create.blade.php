@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Создание Тега</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.tag.index') }}">Теги</a></li>
              <li class="breadcrumb-item active">Создание Тега</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid w-50 ml-0">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Новый тег</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.tag.store') }}" method="POST" >
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label >Название</label>
                <input type="text" class="form-control" name="title" placeholder="Enter tag">
                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-success">Сохранить</button>
              <a href="{{ route('admin.tag.index') }}" class="btn btn-primary">На главную <i class="fa fa-home"></i></a>
            </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection