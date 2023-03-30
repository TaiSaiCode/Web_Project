

<div class="details-wrapper">
    <div class="details">
        <div class="details-text">

<h1> <?php print htmlentities($produit["name"], ENT_QUOTES) ; ?> </h1>

<ul>
    <li><span> <?php print htmlentities($produit['des'], ENT_QUOTES);  ?></span></li>
    <li>Prix: <span> <?php print htmlentities($produit['prix'], ENT_QUOTES);  ?> $ </span></li>
    <li>Quantité disponible: <span> <?php print htmlentities($produit['qte'], ENT_QUOTES); ?> </span></li>
</ul>
        </div>

        <div class="details-img">
            <img src="../vues/img/<?php print htmlentities($produit['image'], ENT_QUOTES); ?>" alt="" >
        </div>
    </div>

<form method="POST" id="form_ajouter" action="../?operation=ajouter&id=<?php print htmlentities($produit['id'], ENT_QUOTES); ?>">
            <div class="form-group">
                <label for="name">Qantité:</label>
                <input type="number" class="form-control" name="qte" value=1 id="qte_demande" />
            </div>
                <input type="hidden" name="form-submitted" value="1" />
                <input type="submit" class="btn btn-send" value="Ajouter" id="ajouter_btn" />
            </form>

</div>

<script>
    
    document.getElementById("ajouter_btn").addEventListener("click", ajouterArticle);

function ajouterArticle(e) {
    e.preventDefault();
    const id = parseInt(<?php 
        print htmlentities($produit['id'], ENT_QUOTES); 
        ?>);

const qte_disponible = parseInt(<?php 
        print htmlentities($produit['qte'], ENT_QUOTES);
        ?>);
        
        
  const qte = parseInt(document.getElementById("qte_demande").value);

if (qte_disponible >= qte) {

    let article = {
    id,
    qte
  } 

  console.log(article);
  document.getElementById("form_ajouter").submit()
} else {
    alert("Quantité insuffisante dans le Stock!")
  }

}

</script>
