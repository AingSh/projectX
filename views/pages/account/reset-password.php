<section id="account">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 d-flex align-item-center justify-content-center">
                <div class="card mt-5 mb-5 w-50" >
                    <div class="card-body">
                        <h5 class="card-title  text-center text-uppercase">New Password</h5>
                        <hr>
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="update_password" />
                            <div class="mb-3 d-flex flex-column">
                                <label for="old_password" class="form-label">Старый пароль</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" value="<?= $_SESSION['account']['fields']['old_password'] ?? null ?>">
                                <?= formError($_SESSION['account']['errors']['old_password'] ?? null ) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="password" class="form-label">Новый пароль</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $_SESSION['account']['fields']['password'] ?? null ?>">
                                <?= formError($_SESSION['account']['errors']['password'] ?? null ) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label" for="password_confirmation">Подтверди еще раз</label>
                                <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" value="<?= $_SESSION['account']['fields']['password_confirmation'] ?? null ?>" />
                                <?= formError($_SESSION['account']['errors']['password_confirmation'] ?? null ) ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">Create</button>
                            <a href="<?= DOMAIN ?>/login" class="btn btn-info btn-lg">Sign in</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
unset($_SESSION['account']);