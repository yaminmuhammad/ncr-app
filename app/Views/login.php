<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="<?= base_url() ?>assets/images/logo.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form>

                        <!-- Email input -->
                        <div class="input-field" style="padding-bottom: 30px;">
                            <i class='bx bx-user'></i>
                            <input type="email" id="email" class="input" placeholder="Masukkan Email" />
                        </div>

                        <!-- Password input -->
                        <div class="input-field" style="padding-bottom: 30px;">
                            <i class='bx bx-lock-alt'></i>
                            <input type="password" id="password" class="input" placeholder="Password" />
                        </div>

                        <!-- Submit button -->
                        <div class="input-field" style="margin-left: 30px;">
                            <input type="submit" class="submit" />
                        </div>

                        <div class="two-col">
                            <div class="one">
                                <input type="checkbox" name="" id="check">
                                <label for="check"> Remember Me</label>
                            </div>
                            <div class="two">
                                <label><a href="#">Forgot password?</a></label>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection() ?>