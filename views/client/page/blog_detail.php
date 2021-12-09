<style>
    .detail_blog {
        margin: 0 auto;
        padding: 25px;
        width: 50%;
    }

    .blog_title {
        font-size: 38px;
        line-height: 56px;
        margin-bottom: 20px;
        font-weight: 600;
    }

    .info_auth,
    .short_descrition {
        border-bottom: 1px solid #ccc;
    }

    .short_descrition {
        font-size: 18px;
        line-height: 33px;
    }
</style>
<main class="l-main">
    <div class="l-pd">
        <div class="l-pd-header">
            <div class="g-container">
                <div class="row">
                    <ol class="breadcrumb bg-transparent breadcrumb-margin">
                        <li class="breadcrumb-item "><a href="<?= app_url() ?>" title="Trang chủ">Trang chủ</a></li>
                        <li class="breadcrumb-item "><a href="<?= app_url('tin-tuc') ?>" title="TIN TỨC">Tin tức</a></li>
                        <li class="breadcrumb-item active"><a href="<?= app_url('tin-tuc/' . $blogs['blog_slug']) ?>" class="text-capitalize"></a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="detail_blog container">
            <input type="hidden" name="blog_slug">
            <input type="hidden" name="blog_id">
            <div class="blog_title">
                <h1 class=""><?= $blog_by_slug['blog_title'] ?></h1>
            </div>
            <div class="info_auth d-flex p-3">
                <?php if ($blog_by_slug['avatar'] == null) : ?>
                    <i class="material-icons">person</i>&nbsp;
                <?php else : ?>
                    <a href=""><img src="<?= asset('uploads/avatars' . $blog_by_slug['avatar']) ?>" alt="author image"></a> &nbsp;
                <?php endif ?>
                <p><?= $blog_by_slug['created_at'] ?></p>
            </div>
            <div class="short_descrition">
                <h5 class="mt-5 mb-5"><?= $blog_by_slug['short_descrition'] ?></>
            </div>
            <div class="blog_content mt-5">
                <p><?= $blog_by_slug['blog_content'] ?></p>
            </div>
        </div>
    </div>
</main>