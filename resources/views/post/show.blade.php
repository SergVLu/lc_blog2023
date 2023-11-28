@extends('layouts.main')

@section('content')

<main class="blog-post">
    <section class="related-posts"></section>
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Опубликован • {{ $date->translatedFormat('d F') }},{{ $date->year }} • {{ $date->format('H:i') }} • Лайков-{{ $post->likedUsers->count() }} • Комментариев-{{ $post->comments->count() }}</p>
        <section class="blog-post-featured-img " data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/'.$post->preview_image )}}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    <p>{!! $post->content !!}</p>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-4 mb-3" data-aos="fade-right">
                    <img src="{{ asset('storage/'.$post->main_image )}}" alt="blog post" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up">
                    <img src="{{ asset('storage/'.$post->preview_image )}}" alt="blog post" class="img-fluid">
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-left">
                    <img src="{{ asset('storage/'.$post->main_image )}}" alt="blog post" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <p data-aos="fade-up"><a href="#">Знать хорошо</a> , а думать о том что знаешь - зло. Надо научиться быть нейтральным к тому что знаешь. Когда чувствуешь сразу и знаешь. <br/>&nbsp;&nbsp;Начинаешь исследовать разумом и уже не чувствуешь, знание дальше не приходит... Ум занят вычислениями.</<br>&nbsp;&nbsp;Перестало приходить - хорошо. Идёт - тоже хорошо. Надо только чувствовать. Опять пришли к ОМ, даже к ОВД сначала. Цувствовать и быть нейтральным к тому чтопочувствовал. Разум хорошо раскидывает полочкам только во сне или медитации. И то не факт.</p>
                    <blockquote data-aos="fade-up">
                        <p>&nbsp;&nbsp;Эмоции провоцирует разум, это связка. Один из механизмов расходования сексуальной энергии.</p>
                        <footer class="blockquote-footer">Marubasy-Nagval-Dao</footer>
                    </blockquote>
                    <p>&nbsp;&nbsp;Это не чувствование, а разум подкидывает разные мысли, чтобы человек эмоционировал и прекратил чувствование, израсходовал сексуалку. <br> &nbsp; &nbsp;Разум страшится одиночества и перетягивает всю энергию на себя.  Надо прекратить и эмоционировать и размышлять, это одна хрень. Положительная обратная связь - мысли=>эмоции=>мысли=>эмоции=>порочный круг. Из-за страха одиночества ему хочется себя занять.<br> &nbsp; &nbsp; Если нравится упорядочивать, то он задкидывает в себя все что попало, а результаты складывает, чтобы потом знать ответ в непредвиденной ситуации. И эмоционирует по результатам складывания.<br> &nbsp; &nbsp;Он боится быть застигнутым в неопределенности, поэтому готовится и молотит всё время. Ему все интересно, и гнев, и радость, и любовь, и ненависть, и реакции на всякие вкусы, и на музыку, на всё...<br> &nbsp; &nbsp; Надо его успокоить. Заставить почувствовать себя самодостаточным , а не как избалованый ребенок. Сыграть на том, что и ему тогдо будет выгоднее. Тогда будет больше сексуалки, дольше сможешь почувствовать и больше разуму потом может быть прибытка. Это может побудить его подольше не включаться. <br>&nbsp;&nbsp;  Если это сделать постоянно и сексуалку накопить, то решения можно добиваться и правильнее и шире и быстрее.<br>&nbsp;&nbsp;  Для того чтобы использовать это, надо разделить процессы разума и действия. Во время действия уже думать о правильности не следует. Тогда можно и хорошо придумать и хорошо потом действовать</p>
                </div>
            </div>
        </section>
        <section>
            @auth
                <form action="{{ route('post.like.store', $post->id) }}" method="post" >
                    @csrf
                    <button type="submit" class="btn">
                        @if (auth()->user()->likedPosts->contains($post->id))
                            <i class="nav-icon fas fa-heart" style="color: #f8530d;"></i>
                        @else
                            <i class="nav-icon far fa-heart"></i>
                        @endif    
                        {{-- @endif --}}
                    </button>
                    ({{ $post->liked_users_count }})
                    <button type="submit" class="btn">
                        @auth
                            <i class="nav-icon fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart" style="color: {{ auth()->user()->likedPosts->contains($post->id) ? ' #f8530d;' : '' }}"></i>
                        @endauth
                        
                    </button>
                </form>
            @endauth
            <div class="col-md-2 pr-20" style="float: right">
                @guest
                    <i class="nav-icon fa{{ $post->liked_users_count == 0 ? 'r' : 's' }} fa-heart pr-2" style="color: {{ $post->liked_users_count == 0 ? '' : ' #f8530d;' }}">({{ $post->liked_users_count }})</i>
                @endguest
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relposts->count() > 0 )
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                    <div class="row">
                        @foreach ($relposts as $relpost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <a href="{{ route('post.show', $relpost->id )}}  " style="text-decoration: none; ">
                            <img src="{{ asset('storage/'.$relpost->preview_image )}}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $relpost->category->title }}</p>
                            <h5 class="post-title">{{ $relpost->title }}</h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                @if ($post->comments->count()!=0)
                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            <h2 class="mb-4" data-aos="fade-up">Последние комментарии</h2>
                            <ul data-aos="fade-up">
                                @foreach ( $post->comments->take(-2)->sortDesc() as $message )
                                {{-- //                     ->get()
                                //                     ->take(2)  --}}
                                    <li>{{ $message->message }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if ($post->comments->count()!=0)
                    <section class="comment-list mb-5">
                        <div class="mx-auto">
                            <h3>Комментарии({{ $post->comments->count() }})</h3>
                            @foreach ($post->comments as $comment )
                                <div class="comment-text mb-2">
                                    <span class="username">
                                        <div>
                                            Автор: Z-{{ $comment->user->name }}
                                        </div>
                                    </span>
                                    {{-- <span class="text-muted float-right">{{ $comment->date_as_carbon->diffForHumans() }}</span><br> --}}
                                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                    {{ $comment->message }}<hr>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @else <h3>Пока комментов не было</h3>
                @endif
                @auth
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="message" class="sr-only">Comment</label>
                                <textarea name="message" id="message" class="form-control" placeholder="Напишите комментарий" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отослать комментарий" class="btn btn-warning btn-sx">
                                </div>
                            </div>
                        </form>
                    </section>
                @endauth

            </div>
        </div>
    </div>
</main>

@endsection