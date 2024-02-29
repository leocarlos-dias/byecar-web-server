<?php

namespace App\Repositories;

use App\Entities\Vehicle;

class InMemoryVehicleRepository implements VehicleRepositoryInterface
{
    protected $vehicles = [];

    public function getAll(): array
    {
        return $this->vehicles;
    }

    public function findById(string $id): ?Vehicle
    {
        return $this->vehicles[$id] ?? null;
    }

    public function save(Vehicle $vehicle): void
    {
        $this->vehicles[$vehicle->id] = $vehicle;
    }

    public function delete(string $id): void
    {
        unset($this->vehicles[$id]);
    }
}
