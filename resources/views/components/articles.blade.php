@foreach($lastEvents as $event)
<article class="post first-post format-standard hentry">
    <div class="entry-featured-image">
        <img src="{{ $event->image['url'] }}" alt="{{ $event->name }}">
    </div><!-- .entry-featured-image -->

    <div class="entry-area">
        <div class="entry-header">
            <h2 class="entry-title"><a href="{{ $event->url() }}" rel="bookmark">{{ $event->name }}</a></h2>
            <div class="entry-meta">
                <span class="posted-on">
                    <a href="{{ $event->url() }}" rel="bookmark">
                        <time class="entry-date" datetime="{{ $event->start_at->format('Y-m-d') }}">
                            {{ $event->start_at->format('Y-m-d') }}
                        </time>
                    </a>
                </span><!-- .posted-on -->
                <span class="entry-cat">
                    <span class="cat-link"><a href="#">{{ $event->categoria }}</a></span>
                </span><!-- .entry-cat -->
                <span class="entry-like"><a href=""><i class="fa fa-user"></i> {{ $event->asistentes() }}</a></span>
            </div><!-- .entry-meta -->
        </div><!-- .entry-header -->

        <div class="entry-content">
            <p>
                {{ Str::limit($event->description, 80, ' (...)') }}
                <a href="{{ $event->url() }}" class="more-link">
                    <span class="moretext">Más</span> <span class="screen-reader-text">{{ $event->name }}</span>
                </a><!-- .more-link -->
            </p>
        </div><!-- .entry-content -->
    </div><!-- .entry-area -->
</article>
@endforeach