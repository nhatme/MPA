<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../css/my-style.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- Start header  -->

    <div class="header">
        <?php include "../header.php" ?>
    </div>

    <!-- End header  -->

    <!-- ================================================================== -->

    <!-- start container  -->

    <div class="container">
        <?php require "./user_main.php" ?>
    </div>

    <!-- End container  -->

    <!-- ================================================================== -->


    <!-- start footer  -->
    <div class="footer">
        <?php include "../footer.php" ?>
    </div>
    <!-- end footer  -->
</body>

</html>