{{-- echo $var ."<br/>"; --}}

{{-- {{ $var }} <br/> --}}

<h1>ALL LISTING</h1>

@unless (count($listings) == 0)
    @foreach ($listings as $listing)
    <h1>
        {{ $listing['id'] }}
    </h1>
    <h2>
        <a href="/listings/{{ $listing['id'] }}">
            {{ $listing['title'] }}
        </a>
    </h2>
    <p>
        {{ $listing['description'] }}
    </p>
    @endforeach
@else
    <h4>No listings found.</h4>
@endunless

