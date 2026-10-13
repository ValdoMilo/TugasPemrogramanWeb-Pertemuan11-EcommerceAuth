<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first() ?? User::first();

        if (!$admin) {
            $this->command->error('User tidak ditemukan. Jalankan UserSeeder dulu.');
            return;
        }

        $posts = [
            [
                'title' => 'Pengenalan Laravel untuk Pemula',
                'category' => 'Laravel',
                'status' => 'published',
                'body' => 'Laravel adalah framework PHP yang modern dan elegan. Framework ini menyediakan berbagai fitur siap pakai seperti routing, ORM, authentication, dan masih banyak lagi.',
            ],
            [
                'title' => 'Memahami MVC di Laravel',
                'category' => 'Laravel',
                'status' => 'published',
                'body' => 'MVC (Model-View-Controller) adalah pola arsitektur yang memisahkan aplikasi menjadi tiga komponen utama: Model untuk data, View untuk tampilan, dan Controller untuk logika.',
            ],
            [
                'title' => 'Eloquent ORM: Interaksi Database yang Mudah',
                'category' => 'Database',
                'status' => 'published',
                'body' => 'Eloquent adalah ORM bawaan Laravel yang membuat interaksi dengan database menjadi lebih mudah dan menyenangkan, tanpa perlu menulis query SQL manual.',
            ],
            [
                'title' => 'Middleware dan Role-Based Access Control',
                'category' => 'Laravel',
                'status' => 'published',
                'body' => 'Middleware memungkinkan kita untuk memfilter HTTP request yang masuk. Dengan middleware, kita bisa membatasi akses berdasarkan role user seperti admin, editor, atau user biasa.',
            ],
            [
                'title' => 'Tips Belajar Laravel untuk Mahasiswa',
                'category' => 'Tips',
                'status' => 'published',
                'body' => 'Belajar Laravel memang menantang di awal, tapi dengan konsisten dan praktik langsung, siapa pun bisa menguasainya. Mulai dari project kecil seperti blog sederhana.',
            ],
        ];

        foreach ($posts as $post) {
            Post::create([
                'user_id' => $admin->id,
                'title' => $post['title'],
                'slug' => Str::slug($post['title']) . '-' . uniqid(),
                'category' => $post['category'],
                'status' => $post['status'],
                'body' => $post['body'],
            ]);
        }

        $this->command->info('✅ 5 artikel berhasil dibuat!');
    }
}