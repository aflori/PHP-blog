<?php /*
needs $articleContent difined to print an article content with key:
'title' ->  article name
'content' -> article text
'date Posté' -> publication date
'pseudo' -> autor's pseudoname
*/ ?>

<h1>
    <?=$articleContent['title']?>
</h1>
<p>
    <?=$articleContent['content']?>
</p>
<p>
    publié le
    <i><?=$articleContent['date Posté']?></i>
    par
    <i><?=$articleContent['pseudo']?></i>.
</p>
<a href="http://blog.local/?action=blogPostEdit&id=<?=$idArticle?>" >Modifier l'article</a>
<section>
    <form action="?action=blogPostDelet&id=<?=$idArticle?>" method="post">
        <button type="submit">Suprimer l'article</button>
    </form>
</section>