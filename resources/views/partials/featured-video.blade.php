@php
$video = get_field('featured_video', 5);
$video_desc = get_field('featured_video_desc', 5);
@endphp

<section id="featured_video" class="container py-3 d-flex flex-column align-items-center">
    <div class="embed-container my-3">
        {!! $video !!}
    </div>
    <small class="text-center d-block"><em>{!! $video_desc !!}</em></small>
</section>
