<?php

namespace Core\MKYCommand;

use Core\MkyCommand\MkyCommandException;
use Exception;

class MickyCLI
{

    const BASE_MKY = 'core/MkyCommand';

    const EXTENSION = 'temp';

    private array $cli = [];

    private array $output = [];

    private int $retval = 0;

    /**
     * Command list
     * required: param is required
     * novalue: no param
     *
     * @var array|string[]
     */
    private static array $longOptions = [
        'create' => 'required',
        'name' => 'required',
        'pk' => 'required',
        'table' => 'required',
        'crud' => 'novalue',
        'request' => 'required',
        'controller' => 'required',
        'method' => 'required',
        'model' => 'required',
        'route' => 'required',
        'api' => 'novalue',
        'url' => 'required',
        'routename' => 'optional',
        'middleware' => 'required',
        'show' => 'required',
        'routes' => 'required',
        'namespace' => 'required',
        'voter' => 'required',
        'action' => 'required',
        'path' => 'required',
        'permission' => 'required',
        'cache' => 'required',
        'clear' => 'novalue',
        'notification' => 'required',
        'via' => 'required',
        'event' => 'required',
        'listener' => 'required',
    ];

    /**
     * Command architecture
     * required: command required
     * optional: command optional
     *
     * @var array|string[][][]
     */
    private static array $required = [
        'create' => [
            'controller' => [
                'name' => 'required',
                'crud' => 'optional',
                'model' => 'optional',
                'path' => 'optional'
            ],
            'model' => [
                'name' => 'required',
                'pk' => 'optional',
                'table' => 'optional'
            ],
            'route' => [
                'request' => 'required',
                'url' => 'required',
                'controller' => 'required',
                'method' => 'required',
                'routename' => 'optional',
                'api' => 'optional',
                'middleware' => 'optional',
                'namespace' => 'required',
                'permission' => 'optional'
            ],
            'middleware' => [
                'name' => 'required',
            ],
            'voter' => [
                'name' => 'required',
                'model' => 'required',
                'action' => 'optional'
            ],
            'notification' => [
                'name' => 'required',
                'via' => 'required'
            ],
            'event' => [
                'name' => 'required'
            ],
            'listener' => [
                'name' => 'required'
            ]
        ],
        'show' => [
            'routes' => [
                'request' => 'required',
                'controller' => 'required'
            ]
        ],
        'cache' => [
            'clear' => [
                'path' => 'optional'
            ],
            'create' => [
                'path' => 'required',
            ]
        ]
    ];

    public function __construct(array $cli)
    {
        $this->cli = $cli;
    }

    /**
     * Get key value of option
     * 
     * @param string $option
     * @return mixed|string
     */
    public function getOption(string $option)
    {
        return self::$longOptions[$option];
    }

    /**
     * Rewrite options for CLI
     *
     * @return array|string[]
     */
    public static function cliLongOptions()
    {
        $longOpt = array_map(function ($o) {
            switch (self::$longOptions[$o]) {
                case 'required':
                    return $o . ':';
                    break;
                case 'optional':
                    return $o . '::';
                    break;
                default:
                    return $o;
                    break;
            }
        }, array_keys(self::$longOptions));
        return $longOpt;
    }

    /**
     * Get command in the command architecture
     * 
     * @param mixed ...$args
     * @return array|mixed|string[][]|string[][][]
     */
    public function getCommandBy(...$args)
    {
        $res = self::$required;
        foreach ($args as $key) {
            if ($this->isFieldExist($key)) {
                $res = isset($res[$key]) ? $res[$key] : $key;
            }
        }
        return $res;
    }

    /**
     * Check if option exist in the option list
     * 
     * @param string $option
     * @return bool
     */
    public function isFieldExist(string $option)
    {
        if (!empty($this->getOption($option))) {
            return true;
        }
        return false;
    }

