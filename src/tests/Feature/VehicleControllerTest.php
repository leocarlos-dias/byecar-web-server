<?php

namespace Tests\Unit\Http\Controllers;

use App\Entities\Vehicle;
use Tests\TestCase;
use App\Http\Controllers\VehicleController;
use App\Repositories\InMemoryVehicleRepository;
use App\UseCases\ListVehiclesUseCase;
use App\UseCases\UpdateVehicleUseCase;
use App\UseCases\DeleteVehicleUseCase;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mockery;

class VehicleControllerTest extends TestCase
{
    protected $inMemoryRepository;
    protected $listVehiclesUseCase;
    protected $updateVehicleUseCase;
    protected $deleteVehicleUseCase;
    protected $vehicleController;
    private $vehicle1;
    private $vehicle2;

    public function setUp(): void
    {
        parent::setUp();

        $this->inMemoryRepository = new InMemoryVehicleRepository();

        $this->listVehiclesUseCase = new ListVehiclesUseCase($this->inMemoryRepository);
        $this->updateVehicleUseCase = new UpdateVehicleUseCase($this->inMemoryRepository);
        $this->deleteVehicleUseCase = new DeleteVehicleUseCase($this->inMemoryRepository);

        $this->vehicleController = new VehicleController(
            $this->listVehiclesUseCase,
            $this->updateVehicleUseCase,
            $this->deleteVehicleUseCase
        );

        $this->vehicle1 = Vehicle::create([
            'id' => '46a72284-3401-49b8-a744-dbf886c7af8f',
            'name' => 'BMW 116iA 1.6 TB 16V 136cv 150p',
            'fipe_code' => '009171-6',
            'price' => '115000.00',
        ]);
    
        $this->vehicle2 = Vehicle::create([
            'id' => '95f59646-40f0-4df3-925d-895f4e36fceb',
            'name' => 'Tesla Model S Plaid 2022',
            'fipe_code' => '009171-9',
            'price' => '191000.00',
        ]);
    
        $this->inMemoryRepository->save($this->vehicle1);
        $this->inMemoryRepository->save($this->vehicle2);
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function test_list_vehicles()
    {
        $response = $this->vehicleController->index();

        $this->assertNotNull($response);

        $this->assertInstanceOf(View::class, $response);

        $this->assertArrayHasKey('vehicles', $response->getData());

        $vehiclesInView = $response->getData()['vehicles'];
        $this->assertCount(2, $vehiclesInView);
    }

    public function test_update_vehicle()
    {
        $request = new Request(['name' => 'Updated Vehicle', 'fipe_code' => '009171-6', 'price' => '120000.00']);

        $vehicleId = $this->vehicle2->id;

        $this->updateVehicleUseCase->execute($vehicleId, $request->only(['name', 'fipe_code', 'price']));

        $vehicle = $this->inMemoryRepository->findById($vehicleId);

        $this->assertNotNull($vehicle);
        $this->assertEquals($this->vehicle2->id, $vehicle->id);
        $this->assertEquals('Updated Vehicle', $vehicle->name);
        $this->assertEquals('009171-6', $vehicle->fipe_code);
        $this->assertEquals('120000.00', $vehicle->price);
    }

    public function test_delete_vehicle()
    {
        $vehicleId = $this->vehicle1->id;

        $this->deleteVehicleUseCase->execute($vehicleId);

        $vehicle = $this->inMemoryRepository->findById($vehicleId);

        $this->assertNull($vehicle);
    }
}
