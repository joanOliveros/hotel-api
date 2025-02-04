namespace App\Docs;

class HotelDocs
{

    /**
    * @OA\Info(
    *      version="1.0.0",
    *      title="API de Gestión de Hoteles",
    *      description="Documentación de la API de gestión de hoteles",
    * )
    */

    /**
     * @OA\Get(
     *      path="/api/hotels",
     *      summary="Obtener lista de hoteles",
     *      tags={"Hoteles"},
     *      @OA\Response(
     *          response=200,
     *          description="Lista de hoteles obtenida correctamente",
     *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Hotel"))
     *      )
     * )
     */


    /**
    * @OA\Get(
    *      path="/api/hotels/{id}",
    *      summary="Obtener un hotel por ID",
    *      tags={"Hoteles"},
    *      @OA\Parameter(
    *          name="id",
    *          in="path",
    *          required=true,
    *          description="ID del hotel a consultar",
    *          @OA\Schema(type="integer")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Detalles del hotel",
    *          @OA\JsonContent(ref="#/components/schemas/Hotel")
    *      ),
    *      @OA\Response(response=404, description="Hotel no encontrado")
    * )
    */

    /**
     * @OA\Post(
     *      path="/api/hotels",
     *      summary="Crear un nuevo hotel",
     *      tags={"Hoteles"},
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name","address","city","nit","total_rooms"},
     *              @OA\Property(property="name", type="string", example="Hotel Decameron Cartagena"),
     *              @OA\Property(property="address", type="string", example="Calle 23 58-25"),
     *              @OA\Property(property="city", type="string", example="Cartagena"),
     *              @OA\Property(property="nit", type="string", example="12345678-9"),
     *              @OA\Property(property="total_rooms", type="integer", example=42)
     *          ),
     *      ),
     *      @OA\Response(response=200, description="Hotel creado exitosamente"),
     * )
     */


    /**
    * @OA\Put(
    *      path="/api/hotels",
    *      summary="Actualizar un hotel",
    *      tags={"Hoteles"},
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(
    *              required={"name","address","city","nit","total_rooms"},
    *              @OA\Property(property="name", type="string", example="Hotel Decameron Cartagena"),
    *              @OA\Property(property="address", type="string", example="Calle 23 58-12"),
    *              @OA\Property(property="city", type="string", example="Cartagena"),
    *              @OA\Property(property="nit", type="string", example="12345678-9"),
    *              @OA\Property(property="total_rooms", type="integer", example=42)
    *          ),
    *      ),
    *      @OA\Response(response=200, description="Hotel actualizado exitosamente"),
    * )
    */

    /**
     * @OA\Delete(
     *      path="/api/hotels/{id}",
     *      summary="Eliminar un hotel",
     *      tags={"Hoteles"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="ID del hotel a eliminar",
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Hotel eliminado correctamente",
     *          @OA\JsonContent(@OA\Property(property="message", type="string", example="Hotel eliminado"))
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Hotel no encontrado",
     *          @OA\JsonContent(@OA\Property(property="error", type="string", example="Hotel no encontrado"))
     *      )
     * )
     */
}
