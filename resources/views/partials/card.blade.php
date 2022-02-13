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

<div class="card mb-3 mx">
    <div class="card-img-top">
        <img class="img-fluid" src="{{ $artwork_url }}" alt="Card image cap">
    </div>

    <div class="card-body pb-0">
        <h5 class="card-title mb-0">{{ $title }}<small class="card-text text-muted mb-0">&nbsp;&#8212;&nbsp;{{ $description }}</small></h5>
        <p class="card-text mb-3"><small
                class="text-muted">{{ $year }}&nbsp;&#8212;&nbsp;{{ $label }}</small>
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
