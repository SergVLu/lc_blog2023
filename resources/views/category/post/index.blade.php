@extends('layouts.main')

@section('content')
<main class="blog">
  <div class="container">
      <h3 class="edica-page-title" data-aos="fade-up">Категория: {{ $category->title }}</h3>
      <p  data-aos="fade-up">Посты в которых есть эта категория: </p>
      <section class="featured-posts-section">
          <div class="row">
              @foreach ($posts as $post)
                  <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                      <div class="blog-post-thumbnail-wrapper">
                          <a href="{{ route('post.show', $post->id )}}">
                              <img src="{{ asset('storage/'.$post->main_image )}}" alt="blog post">
                          </a>
                      </div>
                      <div class="d-flex justify-content-between">
                          <p class="blog-post-category">{{ $post->category->title }}</p>
                          @auth
                              <form action="{{ route('post.like.store', $post->id) }}" method="post" >
                                  @csrf
                                  <button type="submit" class="btn">
                                      @if (auth()->user()->likedPosts->contains($post->id))
                                          <i class="nav-icon fas fa-heart" style="color: #f8530d;"></i>
                                      @else
                                          <i class="nav-icon far fa-heart"></i>
                                      @endif    
                                  </button>
                                  ({{ $post->liked_users_count }})
                                  <button type="submit" class="btn">
                                      @auth
                                          <i class="nav-icon fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart" style="color: {{ auth()->user()->likedPosts->contains($post->id) ? ' #f8530d;' : '' }}"></i>
                                      @endauth
                                  </button>
                              </form>
                          @endauth
                          @guest
                              <div>
                                  <span>({{ $post->liked_users_count }})</span>
                                  <i class="nav-icon far fa-heart" "></i>
                              </div>
                          @endguest
                      </div>
                      <a href="{{ route('post.show', $post->id )}}" class="blog-post-permalink">
                          <h6 class="blog-post-title">{{ $post->title }}</h6>
                      </a>
                  </div>
              @endforeach
          </div>
          <div class="row">
              <div  class="mx-auto" style="margin-top: -100px;" >
                  {{ $posts->links() }}
              </div>

          </div>
      </section>

  </div>

</main>
@endsection