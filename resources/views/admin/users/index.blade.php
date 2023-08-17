@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item active">Пользователи</li>
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
            <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-danger btn-sm center ml-4">Добавить пользователя</a>
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
                    <th>Имя</th>
                    <th>Почта</th>
                    <th style="width: 100px"  colspan="3">Действие</th>
                    <th style="width: 200px">Создано</th>
                    <th style="width: 200px">Обновлено</th>
                  </tr>
                </thead>
                <tbody>
                  @php $num=0 @endphp
                  @foreach ($users as $user)
                  <tr>
                    <td>{{ $num +=1 }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.user.show', $user->id) }}" style="width: fit-content"><i class="fa fa-eye"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <a href="{{ route('admin.user.edit', $user->id) }}" class="text-warning" style="width: fit-content"><i class="fa fa-edit"></i></a>
                    </td>
                    <td style="width: 20px"> 
                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="user">
                          @csrf @method('delete')
                          <button type="submit" style="width: fit-content; border: none; background-color: Transparent;">
                            <i class="fa fa-trash-alt text-danger"></i>
                          </button>
                        </form>
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
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