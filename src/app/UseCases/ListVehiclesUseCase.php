<?php

namespace App\UseCases;

use App\Repositories\VehicleRepositoryInterface;

class ListVehiclesUseCase {
    protected $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository) {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function execute() {
        return $this->vehicleRepository->getAll();
    }
}
