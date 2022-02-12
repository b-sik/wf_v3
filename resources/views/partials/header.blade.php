@php
$home_id = 5;

$menu_args = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav ml-auto',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];

$band_name = get_field('band_name', $home_id);
$featured_img_url = get_the_post_thumbnail_url($home_id);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="#" class="h1">{{ $band_name }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {!! wp_nav_menu($menu_args) !!}
    </div>
</nav>
<header class="container-fluid vh-50 mb-5"
    style="background-image:url({{ $featured_img_url }});background-position:center;background-size:cover;">
</header>
