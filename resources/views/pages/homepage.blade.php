<x-layouts.app>

    <x-slot:introduction_text>
        <p>
            <img src="img/afbl_logo.png" align="right" width="100" height="100">
            {{ __('introduction_texts.homepage_line_1') }}
        </p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="teamname">
        <strong>{{ $teamname }}</strong>
    </div>

    <div class="Ga-naar-letter">
        <h3>Ga naar letter:</h3>
    </div>

    <div class="alphabet">
        @foreach(range('A','Z') as $char)
            <a href="/letter/{{ $char }}">{{ $char }}</a>
            @if(!$loop->last)
                <span>-</span>
            @endif
        @endforeach
    </div>

    <h2>Top 10 meest bekeken handleidingen</h2>
    <p>{{ __(key: 'misc.homepage_description') }}</p>

    <ol>
        @foreach($topManuals as $manual)
            <li>
                ({{ $manual->brand->name }})
                <a href="{{ route('manual.redirect', ['manual' => $manual->id]) }}" target="_blank">
                    {{ $manual->name }}
                </a>
            </li>
        @endforeach
    </ol>

</x-layouts.app>
