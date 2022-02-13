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
    <h3>Listen</h3>

    <div class="carousel slide" data-interval="false" id="postsCarousel">
        <div class="container">
            <div class="row">
                <div class="col-12 text-md-right lead">
                    <a class="btn btn-outline-secondary prev" href="" title="go back"><i
                            class="fa fa-lg fa-chevron-left"></i>back</a>
                    <a class="btn btn-outline-secondary next" href="" title="more"><i
                            class="fa fa-lg fa-chevron-right"></i>fowards</a>
                </div>
            </div>
        </div>

        <div class="container mt-3">
            <div class="row mt-0">
                <div class="col-12">
                    <div class="carousel-inner">
                        @php
                            $card_count = 0;
                        @endphp

                        @while ($query->have_posts())
                            @php $query->the_post() @endphp

                            @php
                                $current_post = $query->current_post;
                                $total_posts = $query->found_posts;
                            @endphp

                            @if ($current_post % 3 === 0)
                                <div class="card-deck carousel-item {{ $current_post === 0 ? 'active' : '' }} ">
                            @endif

                            @include('partials.card')

                            @php
                                $card_count++;
                            @endphp

                            @if ($card_count === 3 || $current_post === $total_posts)
                    </div> <!-- .card-deck -->
                    @php
                        $card_count = 0;
                    @endphp
                    @endif

                    @endwhile
                </div>
            </div>
        </div>
    </div>
    </div>
</section>