@php
$home = get_page_by_title('home');

$menu_args_desktop = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'd-flex justify-content-center',
    'container_id' => '',
    'menu_class' => 'navbar-nav',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];

$menu_args_mobile = [
    'theme_location' => 'primary_navigation',
    'depth' => 1,
    'container' => 'div',
    'container_class' => 'collapse navbar-collapse d-lg-none',
    'container_id' => 'navbarSupportedContent',
    'menu_class' => 'navbar-nav d-flex justify-content-center align-items-center',
    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
    'walker' => new WP_Bootstrap_Navwalker(),
];

$band_name = get_field('band_name', $home->ID);
$featured_img_url = get_the_post_thumbnail_url($home->ID);
$streaming_services = get_field('streaming_services', $home->ID);
$socials = get_field('social_media', $home->ID);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid justify-content-center">
        <div class="row w-100">
            <div class="col-9 col-lg-4 d-flex align-items-center">
                <a href="#" class="h1 brand">{{ $band_name }}</a>
            </div>
            <div class="col-4 d-none d-lg-flex align-items-center">
                {!! wp_nav_menu($menu_args_desktop) !!}
            </div>
            <div class="col-3 col-lg-4 d-lg-flex align-items-center">
                <div class="container d-none d-lg-flex justify-content-end">
                    <div class="row">
                        @include('partials.icon-group', ['icons' => $streaming_services, 'anchor_classes' => 'ml-2'])
                        @include('partials.icon-group', ['icons' => $socials, 'anchor_classes' => 'ml-2'])
                    </div>
                </div>
                <div class="container h-100 d-flex d-lg-none justify-content-end align-items-center">
                    <button class="navbar-toggle btn btn-primary" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon d-flex align-items-center justify-content-center">
                            <i class="fas fa-bars"></i>
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-12 mobile-menu d-lg-none">
                {!! wp_nav_menu($menu_args_mobile) !!}
            </div>
        </div>
    </div>
</nav>
<header class="container-fluid vh-60 mb-3"
    style="background-image:url({{ $featured_img_url }});background-position:center;background-size:cover;">
</header>
