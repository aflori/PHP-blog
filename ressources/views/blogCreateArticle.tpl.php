<?php 
/* 
 needs definition of $autorList
 if $formSent is true also needs $_SESSION defined with key:
 'create' (default values)
 'createError' (booleant saying if is created or not)
 'createErrorTitle' (boolean indicating if their is an error in this part)
 'createErrorTitleMessage' (message to show if boolean ^ is true)
 'createErrorContent' (same as createErrorTitle for content part)
 'createErrorContentMessage' (same as createErrorTitleMessage for content part)
 'createErrorDate'
 'createErrorDateMessage'
 'createErrorImportance'
 'createErrorImportanceMessage'
 'createErrorPseudo'
 'createErrorPseudoMessage'
*/
?>

<?php if($formSent and !$_SESSION['createError'])
{
    echo '<h3> article créé </h3>';
}
?>
<form action="http://blog.local/?action=blogPostCreate" method="post">
    <!-- define title -->
    <div>
        <label for="title">
            <?php if ($formSent and $_SESSION['createErrorTitle']):?>
            <?=$_SESSION['createErrorTitleMessage']?>
            <?php else: ?>
            Entrez le nom de l'article
            <?php endif; ?> 
        </label>
        <input 
            type="text"
            name="title"
            id="title"<?php if($formSent):?> 
            value="<?=$_SESSION['create']['title']?>"
        <?php endif; ?> >
    </div>
    <!-- content -->
    <div>
        <label for="articleContent">
            <?php if ($formSent and $_SESSION['createErrorContent']): ?>
            <?= $_SESSION['createErrorContentMessage'] ?>
            <?php else: ?>
            Contenu de l'article
            <?php endif; ?>
        </label>
        <textarea name="articleContent" id="articleContent" cols="30" rows="5"><?php
            if($formSent)
            {
                echo $_SESSION['create']['articleContent'];
            }
        ?></textarea>
    </div>
    <!-- delete Date -->
    <div>
        <label for="Date">
            <?php if($formSent and $_SESSION['createErrorDate']): ?>
                <?= $_SESSION['createErrorDateMessage'] ?>
            <?php else: ?>
                Date de retrait
            <?php endif; ?>
        </label>
        <input
            type="date"
            name="date"
            id="Date"<?php
            if($formSent and !$_SESSION['createErrorDate']): ?>
            value="<?=$_SESSION['create']['date']?>"
            <?php endif; ?> >
    </div>
    <!-- importance level (optionnal) -->
    <div>
        <label for="importance">
            <?php if ($formSent and $_SESSION['createErrorImportance']): ?>
            <?= $_SESSION['createErrorImportanceMessage'] ?>
            <?php else: ?>
            Niveau d'importance
            <?php endif;?>
        </label>
        <input
            type="number"
            name="importance"
            id="importance"
            min='1' max='5'<?php
            if ($formSent and !$_SESSION['createErrorImportance'] and $_SESSION['create']['importance']>0): ?>
            value="<?= $_SESSION['create']['importance'] ?>"
            <?php endif;?>
        >
    </div>
    <!-- Autor pseudoname (radio - generated dynamicly) -->
    <div>
        <label for="radioAutor">
        <?php if($formSent and $_SESSION['createErrorPseudo']): ?>
            <?= $_SESSION['createErrorPseudoMessage'] ?>
        <?php else: ?>
            Choississez l'auteur:
        <?php endif; ?>
        </label>
        <?php foreach($autorList as $autorID): ?>
            <div id="radioAutor">
                <label>
                    <input 
                        type="radio"
                        name="autorPseudo"
                        value="<?=$autorID['id']?>"
                        <?php
                            if ($formSent and $autorID['id']===$_SESSION['create']['autorPseudo'])
                            { echo "checked"; }
                        ?> >
                    <?= $autorID["pseudoname"] ?> 
                </label>
            </div>
        <?php endforeach; ?>
    </div>
    <button type="submit">Créer l'article</button>
</form>

<a href="?action=index">retour à l'acueil</a>