<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')

<body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    @include('partials.sections.header')
    <div class="wrap container" role="document">
        <div class="content">
            <main class="main">
                @include('partials.sections.latest-post')
                @include('partials.sections.featured-video')
                @include('partials.sections.shows')
                @include('partials.sections.listen')
                @include('partials.sections.about')
                @include('partials.sections.contact')
            </main>
        </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.sections.footer')
    @php wp_footer() @endphp
</body>

</html>
