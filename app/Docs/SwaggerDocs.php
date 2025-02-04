namespace App\Docs;

class SwaggerDocs
{
    /**
     * @OA\OpenApi(
     *      @OA\Info(
     *          version="1.0.0",
     *          title="API de Gestión de Hoteles",
     *          description="Documentación de la API para administrar hoteles y habitaciones",
     *          @OA\Contact(
     *              email="tu_email@ejemplo.com"
     *          )
     *      ),
     *      @OA\Server(
     *          url="http://127.0.0.1:8000",
     *          description="Servidor local"
     *      )
     * )
     *
     * @OA\PathItem(path="/api/hotels")
     * @OA\PathItem(path="/api/rooms")
     */
}
