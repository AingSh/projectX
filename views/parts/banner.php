<?php if (!empty($data['banner'])): ?>
    <?php $banner = $data['banner']; ?>
    <section id="home">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide row d-flex align-items-center justify-content-start"
                 data-bs-ride="true">
                <div class="carousel-indicators">
                    <?php for($i = 0; $i < count($banner['carousel']); $i++): ?>
                        <button type="button"
                                data-bs-target="#carouselExampleIndicators"
                                data-bs-slide-to="<?= $i ?>"
                                class="<?= ($i === 0 ? 'active' : '') ?>"
                                aria-current="true"
                                aria-label="Slide <?= ($i + 1) ?>"
                        ></button>
                    <?php endfor; ?>
                </div>
                <div class="carousel-inner banner-content">
                    <?php foreach ($banner['carousel'] as $key => $slide) : ?>
                        <div class="carousel-item col-7 active <?= ($key === 0 ? 'active' : '') ?>">
                            <h6><?= $slide['title'] ?></h6>
                            <h1><?= $slide['description'] ?></h1>
                            <a href="<?= $slide['btn']['is_anchor']  ? $slide['btn']['href'] : DOMAIN . '/' . $slide['btn']['href'] ?>"
                               class="btn btn-outline-primary text-uppercase"><?= $slide['btn']['text'] ?></a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
<?php endif; ?>
