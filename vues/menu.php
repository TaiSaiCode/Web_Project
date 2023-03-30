<style>

.menu {
    display: flex;
    justify-content: space-between;
    background-color: darkgreen;
    width: 100%;
}

.menu_items {
  display: flex;
}

.menu_items a {
  color: yellowgreen;
  text-decoration: none;
  font-size: larger;
  font-weight: bold;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
       
.plant {
    cursor: url('../vues/img/plant2.ico'), progress;
}

#theme_btn {
  transition: all 1s ease-in-out;
  height: 100%;
  background-color: grey;
  color: wheat;
}

</style>
<div class="menu_wrapper">
<div class="menu" id="aMenu">
<div class="menu_items">
    <a href="<?php $root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/'. "projetPanier";
    echo $root; ?>"> Home <span id="nb"></span> </a>
    <a href=<?php echo $root . "/index.php/panier?operation=list_articles" ?>> Panier<?php $txt = $nb_articles > 0 ? "(" . $nb_articles .")" : "";
    echo $txt; ?>
     <span id="nb"></span> </a>
     </div>

     <div class="theme">
    <button id="theme_btn">Thème sombre</button>
  </div>
    </div>


  </div>

  <script>
    document.getElementById("theme_btn").addEventListener("click", setSombre);
    document.getElementById("theme_btn").addEventListener("click", tourner);

    var rot = 360;

    function setSombre(e) {
      console.log(e.target);
      if(e.target.innerHTML.includes("sombre")) {
        document.body.classList.add("sombre");

        document.querySelectorAll("table").forEach(t => t.classList.add("sombre"));
        document.querySelectorAll("tr").forEach(t => t.classList.add("sombre"));
        document.querySelectorAll("td").forEach(t => t.classList.add("sombre"));
        document.querySelectorAll("th").forEach(t => t.classList.add("sombre"));        
        
        e.target.innerHTML = "Thème blanc";
      } else {
        document.body.classList.remove("sombre");
        
        document.querySelectorAll("table").forEach(t => t.classList.remove("sombre"));
        document.querySelectorAll("tr").forEach(t => t.classList.remove("sombre"));
        document.querySelectorAll("td").forEach(t => t.classList.remove("sombre"));
        document.querySelectorAll("th").forEach(t => t.classList.remove("sombre"));        
        
        e.target.innerHTML = "Thème sombre";
      }

    }

    function tourner() {
      let menu = document.getElementById("theme_btn");
      menu.style = 'transform: rotate(' + rot + 'deg)';
      rot += 360;
    }

  </script>
