@extends('personal.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Персональная</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">LC-Blog2023</a></li>
              <li class="breadcrumb-item active">PersonalPanel</li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ Auth::user()->name }}</h3>
                <p>Пользователь</p>
              </div>
              @if(auth()->user()->role == 0)
                <a href="{{ route('admin.user.show',Auth::user()->id) }}" >
                  <div class="icon">
                    <i class="far fa-user  fa-rotate-90"></i>
                  </div>
                </a>
                <a href="{{ route('admin.user.show',Auth::user()->id) }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            @else
            <a href="#" >
              <div class="icon">
                <i class="far fa-user  fa-rotate-90"></i>
              </div>
            </a>
            <a href="#" class="small-box-footer">Вы не админ</a>
              @endif
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>77</h3>
                <p>Понравившиеся посты</p>
              </div>
              <a href="{{ route('personal.like.index') }}">
                <div class="icon">
                  <i class="far fa-heart fa-rotate-90"></i>
                </div>
              </a>
                <a href="{{ route('personal.like.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>33<sub style="font-size: 20px">шт.</sub></h3>

                <p>Комментарии</p>
              </div>
              <a href="{{ route('personal.comment.index') }}">
              <div class="icon">
                <i class="far fa-comments fa-rotate-90"></i>
              </div>
              </a>
              <a href="{{ route('personal.comment.index') }}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection