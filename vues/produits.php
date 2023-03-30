<style>  

.articles_container {
    display: flex;
}

.plant {
    cursor: url('./vues/img/plant2.ico'), progress;
}

.entry_id, .entry_name {
    font-size: x-large;
}

.home_image {
    margin-top: 10%;
    margin-left: 10%;
}

.home_image img {
    width: 80%;
    max-width: 700px;
    min-width: 300px;
    height: auto;
}

.articles {
    min-width: 450px;
}

td a {
    text-decoration: none;
    color: darkolivegreen;
    font-weight: 900;
}

td {
    padding-bottom: 1em;
}

h1 {
    text-align: center;
    color: lightseagreen;
}

h2 {
    color: orangered;
}

</style>
<?php 
//include ("menu.html");
//<body>
?>
<h1>Bienvenue à la pépinière Verte</h1>

<div class="articles_container">

<div class="articles">

<h2>Découvrez nos plantes préférées</h2>
        <table border="0" cellpadding="0" cellspacing="0" class="produits">
            
            <tbody>
                <?php foreach ($produits as $produit): ?>
                    <tr>
                        <td class="entry_id">
                            (#<?php print htmlentities($produit['id'], ENT_QUOTES);?>)
                        </td>
                        
                        <td class="entry_name">
                           <a href="index.php/produit?operation=get&id=<?php print htmlentities($produit['id'], ENT_QUOTES); ?>"><?php print htmlentities($produit['name'], ENT_QUOTES);?></a> 
                        </td>
                       
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</div>


<div class="home_image">
    <img src="./vues/img/plants.jpg" alt="">
</div>
</div>



<?php 
//include ('pied.php');
//</body> </html>