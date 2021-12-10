<?php
function quantity_variant($value)
{
    $sql = "SELECT * FROM products WHERE is_variant = " . $value;
    return executeQuery($sql, true);
}

function count_order_by_cate($value)
{
    $sql_count = "SELECT O.*
    FROM categories C JOIN  products P 
    ON C.category_id = P.category_id
    JOIN order_items O ON P.product_id = O.product_id where C.category_id = $value";
    return executeQuery($sql_count, true);
}

function dashboard_info()
{
    $listDays = [];

    for ($i = 0; $i < 7; $i++) {
        $date = new DateTime('-' . $i . ' days');
        $dateFormat = $date->format('Y-m-d');
        $listDays[] = $dateFormat;
    }
    //
    $listMoney = [];
    foreach ($listDays as $d) {
        $getTotalPriceByDateQuery = "SELECT * FROM orders O join order_items Oi
                                    on O.order_id = Oi.order_id
                                    where O.order_status=2 AND O.order_date BETWEEN '$d 0:0:0' AND '$d 23:59:59'";

        $totalPrice = executeQuery($getTotalPriceByDateQuery, true);
        $totalMoneyByDay = 0;
        foreach ($totalPrice as $tp) {
            $totalMoneyByDay += $tp['total_price'];
        }
        $listMoney[] = $totalMoneyByDay;
    }
    $sql = "SELECT distinct(is_variant) FROM products";
    $is_variant = executeQuery($sql, true);
    $sql_getAllCate = "SELECT * FROM categories";
    $count_cate =  executeQuery($sql_getAllCate, true);


    admin_render(
        "dashboard.php",[
            'page_title' => 'Thống Kê',
            'is_variant' => $is_variant,
            'count_cate' => $count_cate,
            'listDays' => $listDays,
            'listMoney' => $listMoney,
        ],
        [
            'customize/js/dashboard.js'
        ]
    );
}
