<?php

namespace App\Repositories;

use App\Entities\Vehicle;

class EloquentVehicleRepository implements VehicleRepositoryInterface {
    public function getAll(): array {
        return Vehicle::all()->toArray();
    }

    public function findById(string $id): ?Vehicle {
        return Vehicle::find($id);
    }

    public function save(Vehicle $vehicle): void {
        $vehicle->save();
    }

    public function delete(string $id): void {
        Vehicle::destroy($id);
    }
}
