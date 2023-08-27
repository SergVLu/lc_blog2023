@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Теги</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item active">Теги</li>
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
            <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-info btn-sm center ml-4">Добавить тег</a>
          </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-10">
            <div class="card-body">
              <table class="table table-bordered pl-0">
                <thead>
                  <tr style="text-align: center">
                    <th style="width: 10px">#</th>
                    <th>Название</th>
                    <th style="width: 100px"  colspan="3">Действие</th>
                    <th style="width: 200px">Создан</th>
                    <th style="width: 200px">Обновлен</th>
                  </tr>
                </thead>
                <tbody>
                  @php $num=0 @endphp
                  @foreach ($tags as $tag)
                  <tr>
                    <td>{{ $num +=1 }}</td>
                    <td>{{ $tag->title}}</td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.tag.show', $tag->id) }}" style="width: fit-content"><i class="fa fa-eye"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.tag.edit', $tag->id) }}" class="text-warning" style="width: fit-content"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <form action="{{ route('admin.tag.destroy', $tag->id) }}" method="post">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
                    <td>{{ $tag->created_at }}</td>
                    <td>{{ $tag->updated_at }}</td>
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