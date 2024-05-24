<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    
    <title><?=$title?></title>
    <!-- <link rel="icon" type="image/png" href="includes/img/favicon.png"/> -->
    
    <!-- custom css and js -->
    <link rel="stylesheet" type="text/css" href="css/default">

    <?php if(strcmp($css, "")): ?>
    <link rel="stylesheet" type="text/css" href="css/<?=$css?>">
    <?php endif ?>

    <?php if(strcmp($js, "")): ?>
    <script src="js/<?=$js?>"></script>
    <?php endif ?>
</head>
    
<body>