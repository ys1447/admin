@extends('admin.layouts.app')

@section('content')
    <div class="h-screen">
        <h2 class="text-2xl font-semibold mb-6">Buat Kategori</h2>
        <div class="bg-white p-6 rounded-md shadow-md">
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block text-gray-600 font-medium">Judul Kategori</label>
                    <input type="text" id="category" name="category" oninput="generateSlug(this.value)"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        placeholder="Masukkan judul artikel" required>
                </div>
                <div class="mb-4">
                    <label for="slug" class="block text-gray-600 font-medium">Slug Kategori</label>
                    <input type="text" id="slug" name="slug"
                        class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                        placeholder="Masukkan slug artikel" required>
                </div>

                <div class="flex justify-between">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Buat
                        Kategori</button>
                    <a href="{{ route('create') }}"
                        class="py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back
                        To Create < </a>
                </div>
            </form>
        </div>
    </div>
    <script>
        function generateSlug(title) {
            const slugInput = document.getElementById('slug');
            // Mengganti spasi dengan tanda hubung (dash) dan mengubah huruf menjadi huruf kecil
            const slug = title.trim().toLowerCase().replace(/\s+/g, '-');
            slugInput.value = slug;
        }
    </script>
@endsection
