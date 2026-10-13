@extends('layouts.app')

@section('title', 'Kelola User')

@section('content')

    <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-tight mb-2">Kelola User</h1>
        <p class="text-slate-400">Halaman ini hanya bisa diakses oleh Admin.</p>
    </div>

    <div class="rounded-2xl bg-slate-900/50 border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-800/50 border-b border-slate-700">
                    <tr>
                        <th class="text-left px-5 py-3 font-semibold text-slate-300">No</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-300">Nama</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-300">Email</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-300">Role</th>
                        <th class="text-left px-5 py-3 font-semibold text-slate-300">Terdaftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $i => $user)
                        <tr class="border-b border-slate-800/50 hover:bg-slate-800/30 transition-colors">
                            <td class="px-5 py-3 text-slate-500">{{ $users->firstItem() + $i }}</td>
                            <td class="px-5 py-3 font-medium text-slate-100">{{ $user->name }}</td>
                            <td class="px-5 py-3 text-slate-400">{{ $user->email }}</td>
                            <td class="px-5 py-3">
                                <span class="inline-flex px-2.5 py-1 rounded-md text-xs font-semibold border
                                    @if($user->isAdmin()) bg-red-500/10 text-red-400 border-red-500/30
                                    @elseif($user->isEditor()) bg-blue-500/10 text-blue-400 border-blue-500/30
                                    @else bg-slate-500/10 text-slate-400 border-slate-500/30 @endif">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-slate-500 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-5 py-4 border-t border-slate-800">
            {{ $users->links() }}
        </div>
    </div>

@endsection