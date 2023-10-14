@extends('admin.layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-6">Buat Artikel Baru</h2>
    <div class="bg-white p-6 rounded-md shadow-md mb-4">
        <form action="{{ route('create.store') }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="judul" class="block text-gray-600 font-medium">Judul Artikel</label>
                <input type="text" id="title" name="title" oninput="generateSlug(this.value)"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    placeholder="Masukkan judul artikel" required>
            </div>
            <div class="mb-4">
                <label for="slug" class="block text-gray-600 font-medium">Slug Artikel</label>
                <input type="text" id="slug" name="slug"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500"
                    placeholder="Masukkan slug artikel" required>
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-gray-600 font-medium">Tag | <span class="font-normal text-sm">(Pisahkan dengan koma)</span></label>
                <input name="name" id="name" placeholder="Tag1, Tag2, Tag3"
                    class="tag-input p-2 focus:outline-none focus:border-blue-500 border rounded-md">
            </div>

            <div class="mb-4">
                <label for="category" class="block text-gray-600 font-medium">Kategori</label>
                <select id="category" name="category_id"
                    class="w-full border rounded-md py-2 px-3 focus:outline-none focus:border-blue-500">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" class="rounded">{{ $category->category }}</option>
                    @endforeach
                </select>
            </div>
            <button class="mb-4"><a href="{{ route('category') }}"
                    class="py-1 px-2 bg-teal-500 text-white rounded-md hover:bg-teal-600 text-xs">Create New Category
                </a></button>

            <div class="mb-4">
                <label for="body" class="block text-gray-600 font-medium">Body</label>
                <textarea name="body" id="body" placeholder="Isi pesan Anda"
                    class="w-full p-2 focus:outline-none focus:border-blue-500 border rounded-md h-96"></textarea>
            </div>

            <!-- Tambahkan lebih banyak input sesuai kebutuhan -->


            <div class="flex justify-between">
                <button type="submit"
                    class="bg-purple-900 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:bg-purple-600">Buat
                    Artikel</button>
                <a href="{{ route('articles') }}" class="py-2 px-4 bg-gray-500 text-white rounded-md hover:bg-gray-600">Back
                    To Articles < </a>
            </div>
        </form>
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
