<?php

function product_details() {
    view_no_layout('product-details', [
        'slug' => input_get('slug')
    ]);
}