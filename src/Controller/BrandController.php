<?php

namespace App\Controller;

use App\Entity\Brand;
use App\Repository\BrandRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 *
 * @Route("/api")
 */
class BrandController extends AbstractController
{

    ///////// FIND ALL BRANDs- OK
    /**
     * @Route("/brand/findAll", name="brand_fidnAll",methods={"GET"})
     */
    public function findAll(BrandRepository $repo): Response
    {
        $brands = $repo->findAll();
        return $this->json($brands, 200, [], [
            "groups" => ["brand"]
        ]);
    }

    ////// FIND ONE BRAND --- OK
    /**
     * @Route("/brand/findOne/{id}", name="brand_fidnOne",methods={"GET"}, requirements={"id":"\d+"})
     */
    public function findOne(BrandRepository $repo, $id): Response
    {
        $brand = $repo->findBy(["id" => $id]);
        return $this->json($brand, 200, [], [
            "groups" => ["brand"]
        ]);
    }

    // /**
    //  * @Route("/brand/findOne/{id}", name="brand_fidnOne",methods={"GET"}, requirements={"id":"\d+"})
    //  */
    // public function findOne(BrandRepository $repo, $id): Response
    // {
    //     $brand = $repo->findBy(["id" => $id]);
    //     return $this->json($brand, 200, [], [
    //         "groups" => ["brand"]
    //     ]);
    // }


    /**
     * @Route("/brand/models/{id}", name="brandModel",methods={"GET"})
     */
    public function getTheModels(Brand $brand): Response
    {
        $modeles = $brand->getModele();
        return $this->json($modeles, 200, [], ['groups' => 'modele']);
    }
}
