<?php 
/* part already done to gain time on later steps */
?>

<form action="http://blog.local/?action=blogPostDelete" method="post">
    <!-- article name (radio - generated dynamicly) -->
    <div>
        <label for="radios"> Choississez l'article </label>
        <div id="radios">
            <label>
                <input type="radio" name="articleName" value="Le sport des ardéchois">
                Le sport des ardéchois
            </label>
        </div>
    </div>
    <!-- submit -->
    <button type="submit">Suprimer l'article</button>
</form>
