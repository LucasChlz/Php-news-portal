<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL_SOURCE; ?>/css/painel/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  <title>News Portal</title>
</head>
<body>
    <header>
        <div class="container">
           <div class="logo"><a href="<?= URL_INI; ?>">publish your news | <?= $_SESSION['login'] ?></a></div>
           <a class="loggout" href="<?= URL_PAINEL; ?>?loggout">Loggout</a>
        </div><!--container-->
        <div class="clear"></div>
    </header>

    <section class="post-news">
        <div class="container">
            <h2>Write your news</h2>
            <form method="POST" enctype="multipart/form-data">
                <label for="title-news">Title</label>
                    <input type="text" name="title-news">
                <label for="file">Image news</label>
                    <input type="file" name="file_news">
                <label for="content">Content</label>
                    <textarea name="content-news"></textarea>
                <label for="">Category</label>
                  <select>
                      <option value="">Sport</option>
                  </select>
                <input type="submit" name="register-news" value="register">
            </form>
        </div><!--container-->
    </section><!--post-news-->
</body>
</html>