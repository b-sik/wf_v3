@php
$page = get_page_by_title('about');
$content = apply_filters('the_content', $page->post_content);

$image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
$caption = wp_get_attachment_caption(get_post_thumbnail_id($page->ID));
$alt = get_post_meta(get_post_thumbnail_id($page->ID), '_wp_attachment_image_alt', true);

$photos = get_field('photos', $page->ID);
$photo_1 = $photos['photo_1'];
$photo_2 = $photos['photo_2'];
@endphp

<section id="about" class="container about-wrapper">
    <h3>{{ __('About', 'westferry') }}</h3>

    <div class="row justify-content-center">
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center ">
            <div class="card m-4">
                <img class="card-img" src="{{ $image[0] }}" alt="{{ $alt }}"">
                <div class=" card-body">
                <p class="card-text text-center"><small class="text muted">{{ $caption }}</small>
                </p>
            </div>
        </div>
    </div>

    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center ">
        <div class="card about mb-4 border border-dark">
            <div class="card-body text-center bg-dark text-light">
                <p class="card-text">{!! $content !!}</p>
            </div>
        </div>
        <div class="card-deck">
            <div class="card about bg-dark">
                <img class="card-img" src="{!! $photo_1['url'] !!}" alt="{{ $photo_1['alt'] }}">
            </div>
            <div class="card about bg-dark">
                <img class="card-img" src="{!! $photo_2['url'] !!}" alt="{{ $photo_2['alt'] }}">
            </div>
        </div>
    </div>
    </div>
</section>
