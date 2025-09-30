<x-layouts.app>
    <div class="admin-container">
        <h1 class="admin-title">{{ __('misc.AdminPage') }}</h1>

    <h1>Admin pagina</h1>




    <form action="{{ route('admin.store') }}" method="POST">
        @csrf


        <label for="brand_id">Select Brand:</label>
        <select name="brand_id" id="brand_id" required>
            <option value="">-- Kies een merk --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <label for="type_name">Voer type in</label>
        <input type="text" name="type_name" id="type_name" placeholder="Type toevoegen..." required>



        <label for="link_name">Link:</label>
        <input type="link" name="link_name" id="link_name" placeholder="Link toevoegen..." required>
        @error('link_name')
            <div class="error-admin">{{ $message }}</div>

        @enderror
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif





        <button type="submit">Toevoegen</button>


    </form>



    <div class="manual-container-admin">
        <h1>Verwijder een handleiding:</h1>

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
                        <button svg type="submit" style="width: 20px; height: 20px; color: #EB844E;" role="img"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Fireship</title>
                            <path fill="currentColor"
                                d="M9.245.05c-.042-.035-.14-.035-.22-.05-.041.06-.098.113-.113.166a3.114 3.114 0 0 0-.064.416 15.42 15.42 0 0 1-3.742 8.693c-1.258 1.474-2.51 2.982-3.44 4.585-2.293 3.972-.249 8.031 4.763 9.804.163.06.348.087.76.181-1.701-1.534-2.57-3.1-2.28-4.944.284-1.765 1.172-3.337 2.525-4.77a1.043 1.043 0 0 1 .099.549c-.068 1.572.453 2.96 2.063 4.055.741.507 1.41 1.081 2.079 1.644.684.57.884 1.263.688 2.015-.09.366-.227.725-.378 1.171 1.145-.11 2.203-.264 2.914-.9.68-.604 1.183-1.322 1.909-2.154.049.707.15 1.255.113 1.8-.045.566-.22 1.126-.336 1.689 3.477-.525 6.546-3.934 6.682-7.427.098-2.543-2.071-6.274-3.893-6.637l.302.688c.631 1.391.817 2.8.416 4.256-.4 1.448-2.426 3.073-4.214 3.277.06-.144.087-.28.17-.39 1.927-2.596 1.946-5.31.854-8.084C15.44 5.98 12.632 2.88 9.245.053Z" />
                            </svg>
                        </button>
                </form>
                    </div>
            </div>
        @endforeach
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