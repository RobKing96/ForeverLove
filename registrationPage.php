<!DOCTYPE html>
<head>
    <?php
    require_once 'core/init.php';
    include("includes/metatags.html");
    include("includes/fonts.html");

    if(isset($_POST['continue_button']) && !($errors = UserServiceMgr::registerUpdateAccount($_POST))){
        header('Location: registerAccountTypePage.php?reg=first');
        die();
    }
    ?>

    <title>Registration Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom-base-page.css" rel="stylesheet">
    <link href="css/custom-form-page.css" rel="stylesheet">
    <script src="bootstrap_js/jquery.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="scripts/registrationValidation.js"></script>

</head>

<body class="full">
<?php include("includes/navbarNotLoggedIn.html"); ?>

<!--Main page content-->

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <br><br>
                <hr class="tagline-divider">
                <h2>
                    <small>
                        <strong>Complete Registration</strong>
                    </small>
                </h2>
                <hr class="tagline-divider">
                <p><br>

                <form id="reg_form" class="form-horizontal" role="form" method="post">
                    <fieldset>
                        <div class="form-group" id="email_group">
                            <label for="email" class="col-md-4 col-sm-5 control-label"><b>Email</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" maxlength="128" value="<?php echo Input::get('email');?>">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['email'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['email'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Invalid format, e.g. kevin@example.com</span>
                                <span class="<?php if($errors['email'] == 'error_unique') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_unique">Email address is already registered...</span>
                            </div>
                        </div>

                        <div class="form-group" id="confirm_email_group">
                            <label for="confirm_email" class="col-md-4 col-sm-5 control-label"><b>Confirm Email</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="email" class="form-control" id="confirm_email" name="confirm_email" maxlength="128" value="">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['confirm_email'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['confirm_email'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Email addresses do not match...</span>
                            </div>
                        </div>

                        <div class="form-group" id="username_group">
                            <label for="username" class="col-md-4 col-sm-5 control-label"><b>Username</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="text" class="form-control" id="username" name="username" maxlength="32" value="<?php echo Input::get('username');?>">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['username'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['username'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Invalid username, 3 - 32 characters(a-zA-Z0-9_-) only...</span>
                                <span class="<?php if($errors['username'] == 'error_unique') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_unique">Username already in use...</span>
                            </div>
                        </div>

                        <div class="form-group" id="first_name_group">
                            <label for="first_name" class="col-md-4 col-sm-5 control-label"><b>First Name</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="text" class="form-control" id="first_name" name="first_name" maxlength="32" value="<?php echo Input::get('first_name');?>" autocomplete="on">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['first_name'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['first_name'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Invalid format, 2 - 32 characters(a-zA-Z) only...</span>
                            </div>
                        </div>

                        <div class="form-group" id="last_name_group">
                            <label for="last_name" class="col-md-4 col-sm-5 control-label"><b>Last Name</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="text" class="form-control" id="last_name" name="last_name" maxlength="32" value="<?php echo Input::get('last_name');?>" autocomplete="on">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['last_name'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['last_name'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Invalid format, 2 - 32 characters(a-zA-Z'-) only...</span>
                            </div>
                        </div>

                        <div class="form-group" id="password_group">
                            <label for="password" class="col-md-4 col-sm-5 control-label"><b>Password</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="password" class="form-control" maxlength="32" id="password" name="password" value="">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['password'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['password'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Invalid format, 6 - 32 characters(a-zA-Z0-9_-) only...</span>
                            </div>
                        </div>

                        <div class="form-group" id="confirm_password_group">
                            <label for="confirm_password" class="col-md-4 col-sm-5 control-label"><b>Confirm Password</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="password" class="form-control" maxlength="32" id="confirm_password" name="confirm_password" value="">
                            </div>
                            <div class="col-md-offset-4" id="errors">
                                <span class="<?php if($errors['confirm_password'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['confirm_password'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Passwords do not match...</span>
                            </div>
                        </div>

                        <div class="form-group" id="dob_group">
                            <label for="dob" class="col-md-4 col-sm-5 control-label"><b>Date Of Birth</b></label>
                            <div class="col-md-8 col-sm-7">
                                <input type="date" class="form-control" id="dob" name="dob" value="">
                            </div>
                            <div class="col-md-offset-4 col-sm-offset-5" id="errors">
                                <span class="<?php if($errors['dob'] == 'error_required') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_required">Required...</span>
                                <span class="<?php if($errors['dob'] == 'error_regex') : ?>error<?php else : ?>hide<?php endif; ?>" id="error_regex">Over 18's Only...<br></span>
                            </div>
                        </div>
                    </fieldset>
                    <br>
                    <a href="welcomePage.php" class="btn btn-info center-inline" role="button">Return</a>
                    <input class="btn btn-info center-inline" id="continue_button" name="continue_button" type="submit" value="Continue">
                </form>
                <br><br>
                <br><br>
                </p>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.html"); ?>
</body>

</html>
