<?php
require_once __DIR__.'/../../core/bootstrapTheme.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php echo getBootstrapTag(); ?>
    <style>
        .form-border {
            border: 1px solid #CCCCCC;
            padding: 10px 30px 10px 30px;
            border-radius: 10px;
            margin: 50px auto;
            box-shadow: 2px 2px 2px 0 #CCCCCC;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="form-border">
            <h1>My account</h1>
            <form>
                <div class="form-group">
                    <legend>Lastname:</legend>
                    <label for="radio">Vandercappellen</label>
                </div>
                <div class="form-group">
                    <legend>Firstname:</legend>
                    <label for="radio">Khaldo</label>
                </div>
                <div class="form-group">
                    <legend>Email:</legend>
                    <label for="radio">trololo@hotmail.com</label>
                </div>
                <div class="form-group">
                    <legend>Your team:</legend>
                    <label for="radio">5</label>
                </div>
                <a href="?controller=home&action=home"><button> Return home</button></a>
                <a href="?controller=home&action=edit"><button> Edit your profil</button></a>
            </form>
        </div>
</body>

