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
use App\Event\AppEvent;
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
        $player = $this->get(\App\Entity\Player::class);
        $form = $this->createForm(PlayerType::class,$player);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $playerEvent = $this->get(\App\Event\PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_ADD, $playerEvent);

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
     * @Route("/player/{id}" , name="app_player_edit")
     */
    function edit(Request $request, Player $player)
    {
        $form = $this->createForm(PlayerType::class,$player);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $playerEvent = $this->get(\App\Event\PlayerEvent::class);
            $playerEvent->setPlayer($player);
            $playerEvent->setAddMoney($form->get('AjouterMoney'));
            $playerEvent->setMoney('AjouterExperience')->getData();
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->dispatch(AppEvent::PLAYER_EDIT, $playerEvent);
            return $this->redirect($this->generateUrl('app_player_index'));
        }
        return $this->render("Player/new.html.twig",['form'=>$form->createView(), ]);
    }
}