<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\MonService;

class DefaultController extends AbstractController
{
    const CONSTANT_A = 17;
   

    public function index(MonService $service)
    {
       /*return new Response(
            '<html><body>Hello Symfony</body></html>'
        ); */

        return $this->render('identity/message.html.twig', [
                'message' => $service->HelloSymfony()
            ]
        );
    }

    /**
     * Créons deux methodes dans le controlleur :
     * l'un qui permet de d'afficher un formulaire de calcul(addition,soustraction,division)
     * de deux nombres,
     * et l'autre  d'afficher sous forme de tableau les resultats correspondants
     */
    public function afficheTabCalcule(Request $request)
    {

        $nb1 = (int) $request->request->get('nb1');
        $nb2 = (int) $request->request->get('nb2');
        $operation = $request->request->get('operation');

        //var_dump($nb1,$nb2,$operation);
        $resultat = 0;

        if($operation ==='+') { $resultat = $nb1 + $nb2;}
        else if($operation ==='*') { $resultat = $nb1 * $nb2;}
        else if($operation ==='-') { $resultat = $nb1 - $nb2;}
        else if($operation ==='/') { $resultat = $nb1 / $nb2;}

        return $this->render('identity/tableau.html.twig', [
            'request'=> $resultat
        ]);
    }

    public function afficheFormCalcule()
    {

       
        return $this->render('identity/form.html.twig');
    }

    public function membreTab(){

        $membres = [
            "pierre" => "10", 
            "Micheal" => "15",
            "paul" => "25"
            ];

        $tabEvents = [
            [ "nom" => "Conference Laravel", "date" => "20-01-2019 15:00", "lieu" => "Paris"],
            [ "nom" => "Meetup Symfony", "date" => "20-01-2019 09:00", "lieu" => "canada"],
            [ "nom" => "laravel", "date" => "20-01-2019 10:00", "lieu" => "senegal" ]
        ];

    
        return $this->render('identity/tabMembre.html.twig', [
            "membres" => $membres,
            "events" => $tabEvents,
            "CONSTANT_A" => $this
        ]);

    }

    public function listdonnee(){

        $lists = [
            "contact" => "contact", 
            "offre" => "offre",
            "demandes" => "demandes",
            "mes_favoris" => "mes favoris",
            "boutiques" => "boutiques"
            ];


    
        return $this->render('page2.html.twig', [
            "lists" => $lists

        ]);
    }

    public function base(){
    
        return $this->render('base.html.twig');

    }


}