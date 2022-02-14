@php
$page = get_page_by_title('about');
$content = apply_filters('the_content', $page->post_content);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
$caption = wp_get_attachment_caption(get_post_thumbnail_id($page->ID));
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

        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="card-body text-center">
                <p class="card-text">{!! $content !!}</p>
            </div>
        </div>
    </div>
</section>
