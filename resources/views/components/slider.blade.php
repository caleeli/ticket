<div class="topbar-slider" style="margin-top:5em;">
    <div id="slider-thumbnail" class="owl-carousel owl-theme slider-thumbnail">
        @foreach($events as $i => $event)
        <div class="item">
            <img class="event-img" src="{{ $event->image['url'] }}" alt="featured slider {{ $i }}">
            <div class="item-caption">
                <div class="caption-description">
                    <a href="category.html" class="caption-cat-links">{{ $event->category }}</a>
                    <span class="caption-title">
                        <a href="{{ $event->url() }}" class="caption-title-link">{{ $event->name }}</a>
                        <a href="{{ $event->url() }}" class="button caption-more-link">Mas</a>
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .event-img {}
</style>