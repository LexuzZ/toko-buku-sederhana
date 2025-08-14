@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6">Beri Rating Buku</h2>
    <p class="text-gray-600 mb-6">Setiap masukan Anda sangat berharga untuk membantu pelanggan lain menemukan buku terbaik.</p>

    <form action="{{ route('ratings.store') }}" method="POST">
        @csrf
        <div class="space-y-6">
            <!-- Author Dropdown -->
            <div>
                <label for="author_id" class="block text-sm font-medium text-gray-700">Pilih Penulis</label>
                <select name="author_id" id="author_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="" disabled selected>-- Silakan pilih penulis --</option>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Book Dropdown (Dynamic) -->
            <div>
                <label for="book_id" class="block text-sm font-medium text-gray-700">Pilih Buku</label>
                <select name="book_id" id="book_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md" disabled>
                    <option value="">-- Pilih penulis terlebih dahulu --</option>
                </select>
            </div>

            <!-- Rating Dropdown -->
            <div>
                <label for="rating" class="block text-sm font-medium text-gray-700">Rating Anda</label>
                <select name="rating" id="rating" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                    <option value="" disabled selected>-- Beri nilai 1 sampai 10 --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                Kirim Rating
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const authorSelect = document.getElementById('author_id');
    const bookSelect = document.getElementById('book_id');
    const oldBookId = '{{ old('book_id') }}'; // Ambil book_id lama jika ada error validasi

    authorSelect.addEventListener('change', function () {
        const authorId = this.value;
        bookSelect.disabled = true;
        bookSelect.innerHTML = '<option value="">Memuat buku...</option>';

        if (!authorId) {
            bookSelect.innerHTML = '<option value="">-- Pilih penulis terlebih dahulu --</option>';
            return;
        }

        // Fetch books for the selected author
        fetch(`/api/authors/${authorId}/books`)
            .then(response => response.json())
            .then(data => {
                bookSelect.innerHTML = '<option value="" disabled selected>-- Pilih buku --</option>';
                data.forEach(book => {
                    const option = document.createElement('option');
                    option.value = book.id;
                    option.textContent = book.title;
                    bookSelect.appendChild(option);
                });
                bookSelect.disabled = false;
            })
            .catch(error => {
                console.error('Error fetching books:', error);
                bookSelect.innerHTML = '<option value="">Gagal memuat buku</option>';
            });
    });


    if (authorSelect.value) {
        authorSelect.dispatchEvent(new Event('change'));
        setTimeout(() => {
            if(oldBookId) {
                 bookSelect.value = oldBookId;
            }
        }, 500);
    }
});
</script>
@endsection
