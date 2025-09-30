<x-layouts.app>
    <div class="admin-container">
        <h1 class="admin-title">{{ __('misc.AdminPage') }}</h1>

        <form action="{{ route('admin.store') }}" method="POST" class="admin-form">
            @csrf

            <div class="form-group">
                <label for="brand_id" class="form-label">{{ __('misc.SelectBrand') }}</label>
                <select name="brand_id" id="brand_id" required class="form-input">
                    <option value="">{{ __('misc.Brand') }}</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="type_name" class="form-label">Type:</label>
                <input type="text" name="type_name" id="type_name" placeholder="{{ __('misc.SelectType') }}" required
                    class="form-input">
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
</x-layouts.app>