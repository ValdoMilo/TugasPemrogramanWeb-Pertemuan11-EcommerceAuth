@extends('layouts.app')

@section('title', 'Order ' . $order->order_number)

@section('content')
    <div class="max-w-4xl mx-auto">
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('orders.index') }}" class="hover:text-slate-300">Order</a>
            <span>/</span>
            <span class="text-slate-300 font-mono">{{ $order->order_number }}</span>
        </nav>

        <div class="flex items-center justify-between flex-wrap gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold mb-2">Detail Order</h1>
                <p class="text-slate-400 font-mono text-sm">{{ $order->order_number }}</p>
            </div>
            <span class="inline-flex px-4 py-2 rounded-lg text-sm font-semibold border
                @if($order->status === 'completed') bg-emerald-500/10 text-emerald-400 border-emerald-500/30
                @elseif($order->status === 'paid') bg-blue-500/10 text-blue-400 border-blue-500/30
                @elseif($order->status === 'cancelled') bg-red-500/10 text-red-400 border-red-500/30
                @else bg-yellow-500/10 text-yellow-400 border-yellow-500/30 @endif">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <div class="p-5 rounded-xl bg-slate-900/50 border border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Customer</p>
                <p class="font-semibold text-slate-100">{{ $order->customer->name ?? '-' }}</p>
                <p class="text-sm text-slate-400">{{ $order->customer->email ?? '-' }}</p>
            </div>
            <div class="p-5 rounded-xl bg-slate-900/50 border border-slate-800">
                <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Tanggal Order</p>
                <p class="font-semibold text-slate-100">{{ $order->ordered_at->format('d F Y') }}</p>
                <p class="text-sm text-slate-400">{{ $order->ordered_at->format('H:i') }} WIB</p>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Item Pesanan ({{ $order->items->count() }})</h2>

        <div class="rounded-2xl bg-slate-900/50 border border-slate-800 overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-800/50 border-b border-slate-700">
                        <tr>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300">Produk</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Harga</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300">Qty</th>
                            <th class="text-right px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr class="border-b border-slate-800/50">
                                <td class="px-5 py-3 text-slate-200">{{ $item->product->name ?? 'Produk dihapus' }}</td>
                                <td class="px-5 py-3 text-slate-400 whitespace-nowrap">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-slate-400">{{ $item->quantity }}</td>
                                <td class="px-5 py-3 text-right font-semibold text-slate-100 whitespace-nowrap">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-slate-800/50 border-t border-slate-700">
                        <tr>
                            <td colspan="3" class="px-5 py-3 text-right font-semibold text-slate-300">Total</td>
                            <td class="px-5 py-3 text-right font-bold text-red-400 text-lg whitespace-nowrap">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="p-5 rounded-xl bg-slate-900/50 border border-slate-800">
            <p class="text-xs text-slate-500 uppercase tracking-wider mb-2">Alamat Pengiriman</p>
            <p class="text-sm text-slate-300">{{ $order->shipping_address }}</p>
        </div>
    </div>
@endsection