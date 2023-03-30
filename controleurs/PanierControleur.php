<?php
ob_start();

function prefix() {
$path = str_contains($_SERVER['REQUEST_URI'], "panier.php") ? "../" : "";

return $path;
}  

//require_once $root . "modeles/ProduitService.php";

require_once prefix() . "modeles/ProduitService.php";

session_start();
class PanierControleur {
    private $produitService = NULL;

    public function __construct() {
        $this->produitService = new ProduitService();
    }

    public function redirect($location) {
        header('Location: '.$location);
    }

    public function handleRequest() {
        $operation = isset($_GET['operation']) ? $_GET['operation'] : NULL;
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;
        $ids = isset($_GET['ids']) ? $_GET['ids'] : NULL;
        $qtes = isset($_GET['qtes']) ? $_GET['qtes'] : NULL;
        
        try {
           $this->nombre_articles();
            if ( !$operation || $operation == 'list' ) {
                $this->listProduits();
            } elseif ( $operation == 'list_articles') {
                $this->listArticles();
            } elseif ( $operation == 'get') {
                $this->getProduit($id);
            } elseif ( $operation == 'edit') {
                $this->listArticles();
                $this->updateArticles();
                $this->redirect(prefix() . "panier?operation=list_articles");

            } elseif ( $operation == 'ajouter') {
                $this->saveArticle($id);
            } elseif ( $operation == 'del') {
                $this->listArticles();
                $this->deleteArticle($id);
                $this->redirect(prefix() . "panier?operation=list_articles");

            } else {
                $this->showError("Page not found", "Page for operation ".$operation." was not found!");
            }
        } catch ( Exception $e ) {
// some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }

    
    public function deleteArticle($id) {

        $this->produitService->deleteArticleServ($id);

        require_once prefix() . "vues/panier.php"; 
    }

    public function updateArticles() {
        foreach($_GET as $id => $qte){
            if (str_contains($id, "qte")) {
                $this->produitService->updateArticle(substr($id, 4), $qte);
            };
          }

          require_once prefix() . "vues/panier.php"; 
    }

    public function nombre_articles() {
        $nb_articles = $this->produitService->getSum_articles();
        require_once prefix() . "vues/menu.php";
        //require_once("vues/menu.php");
    }

    public function listArticles() {
        $articles = $this->produitService->getListArticles();
        //$nb_articles = $this->produitService->getSum_articles();
        require_once prefix() . "vues/panier.php";
    }

    public function listProduits() {
        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : "name";
        if (isset($_GET["page"])) {
            $page  = $_GET["page"];
        }
        else{
            $page=1;
        };
        $start_from = 1;
        $produits = $this->produitService->getListProduits($orderby);
        //$nb_articles = $this->produitService->getSum_articles();
        require_once "vues/produits.php";
    }

    public function saveArticle($id_produit) {

        $title = 'Ajouter Article';
        $form = 'ajouter';
        $qte = '';
        
        if ( isset($_POST['form-submitted']) ) {

            $qte       = isset($_POST['qte']) ?   $_POST['qte']  :NULL;
            
            try {
                $this->produitService->ajouterArticle($id_produit, $qte);
                $this->redirect('index.php');
                return;
            } catch (Exception $exception) { echo 'Error: '. $exception->getMessage(); }
        }
        require_once 'vues/produit.php';
    }

    public function getProduit($id) {
        $produit = $this->produitService->getProduit($id);
        //$this->redirect('produit');
        $nb_articles = $this->produitService->getSum_articles();
        require_once "vues/produit.php"; 
    }

    public function showError($title, $message) {
        echo ("$title : $message");
    }

	function render($template, $vars = [])
	{
 	    extract($vars);
	        require_once "vues/$template.php";
	}

}