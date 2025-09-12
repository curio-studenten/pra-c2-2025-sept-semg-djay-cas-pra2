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

    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>
    <div class="manual-container">
        @foreach ($manuals as $manual)
            <div class="manual-item">
                @if ($manual->locally_available)
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/"
                        title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                @else
                    <a href="{{ $manual->url }}" target="_blank" title="{{ $manual->name }}">
                        {{ $manual->name }}
                    </a>
                @endif
            </div>
        @endforeach
    </div>
</x-layouts.app>