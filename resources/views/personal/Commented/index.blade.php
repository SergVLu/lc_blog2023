@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Мои комментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Личный кабинет</a></li>
              <li class="breadcrumb-item active">Commented</li>
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
          <div class="col-8">
            <div class="card-body">
              <table class="table table-bordered pl-0">
                <thead>
                  <tr style="text-align: center">
                    <th style="width: 10px">Post_id</th>
                    <th style="width: 100px">Post_title</th>
                    <th style="width: 200px">Комментарий</th>
                    <th style="width: 50px"  colspan="2">Действие</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($comments as $comment)
                  <tr>
                    <td class="text-center" style="width: 10px">{{ $comment->post_id }}</td>
                    <td style="width: 100px">
                      @foreach ($posts as $post)
                        @if($post->id == $comment->post_id)
                          {{ $post->title }}
                        @endif
                      @endforeach
                    </td>
                    <td style="overflow:hidden;max-width: 200px;" nowrap>{{ $comment->message }}</td>
                    <td  class="text-center" style="width: 25px"> 
                        <a href="{{ route('personal.comment.edit', $comment->id) }}" style="width: fit-content"><i class="fa fa-edit text-warning"></i></a>
                    </td>
                    <td  class="text-center" style="width: 25px"> 
                        <form action="{{ route('personal.comment.destroy', $comment->id) }}" method="POST">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
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