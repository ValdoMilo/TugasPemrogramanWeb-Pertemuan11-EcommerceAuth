<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-900 tracking-tight">Executive Dashboard</h2>
            <span class="px-3 py-1 bg-rose-100 text-rose-700 font-extrabold text-xs rounded-full border border-rose-200">
                Mode Akses: Administrator
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            
            <!-- Cards Metrik -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Produk -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-5">
                    <div class="p-4 bg-indigo-50 text-indigo-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Produk</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $totalProducts }} <span class="text-xs font-normal text-slate-400">Item</span></h3>
                    </div>
                </div>

                <!-- Total Users -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-5">
                    <div class="p-4 bg-emerald-50 text-emerald-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Total Pengguna</p>
                        <h3 class="text-2xl font-black text-slate-900">{{ $totalUsers }} <span class="text-xs font-normal text-slate-400">Akun</span></h3>
                    </div>
                </div>

                <!-- System Security Status -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-center gap-5">
                    <div class="p-4 bg-sky-50 text-sky-600 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Status Middleware</p>
                        <h3 class="text-base font-bold text-emerald-600">CheckRole Active</h3>
                    </div>
                </div>
            </div>

            <!-- Tabel Pengguna Terakhir -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-xs overflow-hidden">
                <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                    <h3 class="font-bold text-slate-900 text-base">Pengguna Terbaru</h3>
                    <span class="text-xs text-slate-400">Database Real-time</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-600">
                        <thead class="bg-slate-50 text-slate-400 font-bold uppercase tracking-wider border-b border-slate-100">
                            <tr>
                                <th class="p-4">Nama</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Role</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($recentUsers as $user)
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-4 font-bold text-slate-800">{{ $user->name }}</td>
                                    <td class="p-4 text-slate-500">{{ $user->email }}</td>
                                    <td class="p-4">
                                        <span class="px-2.5 py-1 rounded-full text-[10px] font-extrabold uppercase border
                                            {{ $user->role === 'admin' ? 'bg-rose-50 text-rose-600 border-rose-200' : ($user->role === 'editor' ? 'bg-amber-50 text-amber-600 border-amber-200' : 'bg-slate-100 text-slate-600 border-slate-200') }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>