@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование Поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
              <li class="breadcrumb-item active">Редактирование Поста</li>
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
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Пост</h3>
            <a href="{{ route('admin.post.index')}}" class="pl-4"> <i class="fa fa-home"></i> </a>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.post.update', $post->id)  }}" method="POST" >
            @csrf
            @method('patch')
            <div class="card-body">
              <div class="form-group">
                <label >Название</label>
                <input type="text" class="form-control" name="title" placeholder="Enter post" value="{{ $post->title }}">
                @error('title')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              <div class="form-group">
                <label >Текст</label>
                <textarea rows="4" cols="5" class="form-control" name="content" placeholder="Enter text" >{{ $post->content}}</textarea>
                @error('content')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="hidden" name="id" value="{{ $post->id }}">
              </div>
            </div>
            <div class="card-footer align-items-center">
              <button type="submit" class="btn btn-warning align-items-center">Изменить <i class="fa fa-pencil-alt pl-2"></i></button>
            </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection