<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title><?php echo isset($title) ? "{$title} | " : "Client Relation Manager |" ?> TryCatch-CRM by Northernwind Digital Solution Co.,Ltd</title>        <link rel="stylesheet" href="packages/css/bootstrap.min.css">

        <!--Css-->
        <link rel="stylesheet" href="<?php echo asset("packages/css/bootstrap.min.css"); ?>">
        <link rel="stylesheet" href="<?php echo asset("packages/css/sweet-alert.css"); ?>">
        <link rel="stylesheet" href="<?php echo asset("packages/css/tc-css.css"); ?>">
        <link rel="stylesheet" href="<?php echo asset("packages/css/datepicker3.css"); ?>">

        <!--Js-->
        <script src="<?php echo asset("packages/js/jquery.min.js"); ?>"></script>
        <script src="<?php echo asset("packages/js/bootstrap.min.js"); ?>"></script>
        <script src="<?php echo asset("packages/js/jquery.form.js"); ?>"></script>
        <script src="<?php echo asset("packages/js/sweet-alert.min.js"); ?>"></script>
        <script src="<?php echo asset("packages/js/bootstrap-datepicker.js"); ?>"></script>
        <script src="<?php echo asset("packages/js/bootstrap-datepicker.th.js"); ?>"></script>

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
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo url("crm/dashboard"); ?>">CRM - TryCatch</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav  navbar-right">
                        <li><a href="<?php echo url('crm/dashboard'); ?>">Dashboard</a></li>
                        <li><a href="<?php echo url('crm/client'); ?>">Client</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Email <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <?php $all_email = DB::table('email')->get(); ?>
                                <?php foreach ($all_email as $each_email): ?>
                                    <li><a href="<?php echo url("crm/email/{$each_email->email_id}"); ?>"><?php echo $each_email->email_name ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li><a href="<?php echo url('api/logout'); ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <style>
            body{
                padding-top: 70px;
            }
        </style>
        <?php echo $content; ?>
    </body>
</html>
