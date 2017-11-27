<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:39
 */

namespace App\Controller;


use App\Entity\Player;
use App\Entity\PlayerItem;
use App\Form\PlayerItemType;
use App\Form\PlayerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PlayerController extends Controller
{
    /**
     * @Route("/player/new" , name="app_player_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = new Player();

        $form = $this->createForm(PlayerType::class,$player);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('app_player_index'));
        }
        return $this->render("Player/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/players" , name="app_player_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em->getRepository(Player::class)->findAll();
        return $this->render("Player/index.html.twig",["players"=>$player]);
    }

    /**
     * @Route("/player/inventaire/{id}" , name="app_player_inventaire")
     */
    function inventaire(Player $player)
    {
        $em = $this->getDoctrine()->getManager();
        $playerItems = $em->getRepository(PlayerItem::class)->findBy(array('player'=>$player));
        return $this->render("Player/inventaire.html.twig",["playerItems"=>$playerItems,"player"=>$player]);
    }
}