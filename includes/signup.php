<!-- modal for signup form -->
<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupmodalLabel">ipDiscuss Signup form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- signup form -->
                <form action="includes/signup_check.php" method='post'>
                <div class="form-group">
                        <label for="username">username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" validate required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="cpassword" required
                            aria-discribedby="passhelp">
                        <small class="text-muted form-text" id="passhelp">Password should be match.</small>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="submit" name="signup" class="btn btn-success">Signup</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>