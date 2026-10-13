@extends('layouts.app')

@section('title', 'Edit: ' . $post->title)

@section('content')

    <div class="max-w-2xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6 flex-wrap">
            <a href="{{ route('posts.index') }}" class="hover:text-slate-300 transition-colors">Artikel</a>
            <span>/</span>
            <a href="{{ route('posts.show', $post) }}" 
               class="hover:text-slate-300 transition-colors truncate max-w-[180px]">
                {{ $post->title }}
            </a>
            <span>/</span>
            <span class="text-slate-300">Edit</span>
        </nav>

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-2xl sm:text-3xl font-bold mb-2">Edit Artikel</h1>
            <p class="text-slate-400">Perbarui konten artikel Anda.</p>
        </div>

        {{-- Form --}}
        <form method="POST" 
              action="{{ route('posts.update', $post) }}" 
              enctype="multipart/form-data" 
              class="card space-y-5">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="title" class="form-label">
                    Judul Artikel <span class="text-red-400">*</span>
                </label>
                <input type="text" 
                       id="title" 
                       name="title" 
                       value="{{ old('title', $post->title) }}"
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
                          class="form-input @error('excerpt') is-invalid @enderror">{{ old('excerpt', $post->excerpt) }}</textarea>
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
                          class="form-input @error('body') is-invalid @enderror">{{ old('body', $post->body) }}</textarea>
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
                           value="{{ old('category', $post->category) }}"
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
                        <option value="draft" @selected(old('status', $post->status) === 'draft')>Draf</option>
                        <option value="published" @selected(old('status', $post->status) === 'published')>Terbit</option>
                    </select>
                    @error('status')
                        <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Gambar Saat Ini --}}
            @if ($post->image_url)
                <div>
                    <label class="form-label">Gambar Saat Ini</label>
                    <img src="{{ $post->image_url }}" 
                         alt="{{ $post->title }}"
                         class="w-full h-48 object-cover rounded-lg border border-slate-800">
                </div>
            @endif

            {{-- Ganti Gambar --}}
            <div>
                <label for="image" class="form-label">Ganti Gambar</label>
                <input type="file" 
                       id="image" 
                       name="image" 
                       accept="image/*"
                       class="form-input @error('image') is-invalid @enderror
                              file:mr-4 file:py-1.5 file:px-3 file:rounded-md 
                              file:border-0 file:bg-slate-800 file:text-slate-200 
                              file:text-xs file:font-medium hover:file:bg-slate-700">
                <p class="mt-1.5 text-xs text-slate-500">Biarkan kosong jika tidak ingin mengganti.</p>
                @error('image')
                    <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap items-center gap-3 pt-5 border-t border-slate-800">
                <button type="submit" class="btn-primary">
                    Simpan Perubahan
                </button>
                <a href="{{ route('posts.show', $post) }}" class="btn-secondary">
                    Batal
                </a>

                <form method="POST" 
                      action="{{ route('posts.destroy', $post) }}"
                      class="sm:ml-auto"
                      onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-danger">
                        Hapus
                    </button>
                </form>
            </div>
        </form>
    </div>

@endsection