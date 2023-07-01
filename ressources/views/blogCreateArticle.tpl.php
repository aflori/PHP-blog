<?php 
/* part already done to gain time on later steps */
?>

<form action="http://blog.local/?action=blogPostCreate" method="post">
    <!-- define title -->
    <div>
        <label for="title">Écrivez le titre</label>
        <input type="text" name="title" id="title" >
    </div>
    <!-- content -->
    <div>
        <label for="articleContent">
            Contenu de l'article
        </label>
        <textarea name="articleContent" id="articleContent" cols="30" rows="10"></textarea>
    </div>
    <!-- delete Date -->
    <div>
        <label for="Date">
            Date de retrait
        </label>
        <input type="date" name="date" id="Date">
    </div>
    <!-- importance level (optionnal) -->
    <div>
        <label for="importance">
            Niveau d'importance
        </label>
        <input type="number" name="importance" id="importance" min='1' max='5'>
    </div>
    <!-- Autor pseudoname (radio - generated dynamicly) -->
    <div>
        <label for="radioAutor"> Choississez l'auteur </label>
        <?php foreach($autorList as $autorID): ?>
            <div id="radioAutor">
                <label>
                    <input type="radio" name="autorPseudo" value="<?= $autorID['id'] ?>" id="type1" >
                    <?= $autorID["pseudoname"] ?>
                </label>
            </div>
        <?php endforeach ?>
    </div>
    <button type="submit">Créer l'article</button>
</form>