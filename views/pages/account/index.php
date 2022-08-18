
<section id="account" style="padding: 70px 0;">
    <div class="container">
        <div class="row">


            <div class="col-12 text-center">
                <h2>Твой Аккаунт</h2>
            </div>
        </div>
        <div class="row">
                <div class="col-2">
                    <a href="<?=DOMAIN . '/account/reset-password' ?>" class="btn btn-outline-info">Изменить пароль</a>
                </div>
            <div class="col-8">
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="update_account">
                    <div class="mb-3 d-flex flex-column">
                        <label class="form-label" for="name" >Your Name</label>
                        <input type="text"
                               id="name"
                               name="name"
                               class="form-control form-control-lg"
                               placeholder="Harry"
                               value="<?= $_SESSION['account']['fields']['name'] ?? $user['name'] ?>"/>
                        <?= formError($_SESSION['account']['errors']['name'] ?? null ) ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label class="form-label" for="surname">Your Surname</label>
                        <input type="text" id="surname" name="surname" class="form-control form-control-lg" placeholder="Jonson" value="<?= $_SESSION['register']['fields']['surname'] ??  $user['surname'] ?>" />
                        <?= formError($_SESSION['account']['errors']['surname'] ?? null ) ?>
                    </div>
                    <div class="mb-3 d-flex flex-column">
                        <label class="form-label" for="birthdate" >Birthdate</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" max="<?= date("Y-m-d")?>" value="<?= $_SESSION['register']['fields']['birthdate'] ??  $user['birthdate'] ?>" />
                        <?= formError($_SESSION['account']['errors']['birthdate'] ?? null ) ?>
                    </div>
                    <button type="submit" class="btn btn-outline-success">
                        Обновить
                    </button>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>

<?php
unset($_SESSION['account']);