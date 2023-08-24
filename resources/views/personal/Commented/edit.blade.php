@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование комментария</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">LC-Blog2023</a></li>
              <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">PersonalPanel</a></li>
              <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Комментарии</a></li>
              <li class="breadcrumb-item active">Редактирование</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid w-50">
    <div class="card card-primary">
      <div class="card-header d-flex align-items-center">
        <h3 class="card-title">Комментарий к посту: {{ $comment->post_id }}. </h3>
        <a href="{{ route('personal.comment.index')}}" class="pl-4"> <i class="fa fa-comments"> вернуться</i> </a>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route('personal.comment.update', $comment->id)  }}" method="POST" >
        @csrf
        @method('patch')
        <div class="card-body">
          <div class="form-group">
            <textarea type="text" class="form-control" cols="8" rows="3" name="message" placeholder="Enter comment" >{{ $comment->message }}</textarea>
            @error('message')
              <div class="text-danger">{{ $message }}</div>
            @enderror
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