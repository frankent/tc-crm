<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title><?php echo isset($title) ? "{$title} | " : "Client Relation Manager |" ?> TryCatch-CRM by Northernwind Digital Solution Co.,Ltd</title>        <link rel="stylesheet" href="packages/css/bootstrap.min.css">

        <!--Css-->
        <link rel="stylesheet" href="<?php echo asset("packages/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo asset("packages/css/sweet-alert.css"); ?>">
        <link rel="stylesheet" href="<?php echo asset("packages/css/tc-css.css"); ?>">

        <!--Js-->
        <script src="<?php echo  asset("packages/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo  asset("packages/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo  asset("packages/js/jquery.form.js"); ?>"></script>
        <script src="<?php echo  asset("packages/js/sweet-alert.min.js"); ?>"></script>

        <style type="text/css">
            /*Responsive disabled*/
            body{
                min-width: 970px;
            }

            .container {
                width: 970px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <?php echo $content; ?>
        </div>
    </body>
</html>
