<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="username">Enter your phone:</label>
                        <input type="text" id="username" name="username" pattern="^\+(\d{1,4})\s?\(?\d+\)?[\s\-]?\d+[\s\-]?\d+[\s\-]?\d+$" title="Phone number(e.g., +1 555-555-5555)" value="+250" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Enter your password:</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required class="form-control">
                    </div>

                    <button type="submit" name="userlogin" class="btn btn-primary btn-block">LOGIN</button>
                </form>

                <p class="mt-3">If you don't have an account <a href="#" data-toggle="modal" data-target="#signupmodal"><u>Signup</u></a></p>
            </div>
            <a href="userforgotpasswordpage.php">Forgot password?</a>
        </div>
    </div>
</div>

<?php include 'phpincludes/userlogin.php'; ?>