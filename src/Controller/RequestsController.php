<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\VehiclesRepository;
use App\Repository\DriversRepository;

#[Route('/requests')]
class RequestsController extends AbstractController
{
    #[Route('/get-available-vehicles', name: 'app_get_available_vehicles', methods: ['GET'])]
    public function getAvailableVehicles(Request $request, VehiclesRepository $vehiclesRepository): Response
    {
        $date = $request->query->get('date');

        $vehicles = $vehiclesRepository->findByAvailableDate($date);

        return $this->render('trip/list_available_vehicles.html.twig', [
            'vehicles' => $vehicles,
        ]);
    }

    #[Route('/get-available-drivers', name: 'app_get_available_drivers', methods: ['GET'])]
    public function getAvailableDrivers(Request $request, DriversRepository $driversRepository): Response
    {
        $date = $request->query->get('date');
        $license = $request->query->get('license');

        $drivers = $driversRepository->findByAvailableDate($date, $license);

        return $this->render('trip/list_available_drivers.html.twig', [
            'drivers' => $drivers,
        ]);
    }
}