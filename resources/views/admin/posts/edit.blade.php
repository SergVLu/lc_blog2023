@extends('admin.layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          {{-- <div class="col-sm-6">
            <h1 class="m-0">Редактирование Поста</h1>
          </div><!-- /.col --> --}}
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
              <li class="breadcrumb-item active">{{ $post->title }}</li>
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
            <h3 class="card-title">Редактирование Поста: {{ $post->title }}<i class="fa fa-pencil-alt pl-2"></i></h3>
            {{-- <a href="{{ route('admin.post.index')}}" class="pl-4"> <i class="fa fa-home"></i> </a> --}}
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{ route('admin.post.update', $post->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
              <input type="hidden" name="id" value="{{ $post->id }}">
              @error('id')
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group ml-5">
                <input type="text" class="form-control w-25" name="title"  placeholder="Название поста" value="{{ old('title',$post->title) }}">
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
                        {{ old('content', $post->content) }}
                      </textarea>
                      @error('content')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>     
                </div>
              </div>
              <div class="form-group ml-5">
                <div class="d-flex">
                  <div class="w-50">
                    <label>Изменить превью блога </label>
                  </div>
                  <div class="w-50 ">
                    <img src="{{ asset('storage/'.$post->preview_image )}}" alt="preview_image" class="w-50 mr-0">
                  </div>
                </div>
                <div class="input-group mt-2 w-50" >
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="preview_image" >
                    <label class="custom-file-label" >Выберите, если надо поменять это изображение</label>
                  </div>
                  @error('preview_image')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <hr>
              <div class="form-group ml-5">
                <div class="d-flex">
                  <div class="w-50">
                    <label>Изменить главное изображение блога</label>
                  </div>
                  <div class="w-50">
                    {{-- <img src="{{ asset('storage/'.$post->main_image )}}" alt="main_image" class="w-50"> --}}
                    <img src="{{ url('storage/'.$post->main_image )}}" alt="main_image" class="w-50">
                  </div>
                </div>
                <div class="input-group mt-2 w-50" >
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="main_image">
                    <label class="custom-file-label" >Выберите, если надо поменять это изображение</label>
                  </div>
                  @error('maim_image')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              <hr>
              
              <div class="form-group ml-5 w-50">
                <label>Категории</label>
                <select name="category_id" class="form-control">
                  @foreach ($categories as $category)
                    <option  value="{{ $category->id }}" 
                      {{ $category->id == old("category_id",$post->category_id) ? ' selected ' : '' }}
                      >{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>
                @error('category_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              <hr>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group ml-5 w-100">
                    <label>Теги</label>
                    <select class="select2" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;" name="tag_ids[]">
                      @foreach ($tags as $tag)
                        <option  
                        {{ is_array(old('tag_ids')) &&  in_array($tag->id, old('tag_ids')) ? 'selected' : 
                        (is_array($post->tags->pluck('id')->toArray()) &&  
                        in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected' : '')}} 
                         value="{{ $tag->id }}">{{ $tag->title}}</option>
                      @endforeach
                    </select>
                  </div>
                  @error('tag_ids')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>
            <!-- /.card-body -->
              <div class="card-footer align-items-center d-flex">
                <a href="{{ route('admin.post.index') }}" class="btn btn-secondary align-items-center mr-3" style="height: fit-content">K постам<i class="fas fa-copy pl-2"></i></a>
                <button type="submit" class="btn btn-warning align-items-center" style="height: fit-content">Изменить<i class="fa fa-pencil-alt pl-2"></i></button>
              </div>
          </form>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection