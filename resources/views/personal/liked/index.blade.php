@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Лайки</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Личный кабинет</a></li>
              <li class="breadcrumb-item active">Понравилось</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-10">
            <div class="card-body">
              <table class="table table-bordered pl-0">
                <thead>
                  <tr style="text-align: center">
                    <th style="width: 10px">id</th>
                    <th>Название поста</th>
                    <th style="width: 100px"  colspan="2">Лайк</th>
                    <th>Категория</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td>{{ $post->id }}</td>
                    <td style="overflow:hidden;max-width: 150px;" nowrap>{{ $post->title}}</td>
                    <td style="width: 20px"> 
                        <a href="{{ route('post.show', $post->id )}}" style="width: fit-content"><i class="fa fa-eye"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <form action="{{ route('personal.like.destroy', $post->id) }}" method="post">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
                    <td >{{ $post->category->title }}</td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection