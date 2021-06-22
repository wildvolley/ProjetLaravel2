<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;       //UTILISATION DE bd
use Illuminate\Support\Facades\Hash; 
use Session;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\Client;
use App\Models\Slider;
use App\Cart;


class PagesController extends Controller
{

    public function accueil() {

        $sliders = Slider::All()->where('status', 1);
        $produits = Produit::All()->where('status', 1);

        return view('client.home')->with('sliders', $sliders)->with('produits', $produits);
    
    }

    public function contact() {
        return view('client.contact');
    
    }

    public function login() {
        return view('client.login');

    }


    public function formInscription() {
        return view('client.formInscription');

    }



    public function tableauDeBord(){
        return view('admin.tableaudebord');
    }

  

    public function formSlider() {
        return view('admin.addslider');

    }

    public function formArticle() {
        $categories = Categorie::all();
        return view('admin.addarticle')->with('categories', $categories);

    }

    public function formPromotion() {
        return view('admin.addpromo');

    }

    public function formFournisseur() {
        return view('admin.addfournisseur');

    }


    public function formPublication() {
        return view('admin.addarticle');

    }


    public function listeClient() {
        return view('admin.listeclient');

    }

    public function listeFournisseur() {
        return view('admin.listefournisseur');

    }

    public function listeCommande() {
        return view('admin.listecommande');

    }

    public function listePromotion() {
        return view('admin.listepromotion');

    }

// *************** gestion des actions sur categorie*********************************//
    public function formCategorie() {
    return view('admin.addcategory');

    }

    public function ajoutCategorie(Request $request) {  // Ajout des catégories
        Request()->validate([                       //Validation des entrées
            'nom_categorie'=>['required', 'unique:categories', 'min:5'],
        ]);
        
        $categorie = new Categorie();
        $categorie->NOM_CATEGORIE = $request->nom_categorie;
        $categorie->save(); 
        Session::put('succes', 'La nouvelle catégorie "'.$request->nom_categorie.'" a été ajoutée avec succès');
        return redirect('/ajout_categorie');

    }

    public function listeCategorie() {  // Liste des catégories
        $categories = DB::table('categories')
                    ->orderby('NOM_CATEGORIE', 'desc')
            //        ->inRandomOrder()
            //        ->limit(1)  
            //        ->paginate(2); 
              ->get();
        return view('admin.listecategorie')->with('categories', $categories);  // retourne la page avec les categories
    }



    public function formEditerCategorie($id) {
        $categories = DB::table('categories')     //selection de la table
                    ->where('ID_CATEGORIE', $id)
                    ->first();                     // le 1er element trouvé 
            return view('admin.editcategorie')->with('categories', $categories); // retourne la page editer avec la catégorie    
    }



    public function modifierCategorie(Request $request){  // Modification de catégorie

        DB::table('categories')
        ->where('ID_CATEGORIE', $request->input('id'))
        ->update(['NOM_CATEGORIE' => $request->input('nom_categorie')]);       
        return redirect('/liste_categories')->with('updateStatus', 'La catégorie  '.$request->nom_categorie. ' a été modifié avec succès');

    }


