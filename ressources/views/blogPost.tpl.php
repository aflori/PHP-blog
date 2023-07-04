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
        <button type="submit" name="submit" value="true">Suprimer l'article</button>
    </form>
</section>
<h2>
    Les commentaires
</h2>
<?php if(count($lesComments) ===0): ?>
<h4> Pas de commentaires écrits </h4>
<?php else: ?>
<?php foreach($lesComments as $commentaireData) : ?>
<section style="border: solid 1px purple; margin-bottom:2px">
    <p>
        <?=$commentaireData['comentaire']?>
    </p>
    <p>
        écrit par <i><?=$commentaireData['pseudo']?></i>
        le <i><?=$commentaireData['dateDePublication'] ?> </i>
    </p>
</section>
<?php endforeach?>
<?php endif ?>

<div>
    <a href="http://blog.local?action=blogPostCreateComment&id=<?=$idArticle?>">
        <button>Créer un commentaire</button>
    </a>
</div>

<a href="?action=index">retour à l'acueil</a>