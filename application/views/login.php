<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wisdom Park - Admin Panel</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/login.css')?>">
    <link href="<?php echo base_url('asset/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <div class="container">
            <div class="log_cont">
                <img src="<?php echo base_url('asset/images/LOGO/LOGO.png'); ?>" class="login_logo">
                <h2>WISDOM PARK</h2> <br>
                <h4>Administrator Panel</h4>
                <br>

                <form class="form" action = "login-submit" method="POST" id="form_login">
                    <input type="text" placeholder="Username" name="txt_username">
                    <input type="password" placeholder="Password" name="txt_password">
                    <button type="submit" id="login-button"><i class="fa fa-paper-plane"></i>&nbsp;LOGIN</button>
                    <button type="button" id="return-button" onclick="location.href = '<?php echo base_url()?>'"><i class="fa fa-undo"></i>&nbsp;RETURN</button>
                </form>
            </div>
           

          
                
        </div>

        <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>

    <script>
        // $("#login-button").click(function(event) {
        //     event.preventDefault();

        //     $('form').fadeOut(500);
        //     $('.wrapper').addClass('form-success');
        // });
    </script>
    <script src="<?php echo base_url('asset/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/scripts/login.js'); ?>"></script>
      
</body>

</html>