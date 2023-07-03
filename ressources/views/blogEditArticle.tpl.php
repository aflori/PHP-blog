<?php 
/* part already done to gain time on later steps */
?>
<?php if($formSent and !$_SESSION['edit']): ?>
<h3> Article modifié </h3>
<?php endif ?>

<form action="http://blog.local/?action=blogPostEdit&id=<?=$idArticle?>" method="post">
    <!-- new article title  -->
    <div>
        <label for="title"><?php if ($formSent and $_SESSION['editTitle']): ?>
            <?=$_SESSION['editTitleMessage']?>
        <?php else: ?>
            Réécrivez le titre
        <?php endif; ?> 
        </label>
        <input type="text" name="title" id="title" value="<?=$articleContent['title']?>">
    </div>
    <!-- content -->
    <div>
        <label for="articleContent"><?php if ($formSent and $_SESSION['editContent']): ?>
            <?=$_SESSION['editContentMessage']?>
        <?php else: ?>
            Réécrivez le contenu de l'article
        <?php endif; ?> 
        </label>
        <textarea name="articleContent" id="articleContent" cols="30" rows="10"><?=$articleContent['content']?></textarea>
    </div>
    <!-- delete Date -->
    <div>
        <label for="Date"><?php if ($formSent and $_SESSION['editDate']): ?>
            <?=$_SESSION['editDateMessage']?>
        <?php else: ?>
            Définissez la date de retrait
        <?php endif; ?> 
        </label>
        <input type="date" name="date" id="Date" value="<?=$articleContent['date retrait']?>">
    </div>
    <!-- importance level (optionnal) -->
    <div>
        <label for="importance"><?php if ($formSent and $_SESSION['editImportance']): ?>
            <?=$_SESSION['editImportanceMessage']?>
        <?php else: ?>
            Définisser l'importance de l'article
        <?php endif; ?> 
        </label>
        <input
                type="number" min="1" max="5"
                name="importance"
                id="importance"<?php
                if ($articleContent['importance']>0):?>
                value="<?=$articleContent['importance']?>"
                <?php endif ?>
        >
    </div>
    <button type="submit">Éditer l'article</button>
</form>