<?php

function category_page() {
    $slug = input_get('slug');
    $data = [
        [
            'slug' => 'dien-thoai',
            'name' => 'Điện thoại'
        ],
        [
            'slug' => 'phu-kien',
            'name' => 'Phụ kiện'
        ]
    ];
    $category_name = '';
    $category_slug = '';
    foreach ($data as $item) {
        if ($item['slug'] == $slug) {
            $category_name = $item['name'];
            $category_slug = $item['slug'];
        }
    }
    client_render('page/category', [
        'page_title' => 'Danh mục',
        'cate_name' => empty($slug) ? 'Toàn bộ sản phẩm' : $category_name,
        'slug' => empty($slug) ? '' : '/'.$category_slug
    ]);
}