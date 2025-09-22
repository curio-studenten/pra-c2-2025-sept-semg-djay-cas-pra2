<x-layouts.app>
    <x-slot:title>
        {{ __('misc.letter') }}{{ $letter }}
    </x-slot:title>

    <h1>{{ __('misc.letter') }} {{ $letter }}</h1>

    @if($brands->isEmpty())
        <p>{{ __('misc.error') }}</p>
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
    @if(!$loop->last)
        -
    @endif
@endforeach
</x-layouts.app>