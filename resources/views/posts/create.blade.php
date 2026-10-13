@extends('layouts.app')

@section('title', 'Tulis Artikel')

@section('content')

    <div class="max-w-2xl mx-auto">

        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('posts.index') }}" class="hover:text-slate-300 transition-colors">Artikel</a>
            <span>/</span>
            <span class="text-slate-300">Tulis Artikel</span>
        </nav>

        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2">Tulis Artikel Baru</h1>
            <p class="text-slate-400">Bagikan ide dan pengetahuan Anda.</p>
        </div>

        <form method="POST" action="{{ route('posts.store') }}"
              enctype="multipart/form-data"
              class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800 space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-slate-300 mb-1.5">
                    Judul Artikel <span class="text-red-400">*</span>
                </label>
                <input type="text" id="title" name="title" value="{{ old('title') }}"
                       placeholder="Contoh: Panduan Memulai Laravel untuk Pemula"
                       class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 @error('title') border-red-500 @enderror">
                @error('title')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="excerpt" class="block text-sm font-medium text-slate-300 mb-1.5">Ringkasan</label>
                <textarea id="excerpt" name="excerpt" rows="2"
                          placeholder="Ringkasan singkat artikel (opsional)"
                          class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 @error('excerpt') border-red-500 @enderror">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-slate-300 mb-1.5">
                    Isi Artikel <span class="text-red-400">*</span>
                </label>
                <textarea id="body" name="body" rows="12"
                          placeholder="Tulis isi artikel di sini..."
                          class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 @error('body') border-red-500 @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Kategori <span class="text-red-400">*</span>
                    </label>
                    <input type="text" id="category" name="category" value="{{ old('category', 'Umum') }}"
                           placeholder="Contoh: Teknologi"
                           class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 @error('category') border-red-500 @enderror">
                    @error('category')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Status <span class="text-red-400">*</span>
                    </label>
                    <select id="status" name="status"
                            class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500 @error('status') border-red-500 @enderror">
                        <option value="draft" @selected(old('status') === 'draft')>Draf</option>
                        <option value="published" @selected(old('status') === 'published')>Terbit</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-300 mb-1.5">Gambar Sampul (opsional)</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 file:mr-4 file:py-1.5 file:px-3 file:rounded-md file:border-0 file:bg-slate-800 file:text-slate-200 file:text-xs file:font-medium hover:file:bg-slate-700 @error('image') border-red-500 @enderror">
                <p class="mt-1.5 text-xs text-slate-500">Format JPG, PNG, atau WEBP. Maksimal 2 MB.</p>
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-3 pt-5 border-t border-slate-800">
                <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white font-medium text-sm hover:bg-red-500 transition-colors">
                    Simpan Artikel
                </button>
                <a href="{{ route('posts.index') }}"
                   class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg bg-slate-800 border border-slate-700 text-slate-100 font-medium text-sm hover:bg-slate-700 transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection