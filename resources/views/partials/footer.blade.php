@php
$home = get_page_by_title('home');

$socials = get_field('social_media', $home->ID);
$streaming_services = get_field('streaming_services', $home->ID);
$footer_text = get_field('footer_text', $home->ID);
$icon_logo = get_site_icon_url();
@endphp

<footer class="container-fluid bg-info justify-content-center">
    <div class="row py-5 mx-auto">
        <div
            class="col-12 col-lg-5 d-flex flex-column align-items-center align-items-lg-start justify-content-center order-2 order-lg-0">
            <small class='d-block'>&copy;&nbsp;{{ date('Y') }}</small>
            <small class='d-block'>{!! $footer_text !!}</small>
        </div>
        <div class="col-12 col-lg-2 d-flex justify-content-center align-items center">
            <img src="{!! $icon_logo !!}" class="img-fluid w-50 mb-3 mb-lg-0" style="max-width:100px;height:auto;">
        </div>
        <div class="col-12 col-lg-5 pb-3 pb-lg-0 d-flex justify-self-lg-end align-items-center">
            <div class="container d-flex justify-content-center justify-content-lg-end">
                <div class="row">
                    @include('partials.icon-group', ['icons' => $streaming_services, 'anchor_classes' => 'ml-2'])
                    @include('partials.icon-group', ['icons' => $socials, 'anchor_classes' => 'ml-2'])
                </div>
            </div>
        </div>
    </div>
</footer>
