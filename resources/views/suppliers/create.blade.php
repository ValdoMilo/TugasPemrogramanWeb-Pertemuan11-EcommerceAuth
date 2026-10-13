@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
    <div class="max-w-2xl mx-auto">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('suppliers.index') }}" class="hover:text-slate-300">Supplier</a>
            <span>/</span>
            <span class="text-slate-300">Tambah</span>
        </nav>

        <h1 class="text-3xl font-bold mb-8">Tambah Supplier Baru</h1>

        <form method="POST" action="{{ route('suppliers.store') }}"
              class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800 space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Nama Supplier <span class="text-red-400">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100">
                @error('name') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Email <span class="text-red-400">*</span></label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100">
                    @error('email') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Telepon <span class="text-red-400">*</span></label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                           class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100">
                    @error('phone') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Alamat <span class="text-red-400">*</span></label>
                <textarea name="address" rows="3"
                          class="w-full px-4 py-2.5 rounded-lg bg-slate-900 border border-slate-700 text-slate-100">{{ old('address') }}</textarea>
                @error('address') <p class="mt-1.5 text-xs text-red-400">{{ $message }}</p> @enderror
            </div>

            <div class="flex gap-3 pt-5 border-t border-slate-800">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">Simpan</button>
                <a href="{{ route('suppliers.index') }}" class="px-5 py-2.5 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm font-medium hover:bg-slate-700">Batal</a>
            </div>
        </form>
    </div>
@endsection