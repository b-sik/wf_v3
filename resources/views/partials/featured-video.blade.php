@php
$video = get_field('featured_video');
$video_desc = get_field('featured_video_desc');
@endphp

<div class="container wrapper-border d-flex flex-column align-items-center">
    <div class="embed-container">
        {!! $video !!}
    </div>
    <small class="text-center d-block"><em>{!! $video_desc !!}</em></small>
</div>
