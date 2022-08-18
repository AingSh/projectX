<?php
$footer = dbSelect(Tables::Content, conditions: 'name = "footer"');
$footer = convertContentToAssoc($footer)['footer'];
?>
<footer class="footer-area section-gap footer">
    <div class="container">
        <div class="row footer-row"">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget footer-copyright-name">
                    <h6><?= $footer['title'] ?></h6>
                    <p><?= $footer['description'] ?></p>
                    <p class="footer-text"><?= $footer['copyright'] ?></p>
                </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Newsletter</h6>
                    <p>Stay update with our latest</p>
                    <div class="" id="mc_embed_signup">
                        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                            <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                            <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            <div style="position: absolute; left: -5000px;">
                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                            </div>

                            <div class="info pt-20"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget ">
                <div class="single-footer-widget footer-icons">
                    <h6>Follow Us</h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center footer-icons-row">
                        <?= showSocials($footer['socials']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php require_once PARTS_DIR . '/modals/product.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="<?= ASSETS_URI ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URI ?>/js/main.js"></script>
</body>
</html>