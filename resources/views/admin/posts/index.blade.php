@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Посты</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item active">Посты</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2">
            <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-secondary btn-sm center ml-4">Добавить пост</a>
          </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="card-body">
              <table class="table table-bordered pl-0">
                <thead>
                  <tr style="text-align: center">
                    <th style="width: 10px">#id</th>
                    <th>Название</th>
                    <th style="width: 100px"  colspan="3">Действие</th>
                    <th>Текст</th>
                    <th>Категория</th>
                    <th style="width: 70px">Создан</th>
                    <th style="width: 70px">Обновлен</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                  <tr>
                    <td style="text-align: center">{{ $post->id }}</td>
                    <td style="overflow:hidden;max-width: 150px;" nowrap>{{ $post->title}}</td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.post.show', $post->id) }}" style="width: fit-content"><i class="fa fa-eye"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.post.edit', $post->id) }}" class="text-warning" style="width: fit-content"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
                    <td style="overflow:hidden;max-width: 200px;" nowrap>{{ $post->content }}</td>
                    <td >{{ $post->category->title }}</td>
                    <td style="overflow:hidden;max-width: 80px;" nowrap>{{ $post->created_at }}</td>
                    <td style="overflow:hidden;max-width: 80px;" nowrap>{{ $post->updated_at }}</td>
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