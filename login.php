<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>LOG IN</h1>
            <form id="formLogin" action="/ajax/login.php" method="POST">
                <input type="text" id="username" placeholder="username">
                <input type="password" id="password" placeholder="password">
                <input type="button" id="login" value="Login">
            </form>
        </div>
    </div>
</body>
<script>
    $('body').on('click', '#login', function() {
        $.post("ajax/login.php", {
            username: $('#username').val(),
            password: $('#password').val()
        })
        .done(function(data) {
            if (data == "True") {
                window.open("index.php", "_self");
            } else {
                alert("Data tidak ditemukan");
            }
        });
    });
</script>
</html>