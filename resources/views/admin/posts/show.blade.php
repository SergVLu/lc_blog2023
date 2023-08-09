@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Просмотр Поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
              <li class="breadcrumb-item active">Пост</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid w-50">
        <div class="card card-primary">
          <div class="card-header d-flex">
            <h3 class="card-title">Категория </h3>
            <a href="{{ route('admin.post.index')}}" class="pl-4"> <i class="fa fa-home"></i> </a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form >
            <fieldset disabled>
              <div class="card-body">
                <div class="form-group">
                  <label >Название</label>
                  <input type="text" class="form-control" name="title" placeholder="Enter post" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                  <label >Контент</label>
                  <textarea cols="6" rows="4" class="form-control" name="title" placeholder="Enter content" >{{ $post->content }}</textarea>
                </div>
              </div>
            </fieldset>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-warning">Редактировать <i class="fa fa-edit"></i></a>
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
                  <td>{{ $post->id}}</td>
                </tr>
                <tr>
                  <td>Title</td>
                  <td>{{ $post->title}}</td>
                </tr>
                <tr>
                  <td>Content</td>
                  <td>{{ $post->content }}</td>
                </tr>
                <tr>
                  <td>Created</td>
                  <td>{{ $post->created_at }}</td>
                </tr>
                <tr>
                  <td>Updated</td>
                  <td>{{ $post->updated_at }}</td>
                </tr>
              </tbody>
            </table>
              <div class="card-body">
                <div class="btn-group">
                  <form action="{{ route('admin.post.index') }}" ">
                    <button type="submit" class="btn btn-primary btn-block"> Назад <i class="fa fa-home"></i></button>
                  </form>
                  <form action="{{ route('admin.post.edit', $post->id) }}" ">
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