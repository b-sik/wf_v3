<div class="row justify-content-center d-lg-none">
    <div class="container">
        <h3>Listen</h3>
    </div>
    
    <div class="col-12 col-md-9">
        <div class="card-deck flex-column">
            @while ($query->have_posts())
                @php $query->the_post() @endphp
                @php
                    $current_post = $query->current_post;
                    $total_posts = $query->found_posts;
                @endphp
                @if ($current_post < 2)
                    @include('partials.components.album-card')
                @endif
            @endwhile
        </div>

        <div class="w-100 d-flex justify-content-center">
            <button class="btn btn-primary my-3 text-uppercase" type="button" data-toggle="collapse" data-target="#collapseAlbums"
                aria-expanded="false" aria-controls="collapseAlbums">
                Show all
            </button>
        </div>

        <div id="collapseAlbums" class="card-deck flex-column collapse mt-3">
            @while ($query->have_posts())
                @php $query->the_post() @endphp
                @php
                    $current_post = $query->current_post;
                    $total_posts = $query->found_posts;
                @endphp
                @if ($current_post >= 2)
                    @include('partials.components.album-card')
                @endif
            @endwhile
        </div>
    </div>
</div>