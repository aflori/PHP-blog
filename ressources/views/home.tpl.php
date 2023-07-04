<?php /*
    needs $articlesContent defined containing the articles lists
*/ ?>

<h1> Les derniers articles du blogs </h1>
<section>
<?php if(count($articlesContent) === 0): ?>
    <h2> Pas d'article encore écrit</h2>
<?php else: ?>
    <?php foreach ( $articlesContent as $article) :?>
        <article>
            <h2>
                <?=$article['title'] ?>
            </h2>
            <a href="http://blog.local/?action=blogpost&id=<?=$article["ID"]?>">
                Les détails
            </a>
            <p>
                écrit par <i><?= $article["écrit par"] ?> </i>
            </p>
            <p>
                le <i><?= $article['le'] ?></i>
            </p>
        </article>
    <?php endforeach ?>
<?php endif ?>
</section>
<section>
    <a href="http://blog.local/?action=blogPostCreate">
        créer un nouvelle article
    </a>
</section>

