@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-2xl mx-auto">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('categories.index') }}" class="hover:text-slate-300">Kategori</a>
            <span>/</span>
            <span class="text-slate-300">Tambah</span>
        </nav>

        <h1 class="text-3xl font-bold mb-8">Tambah Kategori Baru</h1>

        <form method="POST" action="{{ route('categories.store') }}"
              class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Nama Kategori <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500">
                @error('name') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Deskripsi</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100 focus:outline-none focus:ring-2 focus:ring-red-500/50 focus:border-red-500">{{ old('description') }}</textarea>
            </div>

            <div class="flex gap-3 pt-5 border-t border-slate-800">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">Simpan</button>
                <a href="{{ route('categories.index') }}" class="px-5 py-2.5 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm font-medium hover:bg-slate-700">Batal</a>
            </div>
        </form>
    </div>
@endsection