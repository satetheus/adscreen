<html>

<head>
</head>

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <strong>Check password:<strong>
                <input type="text" name="hashcheck" required>
                <input type="submit" value="check Password" name="checked">
    </form>

    <?php
    $checked = NULL;
    if (isset($_POST["checked"])) {
        $checkpass = hash('sha256', $_POST['hashcheck']);
        if ($checkpass == '8604546c281f6204fe88184259e1f858f2ae9e061200acd16303501efd25d1eb') {
            // starting the session
            session_start();

            $_SESSION['auth'] = true;

            header("Location: /adscreen/admin/index");
        }else{
            echo "athentification failed";
        }
    };
    ?>

</body>

</html>