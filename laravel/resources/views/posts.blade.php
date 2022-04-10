<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="/app.css" />
        <script src="app.js"></script>
        <title>Independant Learning</title>
    </head>

<body>
    <?php foreach($posts as $post): ?>
    <article>

        <h1>
            <a href="/posts/<?= $post->slug; ?>">
                <?= $post->title; ?>
            </a>
        </h1>
        <body>
            <em><?= $post->date; ?></em><br/>
            <?= $post->body; ?>
        </body>

    </article>
    <?php endforeach; ?>

</body>

</html>