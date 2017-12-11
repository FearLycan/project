<?php
$this->title = 'Rejestracja';
?>

<section class="slice-lg has-bg-cover bg-size-cover"
         style="background-image: url(../images/login/login-image-02.jpg); background-position: bottom center;">
    <div class="container">
        <div class="row justify-content-center cols-xs-space">
            <div class="col-lg-6">
                <div class="form-card form-card--style-2 z-depth-2-top">
                    <div class="form-header text-center">
                        <div class="form-header-icon">
                            <i class="icon ion-log-in"></i>
                        </div>
                    </div>
                    <div class="form-body">

                        <div class="text-center px-2">
                            <h4 class="heading heading-4 strong-400 mb-4">Utwórz swoje konto</h4>
                        </div>

                        <form class="form-default mt-4" data-toggle="validator" role="form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Pseudonim</label>
                                        <input type="text" class="form-control form-control-lg">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" class="form-control form-control-lg">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label">Confirm Password</label>
                                        <input type="password" class="form-control form-control-lg">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-1 ">
                                <small>
                                    <a href="#">By clicking "Sign up" you agree to our terms and conditions</a>
                                </small>
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-styled  btn-base-1 mt-4">
                                    Zarejestruj się
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
