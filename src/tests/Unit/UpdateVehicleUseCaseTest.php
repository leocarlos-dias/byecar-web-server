<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\UseCases\UpdateVehicleUseCase;
use App\Repositories\InMemoryVehicleRepository;
use App\Entities\Vehicle;

class UpdateVehicleUseCaseTest extends TestCase
{
    protected $vehicleRepository;
    protected $updateVehicleUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->vehicleRepository = new InMemoryVehicleRepository();

        $this->updateVehicleUseCase = new UpdateVehicleUseCase($this->vehicleRepository);
    }

    public function test_update_vehicle()
    {
        $vehicle = new Vehicle();
        $vehicle->id = "46a72284-3401-49b8-a744-dbf886c7af8f";
        $vehicle->name = 'Test Vehicle';
        $vehicle->fipe_code = '009171-6';
        $vehicle->price = '100000.00';

        $this->vehicleRepository->save($vehicle);

        $vehicleData = [
            'name' => 'Updated Vehicle',
            'fipe_code' => '009171-6',
            'price' => '120000.00'
        ];

        $updatedVehicle = $this->updateVehicleUseCase->execute($vehicle->id, $vehicleData);

        $this->assertEquals($vehicle->id, $updatedVehicle->id);
        $this->assertEquals($vehicleData['name'], $updatedVehicle->name);
        $this->assertEquals($vehicleData['fipe_code'], $updatedVehicle->fipe_code);
        $this->assertEquals($vehicleData['price'], $updatedVehicle->price);
    }
}
