@extends('post.layouts.main')

@section('content')

<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Опубликован • {{ $date->translatedFormat('d F') }},{{ $date->year }} • {{ $date->format('h:i') }} • Лайков-{{ $post->likedUsers->count() }} • Комментариев-{{ $post->comments->count() }}</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/'.$post->preview_image )}}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!! $post->content !!}
                    <p>{!! $post->content !!}</p>
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
                    <h2 class="mb-4" data-aos="fade-up">Blog single page</h2>
                    <ul data-aos="fade-up">
                        <li>What manner of thing was upon me I did not know, but that it was large and heavy and many-legged I could feel.</li>
                        <li>My hands were at its throat before the fangs had a chance to bury themselves in my neck, and slowly</li>
                        <li>I forced the hairy face from me and closed my fingers, vise-like, upon its windpipe.</li>
                    </ul>

                    <blockquote data-aos="fade-up">
                        <p>&nbsp;&nbsp;Эмоции провоцирует разум, это связка. Один из механизмов расходования сексуальной энергии.</p>
                        <footer class="blockquote-footer">Marubasy-Nagval-Dao</footer>
                    </blockquote>
                    <p>&nbsp;&nbsp;Это не чувствование, а разум подкидывает разные мысли, чтобы человек эмоционировал и прекратил чувствование, израсходовал сексуалку. <br> &nbsp; &nbsp;Разум страшится одиночества и перетягивает всю энергию на себя.  Надо прекратить и эмоционировать и размышлять, это одна хрень. Положительная обратная связь - мысли=>эмоции=>мысли=>эмоции=>порочный круг. Из-за страха одиночества ему хочется себя занять.<br> &nbsp; &nbsp; Если нравится упорядочивать, то он задкидывает в себя все что попало, а результаты складывает, чтобы потом знать ответ в непредвиденной ситуации. И эмоционирует по результатам складывания.<br> &nbsp; &nbsp;Он боится быть застигнутым в неопределенности, поэтому готовится и молотит всё время. Ему все интересно, и гнев, и радость, и любовь, и ненависть, и реакции на всякие вкусы, и на музыку, на всё...<br> &nbsp; &nbsp; Надо его успокоить. Заставить почувствовать себя самодостаточным , а не как избалованый ребенок. Сыграть на том, что и ему тогдо будет выгоднее. Тогда будет больше сексуалки, дольше сможешь почувствовать и больше разуму потом может быть прибытка. Это может побудить его подольше не включаться. <br>&nbsp;&nbsp;  Если это сделать постоянно и сексуалку накопить, то решения можно добиваться и правильнее и шире и быстрее.<br>&nbsp;&nbsp;  Для того чтобы использовать это, надо разделить процессы разума и действия. Во время действия уже думать о правильности не следует. Тогда можно и хорошо придумать и хорошо потом действовать</p>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if($relposts->count() !=0 )
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Похожие посты</h2>
                    <div class="row">
                        @foreach ($relposts as $post)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <a href="{{ route('post.show', $post->id )}}  " style="text-decoration: none; ">
                            <img src="{{ asset('storage/'.$post->preview_image )}}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{ $post->category->title }}</p>
                            <h5 class="post-title">{{ $post->title }}</h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                    <form action="/" method="post">
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                            <label for="comment" class="sr-only">Comment</label>
                            <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4" data-aos="fade-right">
                                <label for="name" class="sr-only">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name*">
                            </div>
                            <div class="form-group col-md-4" data-aos="fade-up">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="form-group col-md-4" data-aos="fade-left">
                                <label for="website" class="sr-only">Website</label>
                                <input type="url" name="website" id="website" class="form-control" placeholder="Website*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Send Message" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>

@endsection