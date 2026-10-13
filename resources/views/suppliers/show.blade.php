@extends('layouts.app')

@section('title', $supplier->name)

@section('content')
    <div class="mb-8">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('suppliers.index') }}" class="hover:text-slate-300">Supplier</a>
            <span>/</span>
            <span class="text-slate-300">{{ $supplier->name }}</span>
        </nav>

        <div class="flex items-center gap-5 mb-6">
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center justify-center text-4xl shadow-lg">
                🏭
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-1">{{ $supplier->name }}</h1>
                <p class="text-slate-400 text-sm">{{ $supplier->products_count ?? $supplier->products->count() }} produk terdaftar</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Email</p>
                <p class="text-sm text-slate-200 break-all">{{ $supplier->email }}</p>
            </div>
            <div class="p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Telepon</p>
                <p class="text-sm text-slate-200">{{ $supplier->phone }}</p>
            </div>
            <div class="p-4 rounded-xl bg-slate-900/50 border border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Alamat</p>
                <p class="text-sm text-slate-200">{{ $supplier->address }}</p>
            </div>
        </div>
    </div>

    <h2 class="text-xl font-semibold mb-4">Produk dari Supplier Ini</h2>

    @if($supplier->products->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($supplier->products as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all">
                    <h3 class="font-semibold text-slate-100 mb-2 line-clamp-2">{{ $product->name }}</h3>
                    <p class="text-xs text-slate-500 mb-2">{{ $product->category->name ?? '-' }}</p>
                    <p class="text-lg font-bold text-red-400">{{ $product->formatted_price }}</p>
                </a>
            @endforeach
        </div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-4xl mb-3 opacity-40">📦</p>
            <p class="text-slate-400">Belum ada produk dari supplier ini.</p>
        </div>
    @endif
@endsection