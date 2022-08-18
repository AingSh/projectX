<?php $gallery = $data['gallery']['gallery'];?>

<section id="gallery" class="section-gap">
    <div class="container">
        <div class="row title-row section-gap ">
            <?php if (!empty($data['gallery'])): ?>
                <h1 class="mb-10"><?= $data['gallery']['title'] ?></h1>
            <?php endif; ?>
            <p><?= $data['gallery']['description'] ?? '' ?></p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php foreach($gallery['left'] as $img): ?>
                    <img src="<?= IMAGES_URI . $img ?>" class="gallery-img" alt="">
                <?php endforeach; ?>
            </div>
            <div class="col-md-8">
                <img src="<?= IMAGES_URI . $gallery['right']['top'] ?>" class="gallery-img" alt="">
                <div class="row">
                    <?php foreach ($gallery['right']['bottom'] as $img): ?>
                        <div class="col-6">
                            <img src="<?= IMAGES_URI . $img ?>" class="gallery-img" alt="">
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

