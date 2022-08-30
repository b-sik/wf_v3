<div class="carousel slide d-none d-lg-block" data-interval="false" id="postsCarousel">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>{{ __('Listen', 'westferry') }}</h3>
            </div>
            <div class="col-6 text-md-right lead d-flex justify-content-end align-items-center">
                <a class="btn btn-outline-primary prev" href="" title="go back"><i
                        class="fa-solid fa-arrow-left"></i></a>
                <a class="btn btn-outline-primary next mr-3" href="" title="more"><i
                        class="fa-solid fa-arrow-right"></i></a>
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
                            $current_post_index = $query->current_post;
                            $total_posts = $query->found_posts;
                        @endphp

                        @if ($current_post_index % 3 === 0)
                            <div class="card-deck carousel-item {{ $current_post_index === 0 ? 'active' : '' }}">
                        @endif

                        @include('partials.components.album-card')

                        @php
                            $card_count++;
                        @endphp

                        @if ($card_count === 3 || $current_post_index === $total_posts - 1)
                </div> <!-- .card-deck -->
                @php
                    $card_count = 0;
                @endphp
                @endif
                @endwhile
            </div> <!-- .carousel-inner -->
        </div> <!-- .col -->
</div> <!-- .row -->
</div> <!-- .container -->
</div> <!-- .carousel -->
