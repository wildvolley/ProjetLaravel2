<?php 
namespace App;

class Cart{
    public $items = null;
    public $totalQte = 0;
    public $totalPrix =0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQte = $oldCart->totalQte;
            $this->totalPrix = $oldCart->totalPrix;
        }
    }


    public function add($item, $ID_PRODUIT){
        $storedItem = ['qte'=>0,
                        'id_produit'=>0,
                        'nom_produit'=>$item->NOM_PRODUIT,
                        'prix_produit'=>$item->PRIX_HT_PRODUIT, 
                        'image'=>$item->IMAGE, 
                        'item'=>$item];

        if($this->items){
            if(array_key_exists($ID_PRODUIT, $this->items)){
                $storedItem = $this->items[$ID_PRODUIT];
            }
        }

        $storedItem['qte']++;
        $storedItem['id_produit'] = $ID_PRODUIT;
        $storedItem['nom_produit'] = $item->NOM_PRODUIT;
        $storedItem['prix_produit'] = $item->PRIX_HT_PRODUIT;
        $storedItem['image'] = $item->IMAGE;
        $this->totalQte ++;
        $this->totalPrix += $item->PRIX_HT_PRODUIT;
        $this->items[$ID_PRODUIT] = $storedItem; 

    }



    
    public function updateQte($id, $qte){
        $this->totalQte -= $this->items[$id]['qte'];
        $this->totalPrix -= $this->items[$id]['prix_produit'] * $this->items[$id]['qte'];
        $this->items[$id]['qte'] = $qte;
        $this->totalQte += $qte;
        
        $this->totalPrix  += $this->items[$id]['prix_produit'] * $qte;
    }




    public function removeItem($id){
        $this->totalQte -= $this->items[$id]['qte'];
        $this->totalPrix -= $this->items[$id]['prix_produit'] * $this->items[$id]['qte'];
        unset($this->items[$id]);

    }


}

?>