    public function supprimerCategorie($id){  // Modification de catégorie
        $categorie = Categorie::find($id); 
      
       $categorie->delete();      //selection du produit de la table avec cet id (methode Eloquent laravel)
     return redirect('/liste_categories')->with('deleteStatus', 'La catégorie a été suppriméé avec succès..!');
    

    }
// ******************* FIN gestion des actions sur categorie*********************************//


// ******************* Gestion  des articles, produits*********************************//

public function ajoutArticle(Request $request) {  // Ajout des catégories
    Request()->validate([                       //Validation des entrées
        'nom_produit'=>['required', 'max:25'],
        'ref_produit'=>['required', 'max:7'],
        'prix_ht_produit'=>['required', 'min:2'],
        'description'=>['required', 'max:500'],
         'image'=>['nullable', 'max:1999']
    ]);

    if($request->hasFile('image')){
        $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
        $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
        $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
        $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
        $path=$request->file('image')->storeAs('public/images_produits', $nomFichierAinserer);

    }else{
        $nomFichierAinserer= 'noImage.jpg';
    }
   
    $produit = new Produit();
    $produit->ID_CATEGORIE = $request->id_categorie;
    $produit->NOM_PRODUIT = $request->nom_produit;
    $produit->REF_PRODUIT = $request->ref_produit;
    $produit->PRIX_HT_PRODUIT = $request->prix_ht_produit;
    $produit->DESCRIPTION = $request->description;
    $produit->status=1;
    $produit->IMAGE = $nomFichierAinserer;
    $produit->save(); 
    Session::put('succes', 'Un nouvel article  "'.$request->nom_produit.'" a été ajouté avec succès');
    return back();
    //return redirect('/ajout_article'); 

     

    
   //  $categorie = Categorie::All()->pluck('id_categorie', );
}


public function listeArticle() {
    $produits = Produit::All();
    return view('admin.listearticle')->with('produits', $produits);
}


public function formEditerArticle($id) {
    $produits = Produit::find($id); 
    $categories = Categorie::All();                   
    return view('admin.editarticle')->with('produits', $produits)->with('categories', $categories); // retourne la page editer avec la catégorie    
}
    

public function modifierArticle(Request $request){  // Modification de produit

    $produit = Produit::find($request->id); 
    $produit->ID_CATEGORIE = $request->id_categorie;
    $produit->NOM_PRODUIT = $request->nom_produit;
    $produit->REF_PRODUIT = $request->ref_produit;
    $produit->PRIX_HT_PRODUIT = $request->prix_ht_produit;
    $produit->DESCRIPTION = $request->description;

    if($request->hasFile('image')){
        $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
        $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
        $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
        $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
        $path=$request->file('image')->storeAs('public/images_produits', $nomFichierAinserer);

        if($produit->IMAGE !='noImage.jpg'){                            // suppression ancienne image
        Storage::delete('public/images_produits/'.$produit->IMAGE);
        }
        $produit->IMAGE = $nomFichierAinserer;
    }
    
    $produit->update();
      
    return redirect('/liste_articles')->with('updateStatus', 'L\'article  '.$request->nom_produit. ' a été modifié avec succès');
   // return back()->with('updateStatus', 'L\'article  '.$request->nom_produit. ' a été modifié avec succès');
}


public function supprimerArticle($id) {
        $produit = Produit::find($id);

        if($produit->IMAGE !='noImage.jpg'){                            // suppression ancienne image
            Storage::delete('public/images_produits/'.$produit->IMAGE);
        }

        $produit->delete();

        return redirect('/liste_articles')->with('deleteStatus', 'Le produit '.$produit->nom_produit. ' a été suppriméé avec succès');
        
    }


    public function activeArticle($id){
        $produit = Produit::find($id);
        $produit->status = 1;
        $produit->update();
        return redirect('/liste_articles');
    }

    public function desactiveArticle($id){
        $produit = Produit::find($id);
        $produit->status = 0;
        $produit->update();
        return back();
    }



    public function detailsArticle($id) {
        $produits = Produit::find($id);
        return view('client.detailsarticle')->with('produits', $produits);

    }


// ******************* FIN gestion des articles, produits*********************************//

// *******************  gestion des sliders**********************************************//

public function ajoutSlider(Request $request) {  // Ajout des sliders
    Request()->validate([                       //Validation des entrées
        'description1'=>['required', 'max:500'],
        'description2'=>['required', 'max:500'],
         'imageslider'=>['nullable', 'max:5000']
    ]);

    if($request->hasFile('imageslider')){
        $nomFichierAvecExt = $request->file('imageslider')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
        $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
        $ext = $request->file('imageslider')->getClientOriginalExtension();  // ext du fichier
        $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
        $path=$request->file('imageslider')->storeAs('public/images_sliders', $nomFichierAinserer);

    }else{
        $nomFichierAinserer= 'noImage.jpg';
    }
    
    $slider = new Slider();
    $slider->description1 = $request->description1;
    $slider->description2 = $request->description2;
    $slider->status=1;

    $slider->imageslider = $nomFichierAinserer;
    $slider->save(); 
    Session::put('succes', 'Un nouveau slider  a été ajouté avec succès');
    return back();
    //return redirect('/ajout_article'); 
}


public function listeSliders() {            //affiche la table des sliders
    $sliders = Slider::All();
    return view('admin.listesliders')->with('sliders', $sliders);
}


public function supprimerSlider($id) {
    $slider = Slider::find($id);

    if($slider->imageslider !='noImage.jpg'){                            // suppression ancienne image
        Storage::delete('public/images_sliders/'.$slider->imageslider);
    }

    $slider->delete();

    return redirect('/liste_sliders')->with('deleteStatus', 'Le slider Numéro '.$slider->id. ' a été supprimé avec succès');
    
}


public function formEditerSlider($id) {
    $sliders = Slider::find($id);                   
    return view('admin.editslider')->with('sliders', $sliders); // retourne la page editer avec la catégorie    
}



public function modifierSlider(Request $request){  // Modification de slider

    Request()->validate([                       //Validation des entrées
        'description1'=>['required', 'max:500'],
        'description2'=>['required', 'max:500'],
         'imageslider'=>['nullable', 'max:5000', 'mimes:jpeg,png,jpg,gif']
    ]);

    $slider = Slider::find($request->id); 
    
    $slider->description1 = $request->description1;
    $slider->description2 = $request->description2;

    if($request->hasFile('imageslider')){
        $nomFichierAvecExt = $request->file('imageslider')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
        $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
        $ext = $request->file('imageslider')->getClientOriginalExtension();  // ext du fichier
        $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
        $path=$request->file('imageslider')->storeAs('public/images_sliders', $nomFichierAinserer);

        if($slider->imageslider !='noImage.jpg'){                            // suppression ancienne image
        Storage::delete('public/images_sliders/'.$slider->imageslider);
        }
        $slider->imageslider = $nomFichierAinserer;
    }
    
    $slider->update();
      
    return redirect('/liste_sliders')->with('updateStatus', 'Le Slider Numéro '.$request->id. ' a été modifié avec succès');
   // return back()->with('updateStatus', 'L\'article  '.$request->nom_produit. ' a été modifié avec succès');
}




public function activeSlider($id){
    $slider = Slider::find($id);
    $slider->status = 1;
    $slider->update();
    return back();
}

public function desactiveSlider($id){
    $slider = Slider::find($id);
    $slider->status = 0;
    $slider->update();
    return back();
}


// ******************* Fin  gestion des sliders**********************************************//




// ******************* INTERFACE CLIENT**********************************************//

public function shop() {

    $sliders = Slider::All()->where('status', 1);
    $produits = Produit::All()->where('status', 1);
    $categories = Categorie::all();
  
    return view('client.shop')->with('sliders', $sliders)->with('produits', $produits)->with('categories', $categories);

}

