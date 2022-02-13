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

<div class="container listen-wrapper py-3">
    <h3 class="pb-3">Listen</h3>

    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="card-deck">

                @while ($query->have_posts())
                    @php $query->the_post() @endphp
                    @php
                        $album = get_fields();
                        
                        $description = $album['description'];
                        $year = $album['year'];
                        $label = $album['label'];
                        $bandcamp = $album['bandcamp'];
                        $bandcamp_track_id = $album['bandcamp_track_id'];
                        $bandcamp_id_type = $album['bandcamp_id_type'];
                        
                        $title = get_the_title();
                        $artwork_url = get_the_post_thumbnail_url();
                    @endphp

                    <div class="card mb-3">
                        <img class="card-img-top" src="{{ $artwork_url }}" alt="Card image cap">
                        <div class="card-body pb-0">
                            <h5 class="card-title mb-0">{{ $title }}</h5>
                            <p class="card-text mb-3"><small
                                    class="text-muted">{{ $year }}&nbsp;&#8212;&nbsp;{{ $description }}&nbsp;&#8212;&nbsp;{{ $label }}</small>
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <iframe style="border: 0; width: 100%; height: 42px;"
                                        src="https://bandcamp.com/EmbeddedPlayer/{{ $bandcamp_id_type }}={{ $bandcamp_track_id }}/size=small/bgcol=ffffff/linkcol=0687f5/transparent=true/"
                                        seamless><a href="{{ $bandcamp }}">{{ $title }}</a></iframe>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endwhile
            </div>
        </div>
    </div>
</div>
