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
            <label for="radio"><?= $member['idTeam']; ?></label>
        </div>
        <a href="?controller=member&action=edit&id=<?php echo $member['id'] ?>" class="btn btn-primary">Edit</a>
        <a href="?controller=member&action=delete&id=<?php echo $member['id'] ?>" class="btn btn-danger">Delete</a>
    </form>
</div>

