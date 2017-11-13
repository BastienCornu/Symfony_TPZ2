<?php

namespace App\Controller;

use App\Entity\Person;
use App\Form\PersonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonController extends Controller
{
    /**
     * @Route("/creation/" , name="app_person_new")
     */
    function new(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $person = new Person();
        /*
        $person->setName("Cornu");
        $person->setAge(20);
        $person->setVisible(true);
        $person->setCreatedAt(new \DateTime("now"));
        $person->setColor("Bleu");
        $em->persist($person);
        $em->flush();
        return $this->render("Person/new.html.twig");
         */
        $form = $this->createForm(PersonType::class,$person);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($person);
            $em->flush();
            return $this->redirect($this->generateUrl('app_person_index'));
        }
        return $this->render("Person/new.html.twig",['form'=>$form->createView(), ]);

    }

    /**
     * @Route("/" , name="app_person_index")
     */
    function index()
    {
        $em = $this->getDoctrine()->getManager();
        $persons = $em->getRepository(Person::class)->findAll();
        return $this->render("Person/index.html.twig",["persons"=>$persons]);
    }

    /**
     * @Route("/edit/{id}", name="app_person_edit")
     */
    function edit(Request $request,Person $person){
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PersonType::class,$person);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirect($this->generateUrl('app_person_index'));
        }
    }
}