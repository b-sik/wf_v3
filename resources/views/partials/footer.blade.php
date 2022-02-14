@php
$home_id = 5;

$socials = get_field('social_media', $home_id);
$streaming_services = get_field('streaming_services', $home_id);
@endphp

<footer class="container-fluid bg-dark mt-3">
    <div class="row w-100 py-5">
      <div class="col-6"></div>
        <div class="col-6 justify-self-end">
            <div class="container d-flex justify-content-end">
                <div class="row">
                    @include('partials.icon-group', ['icons' => $streaming_services, 'anchor_classes' => 'ml-2'])
                    @include('partials.icon-group', ['icons' => $socials, 'anchor_classes' => 'ml-2'])
                </div>
            </div>

        </div>
    </div>
</footer>
