@php
$home_id = 5;

$band_name = get_field('band_name', $home_id);
$featured_img_url = get_the_post_thumbnail_url($home_id);
@endphp

<header class="container-fluid vh-50 vh-lg-100"
    style="background-image:url({!! $featured_img_url !!});background-position:center;background-size:cover;">
    <p>here is some content</p>
</header>
