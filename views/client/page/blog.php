<style>
  .blog__container {
    margin: 20px 0px;
    flex-wrap: wrap;
  }

  .blog__box {
    width: 350px;
    background-color: #ffff;
    border: 1px solid #ececec;
    margin: 20px;
  }

  .blog-img {
    width: 100%;
    height: auto;
  }

  .blog-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
  }

  time {
    color: #9b9b9b;
    font-size: 1rem;
  }

  .blog-text {
    padding: 30px;
  }

  .blog-text .blog-title {
    font-size: 2rem;
    font-weight: 500;
    color: #272727;
    text-transform: capitalize;
  }

  .blog-text .blog-title:hover {
    color: #f33cf3;
    transition: all ease 0.3;
  }

  .short-description {
    color: #9b9b9b;
    font-size: 1.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 20px 0px;
  }

  .readmore {
    color: #0f0f0f;
  }

  .readmore:hover {
    color: #f33cf3;
    transition: 0.3 all ease;

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
          </ol>
        </div>
      </div>
    </div>

    <div id="blog" class="container">
      <div class="blog__container d-flex justify-content-center align-align-items-center">
        <?php foreach ($blogs as $b) : ?>
          <div class="blog__box">
            <div class="blog-img">
              <a href="<?= app_url('bai-viet/' . $b['blog_slug']) ?>"><img src="<?= asset('uploads/' . $b['blog_image']) ?>" alt="blog image"></a>
            </div>
            <div class="blog-text d-flex flex-column">
              <time><?= $b['created_at'] ?></time>
              <a href="<?= app_url('bai-viet/' . $b['blog_slug']) ?>" class="blog-title"><?= $b['blog_title'] ?></a>
              <p class="short-description"><?= $b['short_descrition'] ?></p>
              <a href="<?= app_url('bai-viet/' . $b['blog_slug']) ?>" class="readmore">Read more</a>
            </div>
          </div>
        <?php endforeach ?>

      </div>

    </div>