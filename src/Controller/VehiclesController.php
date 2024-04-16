<?php

namespace App\Controller;

use App\Entity\Vehicles;
use App\Form\VehiclesType;
use App\Repository\VehiclesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/vehicles')]
class VehiclesController extends AbstractController
{
    #[Route('/', name: 'app_vehicles_index', methods: ['GET'])]
    public function index(VehiclesRepository $vehiclesRepository): Response
    {
        return $this->render('vehicles/index.html.twig', [
            'vehicles' => $vehiclesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_vehicles_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicle = new Vehicles();
        $form = $this->createForm(VehiclesType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vehicle);
            $entityManager->flush();

            return $this->redirectToRoute('app_vehicles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vehicles/new.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicles_show', methods: ['GET'])]
    public function show(Vehicles $vehicle): Response
    {
        return $this->render('vehicles/show.html.twig', [
            'vehicle' => $vehicle,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_vehicles_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vehicles $vehicle, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(VehiclesType::class, $vehicle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_vehicles_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('vehicles/edit.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_vehicles_delete', methods: ['POST'])]
    public function delete(Request $request, Vehicles $vehicle, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vehicle->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($vehicle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_vehicles_index', [], Response::HTTP_SEE_OTHER);
    }
}
