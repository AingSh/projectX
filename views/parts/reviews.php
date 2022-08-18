<?php $reviews = $data['reviews']['reviews']; ?>
    <section id="reviews">
        <div class="container container-reviews">
            <div class="row title-row section-gap ">
                <h1 class="mb-10"><?=$data['reviews']['title'] ?></h1>
                <p><?= $data['reviews']['description'] ?></p>
            </div>

            <div class="row">
                <?php foreach ( $reviews as  $kek): ?>
                <div class="col-lg-6 col-md-6 single-review">
                    <img src="<?= IMAGES_URI . $kek['logo']  ?>" alt="">
                    <div class="title d-flex flex-row">
                        <h4><?= $kek['company'] ?></h4>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star "></span>
                            <span class="fa fa-star "></span>
                        </div>
                    </div>

                    <p><?= $kek['text'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>


        </div>
    </section>

