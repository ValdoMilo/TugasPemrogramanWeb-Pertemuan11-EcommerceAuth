<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ========================================
        // 1. USERS
        // ========================================
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@example.com',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // ========================================
        // 2. CATEGORIES
        // ========================================
        $categoriesData = [
            ['name' => 'Elektronik', 'description' => 'Perangkat elektronik seperti smartphone, laptop, dan gadget lainnya.'],
            ['name' => 'Pakaian',    'description' => 'Berbagai jenis pakaian pria dan wanita untuk kebutuhan sehari-hari.'],
            ['name' => 'Makanan',    'description' => 'Makanan kemasan, snack, dan bahan makanan pokok.'],
            ['name' => 'Minuman',    'description' => 'Minuman kemasan, kopi, teh, dan minuman segar.'],
            ['name' => 'Perabotan',  'description' => 'Perabot rumah tangga seperti meja, kursi, dan lemari.'],
            ['name' => 'Olahraga',   'description' => 'Peralatan olahraga dan aksesoris fitness.'],
            ['name' => 'Kecantikan', 'description' => 'Produk perawatan kulit, kosmetik, dan perawatan tubuh.'],
            ['name' => 'Mainan',     'description' => 'Mainan anak edukatif dan hiburan.'],
            ['name' => 'Buku',       'description' => 'Buku pelajaran, novel, dan buku referensi.'],
            ['name' => 'Otomotif',   'description' => 'Suku cadang dan aksesoris kendaraan bermotor.'],
        ];

        foreach ($categoriesData as $cat) {
            Category::create([
                'name' => $cat['name'],
                'slug' => Str::slug($cat['name']),
                'description' => $cat['description'],
            ]);
        }

        // ========================================
        // 3. SUPPLIERS
        // ========================================
        $suppliersData = [
            ['name' => 'PT Teknologi Nusantara',    'email' => 'sales@teknologi-nusantara.co.id',   'phone' => '021-5550101', 'address' => 'Jl. Sudirman No. 123, Jakarta'],
            ['name' => 'CV Fashion Indonesia',      'email' => 'order@fashionindonesia.com',        'phone' => '021-5550102', 'address' => 'Jl. Thamrin No. 45, Jakarta'],
            ['name' => 'UD Sumber Rezeki',          'email' => 'info@sumberrezeki.co.id',           'phone' => '031-5550103', 'address' => 'Jl. Rungkut Industri No. 88, Surabaya'],
            ['name' => 'PT Segar Sejahtera',        'email' => 'cs@segarsejahtera.com',             'phone' => '022-5550104', 'address' => 'Jl. Asia Afrika No. 12, Bandung'],
            ['name' => 'PT Furniture Prima',        'email' => 'sales@furnitureprima.co.id',        'phone' => '061-5550105', 'address' => 'Jl. Gatot Subroto No. 78, Medan'],
            ['name' => 'CV Sport Center',           'email' => 'order@sportcenter.id',              'phone' => '021-5550106', 'address' => 'Jl. Kemang Raya No. 22, Jakarta'],
            ['name' => 'PT Cantik Alami',           'email' => 'info@cantikalami.co.id',            'phone' => '021-5550107', 'address' => 'Jl. Kebon Jeruk No. 55, Jakarta'],
            ['name' => 'CV Cerdas Edukasi',         'email' => 'sales@cerdasedukasi.com',           'phone' => '0274-5550108','address' => 'Jl. Malioboro No. 100, Yogyakarta'],
            ['name' => 'PT Buku Berkualitas',       'email' => 'cs@bukuberkualitas.co.id',          'phone' => '021-5550109', 'address' => 'Jl. Kwitang No. 8, Jakarta'],
            ['name' => 'CV Auto Parts Jaya',        'email' => 'order@autopartsjaya.id',            'phone' => '031-5550110', 'address' => 'Jl. Bypass Krian No. 45, Sidoarjo'],
        ];

        foreach ($suppliersData as $sup) {
            Supplier::create($sup);
        }

        // ========================================
        // 4. PRODUCTS — 100 Produk Nyata
        // ========================================
        $productsData = [
            // ==================== ELEKTRONIK (15) ====================
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Smartphone Samsung Galaxy A54 5G',    'price' => 5499000,  'stock' => 25,  'img' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=600', 'desc' => 'Smartphone mid-range dengan layar Super AMOLED 6.4 inci, kamera 50MP, baterai 5000mAh.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'iPhone 15 Pro Max 256GB',              'price' => 21999000, 'stock' => 8,   'img' => 'https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=600', 'desc' => 'iPhone 15 Pro Max dengan chip A17 Pro, kamera 48MP, titanium body.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Laptop ASUS VivoBook 14',              'price' => 7499000,  'stock' => 15,  'img' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=600', 'desc' => 'Laptop ringan dengan Intel Core i5, RAM 8GB, SSD 512GB, layar 14 inci FHD.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'MacBook Air M2 13 inch',               'price' => 17499000, 'stock' => 10,  'img' => 'https://images.unsplash.com/photo-1541807084-5c52b6b3adef?w=600', 'desc' => 'MacBook Air dengan chip Apple M2, layar Liquid Retina 13.6 inci, baterai 18 jam.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Headphone Sony WH-1000XM5',            'price' => 4299000,  'stock' => 12,  'img' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=600', 'desc' => 'Headphone wireless dengan noise cancelling terbaik, baterai 30 jam.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'TWS Apple AirPods Pro 2',              'price' => 3499000,  'stock' => 20,  'img' => 'https://images.unsplash.com/photo-1600294037681-c80b4cb5b434?w=600', 'desc' => 'Earbuds dengan active noise cancelling, audio spatial, dan tahan air.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Smart TV LG 43 inch 4K',               'price' => 4299000,  'stock' => 8,   'img' => 'https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=600', 'desc' => 'Smart TV LED 43 inci resolusi 4K UHD dengan webOS, Netflix & YouTube built-in.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Mouse Logitech MX Master 3S',          'price' => 1399000,  'stock' => 40,  'img' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=600', 'desc' => 'Mouse wireless premium dengan sensor 8000 DPI, silent click, baterai tahan lama.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Keyboard Mechanical Keychron K2',      'price' => 1299000,  'stock' => 30,  'img' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=600', 'desc' => 'Keyboard mechanical 75% dengan switch Gateron, cocok untuk produktivitas & gaming.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Power Bank Anker 20000mAh',            'price' => 499000,   'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1609091839311-d5365f9ff1c5?w=600', 'desc' => 'Power bank kapasitas besar dengan fast charging 22.5W, dual output.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Smartwatch Xiaomi Mi Band 8',          'price' => 449000,   'stock' => 75,  'img' => 'https://images.unsplash.com/photo-1579586337278-3befd40fd17a?w=600', 'desc' => 'Smartwatch fitness tracker dengan monitor detak jantung dan SpO2, baterai 16 hari.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Speaker JBL Flip 6',                   'price' => 1799000,  'stock' => 45,  'img' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=600', 'desc' => 'Speaker bluetooth portable dengan suara bertenaga, tahan air IP67.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Kamera Canon EOS M50 Mark II',         'price' => 9499000,  'stock' => 6,   'img' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=600', 'desc' => 'Kamera mirrorless dengan sensor APS-C 24MP, cocok untuk content creator.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Tablet Samsung Galaxy Tab S9',         'price' => 10999000, 'stock' => 12,  'img' => 'https://images.unsplash.com/photo-1561154464-82e9adf32764?w=600', 'desc' => 'Tablet dengan layar AMOLED 11 inci, S Pen included, performa flagship.'],
            ['cat' => 'Elektronik', 'sup' => 'PT Teknologi Nusantara', 'name' => 'Monitor Dell UltraSharp 27 inch 4K',   'price' => 8999000,  'stock' => 7,   'img' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=600', 'desc' => 'Monitor 27 inci resolusi 4K UHD, akurasi warna tinggi untuk desainer.'],

            // ==================== PAKAIAN (10) ====================
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Kemeja Formal Pria Lengan Panjang',  'price' => 249000, 'stock' => 120, 'img' => 'https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600', 'desc' => 'Kemeja formal katun premium, cocok untuk kerja dan acara resmi.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Kaos Polos Cotton Combed 30s',        'price' => 89000,  'stock' => 300, 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600', 'desc' => 'Kaos polos bahan cotton combed 30s, nyaman dan adem untuk sehari-hari.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Celana Jeans Slim Fit Pria',          'price' => 329000, 'stock' => 80,  'img' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?w=600', 'desc' => 'Celana jeans slim fit dengan bahan stretch, nyaman dipakai seharian.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Jaket Hoodie Fleece Unisex',          'price' => 279000, 'stock' => 90,  'img' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?w=600', 'desc' => 'Jaket hoodie bahan fleece premium, hangat dan stylish untuk cuaca dingin.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Dress Wanita Casual Midi',            'price' => 259000, 'stock' => 75,  'img' => 'https://images.unsplash.com/photo-1595777457583-95e059d581b8?w=600', 'desc' => 'Dress casual midi dengan bahan katun, elegan untuk aktivitas sehari-hari.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Sepatu Sneakers Pria Putih',          'price' => 449000, 'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=600', 'desc' => 'Sepatu sneakers putih minimalis, cocok untuk gaya casual dan sporty.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Blouse Wanita Lengan Panjang',        'price' => 189000, 'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1564257631407-4deb1f99d992?w=600', 'desc' => 'Blouse wanita lengan panjang, bahan sifon premium, cocok untuk kerja.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Kaos Kaki Sporty 3 Pasang',           'price' => 45000,  'stock' => 250, 'img' => 'https://images.unsplash.com/photo-1582966772680-860e372bb558?w=600', 'desc' => 'Kaos kaki sporty isi 3 pasang, nyaman untuk olahraga sehari-hari.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Topi Baseball Sporty',                'price' => 79000,  'stock' => 150, 'img' => 'https://images.unsplash.com/photo-1588850561407-ed78c282e89b?w=600', 'desc' => 'Topi baseball dengan bahan katun, cocok untuk gaya casual.'],
            ['cat' => 'Pakaian', 'sup' => 'CV Fashion Indonesia', 'name' => 'Tas Ransel Kanvas',                   'price' => 219000, 'stock' => 70,  'img' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=600', 'desc' => 'Tas ransel kanvas premium, muat laptop 15 inci dan banyak barang.'],

            // ==================== MAKANAN (10) ====================
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Beras Premium Pandan Wangi 5kg',      'price' => 78000,   'stock' => 200, 'img' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?w=600', 'desc' => 'Beras premium pandan wangi asli Cianjur, pulen dan harum.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Minyak Goreng Sania 2 Liter',         'price' => 38000,   'stock' => 250, 'img' => 'https://images.unsplash.com/photo-1474979266404-7eaacbcd87c5?w=600', 'desc' => 'Minyak goreng kemasan 2 liter, sehat dan berkualitas.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Mie Instan Indomie Goreng (Dus)',     'price' => 115000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1612929633738-8fe44f7ec841?w=600', 'desc' => 'Mie instan goreng favorit, satu dus isi 40 bungkus.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Kopi Kapal Api Special 165g',         'price' => 22000,   'stock' => 180, 'img' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=600', 'desc' => 'Kopi bubuk Kapal Api Special, aroma kuat dan nikmat.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Biskuit Roma Kelapa 300g',            'price' => 15000,   'stock' => 220, 'img' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=600', 'desc' => 'Biskuit Roma Kelapa, renyah dan manis, cocok untuk camilan.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Susu Kental Manis Frisian Flag 545g', 'price' => 18000,   'stock' => 160, 'img' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=600', 'desc' => 'Susu kental manis Frisian Flag, cocok untuk kopi dan masakan.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Telur Ayam Negeri 1 Kg',              'price' => 32000,   'stock' => 300, 'img' => 'https://images.unsplash.com/photo-1582722872445-44dc5f7e3c8f?w=600', 'desc' => 'Telur ayam negeri segar, kemasan 1 kilogram.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Gula Pasir Gulaku 1 Kg',              'price' => 16000,   'stock' => 280, 'img' => 'https://images.unsplash.com/photo-1581441363689-1f3c3c414635?w=600', 'desc' => 'Gula pasir Gulaku kemasan 1 kg, higienis dan berkualitas.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Tepung Terigu Segitiga Biru 1 Kg',    'price' => 13000,   'stock' => 200, 'img' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?w=600', 'desc' => 'Tepung terigu serbaguna untuk berbagai masakan.'],
            ['cat' => 'Makanan', 'sup' => 'UD Sumber Rezeki', 'name' => 'Mie Telur Kering 200g',               'price' => 12000,   'stock' => 180, 'img' => 'https://images.unsplash.com/photo-1552611052-33e04de081de?w=600', 'desc' => 'Mie telur kering, cocok untuk mie goreng atau mie kuah.'],

            // ==================== MINUMAN (10) ====================
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Air Mineral Aqua 600ml (Dus)',       'price' => 55000,  'stock' => 300, 'img' => 'https://images.unsplash.com/photo-1548839140-29a749e1cf4d?w=600', 'desc' => 'Air mineral Aqua kemasan 600ml, satu dus isi 24 botol.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Teh Kotak Sosro 300ml (Dus)',        'price' => 60000,  'stock' => 150, 'img' => 'https://images.unsplash.com/photo-1556679343-c7306c1976bc?w=600', 'desc' => 'Teh kotak Sosro original, segar dan nikmat, isi 24 kotak.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Kopi Good Day Cappuccino 20s',       'price' => 25000,  'stock' => 200, 'img' => 'https://images.unsplash.com/photo-1517959105821-eaf2591984ca?w=600', 'desc' => 'Kopi instan Good Day Cappuccino, praktis dan nikmat.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Susu Ultra Milk Cokelat 1L',         'price' => 22000,  'stock' => 180, 'img' => 'https://images.unsplash.com/photo-1550583724-b2692b85b150?w=600', 'desc' => 'Susu UHT Ultra Milk rasa cokelat, kaya kalsium dan vitamin.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Minuman Pocari Sweat 500ml',         'price' => 8000,   'stock' => 400, 'img' => 'https://images.unsplash.com/photo-1622543925917-763c34d1a86e?w=600', 'desc' => 'Minuman isotonik Pocari Sweat, mengembalikan cairan tubuh.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Coca Cola 1.5 Liter',                'price' => 17000,  'stock' => 250, 'img' => 'https://images.unsplash.com/photo-1554866585-cd94860890b7?w=600', 'desc' => 'Minuman bersoda Coca Cola kemasan 1.5 liter.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Kopi Kapal Api Sachet (10 pcs)',     'price' => 12000,  'stock' => 300, 'img' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=600', 'desc' => 'Kopi Kapal Api sachet, praktis untuk di rumah.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Teh Pucuk Harum 350ml (Dus)',        'price' => 45000,  'stock' => 200, 'img' => 'https://images.unsplash.com/photo-1597481499750-3e6b22637e12?w=600', 'desc' => 'Teh Pucuk Harum kemasan botol 350ml, isi 24 botol.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Nescafe Classic 100g',               'price' => 42000,  'stock' => 150, 'img' => 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?w=600', 'desc' => 'Kopi Nescafe Classic kemasan 100 gram, rasa autentik.'],
            ['cat' => 'Minuman', 'sup' => 'PT Segar Sejahtera', 'name' => 'Susu Bear Brand 189ml (Dus)',        'price' => 85000,  'stock' => 120, 'img' => 'https://images.unsplash.com/photo-1563636619-e9143da7973b?w=600', 'desc' => 'Susu steril Bear Brand, isi 24 kaleng 189ml.'],

            // ==================== PERABOTAN (10) ====================
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Meja Kerja Minimalis Kayu Jati',    'price' => 1899000, 'stock' => 15, 'img' => 'https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?w=600', 'desc' => 'Meja kerja minimalis dari kayu jati solid, kokoh dan elegan.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Kursi Ergonomis Kantor',            'price' => 1499000, 'stock' => 20, 'img' => 'https://images.unsplash.com/photo-1580480055273-228ff5388ef8?w=600', 'desc' => 'Kursi ergonomis dengan sandaran mesh, nyaman untuk kerja lama.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Lemari Pakaian 3 Pintu',            'price' => 2799000, 'stock' => 8,  'img' => 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?w=600', 'desc' => 'Lemari pakaian 3 pintu dengan cermin dan laci, kapasitas besar.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Sofa Minimalis 2 Dudukan',          'price' => 3499000, 'stock' => 6,  'img' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=600', 'desc' => 'Sofa minimalis 2 dudukan dengan bahan fabric premium.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Rak Buku Serbaguna 4 Tingkat',      'price' => 599000,  'stock' => 30, 'img' => 'https://images.unsplash.com/photo-1594620302200-9a762244a156?w=600', 'desc' => 'Rak buku serbaguna 4 tingkat, cocok untuk buku dan dekorasi.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Meja Makan Kayu 4 Kursi',           'price' => 4299000, 'stock' => 5,  'img' => 'https://images.unsplash.com/photo-1617806118233-18e1de247200?w=600', 'desc' => 'Set meja makan kayu dengan 4 kursi, cocok untuk keluarga.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Tempat Tidur Minimalis Queen Size', 'price' => 3799000, 'stock' => 10, 'img' => 'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=600', 'desc' => 'Tempat tidur minimalis ukuran queen, rangka kayu solid.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Cermin Dinding Full Body',          'price' => 449000,  'stock' => 25, 'img' => 'https://images.unsplash.com/photo-1618220179428-22790b461013?w=600', 'desc' => 'Cermin dinding full body, cocok untuk kamar tidur.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Lampu Meja Belajar LED',            'price' => 189000,  'stock' => 40, 'img' => 'https://images.unsplash.com/photo-1507473885765-e6ed057f782c?w=600', 'desc' => 'Lampu meja belajar LED dengan 3 mode pencahayaan.'],
            ['cat' => 'Perabotan', 'sup' => 'PT Furniture Prima', 'name' => 'Rak Sepatu 3 Tingkat',              'price' => 279000,  'stock' => 35, 'img' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600', 'desc' => 'Rak sepatu 3 tingkat, praktis dan hemat tempat.'],

            // ==================== OLAHRAGA (10) ====================
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Sepatu Lari Nike Revolution 6',       'price' => 899000,  'stock' => 40,  'img' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600', 'desc' => 'Sepatu lari Nike Revolution 6, ringan dan nyaman untuk jogging.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Matras Yoga Anti Slip 6mm',           'price' => 149000,  'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1592432678016-e910b452f9a2?w=600', 'desc' => 'Matras yoga anti slip tebal 6mm, nyaman untuk latihan.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Dumbbell Set 10kg Adjustable',        'price' => 449000,  'stock' => 25,  'img' => 'https://images.unsplash.com/photo-1517838277536-f5f99be501cd?w=600', 'desc' => 'Dumbbell set adjustable 10kg, cocok untuk latihan di rumah.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Sepeda Statis Magnetic',              'price' => 2499000, 'stock' => 5,   'img' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=600', 'desc' => 'Sepeda statis magnetic, latihan kardio di rumah tanpa ribet.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Jersey Bola Original Grade',          'price' => 179000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=600', 'desc' => 'Jersey bola bahan dry-fit, breathable dan nyaman dipakai.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Bola Sepak Adidas Size 5',            'price' => 349000,  'stock' => 30,  'img' => 'https://images.unsplash.com/photo-1614632537190-23e4146777db?w=600', 'desc' => 'Bola sepak Adidas ukuran 5, standar FIFA.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Raket Badminton Yonex',               'price' => 599000,  'stock' => 20,  'img' => 'https://images.unsplash.com/photo-1617083934555-2b4d5e2b5d5c?w=600', 'desc' => 'Raket badminton Yonex, ringan dan bertenaga.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Botol Minum Sporty 1 Liter',          'price' => 89000,   'stock' => 150, 'img' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?w=600', 'desc' => 'Botol minum sporty 1 liter, BPA free, aman untuk olahraga.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Jump Rope Profesional',               'price' => 79000,   'stock' => 80,  'img' => 'https://images.unsplash.com/photo-1434682881908-b43d0467b798?w=600', 'desc' => 'Jump rope profesional, cocok untuk latihan kardio.'],
            ['cat' => 'Olahraga', 'sup' => 'CV Sport Center', 'name' => 'Sarung Tangan Gym Anti Slip',         'price' => 119000,  'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1583473848882-f9a5bc7fd2ee?w=600', 'desc' => 'Sarung tangan gym anti slip, nyaman saat angkat beban.'],

            // ==================== KECANTIKAN (10) ====================
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Skincare Somethinc Niacinamide',      'price' => 149000, 'stock' => 80,  'img' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=600', 'desc' => 'Serum niacinamide untuk mencerahkan dan menyamarkan noda hitam.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Lipstik Matte Wardah',                'price' => 65000,  'stock' => 120, 'img' => 'https://images.unsplash.com/photo-1586495777744-4413f21062fa?w=600', 'desc' => 'Lipstik matte Wardah tahan lama, tidak membuat bibir kering.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Sunscreen Azarine SPF 50 PA++++',     'price' => 89000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=600', 'desc' => 'Sunscreen SPF 50 PA++++, ringan dan tidak lengket.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Parfum HMNS Essential',               'price' => 299000, 'stock' => 50,  'img' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?w=600', 'desc' => 'Parfum lokal premium dengan aroma tahan lama seharian.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Hair Dryer Philips 1000W',            'price' => 349000, 'stock' => 30,  'img' => 'https://images.unsplash.com/photo-1522338140262-f46f5913618a?w=600', 'desc' => 'Hair dryer Philips 1000W, praktis untuk perawatan rambut.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Facial Wash Cetaphil 100ml',          'price' => 89000,  'stock' => 120, 'img' => 'https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=600', 'desc' => 'Facial wash Cetaphil untuk kulit sensitif, lembut dan aman.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Masker Wajah Clay 100g',              'price' => 79000,  'stock' => 90,  'img' => 'https://images.unsplash.com/photo-1596755389378-c31d21fd1273?w=600', 'desc' => 'Masker wajah clay untuk membersihkan pori-pori secara mendalam.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Hair Serum Vitamin E',                'price' => 119000, 'stock' => 70,  'img' => 'https://images.unsplash.com/photo-1585232004423-244e0e6904e3?w=600', 'desc' => 'Hair serum vitamin E, membuat rambut sehat dan berkilau.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Body Lotion Vaseline 400ml',          'price' => 65000,  'stock' => 150, 'img' => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?w=600', 'desc' => 'Body lotion Vaseline 400ml, melembapkan kulit seharian.'],
            ['cat' => 'Kecantikan', 'sup' => 'PT Cantik Alami', 'name' => 'Micellar Water Garnier 400ml',        'price' => 75000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?w=600', 'desc' => 'Micellar water Garnier, membersihkan makeup tanpa bilas.'],

            // ==================== MAINAN (8) ====================
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'LEGO Classic Bricks 500pcs',         'price' => 599000, 'stock' => 20,  'img' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?w=600', 'desc' => 'LEGO Classic 500 pcs, mainan edukatif untuk anak.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Remote Control Car Off-Road',        'price' => 349000, 'stock' => 35,  'img' => 'https://images.unsplash.com/photo-1594787318286-3d835c1d207f?w=600', 'desc' => 'RC car off-road dengan baterai rechargeable, tahan banting.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Puzzle Kayu Edukatif Angka',         'price' => 89000,  'stock' => 80,  'img' => 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?w=600', 'desc' => 'Puzzle kayu edukatif untuk melatih motorik anak.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Boneka Teddy Bear Jumbo 80cm',       'price' => 249000, 'stock' => 25,  'img' => 'https://images.unsplash.com/photo-1559454403-b8fb88521f11?w=600', 'desc' => 'Boneka teddy bear jumbo 80cm, bahan lembut dan halus.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Rubik Cube 3x3 Speed',               'price' => 79000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1591994843349-f415893b3a6b?w=600', 'desc' => 'Rubik cube 3x3 speed, cocok untuk latihan otak.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Playdough Set 12 Warna',             'price' => 59000,  'stock' => 120, 'img' => 'https://images.unsplash.com/photo-1596461404969-9ae70f2830c1?w=600', 'desc' => 'Playdough set 12 warna, aman dan non-toxic untuk anak.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Robot Mainan Transformer',           'price' => 179000, 'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1535378917042-10a22c95931a?w=600', 'desc' => 'Robot mainan transformer, bisa berubah jadi kendaraan.'],
            ['cat' => 'Mainan', 'sup' => 'CV Cerdas Edukasi', 'name' => 'Drum Mainan Anak',                   'price' => 149000, 'stock' => 45,  'img' => 'https://images.unsplash.com/photo-1519892300165-cb5542fb47c7?w=600', 'desc' => 'Drum mainan anak, melatih sense of music sejak dini.'],

            // ==================== BUKU (10) ====================
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Clean Code (Robert C. Martin)',  'price' => 189000, 'stock' => 40,  'img' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?w=600', 'desc' => 'Buku wajib programmer: Clean Code oleh Robert C. Martin.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Laravel Up & Running',           'price' => 249000, 'stock' => 30,  'img' => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=600', 'desc' => 'Panduan lengkap framework Laravel untuk developer modern.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Novel Laskar Pelangi',                'price' => 95000,  'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w=600', 'desc' => 'Novel best-seller karya Andrea Hirata, inspiratif dan menyentuh.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Algoritma & Struktur Data',      'price' => 149000, 'stock' => 45,  'img' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=600', 'desc' => 'Buku referensi algoritma dan struktur data untuk mahasiswa.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Komik One Piece Vol. 105',            'price' => 45000,  'stock' => 100, 'img' => 'https://images.unsplash.com/photo-1612036782180-6f0b6cd846fe?w=600', 'desc' => 'Komik One Piece volume 105, lanjutan petualangan Luffy.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Atomic Habits',                  'price' => 129000, 'stock' => 50,  'img' => 'https://images.unsplash.com/photo-1589829085413-56de8ae18c73?w=600', 'desc' => 'Buku self-improvement terlaris karya James Clear.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Novel Bumi Manusia',                  'price' => 119000, 'stock' => 40,  'img' => 'https://images.unsplash.com/photo-1476275466078-4007374efbbe?w=600', 'desc' => 'Novel klasik Pramoedya Ananta Toer, sarat makna.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Rich Dad Poor Dad',              'price' => 99000,  'stock' => 55,  'img' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600', 'desc' => 'Buku keuangan pribadi karya Robert Kiyosaki.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Pemrograman Python',             'price' => 179000, 'stock' => 35,  'img' => 'https://images.unsplash.com/photo-1526379095098-d400fd0bf935?w=600', 'desc' => 'Panduan belajar Python dari nol untuk pemula.'],
            ['cat' => 'Buku', 'sup' => 'PT Buku Berkualitas', 'name' => 'Buku Design Patterns',                'price' => 209000, 'stock' => 25,  'img' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?w=600', 'desc' => 'Buku Design Patterns oleh Gang of Four, referensi OOP.'],

            // ==================== OTOMOTIF (10) ====================
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Oli Mesin Shell Helix 4L',         'price' => 289000,  'stock' => 50,  'img' => 'https://images.unsplash.com/photo-1621274147744-cfb5694bb233?w=600', 'desc' => 'Oli mesin Shell Helix kemasan 4 liter, menjaga performa mesin.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Ban Motor IRC NR73 80/90-14',      'price' => 189000,  'stock' => 40,  'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600', 'desc' => 'Ban motor IRC NR73 ukuran 80/90-14, awet dan nyaman.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Helm Full Face KYT R2R',           'price' => 549000,  'stock' => 25,  'img' => 'https://images.unsplash.com/photo-1558981806-ec527fa84c39?w=600', 'desc' => 'Helm full face KYT R2R dengan sertifikasi SNI, aman dan nyaman.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Aki Mobil Yuasa 12V 60Ah',         'price' => 1299000, 'stock' => 15,  'img' => 'https://images.unsplash.com/photo-1580273916550-e323be2ae537?w=600', 'desc' => 'Aki mobil Yuasa 12V 60Ah, tahan lama dan bergaransi.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Wiper Mobil Bosch Aerotwin',       'price' => 149000,  'stock' => 60,  'img' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600', 'desc' => 'Wiper mobil Bosch Aerotwin, kinerja optimal di segala cuaca.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Filter Udara Mobil',                'price' => 129000,  'stock' => 45,  'img' => 'https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=600', 'desc' => 'Filter udara mobil berkualitas, menjaga mesin tetap bersih.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Kampas Rem Depan Mobil',            'price' => 249000,  'stock' => 35,  'img' => 'https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?w=600', 'desc' => 'Kampas rem depan mobil, performa pengereman optimal.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Lampu LED Motor H4',                'price' => 179000,  'stock' => 55,  'img' => 'https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?w=600', 'desc' => 'Lampu LED motor H4, terang dan hemat daya.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Cover Mobil Waterproof',            'price' => 399000,  'stock' => 20,  'img' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=600', 'desc' => 'Cover mobil waterproof, melindungi dari hujan dan debu.'],
            ['cat' => 'Otomotif', 'sup' => 'CV Auto Parts Jaya', 'name' => 'Kunci Inggris Set 12 Pcs',          'price' => 289000,  'stock' => 30,  'img' => 'https://images.unsplash.com/photo-1530124566582-a618bc2615dc?w=600', 'desc' => 'Kunci Inggris set 12 pcs, lengkap untuk kebutuhan otomotif.'],
        ];

        // Loop dan buat produk
        $categoryMap = Category::all()->keyBy('name');
        $supplierMap = Supplier::all()->keyBy('name');

        foreach ($productsData as $p) {
            Product::create([
                'category_id' => $categoryMap[$p['cat']]->id,
                'supplier_id' => $supplierMap[$p['sup']]->id,
                'name'        => $p['name'],
                'slug'        => Str::slug($p['name']) . '-' . uniqid(),
                'description' => $p['desc'],
                'price'       => $p['price'],
                'stock'       => $p['stock'],
                'image'       => $p['img'] ?? null,
                'is_active'   => true,
            ]);
        }

        // ========================================
        // 5. CUSTOMERS
        // ========================================
        $customersData = [
            ['name' => 'Budi Santoso',      'email' => 'budi.santoso@gmail.com',    'phone' => '081234567801', 'address' => 'Jl. Merdeka No. 10, Jakarta'],
            ['name' => 'Siti Nurhaliza',    'email' => 'siti.nurhaliza@gmail.com',  'phone' => '081234567802', 'address' => 'Jl. Sudirman No. 25, Bandung'],
            ['name' => 'Ahmad Wijaya',      'email' => 'ahmad.wijaya@gmail.com',    'phone' => '081234567803', 'address' => 'Jl. Diponegoro No. 15, Surabaya'],
            ['name' => 'Dewi Lestari',      'email' => 'dewi.lestari@gmail.com',    'phone' => '081234567804', 'address' => 'Jl. Gajah Mada No. 8, Yogyakarta'],
            ['name' => 'Rudi Hartono',      'email' => 'rudi.hartono@gmail.com',    'phone' => '081234567805', 'address' => 'Jl. Ahmad Yani No. 30, Semarang'],
            ['name' => 'Maya Sari',         'email' => 'maya.sari@gmail.com',       'phone' => '081234567806', 'address' => 'Jl. Pahlawan No. 12, Malang'],
            ['name' => 'Andi Pratama',      'email' => 'andi.pratama@gmail.com',    'phone' => '081234567807', 'address' => 'Jl. Kartini No. 45, Medan'],
            ['name' => 'Rina Marlina',      'email' => 'rina.marlina@gmail.com',    'phone' => '081234567808', 'address' => 'Jl. Cut Nyak Dien No. 20, Banda Aceh'],
            ['name' => 'Joko Susilo',       'email' => 'joko.susilo@gmail.com',     'phone' => '081234567809', 'address' => 'Jl. Pemuda No. 5, Solo'],
            ['name' => 'Lisa Anggraini',    'email' => 'lisa.anggraini@gmail.com',  'phone' => '081234567810', 'address' => 'Jl. Slamet Riyadi No. 50, Solo'],
            ['name' => 'Hendra Gunawan',    'email' => 'hendra.gunawan@gmail.com',  'phone' => '081234567811', 'address' => 'Jl. Veteran No. 22, Denpasar'],
            ['name' => 'Wulan Sari',        'email' => 'wulan.sari@gmail.com',      'phone' => '081234567812', 'address' => 'Jl. Urip Sumoharjo No. 15, Makassar'],
            ['name' => 'Bambang Setiawan',  'email' => 'bambang.setiawan@gmail.com','phone' => '081234567813', 'address' => 'Jl. Sudirman No. 88, Balikpapan'],
            ['name' => 'Indah Permata',     'email' => 'indah.permata@gmail.com',   'phone' => '081234567814', 'address' => 'Jl. Ahmad Dahlan No. 33, Padang'],
            ['name' => 'Fajar Nugroho',     'email' => 'fajar.nugroho@gmail.com',   'phone' => '081234567815', 'address' => 'Jl. Diponegoro No. 67, Pekanbaru'],
            ['name' => 'Sari Wulandari',    'email' => 'sari.wulandari@gmail.com',  'phone' => '081234567816', 'address' => 'Jl. Pahlawan No. 90, Manado'],
            ['name' => 'Doni Saputra',      'email' => 'doni.saputra@gmail.com',    'phone' => '081234567817', 'address' => 'Jl. Merdeka No. 55, Pontianak'],
            ['name' => 'Nurul Hidayah',     'email' => 'nurul.hidayah@gmail.com',   'phone' => '081234567818', 'address' => 'Jl. Sudirman No. 11, Banjarmasin'],
            ['name' => 'Rizki Ramadhan',    'email' => 'rizki.ramadhan@gmail.com',  'phone' => '081234567819', 'address' => 'Jl. Ahmad Yani No. 77, Palembang'],
            ['name' => 'Anisa Fitri',       'email' => 'anisa.fitri@gmail.com',     'phone' => '081234567820', 'address' => 'Jl. Kartini No. 40, Lampung'],
        ];

        foreach ($customersData as $cust) {
            Customer::create($cust);
        }

        // ========================================
        // 6. ORDERS + ORDER ITEMS
        // ========================================
        $products = Product::all();
        $customers = Customer::all();

        $customers->each(function ($customer) use ($products) {
            for ($i = 0; $i < rand(2, 4); $i++) {
                $order = Order::create([
                    'customer_id'      => $customer->id,
                    'order_number'     => 'ORD-' . date('Ymd') . '-' . strtoupper(Str::random(6)),
                    'total_price'      => 0,
                    'status'           => collect(['pending', 'paid', 'shipped', 'completed', 'cancelled'])->random(),
                    'shipping_address' => $customer->address,
                    'ordered_at'       => now()->subDays(rand(1, 90)),
                ]);

                $total = 0;
                foreach ($products->random(rand(1, 4)) as $product) {
                    $qty = rand(1, 3);
                    $subtotal = $product->price * $qty;
                    $total += $subtotal;

                    OrderItem::create([
                        'order_id'   => $order->id,
                        'product_id' => $product->id,
                        'quantity'   => $qty,
                        'price'      => $product->price,
                        'subtotal'   => $subtotal,
                    ]);
                }

                $order->update(['total_price' => $total]);
            }
        });

        $this->command->info('✅ Seeder selesai!');
        $this->command->info('   Total: ' . Product::count() . ' produk, ' . Customer::count() . ' customer, ' . Order::count() . ' order');
        $this->command->info('');
        $this->command->info('   Admin: admin@example.com / password');
        $this->command->info('   Editor: editor@example.com / password');
        $this->command->info('   User: user@example.com / password');
    }
}