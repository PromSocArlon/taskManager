<?php
//include(__DIR__ . '\..\_shared\header.php');
?>

<div class="backgroundColor">
    <form method="POST" action="?controller=member&action=update&id=<?php echo $data['id'] ?>">
        <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input type="email" name = "mail"  value="<?php echo $data['mail'] ?>  " required >
            <small >We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label>Team</label>
            <input type="text" name="team"  value = "<?php echo $data['team']?>" required >
        </div>
        <div class="form-group">
            <label for="login">Login :</label>
            <input type="text" name="login" id="login" value="<?php echo $data['login']?>" required >
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password"  placeholder="Password" required >
            <input type="password" name="password1" placeholder="Confirm Password" required>
        </div>
</div>
<div class="form-check disabled">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" required>
        I agree
    </label>
</div>
<button type="submit"  class="btn btn-primary">update</button>
</form>
</div>