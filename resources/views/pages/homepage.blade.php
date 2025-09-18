<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100" height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
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
        <a href="#A">A</a>
        <p>-</p>
        <a href="#B">B</a>
        <p>-</p>
        <a href="#C">C</a>
        <p>-</p>
        <a href="#D">D</a>
        <p>-</p>
        <a href="#E">E</a>
        <p>-</p>
        <a href="#F">F</a>
        <p>-</p>
        <a href="#G">G</a>
        <p>-</p>
        <a href="#H">H</a>
        <p>-</p>
        <a href="#I">I</a>
        <p>-</p>
        <a href="#J">J</a>
        <p>-</p>
        <a href="#K">K</a>
        <p>-</p>
        <a href="#L">L</a>
        <p>-</p>
        <a href="#M">M</a>
        <p>-</p>
        <a href="#N">N</a>
        <p>-</p>
        <a href="#O">O</a>
        <p>-</p>
        <a href="#P">P</a>
        <p>-</p>
        <a href="#Q">Q</a>
        <p>-</p>
        <a href="#R">R</a>
        <p>-</p>
        <a href="#S">S</a>
        <p>-</p>
        <a href="#T">T</a>
        <p>-</p>
        <a href="#U">U</a>
        <p>-</p>
        <a href="#V">V</a>
        <p>-</p>
        <a href="#W">W</a>
        <p>-</p>
        <a href="#X">X</a>
        <p>-</p>
        <a href="#Y">Y</a>
        <p>-</p>
        <a href="#Z">Z</a>
    </div>

     <h2>Top 10 meest bekeken handleidingen</h2>
     <p>{{ __(key: 'misc.homepage_description') }}</p>
    <ol>
        @foreach($topManuals as $manual)
            <li>
                ({{ $manual->brand->name }} )
                 <a href="{{ route('manual.redirect', ['manual' => $manual->id]) }}" target="_blank">
                    {{ $manual->name }}
                </a>
            </li>
        @endforeach
    </ol>
    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        <div class="row">
            @foreach($brands->chunk($chunk_size) as $chunk)
            <div class="col-md-4">

                <ul>
                    @foreach($chunk as $brand)

                    <?php
                    $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                    if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                        echo '</ul>
						<h2 id="' . $current_first_letter . '">' . $current_first_letter . '</h2>
						<ul>';
                    }
                    $header_first_letter = $current_first_letter
                    ?>

                    <li>
                        <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">{{ $brand->name }}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
            <?php unset($header_first_letter); ?>
            @endforeach
        </div>
    </div>

    

</x-layouts.app>