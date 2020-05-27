<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= URL_SOURCE; ?>/css/painel/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Mono:ital,wght@0,300;0,500;1,300&display=swap" rel="stylesheet">
  <title>News Portal</title>
</head>
<body>
    <header>
        <div class="container">
           <div class="logo"><a href="<?= URL_INI; ?>">register your category | <?= $_SESSION['login_user'] ?></a></div>
           <a class="loggout" href="<?= URL_PAINEL; ?>?loggout">Loggout |</a>
           <a class="category" href="<?= URL_PAINEL; ?>">Painel |</a>
        </div><!--container-->
        <div class="clear"></div>
    </header>

    <section class="category-create">
        <div class="container">
            <h2>Write your categorys</h2>
            <form method="POST" enctype="multipart/form-data">
                <label for="title-news">Name</label>
                    <input type="text" name="name">
                <input type="submit" name="register-news" value="register">
            </form>
        </div><!--container-->
    </section><!--post-news-->

    <section class="list-category">
        <div class="container">
            <h2>created categories</h2>
            <table>
                <tr>
                    <td>Name</td>
                    <td>Slug</td>
                    <td>#</td>
                    <td>#</td>
                </tr>
                <?php foreach($category as $key => $value){ ?>
                <tr>
                    <td><?= $value['name']; ?></td>
                    <td><?= $value['slug']; ?></td>
                    <td><a href="<?= URL_PAINEL; ?>/category/<?= $value['slug'] ?>">Edit</a></td>
                    <td><a href="<?= URL_PAINEL; ?>/category?delete=<?= $value['id'] ?>">Delete</a></td>
                </tr>
                <?php } ?>
            </table>
        </div><!--container-->
    </section><!--list-category-->
</body>
</html>