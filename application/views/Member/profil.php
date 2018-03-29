<?php
    $member = $data['member'];
?>
<style>
    .form-border {
        border: 1px solid #CCCCCC;
        padding: 10px 30px 10px 30px;
        border-radius: 10px;
        margin: 50px auto;
        box-shadow: 2px 2px 2px 0 #CCCCCC;
    }
</style>

<div class="form-border">
    <h1>My account</h1>
    <form>
        <div class="form-group">
            <legend>Login:</legend>
            <label for="radio"><?= $member['login']; ?></label>
        </div>
        <div class="form-group">
            <legend>Email:</legend>
            <label for="radio"><?= $member['mail']; ?></label>
        </div>
        <div class="form-group">
            <legend>Your team:</legend>
            <label for="radio"><?= $member['team']; ?></label>
        </div>
        <a href="?controller=home&action=home"><button> Return home</button></a>
        <a href="?controller=home&action=edit"><button> Edit your profil</button></a>
    </form>
</div>

