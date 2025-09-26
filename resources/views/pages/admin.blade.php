<x-layouts.app>

    <h1>Admin pagina</h1>

    
        @csrf

        <!-- Select Brand -->
        <label for="brand_id">Select Brand:</label>
        <select name="brand_id" id="brand_id" required>
            <option value="">-- Kies een merk --</option>
            @foreach($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>

        <!-- Add Type -->
        <label for="link_name">Link:</lolabel>
        <input type="link" name="link_name" id="link_name" placeholder="Link toevoegen..." required>

        <button type="submit">Toevoegen</button>
    </form>

</x-layouts.app>
