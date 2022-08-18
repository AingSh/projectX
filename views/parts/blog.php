<?php $blog = $data['blog']['blog']; ?>

<section id="blog">
  <div class="container">
    <div class="row title-row section-gap ">
      <h1 class="mb-10"><?=$data['blog']['title'] ?></h1>
      <p><?=$data['blog']['description']?></p>
    </div>
    <div class="row">
        <?php foreach ( $blog as  $lol): ?>
     <div class="col-6 blog">
         <img src="<?= IMAGES_URI . $lol['foto']  ?>" alt="">
      <div class="btn-blog">
      <a href="" class="btn btn-outline-primary text-uppercase ">Travel</a>
      <a href="" class="btn btn-outline-primary text-uppercase">Life Style</a>
    </div>
      <h3><?=$lol['title'] ?></h3>
      <p><?=$lol['text'] ?></p>
         <h6><?=$lol['date'] ?></h6>
     </div>
        <?php endforeach; ?>
    </div>
</div>
</section>