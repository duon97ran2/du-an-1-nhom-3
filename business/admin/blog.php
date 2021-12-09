<?php
//load all blog item
function blog_index()
{
    $sql = "SELECT * FROM blogs B 
                LEFT JOIN users U ON B.user_id = U.user_id
                WHERE blog_status = 1";
    $blogs = executeQuery($sql, true);
    admin_render('blog/list.php', [
        'page_title' => 'Danh sách bài viết',
        'blogs' => $blogs,
    ],
    [
        'customize/js/commons.js',
        'customize/js/banner&comment/script.js'
    ]
    );
}

//delete
function deleteBlog()
{
    $blog_id = $_GET['blog_id'];
    $sql = "DELETE FROM blogs WHERE blog_id = $blog_id";
    executeQuery($sql, true);
    set_session('message', 'xoa  thành công');
    redirect('cp-admin/bai-viet');
}
// add
function add_blog()
{
    admin_render(
        'blog/add.php',
        [
            'page_title' => 'thêm mới bài viết',
        ],
        [
            'customize/js/commons.js',
            'customize/js/blogs/scripts.js'
        ],
    );
}

function save_add_blog()
{
    $error = [];
    $blog_title = input_post('blog_title');
    $blog_slug = input_post('blog_slug');
    $blog_image = input_file('blog_image');
    $short_descrition = input_post('short_descrition');
    $blog_content = input_post('blog_content');
    $blog_url = input_post('blog_url');
    $user_id = auth_info()['user_id'];
    $blog_status = input_post('blog_status');
    $created_at = date('Y-m-d');
    if (empty($errors)) {
        $blog_image = upload_image($blog_image, 'blog');

        $sql = "INSERT INTO blogs(blog_title,blog_slug,blog_image,short_descrition,blog_content,blog_url,blog_status,user_id,created_at)
                VALUES('$blog_title','$blog_slug','$blog_image','$short_descrition','$blog_content','$blog_url','$blog_status','$user_id','$created_at')";
        executeQuery($sql, true);
        set_session('message', 'thêm thành công');
        redirect('cp-admin/bai-viet');
    }
}

//update
function blog_detail()
{
    $blog_id = $_GET['blog_id'];
    $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
    $detail = executeQuery($sql, false);
    admin_render('blog/detail.php', [
        'page_title' => 'Chi tiết bài viết',
        'detail' => $detail,
    ],
    [
        'customize/js/commons.js',
        'customize/js/blogs/scripts.js'
    ],
    );
}
function update_handle()
{
    $error = [];
    $blog_id = input_post('blog_id');
    $blog_title = input_post('blog_title');
    $blog_slug = input_post('blog_slug');
    $blog_image = input_file('blog_image');
    $short_descrition = input_post('short_descrition');
    $blog_content = input_post('blog_content');
    $blog_url = input_post('blog_url');
    $blog_status = input_post('blog_status');
    $user_id = auth_info()['user_id'];
    $updated_at = date("Y-m-d");
    if (empty($error)) {
        if (empty($blog_image['name'])) {
            $blog_image = input_post('blog_image_old');
        } else {
            $blog_image = upload_image($blog_image, 'blog');
        }
    }
    $sql = "UPDATE blogs
                SET blog_title ='$blog_title',
                    blog_slug = '$blog_slug',
                    blog_image='$blog_image',
                    short_descrition='$short_descrition',
                    blog_content ='$blog_content',
                    short_descrition='$short_descrition',
                    blog_url ='$blog_url',
                    blog_status='$blog_status',
                    user_id= '$user_id',
                    updated_at = '$updated_at'
                WHERE blog_id = $blog_id";
    executeQuery($sql, true);
    set_session('message', 'sửa thành công');
    redirect(
        'cp-admin/bai-viet',
        [],
        [
            'customize/js/commons.js',
            'customize/js/blogs/scripts.js'
        ],
    );
}
/*________________________________cilent_________________________________________ */
function get_all_blog()
{
    $sql = "SELECT * FROM blogs 
            WHERE blog_status = 1";
    $blogs = executeQuery($sql, true);

    client_render('page/blog', [
        'page_title' => 'Trang tin tức',
        'blogs' => $blogs,
    ]);
}

function get_blog_by_slug()
{
    $blog_slug = input_get('slug');
    $sql = "SELECT *
            FROM blogs B JOIN users U ON B.user_id = U.user_id
            WHERE blog_slug = '$blog_slug' AND blog_status = 1 ";
    $blog_by_slug = executeQuery($sql, false);
    client_render('page/blog_detail', [
        'page_title' => 'Trang tin tức',
        'blog_by_slug' => $blog_by_slug,
    ]);
}
