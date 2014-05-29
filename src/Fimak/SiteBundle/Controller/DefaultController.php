<?php

namespace Fimak\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fimak\SiteBundle\Form\EnquiryType;
use Fimak\SiteBundle\Entity\Enquiry;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->forward('FimakSiteBundle:Article:index');
        //return $this->render('FimakSiteBundle:Default:index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('FimakSiteBundle:Default:about.html.twig');
    }

    public function contactAction()
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        if ($form->isValid()) {

            //@todo: сделать запись в бд и отправку письма с очередями

            return $this->redirect($this->generateUrl('fimak_site_contact'));
        }

        return $this->render('FimakSiteBundle:Default:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
