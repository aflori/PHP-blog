<?php
/*
 * needs defined:
 * $autorList
 * $_SESSION['commentAuthorM']
 * $_SESSION['commentTextM']
 */
?>
<form action="?action=blogPostCreateComment&id=<?=$idArticle?>" method="post">

    <label>
        <?= $_SESSION['commentTextM'] ?>
        <textarea name="commentContent" cols="20" rows ="5"></textarea>
        <br>
    </label>

    <label for="radioAutor">
        <?= $_SESSION['commentAuthorM'] ?>
    </label>
    <?php foreach($autorList as $autorID): ?>
        <div id="radioAutor">
            <label>
                <input
                        type="radio"
                        name="autorPseudo"
                        value="<?=$autorID['id']?>"
                >
                <?= $autorID["pseudoname"] ?>
            </label>
        </div>
    <?php endforeach; ?>
    <button type="submit"> Créer le commentaire </button>
</form>