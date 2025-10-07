<x-layouts.app>
    <div class="admin-container">
        <h1 class="admin-title">{{ __('misc.AdminPage') }}</h1>

        <h1>Admin pagina</h1>

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="brand_id" class="form-label">Select Brand:</label>
                <select name="brand_id" id="brand_id" required class="form-input">
                    <option value="">-- Kies een merk --</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_name" class="form-label">Voer type in</label>
                <input type="text" name="type_name" id="type_name" placeholder="Type toevoegen..." required class="form-input">
            </div>

            <div class="form-group">
                <label for="link_name" class="form-label">Link:</label>
                <input type="url" name="link_name" id="link_name" placeholder="{{ __('misc.AddLink') }}" required
                    class="form-input">
                @error('link_name')
                <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
            @endif

            <button type="submit" class="btn-submit">{{ __('misc.Add') }}</button>
        </form>
    </div>
    <div class="delete">
        <h1>Verwijder een handleiding:</h1>
    </div>
    <div class="manual-container-admin">
        @foreach ($manuals as $manual)
        <div class="manual-item-admin">
            <a href="{{ route('manual.redirect', ['manual' => $manual->id]) }}" target="_blank"
                title="{{ $manual->name }}">
                {{ $manual->name }}
            </a>
            <form action="{{ route('admin.destroy', $manual->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="delete">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                            width="20"
                            height="20"
                            style="color: wite;">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
</x-layouts.app>