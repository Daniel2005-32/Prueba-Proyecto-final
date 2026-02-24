<?php

namespace App\Data;

class ProductData
{
    public static function getAll(): array
    {
        return [
            // Consolas
            'ps5' => [
                'name' => 'PlayStation 5',
                'slug' => 'ps5',
                'description' => 'La consola de nueva generación con gráficos 4K y SSD ultrarrápido',
                'price' => 499.99,
                'image' => 'https://images.unsplash.com/photo-1644571580646-7048372c491a?w=500',
                'category' => 'Consolas',
                'category_slug' => 'consolas',
                'stock' => 10,
                'featured' => true,
                'trending' => true
            ],
            'switch-oled' => [
                'name' => 'Nintendo Switch OLED',
                'slug' => 'switch-oled',
                'description' => 'La consola híbrida con pantalla OLED de 7 pulgadas',
                'price' => 349.99,
                'image' => 'https://images.unsplash.com/photo-1676261233849-0755de764396?w=500',
                'category' => 'Consolas',
                'category_slug' => 'consolas',
                'stock' => 5,
                'featured' => true,
                'trending' => false
            ],
            'xbox-series-x' => [
                'name' => 'Xbox Series X',
                'slug' => 'xbox-series-x',
                'description' => 'La consola más potente de Microsoft con 12 teraflops',
                'price' => 499.99,
                'image' => 'https://images.unsplash.com/photo-1621259182978-fbf931c6f07c?w=500',
                'category' => 'Consolas',
                'category_slug' => 'consolas',
                'stock' => 3,
                'featured' => false,
                'trending' => true
            ],

            // Accesorios
            'auriculares-rgb' => [
                'name' => 'Auriculares Gaming RGB',
                'slug' => 'auriculares-rgb',
                'description' => 'Sonido surround 7.1 con micrófono retráctil y iluminación RGB',
                'price' => 89.99,
                'image' => 'https://images.unsplash.com/photo-1640823127518-65e1ad563576?w=500',
                'category' => 'Accesorios',
                'category_slug' => 'accesorios',
                'stock' => 15,
                'featured' => true,
                'trending' => false
            ],
            'teclado-mecanico' => [
                'name' => 'Teclado Mecánico RGB',
                'slug' => 'teclado-mecanico',
                'description' => 'Switches mecánicos blue con retroiluminación RGB personalizable',
                'price' => 119.99,
                'image' => 'https://images.unsplash.com/photo-1645802106095-765b7e86f5bb?w=500',
                'category' => 'Accesorios',
                'category_slug' => 'accesorios',
                'stock' => 8,
                'featured' => true,
                'trending' => true
            ],
            'mouse-gaming' => [
                'name' => 'Mouse Gaming RGB',
                'slug' => 'mouse-gaming',
                'description' => 'Sensor óptico de 16000 DPI con 8 botones programables',
                'price' => 59.99,
                'image' => 'https://images.unsplash.com/photo-1606811841689-23dfdcebcb89?w=500',
                'category' => 'Accesorios',
                'category_slug' => 'accesorios',
                'stock' => 12,
                'featured' => false,
                'trending' => false
            ],

            // Figuras
            'figura-goku' => [
                'name' => 'Figura Goku Ultra Instinct',
                'slug' => 'figura-goku',
                'description' => 'Figura de colección de 30cm con base incluida',
                'price' => 45.99,
                'image' => 'https://images.unsplash.com/photo-1765633358966-45a72a11fdaa?w=500',
                'category' => 'Figuras',
                'category_slug' => 'figuras',
                'stock' => 4,
                'featured' => false,
                'trending' => true
            ],
            'figura-naruto' => [
                'name' => 'Figura Naruto Sage Mode',
                'slug' => 'figura-naruto',
                'description' => 'Figura articulada de 25cm con accesorios',
                'price' => 39.99,
                'image' => 'https://images.unsplash.com/photo-1613376023733-0a44915a269c?w=500',
                'category' => 'Figuras',
                'category_slug' => 'figuras',
                'stock' => 6,
                'featured' => true,
                'trending' => false
            ],

            // Manga
            'one-piece-box' => [
                'name' => 'Manga One Piece Box Set',
                'slug' => 'one-piece-box',
                'description' => 'Colección completa tomos 1-23 con estuche especial',
                'price' => 189.99,
                'image' => 'https://images.unsplash.com/photo-1760113426097-a4076e96a63d?w=500',
                'category' => 'Manga',
                'category_slug' => 'manga',
                'stock' => 2,
                'featured' => true,
                'trending' => true
            ],
            'naruto-box' => [
                'name' => 'Manga Naruto Box Set',
                'slug' => 'naruto-box',
                'description' => 'Colección completa tomos 1-27',
                'price' => 199.99,
                'image' => 'https://images.unsplash.com/photo-1535311584861-8645c64edc40?w=500',
                'category' => 'Manga',
                'category_slug' => 'manga',
                'stock' => 3,
                'featured' => false,
                'trending' => false
            ]
        ];
    }

    public static function getByCategory($categorySlug): array
    {
        $all = self::getAll();
        return array_filter($all, function($product) use ($categorySlug) {
            return $product['category_slug'] === $categorySlug;
        });
    }

    public static function getCategories(): array
    {
        $all = self::getAll();
        $categories = [];
        foreach ($all as $product) {
            $categories[$product['category_slug']] = [
                'name' => $product['category'],
                'slug' => $product['category_slug'],
                'count' => isset($categories[$product['category_slug']]) ? 
                          $categories[$product['category_slug']]['count'] + 1 : 1
            ];
        }
        return $categories;
    }

    public static function getFeatured(): array
    {
        $all = self::getAll();
        return array_filter($all, function($product) {
            return $product['featured'] ?? false;
        });
    }

    public static function getTrending(): array
    {
        $all = self::getAll();
        return array_filter($all, function($product) {
            return $product['trending'] ?? false;
        });
    }

    public static function find($slug): ?array
    {
        $all = self::getAll();
        return $all[$slug] ?? null;
    }
}
