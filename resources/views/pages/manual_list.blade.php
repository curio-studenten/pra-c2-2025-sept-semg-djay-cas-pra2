<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li>
            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/"
                title="Manuals for '{{ $brand->name }}'">
                {{ $brand->name }}
            </a>
        </li>
    </x-slot:breadcrumb>

    <h2>Top 5 meest bekeken handleidingen</h2>
    <ol>
        @foreach($top5Manuals as $manual)
        <li>
            <a href="{{ route('manual.redirect', ['manual' => $manual->id]) }}" target="_blank">
                {{ $manual->name }}
            </a>
        </li>
        @endforeach
    </ol>

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>
    <div class="manual-container">
        @foreach ($manuals as $manual)
        <div class="manual-item">
            <a href="{{ route('manual.redirect', ['manual' => $manual->id]) }}" target="_blank" title="{{ $manual->name }}">
                {{ $manual->name }}
            </a>
            <a href="">
                Kopieer
            </a>

        </div>
        @endforeach
    </div>
</x-layouts.app>