@extends('layouts.app')

@section('title', 'Order')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight mb-2">Daftar Order</h1>
        <p class="text-slate-400">Total {{ $orders->total() }} order tercatat.</p>
    </div>

    @if($orders->count())
        <div class="rounded-2xl bg-slate-900/50 border border-slate-800 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-800/50 border-b border-slate-700">
                        <tr>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">No. Order</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Customer</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Tanggal</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Total</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Status</th>
                            <th class="text-left px-5 py-3 font-semibold text-slate-300 whitespace-nowrap">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                                <td class="px-5 py-3 font-mono text-xs text-red-400 whitespace-nowrap">{{ $order->order_number }}</td>
                                <td class="px-5 py-3 text-slate-200">{{ $order->customer->name ?? '-' }}</td>
                                <td class="px-5 py-3 text-slate-400 text-xs whitespace-nowrap">{{ $order->ordered_at->format('d M Y') }}</td>
                                <td class="px-5 py-3 font-semibold text-slate-100 whitespace-nowrap">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td class="px-5 py-3">
                                    <span class="inline-flex px-2.5 py-1 rounded-md text-xs font-semibold border
                                        @if($order->status === 'completed') bg-emerald-500/10 text-emerald-400 border-emerald-500/30
                                        @elseif($order->status === 'paid') bg-blue-500/10 text-blue-400 border-blue-500/30
                                        @elseif($order->status === 'cancelled') bg-red-500/10 text-red-400 border-red-500/30
                                        @else bg-yellow-500/10 text-yellow-400 border-yellow-500/30 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-3">
                                    <a href="{{ route('orders.show', $order) }}"
                                       class="text-xs text-red-400 hover:text-red-300 font-medium">Detail →</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-6">{{ $orders->links() }}</div>
    @else
        <div class="p-12 rounded-2xl bg-slate-900/50 border border-slate-800 text-center">
            <p class="text-5xl mb-4 opacity-40">🛒</p>
            <h3 class="text-lg font-semibold mb-2">Belum ada order</h3>
        </div>
    @endif

@endsection