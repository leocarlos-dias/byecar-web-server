<?php

namespace App\Http\Controllers;

use App\UseCases\ListVehiclesUseCase;
use App\UseCases\UpdateVehicleUseCase;
use App\UseCases\DeleteVehicleUseCase;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *      title="API de Veículos",
 *      version="1.0.0",
 *      description="API para listar, atualizar e excluir veículos",
 *      @OA\Contact(
 *          email="leocsdias@hotmail.com",
 *          name="Leonardo Carlos"
 *      )
 * )
 */
class VehicleController
{
    protected $listVehiclesUseCase;
    protected $updateVehicleUseCase;
    protected $deleteVehicleUseCase;

    public function __construct(
        ListVehiclesUseCase $listVehiclesUseCase,
        UpdateVehicleUseCase $updateVehicleUseCase,
        DeleteVehicleUseCase $deleteVehicleUseCase
    ) {
        $this->listVehiclesUseCase = $listVehiclesUseCase;
        $this->updateVehicleUseCase = $updateVehicleUseCase;
        $this->deleteVehicleUseCase = $deleteVehicleUseCase;
    }

    /**
     * @OA\Get(
     *      path="/api/vehicles",
     *      operationId="listVehicles",
     *      tags={"Vehicles"},
     *      summary="List all vehicles",
     *      description="Returns a list of all vehicles.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      )
     * )
     */
    public function index()
    {
        $vehicles = $this->listVehiclesUseCase->execute();
        return view('vehicles.index', ['vehicles' => $vehicles]);
    }

    /**
     * @OA\Patch(
     *      path="/api/vehicles/{id}",
     *      operationId="updateVehicle",
     *      tags={"Vehicles"},
     *      summary="Update an existing vehicle",
     *      description="Update an existing vehicle by ID.",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the vehicle to update",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          description="Updated vehicle data",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  property="name",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="fipe_code",
     *                  type="string"
     *              ),
     *              @OA\Property(
     *                  property="price",
     *                  type="number",
     *                  format="float"
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Vehicle updated successfully"
     *      )
     * )
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only(['name', 'fipe_code', 'price']);
        $this->updateVehicleUseCase->execute($id, $data);
        return back()->with('success', 'Vehicle updated successfully');
    }

    /**
     * @OA\Delete(
     *      path="/api/vehicles/{id}",
     *      operationId="deleteVehicle",
     *      tags={"Vehicles"},
     *      summary="Delete a vehicle",
     *      description="Delete a vehicle by ID.",
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID of the vehicle to delete",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Vehicle deleted successfully"
     *      )
     * )
     */
    public function delete(string $id)
    {
        $this->deleteVehicleUseCase->execute($id);
        return back()->with('success', 'Vehicle deleted successfully');
    }
}
