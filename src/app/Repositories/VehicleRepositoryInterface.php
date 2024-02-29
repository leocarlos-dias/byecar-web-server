<?php

namespace App\Repositories;

use App\Entities\Vehicle;

interface VehicleRepositoryInterface {
    public function getAll(): array;
    public function findById(string $id): ?Vehicle;
    public function save(Vehicle $vehicle): void;
    public function delete(string $id): void;
}
