<?php 
/* part already done to gain time on later steps */
?>

<form action="http://blog.local/?action=blogPostEdit" method="post">
    <!-- new article title  -->
    <div>
        <label for="title">Réécrivez le titre</label>
        <input type="text" name="title" id="title" value= "base">
    </div>
    <!-- content -->
    <div>
        <label for="articleContent">
            nouveau contenu de l'article
        </label>
        <textarea name="articleContent" id="articleContent" cols="30" rows="10">
            contenu de l'article
        </textarea>
    </div>
    <!-- delete Date -->
    <div>
        <label for="Date">
            nouvelle date de retrait
        </label>
        <input type="date" name="date" id="Date" varlue="2023-07-22">
    </div>
    <!-- importance level (optionnal) -->
    <div>
        <label for="importance">
            Niveau d'importance
        </label>
        <input type="text" name="importance" id="importance">
    </div>
    <button type="submit">Suprimer l'article</button>
</form>