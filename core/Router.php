<?php 

    namespace app\core;
    /**
     * Router Class
     * @author Ishwor khadka
     * @package app\core
     * 
    */
    
class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct( Request $request, Response $response ) {
        $this->request= $request;
        $this->response= $response;
    }

    /**
     * Get function $string $callback.
     * 
     * @author Ishwor khadka <asishwor@gmail.com>
     * 
     * @param string $path     path
     * @param func   $callback callback function
     * 
     * @return void     
     */
    public function get(string $path, $callback)
    { 
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Function to resolve path.
     *  
     * @author Ishwor khadka <asishwor@gmail.com>
     * @return void
     */ 
    public function resolve()
    {
        $path = $this->request->getPath();

        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        if ( ! $callback ) {
            $this->response->setStatusCode(404);
            return 'not found';
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    /**
     * 
     */
    public function renderView( string $view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace("{{content}}", $viewContent, $layoutContent);
    }

    /**
     * Get render dynamic content.
     */
    protected function layoutContent()
    {
        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/main.php';
        return ob_get_clean();
    }

    /**
     * Render Only view.
     */
    protected function renderOnlyView($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
?>

