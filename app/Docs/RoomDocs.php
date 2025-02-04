namespace App\Docs;

class RoomDocs
{


    /**
    * @OA\Info(
    *      version="1.0.0",
    *      title="API de Gestión de habitaciones",
    *      description="Documentación de la API de gestión de habitaciones",
    * )
    */

    /**
     * @OA\Get(
     *      path="/api/rooms",
     *      summary="Obtener lista de habitaciones",
     *      tags={"Habitaciones"},
     *      @OA\Response(
     *          response=200,
     *          description="Lista de habitaciones obtenida correctamente",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Room"))
     *      )
     * )
     */

    /**
     * @OA\Post(
     *      path="/api/rooms",
     *      summary="Crear una nueva habitación",
     *      tags={"Habitaciones"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"hotel_id","room_type_id","accommodation_id","quantity"},
     *              @OA\Property(property="hotel_id", type="integer", example=1),
     *              @OA\Property(property="room_type_id", type="integer", example=1),
     *              @OA\Property(property="accommodation_id", type="integer", example=1),
     *              @OA\Property(property="quantity", type="integer", example=25)
     *          ),
     *      ),
     *      @OA\Response(response=201, description="Habitación creada exitosamente"),
     *      @OA\Response(response=400, description="Error en los datos enviados")
     * )
     */

    /**
     * @OA\Get(
     *      path="/api/rooms/{id}",
     *      summary="Obtener una habitación por ID",
     *      tags={"Habitaciones"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID de la habitación a consultar",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Detalles de la habitación",
     *          @OA\JsonContent(ref="#/components/schemas/Room")
     *      ),
     *      @OA\Response(response=404, description="Habitación no encontrada")
     * )
     */

    /**
     * @OA\Put(
     *      path="/api/rooms/{id}",
     *      summary="Actualizar una habitación",
     *      tags={"Habitaciones"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID de la habitación a actualizar",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"quantity"},
     *              @OA\Property(property="quantity", type="integer", example=30)
     *          ),
     *      ),
     *      @OA\Response(response=200, description="Habitación actualizada correctamente"),
     *      @OA\Response(response=404, description="Habitación no encontrada")
     * )
     */

    /**
     * @OA\Delete(
     *      path="/api/rooms/{id}",
     *      summary="Eliminar una habitación",
     *      tags={"Habitaciones"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID de la habitación a eliminar",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Habitación eliminada correctamente",
     *          @OA\JsonContent(@OA\Property(property="message", type="string", example="Habitación eliminada"))
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Habitación no encontrada",
     *          @OA\JsonContent(@OA\Property(property="error", type="string", example="Habitación no encontrada"))
     *      )
     * )
     */
}
