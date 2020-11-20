<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Form\MeteoType;
use App\Repository\MeteoRepository;
use App\Service\MeteoService;
use ContainerKyOhpDH\getMeteoRepositoryService;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class MeteoController extends AbstractController
{
    /**
     * @Route("/", name="meteo_" ,methods={"GET","POST"})
     */
    public function index(Request $request,EntityManagerInterface $em ): Response
    {
        $meteo = new Meteo();
        $form = $this->createForm(MeteoType::class, $meteo);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $service = new MeteoService();
                $json = $service->ApiCall($form->getData());

                    $meteo= $meteo->setVille($json->name);
                    $meteo = $meteo->setTemperature($json->main->temp);
                    $meteo = $meteo->setHumidity($json->main->humidity);
                    $meteo = $meteo->setDescription($json->weather[0]->description);
                    $meteo = $meteo->setVent($json->wind->speed);
                    $meteo=$meteo->setIcone($json->weather[0]->icon);

                    $em->persist($meteo);
                    $em->flush();
            }catch (\Exception $e){
              echo "cette ville est introuvable" .$e->getMessage();
            }

        }
        return $this->render('meteo/index.html.twig', [
            'form' => $form->createView(),
            'meteo' => $meteo
        ]);
    }

}


