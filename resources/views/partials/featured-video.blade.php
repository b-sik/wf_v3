@php
$home = get_page_by_title('home');
$video = get_field('featured_video', $home->ID);
$video_desc = get_field('featured_video_desc', $home->ID);
@endphp

<section id="featured_video" class="container d-flex flex-column align-items-center">
    <div class="card">
        <div class="embed-container">
            {!! $video !!}
        </div>
        <small class="text-center card-text d-block my-3"><em class="text-dark">{!! $video_desc !!}</em></small>
    </div>
</section>
