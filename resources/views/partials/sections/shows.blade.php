@php
$today = date('Ymd');
$shows_args = [
    'post_type' => 'show',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'meta_query' => [
        [
            'key' => 'show_date',
            'compare' => '>=',
            'value' => $today,
        ],
    ],
    'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
];

$contact = get_page_by_title('contact');
$email = get_field('email', $contact->ID);

$query = new WP_Query($shows_args);
@endphp

<section id="shows" class="container shows-wrapper">
    <h3>{{ __('Shows', 'westferry') }}</h3>

    @if (!$query->have_posts())
        <div class="container show-wrapper wrapper-border-show text-center">
            <p class="my-3">No shows currently booked! Reach out to us at <a
                    href='mailto:{{ $email }}'>{{ $email }}</a>.</p>
        </div>
    @endif

    @while ($query->have_posts())
        @php $query->the_post() @endphp
        @php
            $fields = get_fields();
            
            $city = $fields['city'];
            $venue = $fields['venue'];
            $date = date('m.d.y', strtotime($fields['date']));
            $support = $fields['support'];
            $url = $fields['url'];
        @endphp

        <div class="container show-wrapper wrapper-border-show">
            <div class="row flex-column flex-sm-row">

                {{-- desktop --}}
                <div class="col-4 d-none d-lg-flex flex-column justify-content-center">
                    <span class="date_time pb-1">{{ $date }}</span>
                    <span class="city pt-1">{{ $city }}</span>
                </div>
                <div class="col-6 pl-lg-5 d-none d-lg-flex flex-column justify-content-center">
                    <span class="venue pb-1">{{ $venue }}</span>
                    <span class="support pt-1">w/&nbsp;{{ $support }}</span>
                </div>

                {{-- mobile --}}
                <div
                    class="col-12 col-sm-8 d-flex d-lg-none flex-column align-items-center align-items-sm-start justify-content-center">
                    <span class="date_time text-center text-sm-left">{{ $date }}</span>
                    <span class="city text-center text-sm-left">{{ $city }}</span>
                    <span class="venue text-center text-sm-left">{{ $venue }}</span>
                    <span class="support text-center text-sm-left">w/&nbsp;{{ $support }}</span>
                </div>

                {{-- button --}}
                <div
                    class="col-12 col-sm-4 col-lg-2 d-flex py-3 py-sm-0 flex-column justify-content-center align-items-center align-items-sm-end">
                    <a class="event btn btn-primary text-uppercase" href='{{ $url }}' target="_blank"
                        rel='noopener noreferrer'>{{ __('Event', 'westferry') }}</a>
                </div>
            </div>
        </div>
    @endwhile
</section>
