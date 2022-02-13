@php
$page = get_page_by_title('about');
$content = apply_filters('the_content', $page->post_content);
$image = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'single-post-thumbnail');
@endphp

<div class="container about-wrapper">
    <h3>About</h3>
    <div class="row">
        <div class="col-6"><img src="{{ $image[0] }}" alt="" class="img-fluid"></div>
        <div class="col-6">{!! $content !!}</div>
    </div>

</div>
