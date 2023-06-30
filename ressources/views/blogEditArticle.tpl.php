<?php 
/* part already done to gain time on later steps */
?>

<form action="http://blog.local/?action=blogPostEdit" method="post">
    <!-- radios dynamicly generated - last 10 articles list  -->
    <div>
        <label for="champ1">civilité</label>

        <select name="article" id="champ1">
            <option value="0" selected> Choisissez l'article à supprimé</option>
            <option value="1">Article 1</option>
            <option value="2">Article 2</option>
        </select>
    </div>
    <button type="submit">Suprimer l'article</button>
</form>