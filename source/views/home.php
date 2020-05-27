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
           <div class="logo"><a href="<?= URL_INI; ?>">News Portal</a></div>
        </div><!--container-->
    </header>

    <section class="search">
        <div class="container">
            <h2>look for a news</h2>
            <form method="POST">
                <input type="text" name="search_bar" placeholder="what do you search ?">
                <select name="news">
                    <option value="">Sports</option>
                    <option value="">Cars</option>
                </select>
                <input type="submit" name="search_news" value="search">
            </form>
        </div><!--container-->
    </section><!--search-->

    <section class="news">
        <div class="container">
            <h2>News</h2>
            <div class="container-grid">
              
                <div class="news-grid">
                    <div class="img-news">
                        <img src="" alt="">
                    </div><!--img-news-->
                    <div class="title-news">
                        <a href=""><h1>Lorem ipsum title news portal</h1></a>
                    </div><!--title--news-->
                </div><!--news-grid-->

            </div><!--container--grid-->
        </div><!--container-->
    </section><!--news-->
</body>
</html>