<style>
  .bia_blog{
    width: 400px;
  }
  .content_blog{
    margin:3px 0px;
  }
  .blog_title{
    font-size: 25px;
    text-transform: uppercase;
  }
  
</style>
<div class="container mt-5">
  <?php foreach ($blogs as $b) : ?>
    <div class="">
      <div class="">
        <img src="<?= asset('uploads/') . $b['blog_image'] ?>" alt="Norway" class="bia_blog">
        <div class="content_blog">
          <a href="#" class="text-danger blog_title"><?= $b['blog_title'] ?></a> <hr>
          <p><?= $b['short_descrition'] ?></p>
          <p><?= $b['blog_content'] ?></p>
        </div>
      </div>
    </div>
  <?php endforeach ?>