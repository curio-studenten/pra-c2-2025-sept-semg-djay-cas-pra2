<x-layouts.app>
    <x-slot:title>
        Merken die beginnen met {{ $letter }}
    </x-slot:title>

    <h1>Merken die beginnen met {{ $letter }}</h1>

    @if($brands->isEmpty())
        <p>Geen merken gevonden voor deze letter.</p>
    @else
        <ul>
            @foreach($brands as $brand)
                <li>
                    <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <p>Bekijk ook andere letters:</p>
    @foreach(range('A','Z') as $char)
        <a href="/letter/{{ $char }}">{{ $char }}</a>
    @endforeach
</x-layouts.app>
