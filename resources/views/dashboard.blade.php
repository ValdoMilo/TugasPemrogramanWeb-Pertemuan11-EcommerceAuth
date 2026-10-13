@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight mb-2">
            Dashboard
        </h1>
        <p class="text-slate-400">
            Selamat datang, <span class="font-semibold text-white">{{ auth()->user()->name }}</span>
            <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-md text-xs font-semibold
                @if(auth()->user()->isAdmin()) bg-red-500/20 text-red-300 border border-red-500/40
                @elseif(auth()->user()->isEditor()) bg-blue-500/20 text-blue-300 border border-blue-500/40
                @else bg-slate-500/20 text-slate-300 border border-slate-500/40 @endif">
                {{ ucfirst(auth()->user()->role) }}
            </span>
        </p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
        <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-slate-400">Total Produk</span>
                <span class="text-2xl">📦</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ \App\Models\Product::count() }}</p>
            <p class="text-xs text-slate-500 mt-1">Produk di katalog</p>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-slate-400">Kategori</span>
                <span class="text-2xl">📂</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ \App\Models\Category::count() }}</p>
            <p class="text-xs text-slate-500 mt-1">Kategori produk</p>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-slate-400">Supplier</span>
                <span class="text-2xl">🏭</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ \App\Models\Supplier::count() }}</p>
            <p class="text-xs text-slate-500 mt-1">Supplier terdaftar</p>
        </div>

        <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800">
            <div class="flex items-center justify-between mb-3">
                <span class="text-sm text-slate-400">Total Order</span>
                <span class="text-2xl">🛒</span>
            </div>
            <p class="text-3xl font-bold text-white">{{ \App\Models\Order::count() }}</p>
            <p class="text-xs text-slate-500 mt-1">Order tercatat</p>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

        <div class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800">
            <h2 class="text-lg font-semibold mb-4">📦 Katalog Produk</h2>
            <p class="text-sm text-slate-400 mb-4">Kelola produk, harga, dan stok barang.</p>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-red-600 text-white text-sm font-medium hover:bg-red-500 transition-colors">
                Lihat Produk →
            </a>
        </div>

        <div class="p-6 rounded-2xl bg-slate-900/50 border border-slate-800">
            <h2 class="text-lg font-semibold mb-4">🛒 Order Pelanggan</h2>
            <p class="text-sm text-slate-400 mb-4">Lihat semua order dan status pembayaran.</p>
            <a href="{{ route('orders.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-slate-800 border border-slate-700 text-white text-sm font-medium hover:bg-slate-700 transition-colors">
                Lihat Order →
            </a>
        </div>
    </div>

   {{-- Info Tambahan --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <a href="{{ route('products.index') }}"
       class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all group">
        <div class="text-3xl mb-3">📦</div>
        <h3 class="font-semibold text-slate-100 mb-1">Produk</h3>
        <p class="text-xs text-slate-400">Kelola katalog produk</p>
    </a>

    <a href="{{ route('categories.index') }}"
       class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all group">
        <div class="text-3xl mb-3">📂</div>
        <h3 class="font-semibold text-slate-100 mb-1">Kategori</h3>
        <p class="text-xs text-slate-400">Kelola kategori produk</p>
    </a>

    <a href="{{ route('orders.index') }}"
       class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800 hover:border-slate-700 hover:-translate-y-1 transition-all group">
        <div class="text-3xl mb-3">🛒</div>
        <h3 class="font-semibold text-slate-100 mb-1">Order</h3>
        <p class="text-xs text-slate-400">Lihat semua order</p>
    </a>
</div>

@endsection