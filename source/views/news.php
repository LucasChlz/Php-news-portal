<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL_SOURCE; ?>/css/portal/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
  <title>News Portal</title>
</head>
<body>
    <header>
        <div class="container">
           <div class="logo"><a href="<?= URL_INI; ?>">you are reading: <?= $singleNews['title'];  ?></a></div>
        </div><!--container-->
        <div class="clear"></div>
    </header>

    <section class="news-single">
        <div class="container">
            <img src="<?= URL_SOURCE; ?>/views/Images/<?= $singleNews['img']; ?>" alt="">
            <h1><?= $singleNews['title']; ?></h1>
            <div class="content"><?= $singleNews['content']; ?></div>
        </div>
    </section>
</body>
</html>