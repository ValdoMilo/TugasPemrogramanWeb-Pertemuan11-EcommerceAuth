<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-black text-2xl text-slate-900 tracking-tight">Editor Workspace</h2>
            <span class="px-3 py-1 bg-amber-100 text-amber-800 font-extrabold text-xs rounded-full border border-amber-200">
                Akses: Editor & Admin
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex justify-between items-center">
                <div>
                    <h3 class="font-bold text-slate-900 text-lg">Kelola Konten & Katalog</h3>
                    <p class="text-xs text-slate-500 mt-1">Anda dapat memperbarui deskripsi dan status tayang item produk.</p>
                </div>
                <button class="px-4 py-2 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-xl transition-all shadow-xs">
                    + Tambah Artikel / Post
                </button>
            </div>

            <!-- List Draf Konten -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($products as $product)
                    <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs flex items-center justify-between">
                        <div>
                            <span class="text-[10px] font-bold text-amber-600 uppercase bg-amber-50 px-2 py-0.5 rounded border border-amber-200">Konten Ready</span>
                            <h4 class="font-bold text-slate-800 text-sm mt-1">{{ $product->name }}</h4>
                            <p class="text-xs text-slate-400 line-clamp-1 mt-0.5">{{ $product->description }}</p>
                        </div>
                        <button class="text-xs font-bold text-indigo-600 hover:text-indigo-800 px-3 py-1.5 bg-slate-50 rounded-lg border border-slate-200">
                            Edit
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>