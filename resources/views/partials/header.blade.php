@php
$home_id = 5;

$menu_args = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse d-flex justify-content-center',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];

$band_name = get_field('band_name', $home_id);
$featured_img_url = get_the_post_thumbnail_url($home_id);
$streaming_services = get_field('streaming_services', $home_id);
$socials = get_field('social_media', $home_id);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid justify-content-center">
        <div class="row w-100">
            <div class="col-4 d-flex align-items-center">
                <a href="#" class="h1">{{ $band_name }}</a>
            </div>
            <div class="col-4 d-flex align-items-center">
                {!! wp_nav_menu($menu_args) !!}
            </div>
            <div class="col-4 d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-end">
                        @include('partials.icon-group', ['icons' => $streaming_services, 'anchor_classes' => 'ml-2'])
                        @include('partials.icon-group', ['icons' => $socials, 'anchor_classes' => 'ml-2'])
                    </div>
                </div>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<header class="container-fluid vh-60 mb-3"
    style="background-image:url({{ $featured_img_url }});background-position:center;background-size:cover;">
</header>
