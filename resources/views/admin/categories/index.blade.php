@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Категории</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item active">Категории</li>
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
            <a href="{{ route('admin.category.create') }}" class="btn btn-block btn-default btn-sm center ml-4">Добавить категорию</a>
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
                  @foreach ($categories as $category)
                  <tr>
                    <td>{{ $num +=1 }}</td>
                    <td>{{ $category->title}}</td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.category.show', $category->id) }}" style="width: fit-content"><i class="fa fa-eye"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="text-warning" style="width: fit-content"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
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