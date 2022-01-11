<?php

namespace Core\MkyCompiler;

use Exception;
use Core\Facades\Cache;
use Core\Facades\Session;

class MkyEngine
{

    private const VIEW_SUFFIX = '.mky';
    private const CACHE_SUFFIX = '.cache.php';
    private const ECHO = ['{{', '}}'];
    private array $config;
    /**
     * @var null|string|false
     */
    private $view;
    private array $sections = [];
    private array $data = [];
    private string $viewName = '';
    private string $viewPath = '';
    private MkyCompile $directives;

    public array $errors;

    public function __construct(array $config)
    {
        $this->directives = new MkyCompile();
        $this->config = $config;
        $this->errors = $_GET['errors'] ?? [];
    }

    /**
     * Compile and send the view
     *
     * @param string $viewName
     * @param array $data
     * @param bool $extends
     * @return false|string
     * @throws Exception
     */
    public function view(string $viewName, array $data = [], $extends = false)
    {
        $viewPath = $this->getConfig('views') . '/' . $this->parseViewName($viewName);
        if(!$extends){
            $this->viewName = $viewName;
            $this->data = $data;
            $this->viewPath = $viewPath;
        }else{
            $viewPath = $this->getConfig('layouts') . '/' . $this->parseViewName($viewName);
        }
        if(!file_exists($viewPath)){
            throw new Exception(sprintf('View %s does not exist', $viewPath));
        }

        $this->view = file_get_contents($viewPath);
        $this->parse();


        $cachePath = $this->getConfig('cache') . '/' . md5($this->viewName) . self::CACHE_SUFFIX;
        if(!file_exists($cachePath)){
            Cache::addCache($cachePath, $this->view);
        }

        if(
            (filemtime($cachePath) < filemtime($viewPath)) ||
            (filemtime($cachePath) < filemtime($this->viewPath))
        ){
            echo '<!-- cache file updated -->';
            Cache::addCache($cachePath, $this->view);
        }

        if(!$extends){
            ob_start();
            extract($data);
            $errors = Session::getFlashMessagesByType(Session::getConstant('FLASH_ERROR'));
            $success = Session::getFlashMessagesByType(Session::getConstant('FLASH_SUCCESS'));
            $flashMessages = Session::getFlashMessagesByType(Session::getConstant('FLASH_MESSAGE'));
            require $cachePath;
            echo ob_get_clean();
        }
    }

    /**
     * Format the view file
     *
     * @param string $viewName
     * @return string
     */
    private function parseViewName(string $viewName): string
    {
        $viewName = str_replace('.', '/', $viewName);
        return $viewName . self::VIEW_SUFFIX;
    }

    /**
     * Compile the view
     */
    public function parse()
    {
        $this->parseIncludes();
        $this->parseVariables();
        $this->parseSections();
        $this->parseExtends();
        $this->parseYields();
        $this->parseDirectives();
    }

    /**
     * Compile echo variables
     */
    public function parseVariables(): void
    {
        $this->view = preg_replace_callback('/' . self::ECHO[0] . '(.*?)' . self::ECHO[1] . '/', function ($variable) {
            return "<?=" . trim($variable[1]) . "?>";
        }, $this->view);
    }


    /**
     * Get config value
     *
     * @param string $key
     * @return mixed
     */
    private function getConfig(string $key)
    {
        return $this->config[$key] ?? $this->config;
    }

    /**
     * Compile included files
     */
    public function parseIncludes(): void
    {
        $this->view = preg_replace_callback('/@include\(\'(.*?)\'\)/', function ($viewName) {
            return file_get_contents($this->getConfig('views') . '/' . $this->parseViewName($viewName[1]));
        }, str_replace(' (', '(', $this->view));
    }

    /**
     * Compile the layout
     */
    public function parseExtends(): void
    {
        $this->view = preg_replace_callback('/@extends\(\'(.*?)\'\)/', function ($viewName) {
            return $this->view($viewName[1], $this->data, true);
        }, str_replace(' (', '(', $this->view));
    }

    /**
     * compile layout yield block
     */
    public function parseYields(): void
    {
        $this->view = preg_replace_callback('/@yield\(\'(.*?)\'\)/s', function ($yieldName) {
            return $this->sections[$yieldName[1]] ?? '';
        }, str_replace(' (', '(', $this->view));
    }

    /**
     * Compile view sections
     */
    public function parseSections(): void
    {
        $this->view = preg_replace_callback('/@section\(\'(.*?)\', (\"(.*?)\"|\'(.*?)\')\)/', function ($sectionDetail) {
            $this->sections[$sectionDetail[1]] = $sectionDetail[3] != "" ? $sectionDetail[3] : $sectionDetail[4];
            return '';
        }, str_replace(' (', '(', $this->view));

        $this->view = preg_replace_callback('/@section\(\'(.*?)\'\)(.*?)@endsection/s', function ($sectionName) {
            $this->sections[$sectionName[1]] = $sectionName[2];
            return '';
        }, str_replace(' (', '(', $this->view));
    }

    /**
     * Compile directives
     *
     * @see MkyCompile
     */
    private function parseDirectives(): void
    {
        foreach ($this->directives->getDirectives() as $key => $mkyDirective) {
            foreach ($mkyDirective->encodes as $index => $directive) {
                $callback = $mkyDirective->callbacks[$index];
                $this->view = preg_replace_callback('/\B@(@?' . $directive . '?)([ \t]*)(\( ( ([^()]+) | (?3) )* \))?/x', function ($expression) use ($callback, $directive) {
                    $str = isset($expression[3]) ? substr($expression[3], 1, -1) : null;
                    return call_user_func($callback, $str);
                }, str_replace(' (', '(', $this->view));
            }
        }
    }
}
