@php
$home_id = 5;

$socials = get_field('social_media', $home_id);
@endphp

<section id="contact" class="container contact-wrapper py-3">
    <h3 class="pb-3 text-center">Contact</h3>

    <div class="row justify-content-center">
        <div class="col-12">
            <a class="h1 d-block text-center" href="mailto:westferrymusic@gmail.com">
                <span class="d-inline-block">westferrymusic</span><span class="d-inline-block">@gmail.com</span>
            </a>
        </div>
        <div class="col-2 d-flex justify-content-around my-3">
            @include('partials.icon-group', ['icons' => $socials, 'anchor_classes' => ''])
        </div>
    </div>
</section>
