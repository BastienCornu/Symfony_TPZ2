<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 20/11/17
 * Time: 14:31
 */

namespace App\Controller;


use App\Entity\Inventory;
use App\Form\InventoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\Routing\Annotation\Route;


class InventoryController extends Controller
{
    /**
     * @Route("/inventory/new" , name="app_inventory_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $inventory = new Inventory();

        $form = $this->createForm(InventoryType::class,$inventory);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $calcul = new \App\Calculate\Inventory($em);
            $calcul->setPerson($inventory->getPerson());
            $calcul->setInventory($inventory);
            if($calcul->calcul()){
                $em->persist($inventory);
                $em->flush();
                $this->container->get('session')->getFlashBag()->add("success","L'ajout a bien été effectué.");
                return $this->redirect($this->generateUrl('app_inventory_index'));
            } else {
                $this->container->get('session')->getFlashBag()->add('error',"L'ajout a échoué");
            }


        }
        return $this->render("Inventory/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/inventories" , name="app_inventory_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $inventories = $em->getRepository(Inventory::class)->findAll();
        return $this->render("Inventory/index.html.twig",["inventories"=>$inventories]);
    }
}