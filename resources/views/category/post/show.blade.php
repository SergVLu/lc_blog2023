@extends('layouts.main')

@section('content')
<div class="container " style="margin-top: 20px">
  <div class="row justify-content-center">
      <div class="col-md-10">
          <div class="card">
              <div class="card-header">
                <h2>Посты в категории <b>"{{ $category->title }}"</b></h2>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>#id</th>
                      <th>Название</th>
                      <th>Создан</th>
                      <th style="text-align: center">Просмотреть</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                        <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td style="text-align: center"><a href="{{ route('post.show',$post->id) }}"><i class="nav-icon fas fa-eye" ></i></a></td>
                        </tr>
                    @endforeach
                    
                  </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
</div>
{{ $posts->links() }}



@endsection