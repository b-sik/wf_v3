@php
$page = get_page_by_title('about');
$content = apply_filters('the_content', $page->post_content);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
$caption = wp_get_attachment_caption(get_post_thumbnail_id($page->ID));

$photo_1 = get_field('photo_1', $page->ID);
$photo_2 = get_field('photo_2', $page->ID);
@endphp

<section id="about" class="container about-wrapper">
    <h3>About</h3>

    <div class="row justify-content-center">
        <div class="col-md-6 d-flex flex-column align-items-center justify-content-center ">
            <div class="card m-4">
                <img class="card-img" src="{{ $image[0] }}" alt="...">
                <div class="card-body">
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
                    <img class="card-img" src="{!! $photo_1 !!}" alt="Card image cap">
                </div>
                <div class="card about bg-dark">
                    <img class="card-img" src="{!! $photo_2 !!}" alt="Card image cap">
                </div>
            </div>
        </div>
    </div>
</section>
