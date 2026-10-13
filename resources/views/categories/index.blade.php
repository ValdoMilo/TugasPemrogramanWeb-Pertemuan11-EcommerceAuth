@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-tight mb-2">Kategori Produk</h1>
            <p class="text-slate-400">Total {{ $categories->total() }} kategori terdaftar.</p>
        </div>
        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
            <a href="{{ route('categories.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500 transition-colors">
                + Tambah Kategori
            </a>
        @endif
    </div>

    @if($categories->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($categories as $category)
                @php
                    // Icon per kategori
                    $catIcons = [
                        'Elektronik' => '📱',
                        'Pakaian'    => '👕',
                        'Makanan'    => '🍚',
                        'Minuman'    => '🥤',
                        'Perabotan'  => '🪑',
                        'Olahraga'   => '⚽',
                        'Kecantikan' => '💄',
                        'Mainan'     => '🧸',
                        'Buku'       => '📚',
                        'Otomotif'   => '🏍️',
                    ];
                    $icon = $catIcons[$category->name] ?? '📦';

                    // Warna gradient per kategori
                    $catColors = [
                        'Elektronik' => 'from-blue-500 to-cyan-500',
                        'Pakaian'    => 'from-pink-500 to-rose-500',
                        'Makanan'    => 'from-orange-500 to-amber-500',
                        'Minuman'    => 'from-emerald-500 to-teal-500',
                        'Perabotan'  => 'from-amber-600 to-yellow-600',
                        'Olahraga'   => 'from-red-500 to-orange-500',
                        'Kecantikan' => 'from-fuchsia-500 to-pink-500',
                        'Mainan'     => 'from-purple-500 to-indigo-500',
                        'Buku'       => 'from-slate-500 to-slate-700',
                        'Otomotif'   => 'from-zinc-500 to-slate-700',
                    ];
                    $gradient = $catColors[$category->name] ?? 'from-slate-500 to-slate-700';
                @endphp

                <article class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                    <div class="flex items-center gap-4 mb-4">
                        {{-- Icon Gradient --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $gradient }} flex items-center justify-center text-3xl shadow-lg flex-shrink-0">
                            {{ $icon }}
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-100 truncate text-lg">{{ $category->name }}</h3>
                            <p class="text-xs text-slate-500">{{ $category->products_count }} produk</p>
                        </div>
                    </div>

                    <p class="text-sm text-slate-400 mb-4 line-clamp-2 min-h-[2.5rem]">
                        {{ $category->description ?: 'Tidak ada deskripsi' }}
                    </p>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-800">
                        <a href="{{ route('categories.show', $category) }}"
                           class="text-xs text-red-400 hover:text-red-300 font-medium">Detail →</a>
                        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                            <div class="flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}"
                                   class="text-xs text-slate-400 hover:text-slate-100">Edit</a>
                                <form method="POST" action="{{ route('categories.destroy', $category) }}"
                                      onsubmit="return confirm('Hapus kategori ini?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-400">Hapus</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-8">{{ $categories->links() }}</div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-5xl mb-4 opacity-40">📭</p>
            <h3 class="text-lg font-semibold mb-2">Belum ada kategori</h3>
            <p class="text-sm text-slate-400 mb-6">Tambahkan kategori pertama.</p>
            @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                <a href="{{ route('categories.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500">
                    + Tambah Kategori
                </a>
            @endif
        </div>
    @endif

@endsection