<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

class Post {
    public static function all(){
        return [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Artikel 1',
            'author' => 'Kemal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, veniam? Provident, minus! Libero eligendi minus asperiores dolorem saepe esse expedita.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Artikel 2',
            'author' => 'Kemal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia sed minus accusantium voluptas, quae sint.'
        ]
        ];
    }
}

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about', ['nama' => 'Kemal', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{id}', function($slug){
    $posts =
    [
        [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Kemal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, veniam? Provident, minus! Libero eligendi minus asperiores dolorem saepe esse expedita.'
        ],
        [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Kemal',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia sed minus accusantium voluptas, quae sint.'
        ]
    ];

    $post = Arr::first($posts, function ($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});


Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});