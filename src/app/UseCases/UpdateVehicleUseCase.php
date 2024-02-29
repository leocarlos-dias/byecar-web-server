<?php

namespace App\UseCases;

use App\Repositories\VehicleRepositoryInterface;
use App\Entities\Vehicle;

class UpdateVehicleUseCase {
    protected $vehicleRepository;

    public function __construct(VehicleRepositoryInterface $vehicleRepository) {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function execute(string $id, array $data): Vehicle {
        $vehicle = $this->vehicleRepository->findById($id);
        $vehicle->fill($data);
        $this->vehicleRepository->save($vehicle);
        return $vehicle;
    }
}
