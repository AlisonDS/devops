<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ChercherTerrainType; 
use App\Repository\TerrainRepository;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    // Ajouter le constructeur suivant pour injecter le service Doctrine
    public function __construct(
        private \Doctrine\Persistence\ManagerRegistry $doctrine
    ) {
    }

    // Nouvelle action pour gérer le formulaire ChercherTerrainType
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/base.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }

    #[Route('/accueil', name: 'app_accueil')]
    public function search(Request $request, TerrainRepository $terrainRepository)
    {
        $form = $this->createForm(ChercherTerrainType::class);
        $form->handleRequest($request);

        $terrains = []; // Initialiser le tableau des terrains à vide

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $ville = $data->getVille(); // Utiliser la méthode getVille() pour accéder à la propriété de l'entité

            // Effectuer une requête pour obtenir les terrains de la même ville depuis la base de données
            $terrains = $terrainRepository->findBy(['Ville' => $ville]);
        }

        // Afficher le formulaire et les terrains
        return $this->render('accueil/base.html.twig', [
            'form' => $form->createView(),
            'terrains' => $terrains,
        ]);
    }

}


