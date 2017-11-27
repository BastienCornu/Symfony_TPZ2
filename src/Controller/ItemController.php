<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:39
 */

namespace App\Controller;


use App\Entity\Item;
use App\Form\ItemType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ItemController extends Controller
{
    /**
     * @Route("/item/new" , name="app_item_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $item = new Item();

        $form = $this->createForm(ItemType::class,$item);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($item);
            $em->flush();
            return $this->redirect($this->generateUrl('app_item_index'));
        }
        return $this->render("Item/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/items" , name="app_item_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository(Item::class)->findAll();
        return $this->render("Item/index.html.twig",["items"=>$items]);
    }
}