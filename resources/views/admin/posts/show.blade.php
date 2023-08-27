@extends('admin.layouts.main')

@section('content')
@php
  // dd($post,$categories,$tags);  
@endphp
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
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
              <li class="breadcrumb-item active"> {{ $post->title }} </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header d-flex align-items-center">
            <h3 class="card-title">Пост: {{ $post->title }}<i class="fa fa-eye pl-3"></i></h3>
            {{-- <a href="{{ route('admin.post.index')}}" class="pl-4"> <i class="fa fa-eye"></i> </a> --}}
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="" class="">
            <div class="card-body">
              <div class="form-group ml-5">
                <input type="text" class="form-control w-25" name="title"  placeholder="Название поста" value="{{ $post->title }}">
              </div> 
              <div class="form-group ml-2">
                <div class="col-md-12 mt-2">
                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Summernote
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <textarea id="summernote" >
                        {{ $post->content }}
                      </textarea>
                    </div>
                  </div>     
                </div>
              </div>
              <div class="form-group ml-5">
                <div class="d-flex">
                  <div class="w-50">
                    <label>Превью блога </label>
                  </div>
                  <div class="w-50 ">
                    <img src="{{ asset('storage/'.$post->preview_image )}}" alt="preview_image" class="w-50 mr-0">
                  </div>
                </div>
              </div>
              <hr>
              <div class="form-group ml-5">
                <div class="d-flex">
                  <div class="w-50">
                    <label>Главное изображение блога</label>
                  </div>
                  <div class="w-50">
                    <img src="{{ asset('storage/'.$post->main_image )}}" alt="main_image" class="w-50">
                  </div>
                </div>
              <hr>
              
              <div class="form-group ml-5 w-50">
                <label>Категории</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $category)
                    <option  value="{{ $category->id }}" 
                      {{ $category->id == $post->category_id ? ' selected ' : '' }}
                      >{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
              <hr>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group ml-5 w-100">
                    <label>Теги</label>
                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" name="tag_ids[]">
                      @foreach ($tags as $tag)
                        <option  
                        {{ is_array($post->tags->pluck('id')->toArray()) &&  
                        in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : ''}} 
                         value="{{ $tag->id }}">{{ $tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer align-items-center" style="background-color: Transparent">
              <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-warning align-items-center">Перейти к редактору<i class="fa fa-pencil-alt pl-2"></i></a>
              <a href="{{ route('admin.post.index') }}" class="btn btn-secondary align-items-center ml-2">Вернуться к постам <i class="fas fa-copy pl-2"></i></a>
            </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection