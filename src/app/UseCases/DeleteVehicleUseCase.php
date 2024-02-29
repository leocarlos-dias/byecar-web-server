<?php

namespace App\UseCases;

use App\Repositories\VehicleRepositoryInterface;

class DeleteVehicleUseCase {
    protected $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository) {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function execute(string $id): void {
        $this->vehicleRepository->delete($id);
    }
}