  public function triCategorie($NOM_CATEGORIE){   //REMARQUE : la colonne ID_CATEGORIE PORTE LES NOMS DE CATEGORIES, NOUS CHANGERONS CELA DANS UNE MIGRATION 
    $produits = Produit::All()->where('ID_CATEGORIE', $NOM_CATEGORIE)->where('status', 1);              
    $categories = Categorie::all();
    $sliders = Slider::All()->where('status', 1);
    return view('client.shop')->with('sliders', $sliders)->with('produits', $produits)->with('categories', $categories);

  }

public function ajouterAupanier($id){
    $produit = Produit::find($id);
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->add($produit, $id);
    Session::put('cart', $cart);
   // dd(Session::get('cart'));  pour le debogage voir ce qui est recupéré.
    return back();
            
}


public function modifierQteArticle($id, Request $request){

    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->updateQte($id, $request->quantity);
    Session::put('cart', $cart);
   // dd(Session::get('cart'));  pour le debogage voir ce qui est recupéré.
    return back();

}


public function enleverDuPanier($id){
   
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    if(count($cart->items)>0){
        Session::put('cart', $cart);

    }else{
        Session::forget('cart');
    }
    // dd(Session::get('cart'));  pour le debogage voir ce qui est recupéré.
     return back();
}



public function panier() {
    if(!Session::has('cart')){
        return view('client.panier');
    }

    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);

    return view('client.panier', ['produits' => $cart->items]);

}



