@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Blog</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Админка</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
              <li class="breadcrumb-item active">Создание Поста</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid ml-0">
        <div class="card card-secondary">
          <div class="card-header">
            <h4 class="card-title">Новый пост</h4>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data" class="ml-0">
            @csrf
            <div class="card-body">
              <div class="form-group ml-5">
                <input type="text" class="form-control w-25" name="title"  placeholder="Название поста" value="{{ old('title') }}">
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
                      <textarea id="summernote" name="content" >
                        {{ old('content',"Введите <em>какой-нибудь</em> <u>текст</u> <strong>сюда</strong>") }}
                      </textarea>
                      @error('content')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>     
                </div>
              </div>
              <div class="form-group ml-5">
                <div class="input-group w-50">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image" value="{{ old("preview_image") }}">
                    <label class="custom-file-label" >{{ old("preview_image") ? old("preview_image") : 'Выберите файл для превью'}}</label>
                  </div>
                </div>
                @error('preview_image')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="form-group ml-5">
                <div class="input-group w-50">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image" value="{{ old("main_image") }}">
                    <label class="custom-file-label" >Главное изображение блога</label>
                  </div>
                </div>
                @error('main_image')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="form-group ml-5 w-50">
                <label>Выберите категорию</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $category)
                    <option  value="{{ $category->id }}" 
                      {{ $category->id == old("category_id") ? ' selected ' : '' }}
                      >{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group ml-5 w-100">
                    <label>Выберите теги</label>
                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" name="tag_ids[]">
                      @foreach ($tags as $tag)
                        <option {{ is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? 'selected' : ''}} value="{{ $tag->id }}">{{ $tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  <!-- /.form-group -->
              </div>
              @error('tag_ids')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-success">Сохранить</button>
              <a href="{{ route('admin.post.index') }}" class="btn btn-secondary"> К постам <i class="fa fa-copy fa-rotate-270"> </i></a>
            </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection