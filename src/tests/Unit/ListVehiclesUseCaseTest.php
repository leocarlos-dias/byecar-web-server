<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\VehicleRepositoryInterface;
use App\UseCases\ListVehiclesUseCase;
use App\Entities\Vehicle;
use App\Repositories\InMemoryVehicleRepository;
use Mockery;

class ListVehiclesUseCaseTest extends TestCase
{
    protected $vehicleRepository;
    protected $listVehiclesUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->vehicleRepository = new InMemoryVehicleRepository();

        $this->listVehiclesUseCase = new ListVehiclesUseCase($this->vehicleRepository);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_list_vehicles_with_empty_repository()
    {
        $vehicles = $this->listVehiclesUseCase->execute();
        $this->assertEmpty($vehicles);
    }

    public function test_list_vehicles_with_data()
    {
        $vehicle1 = new Vehicle();
        $vehicle1->id = "46a72284-3401-49b8-a744-dbf886c7af8f";
        $vehicle1->name = "BMW 116iA 1.6 TB 16V 136cv 150p";
        $vehicle1->fipe_code = "009171-6";
        $vehicle1->price = "115000.00";

        $vehicle2 = new Vehicle();
        $vehicle2->id = "95f59646-40f0-4df3-925d-895f4e36fceb";
        $vehicle2->name = "Tesla Model S Plaid 2022";
        $vehicle2->fipe_code = "009171-9";
        $vehicle2->price = "191000.00";

        $this->vehicleRepository->save($vehicle1);
        $this->vehicleRepository->save($vehicle2);

        $vehicles = $this->listVehiclesUseCase->execute();

        $this->assertNotEmpty($vehicles);
        $this->assertCount(2, $vehicles);

        $this->assertEquals("46a72284-3401-49b8-a744-dbf886c7af8f", $vehicles[$vehicle1->id]->id);
        $this->assertEquals("BMW 116iA 1.6 TB 16V 136cv 150p", $vehicles[$vehicle1->id]->name);
        $this->assertEquals("009171-6", $vehicles[$vehicle1->id]->fipe_code);
        $this->assertEquals("115000.00", $vehicles[$vehicle1->id]->price);

        $this->assertEquals("95f59646-40f0-4df3-925d-895f4e36fceb", $vehicles[$vehicle2->id]->id);
        $this->assertEquals("Tesla Model S Plaid 2022", $vehicles[$vehicle2->id]->name);
        $this->assertEquals("009171-9", $vehicles[$vehicle2->id]->fipe_code);
        $this->assertEquals("191000.00", $vehicles[$vehicle2->id]->price);
    }
}