public function paiement() {
    if(!Session::has('client')){
        return view('client.login');
    }

    if(!Session::has('cart')){
        return view('client.panier');
    }


    return view('client.paiement');

}




    public function insererClient(Request $request) {

        Request()->validate([                    //Validation des entrées
          //  'username'=>['required', 'min:8', 'unique:clients'],
            'courriel'=>['required', 'email', 'min:8', 'unique:clients', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'password'=>['required', 'confirmed', 'min:8'],
            'password_confirmation'=>['required']
     
             //   $RegExpCourriel="/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/";
        ]);
        
            $client = new Client();
            $client->NOM_CLIENT = $request->username;
            $client->COURRIEL = $request->courriel;
            $client->PASSWORD = bcrypt($request->password);

            $longueurCle = 11;
            $cle = "";		// et initialisation de key qui servira pour  confirmation inscription par courriel
		    for($i=1; $i<$longueurCle; $i++)   // Implementation ++.
		    $cle .= mt_rand(0,9);

            $client->CONFIRMKEY = $cle;
            $client->STATUS = 1;

            $client->save();

            Session::put('succes', 'Merci  "'.$request->username.'" votre compte a été crée avec succès');
            return back();

    }




    public function connexionClient(Request $request) {
        Request()->validate([                       //Validation des entrées
            'courriel'=>['required', 'email', 'min:8'],
            'password'=>['required', 'min:8'],
     
        ]);

            $client = Client::where('COURRIEL', $request->courriel)->first();

            if($client){

                if(Hash::check($request->password, $client->PASSWORD)){

                    Session::put('client', $client);
                    return redirect('/shop');

                }else{
                    return back()->with('status', 'Mauvais mot de passe, veuillez réessayer!');
                }

            }else{
                return back()->with('status', 'Aucun compte correspondant à '.$request->courriel.' Veuillez en créer un! ');

            }



    }



    public function deconnexionClient(){
        Session::forget('client');
        return back();
    }









    public function connexion(Request $request) {
        Request()->validate([                       //Validation des entrées
            'courriel'=>['required', 'email', 'min:8'],
            'password'=>['required', 'min:8'],
     
        ]);
      
            auth()->attemp([                // Prend les paramètres et verifie les correspondances dans la bd
                'email'=>Request('email'),
                'password'=>Request('password'),

            ]);
        return  bcrypt(Request('password'));


    }


// *******************FIN INTERFACE CLIENT**********************************************//






   


    public function welcome() {
        return view('welcome');
    
    }

   

    public function home() {
        return view('pages.home');
    
    }

    public function apropos() {
        return view('pages.apropos');
    
    }

    public function formulaireCreate() {
        return view('pages.create');
    
    }
/*****************************Ajout de produit */
    public function ajoutProduit(Request $request) {
        //champs obligatoires
        $this->validate($request, ['product_name'=>'required',
                                    'product_price'=>'required',
                                    'product_description'=>'required',
                                    'product_image'=>'image|nullable|max:1999']);


    /*    
        $fileNameWithExt = $request->file('product_image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
        $ext = $request->file('product_image')->getClientOriginalExtension();  // ext du fichier
        $fileNameToStore = $fileName.'_'.time().'.'.$ext;               // nom+date+extension
     */ 
        $produit = New Product();               // Instanciation d'un nouveau produit et sauvegarde dans la bd
        $produit->product_name = $request->product_name;;
        $produit->product_price = $request->product_price;
        $produit->product_description = $request->product_description;
        $produit->product_image = $request->product_image;
        $produit->save();

        Session::put('succes', 'Le produit '.$request->product_name. ' a été ajouté avec succès');
        return redirect('/create');

    /* Autre methode n'utilisant pas notre model Product
     $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_description = $request->input('product_description');
        $data=array('product_name'=>$product_name,"product_price"=>$product_price,"product_description"=>$product_description);
        DB::table('products')->insert($data); */
    
    
    }






    /*****************************liste des produits */

    public function services() {
        
        $produits = DB::table('products')
                    ->orderby('product_name', 'desc')
            //        ->inRandomOrder()
            //        ->limit(1)  
                    ->paginate(2); 
             //   ->get();*/
        return view('pages.services')->with('produits', $produits);  // retourne la page avec les produits
    /* Autre methode
            $produits = Product::inRandomOrder()->paginate(3);

    */

    }

    public function show($id) {
    //    $produit = DB::table('products')      //selection de la table
    //                ->where('id', $id)
    //                ->first();                 // le 1er element trouvé 
        $produit = Product::find($id);
        
        return view('pages.show')->with('produit', $produit); // retourne la page show avec le produit
        
    }


    public function formulaireEditer($id) {
        $produit = DB::table('products')      //selection de la table
                    ->where('id', $id)
                    ->first();                 // le 1er element trouvé 
        
        return view('pages.editer')->with('produit', $produit); // retourne la page editer avec le produit
        
    }

    public function modifierProduit(Request $request){

        //$produit = Product::find($request->id);   
        $produit = Product::find($request->input('id'));//Trouve le produit avec l'id reçu du formulaire et instancie un  produit
        $produit->product_name = $request->input('product_name');
        $produit->product_price = $request->input('product_price');
        $produit->product_description = $request->input('product_description');

        $produit->update();
        
        return redirect('/services')->with('updateStatus', 'Le produit '.$request->product_name. ' a été modifié avec succès');

    }


    public function supprimerProduit($id){
        $produit = Product::find($id);      //selection du produit de la table avec cet id (methode Eloquent laravel)

        $produit->delete();

        return redirect('/services')->with('deleteStatus', 'Le produit '.$produit->product_name. ' a été suppriméé avec succès');


    }






}