    /**
     * Check if command is in the CLI command write
     *
     * @return bool
     * @throws MkyCommandException
     */
    public function isInputCli()
    {
        if (!empty((array_keys($this->cli)))) {
            return true;
        }
        throw new MkyCommandException("No option please use --option command.");
    }

    /**
     * Concatenate the CLI command and the result 
     *
     * @return string
     * @throws MkyCommandException
     */
    private function sendOptions()
    {
        $send = [];
        foreach ($this->cli as $cli => $option) {
            if ($option != false) {
                $send[] = "--$cli=$option";
            } elseif ($option == false) {
                $send[] = "--$cli";
            } else {
                throw new MkyCommandException("Error mky command.");
            }
        }
        return join(' ', $send);
    }

    /**
     * Check if command is required
     *
     * @param string $cliKey
     * @return bool
     * @throws MkyCommandException
     */
    private function checkCLI(string $cliKey)
    {
        $cliOption = $this->cli[$cliKey];
        unset($this->cli[$cliKey]);
        if (!empty(self::$required[$cliKey][$cliOption])) {
            if (!empty($this->cli)) {
                foreach ($this->cli as $cli => $option) {
                    $req = $this->getCommandBy($cliKey, $cliOption);
                    if (!isset($req[$cli])) {
                        unset($this->cli[$cli]);
                    } elseif ($req[$cli] == 'required' && empty($this->cli[$cli])) {
                        throw new MkyCommandException("$cli command is required.");
                    }
                }
            }
        }
        $this->cli[$cliKey] = $cliOption;
        return true;
    }

    /**
     * Run CLI script in the compiled exec.php file
     *
     * @throws Exception
     */
    public function executeMKY()
    {
        $script = $this->sendOptions();
        exec("php " . self::BASE_MKY . "/exec.php $script", $this->output, $this->retval);
        echo "\n-------------------------  Execution: $script  ------------------------\n\n";
        echo join("\n", $this->output);
    }

    /**
     * Run the CLI command
     *
     * @throws MkyCommandException
     */
    public function run()
    {
        $compile = '';
        if ($this->isInputCli() && 
        (array_key_exists('create', $this->cli) ||
        array_key_exists('show', $this->cli) ||
        array_key_exists('cache', $this->cli)
        )
        ) {
            foreach ($this->cli as $cli => $option) {
                if (array_key_exists($cli, self::$longOptions)) {
                    if (array_key_exists($cli, self::$required) && $this->checkCLI($cli) && $this->getCommandBy($cli, $option) != null) {
                        $compile = file_get_contents(self::BASE_MKY . "/$cli/$option.php");
                        break;
                    }
                } else {
                    throw new MkyCommandException("Invalid $cli option.");
                }
            }
            $this->compileExec($compile);
            $this->executeMKY();
            $this->compileExec();
        }
    }

    /**
     * Compile construct file on the exec.php file
     *
     * @param string $compile
     */
    public function compileExec(string $compile = '')
    {
        $exec = fopen(self::BASE_MKY . "/exec.php", "w");
        fwrite($exec, $compile ?? "");
    }

    /**
     * Get table data
     *
     * @param $data
     * @return string
     */
    public static function table($data)
    {
        // Find longest string in each column
        $columns = [];
        foreach ($data as $row_key => $row) {
            foreach ($row as $cell_key => $cell) {
                var_dump($cell);
                $length = strlen($cell);
                if (empty($columns[$cell_key]) || $columns[$cell_key] || $length) {
                    $columns[$cell_key] = 20;
                }
            }
        }

        // Output table, padding columns
        $table = '';
        foreach ($data as $row_key => $row) {
            $table .= str_pad('', $columns[$cell_key] * count($row), '-') . PHP_EOL;
            foreach ($row as $cell_key => $cell) {
                $table .= "|" . str_pad($cell, $columns[$cell_key]);
            }
            $table .= PHP_EOL;
        }
        $table .= PHP_EOL . PHP_EOL;
        return $table;
    }
}