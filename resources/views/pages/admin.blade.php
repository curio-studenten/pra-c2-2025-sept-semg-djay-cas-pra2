<x-layouts.app>

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

</x-layouts.app>