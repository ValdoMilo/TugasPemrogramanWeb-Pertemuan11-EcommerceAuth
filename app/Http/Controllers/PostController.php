<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    // HAPUS __construct dengan authorizeResource

    public function index(Request $request)
    {
        $query = Post::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $posts = $query->latest()->paginate(8)->withQueryString();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        // Manual authorize
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Hanya admin dan editor yang bisa menulis artikel.');
        }

        return view('posts.create');
    }

    public function store(Request $request)
    {
        if (!in_array(auth()->user()->role, ['admin', 'editor'])) {
            abort(403, 'Hanya admin dan editor yang bisa menulis artikel.');
        }

        $validated = $request->validate([
            'title'    => ['required', 'string', 'min:5', 'max:200'],
            'excerpt'  => ['nullable', 'string', 'max:500'],
            'body'     => ['required', 'string', 'min:20'],
            'category' => ['required', 'string', 'max:50'],
            'status'   => ['required', Rule::in(['draft', 'published'])],
            'image'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        $validated['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // Admin boleh edit semua, editor hanya miliknya
        if (auth()->user()->isAdmin()) {
            // admin boleh semua
        } elseif (auth()->user()->isEditor() && $post->user_id === auth()->id()) {
            // editor boleh miliknya
        } else {
            abort(403, 'Anda tidak boleh mengedit artikel ini.');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        // Cek otorisasi
        if (auth()->user()->isAdmin()) {
            // admin boleh semua
        } elseif (auth()->user()->isEditor() && $post->user_id === auth()->id()) {
            // editor boleh miliknya
        } else {
            abort(403, 'Anda tidak boleh mengedit artikel ini.');
        }

        $validated = $request->validate([
            'title'    => ['required', 'string', 'min:5', 'max:200'],
            'excerpt'  => ['nullable', 'string', 'max:500'],
            'body'     => ['required', 'string', 'min:20'],
            'category' => ['required', 'string', 'max:50'],
            'status'   => ['required', Rule::in(['draft', 'published'])],
            'image'    => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($post->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']) . '-' . uniqid();
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy(Post $post)
    {
        // Cek otorisasi
        if (auth()->user()->isAdmin()) {
            // admin boleh semua
        } elseif (auth()->user()->isEditor() && $post->user_id === auth()->id()) {
            // editor boleh miliknya
        } else {
            abort(403, 'Anda tidak boleh menghapus artikel ini.');
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }
}