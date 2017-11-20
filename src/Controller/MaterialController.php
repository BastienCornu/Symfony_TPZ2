<?php

namespace App\Controller;

use App\Entity\Material;
use App\Entity\Person;
use App\Form\MaterialType;
use App\Form\PersonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaterialController extends Controller
{
    /**
     * @Route("/material/new" , name="app_material_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $material = new Material();

        $form = $this->createForm(MaterialType::class,$material);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($material);
            $em->flush();
            return $this->redirect($this->generateUrl('app_material_index'));
        }
        return $this->render("Material/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/materials" , name="app_material_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $materials = $em->getRepository(Material::class)->findAll();
        return $this->render("Material/index.html.twig",["materials"=>$materials]);
    }

    /**
     * @Route("/material/edit/{id}", name="app_material_edit")
     */
    function edit(Request $request,Person $person){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PersonType::class,$person);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('app_material_index'));
        }

    }
}