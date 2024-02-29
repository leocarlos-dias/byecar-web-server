<?php

namespace Tests\Unit;

use App\Entities\Vehicle;
use App\Repositories\InMemoryVehicleRepository;
use Tests\TestCase;
use App\UseCases\DeleteVehicleUseCase;

class DeleteVehicleUseCaseTest extends TestCase
{
    protected $vehicleRepository;
    protected $deleteVehicleUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->vehicleRepository = new InMemoryVehicleRepository();

        $this->deleteVehicleUseCase = new DeleteVehicleUseCase($this->vehicleRepository);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_delete_vehicle()
    {
        $vehicle1 = new Vehicle();
        $vehicle1->id = "46a72284-3401-49b8-a744-dbf886c7af8f";
        $vehicle1->name = "BMW 116iA 1.6 TB 16V 136cv 150p";
        $vehicle1->fipe_code = "009171-6";
        $vehicle1->price = "115000.00";

        $this->vehicleRepository->save($vehicle1);

        $this->deleteVehicleUseCase->execute($vehicle1->id);

        $vehicle = $this->vehicleRepository->findById($vehicle1->id);

        var_dump($vehicle);

        $this->assertNull($vehicle);
    }
}
