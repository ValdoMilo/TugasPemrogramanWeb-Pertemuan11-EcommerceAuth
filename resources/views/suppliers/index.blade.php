@extends('layouts.app')

@section('title', 'Supplier')

@section('content')

    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
        <div>
            <h1 class="text-3xl font-bold tracking-tight mb-2">Daftar Supplier</h1>
            <p class="text-slate-400">Total {{ $suppliers->total() }} supplier terdaftar.</p>
        </div>
        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
            <a href="{{ route('suppliers.create') }}"
               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500 transition-colors">
                + Tambah Supplier
            </a>
        @endif
    </div>

    @if($suppliers->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($suppliers as $supplier)
                <article class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all duration-300">
                    {{-- Header --}}
                    <div class="flex items-start gap-4 mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-2xl shadow-lg flex-shrink-0">
                            🏭
                        </div>
                        <div class="min-w-0 flex-1">
                            <h3 class="font-semibold text-slate-100 truncate">{{ $supplier->name }}</h3>
                            <p class="text-xs text-slate-500">{{ $supplier->products_count }} produk</p>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="space-y-2 text-sm mb-4">
                        <div class="flex items-center gap-2">
                            <span class="text-slate-500 text-xs">📧</span>
                            <span class="text-slate-400 text-xs truncate">{{ $supplier->email }}</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-slate-500 text-xs">📱</span>
                            <span class="text-slate-400 text-xs">{{ $supplier->phone }}</span>
                        </div>
                        <div class="flex items-start gap-2">
                            <span class="text-slate-500 text-xs">📍</span>
                            <span class="text-slate-400 text-xs line-clamp-2">{{ $supplier->address }}</span>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="flex items-center justify-between pt-4 border-t border-slate-800">
                        <a href="{{ route('suppliers.show', $supplier) }}"
                           class="text-xs text-red-400 hover:text-red-300 font-medium">Detail →</a>
                        @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                            <div class="flex gap-2">
                                <a href="{{ route('suppliers.edit', $supplier) }}"
                                   class="text-xs text-slate-400 hover:text-slate-100">Edit</a>
                                <form method="POST" action="{{ route('suppliers.destroy', $supplier) }}"
                                      onsubmit="return confirm('Hapus supplier ini?')" class="inline">
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

        <div class="mt-8">{{ $suppliers->links() }}</div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-5xl mb-4 opacity-40">📭</p>
            <h3 class="text-lg font-semibold mb-2">Belum ada supplier</h3>
            @if(auth()->user()->isAdmin() || auth()->user()->isEditor())
                <a href="{{ route('suppliers.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500 mt-4">
                    + Tambah Supplier
                </a>
            @endif
        </div>
    @endif

@endsection