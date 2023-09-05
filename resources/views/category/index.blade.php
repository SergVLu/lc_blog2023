@extends('layouts.main')

@section('content')
<div class="container " style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Категории</h3></div>

                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>#id</th>
                            <th>Категория</th>
                            <th style="text-align: center" >Постов</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($categories as $category)
                              <tr data-widget="expandable-table" aria-expanded="false">
                              <td>{{ $category->id }}</td>
                              <td><a href="{{ route('category.post.index',$category->id) }}">{{ $category->title }}</a></td>
                              <td style="text-align: center" >{{ $category->posts->count() }}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection