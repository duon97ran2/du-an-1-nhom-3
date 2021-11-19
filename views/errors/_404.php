<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ô! Lạc mất rồi...</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        /*======================
            404 page
        =======================*/

        .page_404 {
            display:flex;
            align-items: center;
            height: 100vh;
            padding: 40px 0;
            background: #fff;
            font-family: Arial, sans-serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
        }

        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }
        .contant_box_404 {
            margin-top: -50px;
        }

    </style>
</head>
    <body>
    <section class="page_404">
    <div class="container">
        <div class="row">
        <div class="col-sm-12 ">
            <div class="col-sm-10 col-sm-offset-1  text-center">
            <div class="four_zero_four_bg">
            </div>

            <div class="contant_box_404">
                <h3 class="h2">
                    Ô! Lạc mất rồi...
                </h3>

                <p>Liên kết bạn tìm kiếm có vẻ không hoạt động...</p>

                <a href="<?= app_url() ?>" class="link_404">Về trang chủ</a>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
</body>
</html>