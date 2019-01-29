<?php
/**
 * Created by PhpStorm.
 * User: wap58
 * Date: 17/01/19
 * Time: 12:41
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IdentityController  extends AbstractController
{
    /**
     * Afficher un nom, un prenom et un age et de l'afficher dans un tableau
     * sachant que le nom et l'age seront de type stringet l'age de type integer.
     * le nom de l'action à executée sera reference et le Controller Identity
     */
    public function index($nom, $prenom, $age)
    {
        /*return new Response(
             '<html><body>Hello Symfony</body></html>'
         ); */

        return $this->render('identity/identity.html.twig', [
                'nom' => $nom,
                'prenom' => $prenom,
                'age' => $age
            ]
        );
    }

    /**
     * Je veux définir une route qui prend les URL de ce type :
     * /forum/année/mois/ID-du-sujet/titre-du-sujet.html
     * par exemple : /forum/2011/11/598/debat-sur-Symfony.json
     * L'extension doit être facultative, et par défaut « html ».
     * Les URL qui ne respectent pas le format ne doivent pas correspondre.
     * Écrire le path et les requirements de la route correspondante
     */
    public function forumUrl($forum, $year, $month, $ID, $slug ,$EXT)
    {
        /*return new Response(
             '<html><body>Hello Symfony</body></html>'
         ); */

        return $this->render('identity/forum_url.html.twig', [
                'forum' => $forum,
                'year' => $year,
                'month' => $month,
                'ID' => $ID,
                'slug' => $slug,
                'EXT' => $EXT
            ]
        );
    }

}