@extends('layouts.app')

@section('title', 'Tulis Artikel')

@section('content')

    <div class="max-w-2xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('posts.index') }}" class="hover:text-slate-300 transition-colors">Artikel</a>
            <span>/</span>
            <span class="text-slate-300">Tulis Artikel</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2">Tulis Artikel Baru</h1>
            <p class="text-slate-400">Bagikan ide dan pengetahuan Anda.</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('posts.store') }}" 
              enctype="multipart/form-data" 
              class="card space-y-5">
            @csrf

            {{-- Judul --}}
            <div>
                <label for="title" class="form-label">
                    Judul Artikel <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title') }}"
                       placeholder="Contoh: Panduan Memulai Laravel untuk Pemula"
                       class="form-input @error('title') is-invalid @enderror">
                @error('title')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Ringkasan --}}
            <div>
                <label for="excerpt" class="form-label">Ringkasan</label>
                <textarea id="excerpt" 
                          name="excerpt" 
                          rows="2"
                          placeholder="Ringkasan singkat artikel (opsional)"
                          class="form-input @error('excerpt') is-invalid @enderror">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi --}}
            <div>
                <label for="body" class="form-label">
                    Isi Artikel <span class="text-red-400">*</span>
                </label>
                <textarea id="body" 
                          name="body" 
                          rows="12"
                          placeholder="Tulis isi artikel di sini..."
                          class="form-input @error('body') is-invalid @enderror">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Kategori + Status --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="category" class="form-label">
                        Kategori <span class="text-red-400">*</span>
                    </label>
                    <input type="text" 
                           id="category" 
                           name="category" 
                           value="{{ old('category', 'Umum') }}"
                           placeholder="Contoh: Teknologi"
                           class="form-input @error('category') is-invalid @enderror">
                    @error('category')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="form-label">
                        Status <span class="text-red-400">*</span>
                    </label>
                    <select id="status" 
                            name="status" 
                            class="form-input @error('status') is-invalid @enderror">
                        <option value="draft" @selected(old('status') === 'draft')>Draf</option>
                        <option value="published" @selected(old('status') === 'published')>Terbit</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Gambar --}}
            <div>
                <label for="image" class="form-label">Gambar Sampul</label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="form-input @error('image') is-invalid @enderror
                              file:mr-4 file:py-1.5 file:px-3 file:rounded-md 
                              file:border-0 file:bg-slate-800 file:text-slate-200 
                              file:text-xs file:font-medium hover:file:bg-slate-700">
                <p class="mt-1.5 text-xs text-slate-500">Format JPG, PNG, atau WEBP. Maksimal 2 MB.</p>
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-5 border-t border-slate-800">
                <button type="submit" class="btn-primary">
                    Simpan Artikel
                </button>
                <a href="{{ route('posts.index') }}" class="btn-secondary">
                    Batal
                </a>
            </div>
        </form>
    </div>

@endsection