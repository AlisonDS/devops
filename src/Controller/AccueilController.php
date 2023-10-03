<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ChercherTerrainType; // Importe le formulaire ChercherTerrainType
use App\Entity\Terrain; 
use App\Repository\TerrainRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AccueilController extends AbstractController
{
    public function __construct(
        private \Doctrine\Persistence\ManagerRegistry $doctrine
    ) {
    }

    // Votre action précédente
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/base.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    // Nouvelle action pour gérer le formulaire ChercherTerrainType
    
   // Nouvelle action pour gérer le formulaire ChercherTerrainType

    #[Route('/accueil', name: 'app_accueil')]
    // public function search(Request $request)
    // {
    //     $form = $this->createForm(ChercherTerrainType::class);
    //     $form->handleRequest($request);

    //     // $villes = []; // Initialisez le tableau des villes à vide
    //     // $terrains = []; // Initialisez le tableau des terrains à vide

    //     $villes = $this->doctrine
    //         ->getRepository(Terrain::class)
    //         ->findAll(); // Créez une méthode findAll() dans votre repository pour obtenir toutes les villes
    //     $terrains = $this->doctrine
    //         ->getRepository(Terrain::class)
    //         ->findAll(); // Créez une méthode findAll() dans votre repository pour obtenir tous les terrains

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $data = $form->getData();
    //         $ville = $data['Ville'];

    //         // $entityManager = $this->getDoctrine()->getManager();
    //         // $terrains = $entityManager->getRepository(Terrain::class)->findBy(['ville' => $ville]);

    //         // Vous pouvez maintenant effectuer une requête pour obtenir les terrains de la même ville depuis la base de données
    //         $villes = $this->getDoctrine()
    //             ->getRepository(Terrain::class)
    //             ->findBy(['ville' => $ville]); // Créez une méthode findByProductName() dans votre repository pour effectuer la recherche

            
    //     }

    //     return $this->render('accueil/base.html.twig', [
    //         'form' => $form->createView(),
    //         'villes' => $villes,
    //         'terrains' => $terrains,
    //     ]);
    // }
    public function search(Request $request, TerrainRepository $terrainRepository)
    {
        $form = $this->createForm(ChercherTerrainType::class);
        $form->handleRequest($request);

        $terrains = []; // Initialisez le tableau des terrains à vide

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $ville = $data->getVille(); // Utilisez la méthode getVille() pour accéder à la propriété de l'entité

            // Vous pouvez maintenant effectuer une requête pour obtenir les terrains de la même ville depuis la base de données
            $terrains = $terrainRepository->findBy(['Ville' => $ville]);
        }

        return $this->render('accueil/base.html.twig', [
            'form' => $form->createView(),
            'terrains' => $terrains,
        ]);
    }

}


