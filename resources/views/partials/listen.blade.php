@php
$albums_args = [
    'post_type' => 'album',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'year',
    'order' => 'DESC',
];

$query = new WP_Query($albums_args);
@endphp

<section class="container listen-wrapper py-3">
    <h3 class="mb-3">Listen</h3>

    {{-- desktop --}}
    @include('partials.carousel')

    {{-- mobile & tablet --}}
    @include('partials.album-collapse')

</section>
