
<style>

  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

th {
    background-color: lightgray;
    padding: 0.5em;
}

td {
    text-align:center;
    padding: 0.8em;
}

th .sombre {
    background-color: darkslategrey;
}

.articles, .facture_container  {
    font-size: larger;
}

.totaux {
margin-top: 20px;
margin-left: 300px;

font-weight: 500;
font-size: large;
}

.totaux span {
    font-weight: bold;
}

.error_stock {
    color: red;
}

.sombre {
    border: 1px solid yellow;
}

</style>

<div class="articles">
<form method="POST" id="form_maj">
<ul>
<?php 

foreach ($articles as $article): ?>

        <li>
         <?php print htmlentities($article['name'], ENT_QUOTES); ?> 
         <input type="number" id="<?php echo $article['id_panier']; ?>" value="<?php echo $article['qte']; ?>" min="0" max=<?php echo $article['qte_disponible']; ?>>
         <button class="suppr" for="<?php echo $article['id_produit']; ?>" qte="<?php echo $article['qte']; ?>">Supprimer</button>
         <span class="error_stock" id="span_<?php echo $article['id_panier']; ?>"></span>
        </li>
    <?php endforeach;?>
</ul>
</form>

<button id="maj">Mettre à jour la Facture</button>
</div>

<div class="facture_container">
    <h1>Facture</h1>

    <table>
        <tr>
            <th>Article</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Total</th>
        </tr>

        
<?php 
$somme = 0.0;
foreach ($articles as $article): 
$somme += $article['prix'] * $article['qte'];
?>

<tr>
 <td> <?php print htmlentities($article['name'], ENT_QUOTES); ?> </td> 
 <td> <?php echo $article['qte']; ?> </td> 
 <td> <?php echo sprintf("%.2f", $article['prix']) . " $"; ?> </td> 
 <td> <?php  echo sprintf("%.2f", $article['prix'] * $article['qte']). " $" ?>  </td>
</tr>
<?php endforeach;?>

    </table>

    <div class="totaux">
        
    <p> Sous Total: <span> <?php echo sprintf("%.2f", $somme). " $" ?> </span></p>
    <p> Taxe: <span> <?php echo sprintf("%.2f", $somme * 15/100). " $" ?> </span></p>
    <p> Grand Total: <span> <?php echo sprintf("%.2f", $somme + ($somme * 19/100)). " $" ?> </span></p>

    </div>
</div>

<script>
    document.getElementById("maj").addEventListener("click", maj_facture);

    function maj_facture() {
        const inputs = document.querySelectorAll("input");

        let valid = true;
        let query = "../index.php/panier?operation=edit";

        inputs.forEach(input => {
            if(parseInt(input["value"]) > parseInt(input["max"])) {
                valid = false;
                document.getElementById("span_" + input["id"]).innerHTML = "Stock Insuffisant!"
            }

            query += "&qte_" + input["id"] + "=" + input["value"]
        })

        if (valid) {
            let formElm = document.querySelector("form");

            formElm.setAttribute("action", query);
            formElm.submit()

        }

    }

    

    document.querySelectorAll(".suppr").forEach(bt => bt.addEventListener("click", supprimer));

    function supprimer(e) {
        let query = "../index.php/panier?operation=del";

        console.log(e.currentTarget.getAttribute("for"));
       query += "&id" + "=" + parseInt(e.currentTarget.getAttribute("for")) 
     
            let formElm = document.querySelector("form");

           formElm.setAttribute("action", query);
            formElm.submit()

    }

</script>