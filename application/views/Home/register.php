<?php   include(__DIR__ . '\..\_shared\header.php');?>
<div class="backgroundColor">
    <form method="POST" action="?controller=member&action=save">
        <div class="form-group">
            <label for="InputEmail1" >Email address</label>
            <input type="email" name = "mail" placeholder="Enter mail" required>
            <small >We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Team</label>
            <input type="text" name="team" placeholder="de 1 a 5"  required pattern="[1-5]{1}">
        </div>
        <div class="form-group">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" placeholder="login" required pattern= "[A-z0-9]{8,16}"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  placeholder="Password" required pattern= "[A-z0-9]{8,16}">
            <input type="password" name="password1" placeholder="Confirm Password" required pattern= "[A-z0-9]{8,16}" >
        </div>
</div>
<div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" required>
        I agree
    </label>
</div>
<button type="submit"  class="btn btn-primary">register</button>
</form>
</div>
