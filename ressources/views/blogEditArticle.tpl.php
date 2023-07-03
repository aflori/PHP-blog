<?php 
/* part already done to gain time on later steps */
?>

<form action="http://blog.local/?action=blogPostEdit" method="post">
    <!-- new article title  -->
    <div>
        <label for="title">Réécrivez le titre</label>
        <input type="text" name="title" id="title" value="<?=$articleContent['title']?>">
    </div>
    <!-- content -->
    <div>
        <label for="articleContent">
            nouveau contenu de l'article
        </label>
        <textarea name="articleContent" id="articleContent" cols="30" rows="10"><?=$articleContent['content']?></textarea>
    </div>
    <!-- delete Date -->
    <div>
        <label for="Date">
            nouvelle date de retrait
        </label>
        <input type="date" name="date" id="Date" value="<?=$articleContent['date Posté']?>">
    </div>
    <!-- importance level (optionnal) -->
    <div>
        <label for="importance">
            Niveau d'importance
        </label>
        <input
                type="text"
                name="importance"
                id="importance"<?php
                if ($articleContent['importance']>0):?>
                value="<?=$articleContent['importance']?>"
                <?php endif ?>
        >
    </div>
    <button type="submit">Éditer l'article</button>
</form>