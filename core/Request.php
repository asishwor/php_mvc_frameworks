<?php 

namespace app\core;

/**
 * Request class.
 *
 * @package App\core
 * @author  Ishwor khadka <asishwor@gmail.com>
 * 
 */
class Request
{
    /**
     * Get path or endpoints.
     * 
     * @return string
     */
    public function getPath()
    {
        
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        $position = strpos($path, '?');
        
        if (! $position) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    /**
     * Get request method is GET or Post.
     * 
     * @return string
     */
    public function getMethod()
    {
        return strtolower($_SERVER[ 'REQUEST_METHOD' ]);
    }
}
