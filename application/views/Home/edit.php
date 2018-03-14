<?php
require_once __DIR__.'/../../core/bootstrapTheme.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>EDIT</title>
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
            <h1>Editing my account</h1>
            <form>
                <div class="form-group">
                    <legend>Lastname:</legend>
                    <input type="text" name="flastname">
                </div>
                <div class="form-group">
                    <legend>Firstname:</legend>
                    <input type="text" name="ffirstname">
                </div>
                <div class="form-group">
                    <legend>Email:</legend>
                    <input type="text" name="femail">
                </div>
                <div class="form-group">
                    <legend>Your team:</legend>
                    <input type="text" name="fteam">
                </div>
                <a href="?controller=home&action=save"><button> Save</button></a>
                <a href="?controller=home&action=cancel"><button> Cancel</button></a>
            </form>
        </div>
</body>
