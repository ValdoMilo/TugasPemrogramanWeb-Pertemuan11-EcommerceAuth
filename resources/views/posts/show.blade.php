@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <article class="max-w-2xl mx-auto">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6">
            <a href="{{ route('posts.index') }}" class="hover:text-slate-300 transition-colors">Artikel</a>
            <span>/</span>
            <span class="text-slate-300 truncate max-w-[200px]">{{ $post->title }}</span>
        </nav>

        {{-- Meta --}}
        <div class="flex items-center gap-3 mb-4 flex-wrap">
            <x-badge variant="red">{{ $post->category }}</x-badge>
            @if ($post->status === 'published')
                <x-badge variant="green">Terbit</x-badge>
            @else
                <x-badge variant="yellow">Draf</x-badge>
            @endif
            <span class="text-xs text-slate-500 sm:ml-auto">
                {{ $post->created_at->format('d F Y') }}
            </span>
        </div>

        {{-- Judul --}}
        <h1 class="text-2xl sm:text-4xl font-bold leading-tight mb-6 text-slate-100">
            {{ $post->title }}
        </h1>

        {{-- Gambar --}}
        @if ($post->image_url)
            <img src="{{ $post->image_url }}" 
                 alt="{{ $post->title }}"
                 class="w-full aspect-video object-cover rounded-2xl mb-8 border border-slate-800">
        @endif

        {{-- Isi Artikel --}}
        <div class="prose prose-invert prose-slate max-w-none mb-10
                    prose-headings:font-semibold prose-headings:text-slate-100
                    prose-p:text-slate-300 prose-p:leading-relaxed
                    prose-strong:text-slate-100
                    prose-a:text-red-400 prose-a:no-underline hover:prose-a:underline">
            {!! nl2br(e($post->body)) !!}
        </div>

        {{-- Actions --}}
        <div class="flex flex-wrap items-center gap-3 pt-6 border-t border-slate-800">
            <a href="{{ route('posts.index') }}" class="btn-secondary">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('posts.edit', $post) }}" class="btn-secondary">
                Edit Artikel
            </a>

            <form method="POST" 
                  action="{{ route('posts.destroy', $post) }}"
                  class="sm:ml-auto"
                  onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-danger">
                    Hapus Artikel
                </button>
            </form>
        </div>
    </article>

@endsection