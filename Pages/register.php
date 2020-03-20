<?php require_once 'header.php' ?>
<section class="signup">
    <div class="container">
        <div class="signup-content">
            <div class="signup-form">
                <h2 class="form-title">Sign up</h2>
                <?php if (isset($errors[0])) { echo '<p style="color: red; margin-bottom: 5px;">' . $errors[0] . '</p>'; } ?>
                <?php if (isset($success[0])) { echo '<p style="color: green"; margin-bottom: 5px;">' . $success[0] . '</p>'; } ?>
                <form method="POST" class="register-form" id="register-form" action="/register">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" required placeholder="Your Name"
                               value="<?php if (isset($_POST['name']))  echo $_POST['name'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" required
                               value="<?php if (isset($_POST['email']))  echo $_POST['email'] ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" required class="agree-term"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                            statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="/Resourses/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="/login" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
<?php require_once 'footer.php' ?>