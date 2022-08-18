<?php
$navData = dbSelect(Tables::Content, conditions:  'name = "navigation"');
$navData = convertContentToAssoc($navData)['navigation'];
?>

<section id="navigation" >
        <div class="container">
            <div class="row align-items-center justify-content-between d-flex">
                <?php if (!empty($navData['logo'])): ?>
                <div id="logo">
                    <a href="">
                        <img src="<?= IMAGES_URI . $navData['logo'] ?>" alt="Лого">
                    </a>
                </div>
                <?php endif; ?>
                <?php if (!empty($navData['links'])): ?>
                    <div>
                    <nav class="nav">
                        <?php foreach ($navData['links'] as $link): ?>
                        <?php $href = $link['is_anchor'] ? $link['href'] : DOMAIN . '/' . $link['href']; ?>
                        <a class="nav-link" href="<?= $href ?>"><?= $link['text']?></a>
                        <?php endforeach; ?>
                        <?php if (isLogged()): ?>
                            <a class="nav-link disabled" href="">|</a>
                            <a class="nav-link" href="<?= DOMAIN . '/cart' ?>">
                                <i class="fa-brands fa-nutritionix"></i>
                                <?php  if (!empty($_SESSION['cart'])) : ?>
                                <span class="cart-quantity"><?= count($_SESSION['cart']) ?> </span>
                                <?php endif; ?>
                            </a>
                            <a class="nav-link" href="<?= DOMAIN . '/account' ?>"><i class="fa-solid fa-person-rifle"></i></a>
                            <a class="nav-link" href="<?= DOMAIN . '/logout' ?>"><i class="fa-solid fa-door-open"></i></a>
                        <?php else: ?>
                        <a class="nav-link" href="<?= DOMAIN . '/login' ?>">Login</a>
                        <?php endif; ?>
                    </nav>
                </div>
                <?php endif; ?>
            </div>
        </div>
</section>
