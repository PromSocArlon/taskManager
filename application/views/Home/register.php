
<div class="backgroundColor">
    <form method="POST" action="?controller=home&action=check">
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" name = "mail" placeholder="Enter mail">
            <small >We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Team</label>
            <input type="text" name="team" placeholder="de 1 a 5"  >
        </div>
        <div class="form-group">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" placeholder="login"  />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  placeholder="Password">
            <input type="password" name="password1" placeholder="Confirm Password">
        </div>
</div>
<div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3">
        I agree
    </label>
</div>
<button type="submit"  class="btn btn-primary">register</button>
</form>
</div>
