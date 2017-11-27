<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:40
 */

namespace App\Controller;


use App\Calculate\Equipment;
use App\Entity\PlayerItem;
use App\Form\PlayerItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PlayerItemController extends Controller
{
    /**
     * @Route("/playeritem/new" , name="app_playeritems_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = new PlayerItem();
        $nbItem = $this->get(App/SizeEquipment/Equipment::class);

        $form = $this->createForm(PlayerItemType::class,$player);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($player);
            $em->flush();
            return $this->redirect($this->generateUrl('app_playeritem_index'));
        }
        return $this->render("PlayerItem/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/playeritems" , name="app_playeritem_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $playerItems = $em->getRepository(PlayerItem::class)->findAll();
        return $this->render("PlayerItem/index.html.twig",["playeritems"=>$playerItems]);
    }
}