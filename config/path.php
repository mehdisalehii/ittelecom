<?php

return [
    "url" => [
        "login" => '/login', // admin/login
        "register" => '/register', // admin/register
        "archive" => [
            "post" => 'blog',  // articles
            "product" => 'shop',  // products
            "topic" => 'forum',  // topics
        ],
        "single" => [
            "post" => 'blog', /// /blog  // article
            "product" => 'shop',  // product
            "topic" => 'forum',  // topic
        ],
        "category" => [
            "post" => 'category/article',  // articles/category
            "product" => 'products/cat',  // products/category
            "topic" => '',  // topics/category
        ],
        "tag" => [
            "post" => '',  // articles/tag
            "product" => '',  // products/tag
            "topic" => '',  // topics/tag
        ],
        "author" => [
            "profile" => 'author/profile',  // author/profile
        ]
    ],
    "assets" => [
        "css" => '/assets/css',
        "js" => '/assets/js',
        "icons" => '/icons',
        "background" => '/assets/background'
    ],    
    "dists" => [
        "logo" => 'assets/logo', 
        "menu" => 'assets/menu'  
    ],    
    "watermark" => [
        "product" => 'dists/watermark/product.png',  
        "post" => 'dists/watermark/post.png'
    ],    
    "lazy" => [
        "gallary" => '/images/assets/lazy/gallary.jpg',
        "load" => '/assets/lazy/load.jpg',
        "post" => '/assets/lazy/post.jpg'
    ],
    "picture" => [
        "post" => 'uploads/picture/post', /// for file exsit
        "product" => 'uploads/picture/product'
    ],
    "bill" => [
        "logo" => 'dists/bill/logo',
        "watermark" => 'dists/bill/watermark',
        "stamp" => 'dists/bill/stamp', 
        "background" => 'dists/background',
        "icons" => 'dists/icons'
    ],
    "invoice" => [
        "logo" => 'dists/invoice/logo',
        "watermark" => 'dists/invoice/watermark',
        "stamp" => 'dists/invoice/stamp', 
        "background" => 'dists/background',
        "icons" => 'dists/icons'
    ],
    "datasheet" => [
        "watermark" => 'dists/datasheet/watermark'
    ],
    "letter" => [
        "watermark" => 'dists/letter/watermark'
    ],
    "images" => [
        "post" => '/images/uploads/picture/post',
        "product" => '/images/uploads/picture/product',
        "forum" => '/images/uploads/picture/forum',
        "profile" => '/images/uploads/picture/profile',
        "slideshow" => '/images/uploads/picture/slideshow',
    ],
    "download" => [
        "pdf" => '/dl/catalog',
        "zip" => '/dl/zip',
    ]
];