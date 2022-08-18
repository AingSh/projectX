<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5 d-flex align-item-center justify-content-center">
                <div class="card mt-5 mb-5 w-50" >
                    <div class="card-body">
                        <h5 class="card-title  text-center text-uppercase">Create an account</h5>
                        <hr>
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="register" />
                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label" for="name" >Your Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Harry" value="<?= $_SESSION['register']['fields']['name'] ?? null ?>"/>
                            <?= formError($_SESSION['register']['errors']['name'] ?? null ) ?>
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label" for="surname">Your Surname</label>
                            <input type="text" id="surname" name="surname" class="form-control form-control-lg" placeholder="Jonson" value="<?= $_SESSION['register']['fields']['surname'] ?? null ?>" />
                            <?= formError($_SESSION['register']['errors']['surname'] ?? null ) ?>
                        </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Email@gmail.com" value="<?= $_SESSION['register']['fields']['email'] ?? null ?>" >
                                <?= formError($_SESSION['register']['errors']['email'] ?? null ) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $_SESSION['register']['fields']['password'] ?? null ?>">
                                <?= formError($_SESSION['register']['errors']['password'] ?? null ) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label" for="password_confirmation">Repeat your password</label>
                                <input type="password" id="password_confirmation" class="form-control form-control-lg" name="password_confirmation" value="<?= $_SESSION['register']['fields']['password_confirmation'] ?? null ?>" />
                                <?= formError($_SESSION['register']['errors']['password_confirmation'] ?? null ) ?>
                            </div>
                            <div class="mb-3 d-flex flex-column">
                                <label class="form-label" for="birthdate" >Birthdate</label>
                                <input type="date" id="birthdate" name="birthdate" class="form-control form-control-lg" max="<?= date("Y-m-d")?>" />
                                <?= formError($_SESSION['register']['errors']['birthdate'] ?? null ) ?>
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
