<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="documentation for php MkyFramework">
    <meta name="author" content="Mickaël Ndinga">
    <meta name="keywords" content="">

    <title>MkyFramework | Documentation by Mickaël Ndinga</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shCore.css" media="all">
    <link rel="stylesheet" type="text/css" href="js/syntax-highlighter/styles/shThemeFadeToGrey.css" media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top">
        <i class="fa fa-chevron-up" aria-hidden="true"></i>
    </button>

    <div id="wrapper">

        <div id="mode">
            <div class="dark">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                <title>lightmode</title>
                <path fill="currentColor"
                      d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z"></path>
            </svg>
            </div>
            <div class="light">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                <title>darkmode</title>
                <path fill="currentColor"
                      d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path>
            </svg>
            </div>
        </div>

        <div class="container-fluid main">

            <section id="top" class="section docs-heading">

                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="big-title text-center">
                            <img src="images/mky.png" style="width:75%; min-width: 300px;margin-bottom: 10px;" alt="Logo">
                            <p class="lead">MkyFramework / PHP (H)MVC Framework</p>
                        </div>
                    </div>
                </div>
                <hr>
            </section>
            <div class="row">
                <div class="col-md-3">
                    <h2 class="dark-text toc">Table of content
                        <hr>
                    </h2>
                    <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200" role="navigation">
                        <ul class="nav">
                            <li><a href="#line1">Getting Started</a></li>
                            <li><a href="#line2">How to Install</a></li>
                            <li><a href="#line3">Routing</a>
                                <ul class="nav">
                                    <li><a href="#line3_1">YAML route format</a></li>
                                </ul>
                            </li>
                            <li><a href="#line4">Providers</a></li>
                            <li><a href="#line5">Application</a>
                                <ul class="nav">
                                    <li><a href="#line5_1">Model</a></li>
                                    <li><a href="#line5_2">Middleware</a></li>
                                    <li><a href="#line5_3">Voter</a></li>
                                    <li><a href="#line5_4">Event</a></li>
                                    <li><a href="#line5_5">Listener</a></li>
                                    <li><a href="#line5_6">Notification</a></li>
                                    <li><a href="#line5_7">Router methods</a></li>
                                </ul>
                            </li>
                            <li><a href="#line6">MkyEngine</a>
                                <ul class="nav">
                                    <li><a href="#line6_1">MkyDirective</a></li>
                                    <li><a href="#line6_2">List of directives</a></li>
                                    <li><a href="#line6_3">MkyFormatter</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#line7">MkyCommand CLI</a>
                                <ul class="nav">
                                    <li><a href="#line7_1">List of commands</a></li>
                                </ul>
                            </li>
                            <li><a href="#line8">Mode HMVC</a>
                                <ul class="nav">
                                    <li><a href="#line8_1">folders organization</a></li>
                                    <li><a href="#line8_2">Configuration</a></li>
                                    <li><a href="#line8_3">HMVC Application</a></li>
                                </ul>
                            </li>
                            <li><a href="#line9">Copyright and license</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <section class="welcome">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Introduction
                                    <hr>
                                </h2>
                                <div class="row">

                                    <div class="col-md-12 full">
                                        <div class="intro1">
                                            <ul>
                                                <li><strong>Name : </strong>MkyFramework</li>
                                                <li><strong>Current version : </strong> v1.0.0</li>
                                                <li><strong>Author : </strong>
                                                    <a href="https://github.com/Micky-N" target="_blank">Mickaël Ndinga</a>
                                                </li>
                                                <li>
                                                    <strong>License : </strong>
                                                    <a href="https://github.com/Micky-N/mky/blob/master/LICENSE" target="_blank">MIT License</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <hr>
                                        <div>
                                            <p>Framework PHP, modular in MVC or HMVC architecture and uses a Template engine MkyEngine.
                                            </p>
                                            <h3>Requirements</h3>
                                            <p>You will need the following application to use this framework.</p>
                                            <ol>
                                                <li>PHP version >= 7.4</li>
                                                <li>Composer</li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="line1" class="section">
                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Getting Started
                                    <hr>
                                </h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    This framework is organized with some files that are useful for the application.
                                </p>
                                <div>
                                    <li>app</li>
                                    <div style="margin-left: 25px; list-style-type: circle;">
                                        <li>Events : contains events to dispatch</li>
                                        <li>Listeners : contains event listeners</li>
                                        <li>Http</li>
                                        <div style="margin-left: 25px; list-style-type: square">
                                            <li>Controllers : contains controllers</li>
                                            <li>Middlewares : contains middlewares</li>
                                        </div>
                                        <li>MkyDirectives : contains custom directives for views
                                        </li>
                                        <li>MkyFormatters : contains custom formatters for views
                                        </li>
                                        <li>Models : contains SQL models</li>
                                        <li>Notifications : contains notification systems</li>
                                        <li>Providers : contains MiddlewareServiceProvider.php, EventServiceProvider.php, MkyServiceProvider.php and Provider.php
                                        </li>
                                        <li>Voters : contains voters</li>
                                    </div>
                                </div>
                                <p>In HMVC mode, module folders are located in the app/module_name folder</p>
                                <li>config : contains config files</li>
                                <li>public : contains the input file index.php and the assert folder for js, css and images</li>
                                <li>routes : contains route files, web.yaml, admin.yaml and functions.php</li>
                                <li>views : contains .mky views</li>
                            </div>
                        </div>
                    </section>

                    <section id="line2" class="section">
                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">How to Install
                                    <hr>
                                </h2>
                            </div>
                        </div>

                        <h3>Composer</h3>

                        <p>To install MkyFramework with composer use the command</p>
                        <pre class="brush: powershell">
                            composer create-project micky/mky appname
                        </pre>

                        <h3>Configuration</h3>

                        <p>This command will install the new app in your app name folder. After that you have to config your app in the config folder</p>
                        
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>File</th>
                                    <th>config point</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>app</td>
                                    <td>app_name</td>
                                    <td>Application name</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>cache</td>
                                    <td>Cache folder</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>env</td>
                                    <td>app environment</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>structure</td>
                                    <td>App structure (MVC or HMVC)</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>debugMode</td>
                                    <td>Enable debur bar</td>
                                </tr>
                                <tr>
                                    <td>database</td>
                                    <td>connections.mysql</td>
                                    <td>MYSQL connexion data</td>
                                </tr>
                                <tr>
                                    <td>mkyEngine</td>
                                    <td>cache</td>
                                    <td>Sub-folder for compiled views cache</td>
                                </tr>
                                <tr>
                                    <td>module</td>
                                    <td>views</td>
                                    <td>Root folder for .mky views</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>layouts</td>
                                    <td>Root folder for .mky layouts</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>includes</td>
                                    <td>Root folder for .mky included views</td>
                                </tr>
                            </tbody>
                        </table>
                        <h5>You can create your database migrations and fill it with data after it’s created with <a href="https://book.cakephp.org/phinx" target="_blank" style="font-size:medium">Phinx Migration</a></h4>
                    </section>
                    <!-- end section -->

                    <section id="line3" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Routing
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <p>All routes are fetched in the routes/*.yaml folder, route files are written in YAML format and custom route functions are registered as array in the functions.php file</p>

                                <h3 id="line3_1">YAML route format</h3>
                                <pre class="brush: php">
                                    // web.yaml
                                    todos:  
                                        index:  
                                            path: /todos
                                            action: App\Http\Controllers\TodoController::index  
                                            method: GET
                                            middleware: # Optional
                                                - auth
                                                - can: edit, todo
                                </pre>
                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Parameter</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Route name</td>
                                            <td>todos.index</td>
                                        </tr>
                                        <tr>
                                            <td>Url path</td>
                                            <td>/todos</td>
                                        </tr>
                                        <tr>
                                            <td>Action (controller::method)</td>
                                            <td>App\Http\Controllers\TodoController::index</td>
                                        </tr>
                                        <tr>
                                            <td>HTTP request method</td>
                                            <td>GET</td>
                                        </tr>
                                        <tr>
                                            <td>Middleware (optional)</td>
                                            <td>RouteMiddlewares and/or Voters</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p>Voters are written in the route as <b>can: permission, subject</b> format. Only the routes located in the admin.yaml file are prefixed (route name and url path) by 'admin' example: name = admin.todos.index and path = /admin/todos.</p>
                                <p>To use the route functions in the functions.php file, the route action must be written like <b>func::function_name</b> example: <b>func::getUser</b></p>

                                <pre class="brush: php">
                                    // routes/functions.php
                                    // path: test/Micky, action: func::getUser
                                    [  
                                        'getUser' => function ($username) {  
                                            echo("user ".$username); // user Micky
                                        },
                                        'otherFunction' => function () {  
                                            echo("otherFunctionReturn");  
                                        }, 
                                    ];
                                </pre>

                                <b>To implement 7 CRUD methods</b>
                                <pre class="brush: php">
                                    users:  
                                        path: crud  
                                        controller: App\Http\Controllers\UserController
                                        middleware: auth
                                        only: [index, create] // Optional, to implement index() and create() methods only
                                </pre>

                                <table class="table table-responsive">
                                    <thead>
                                        <tr>
                                            <th>HTTP request method</th>
                                            <th>Url path</th>
                                            <th>Controller</th>
                                            <th>Method</th>
                                            <th>Route name</th>
                                            <th>Middleware</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>GET</td>
                                            <td>/users</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>index</td>
                                            <td>users.index</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>GET</td>
                                            <td>/users/:user</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>show</td>
                                            <td>users.show</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>GET</td>
                                            <td>/users/new</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>new</td>
                                            <td>users.new</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>GET</td>
                                            <td>/users/edit/:user</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>edit</td>
                                            <td>users.edit</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>DELETE</td>
                                            <td>/users/delete/:user</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>delete</td>
                                            <td>users.delete</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>POST</td>
                                            <td>/users</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>create</td>
                                            <td>users.create</td>
                                            <td>auth</td>
                                        </tr>
                                        <tr>
                                            <td>PUT</td>
                                            <td>/users/update/:user</td>
                                            <td>App\Http\Controllers\UserController</td>
                                            <td>update</td>
                                            <td>users.update</td>
                                            <td>auth</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line4" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Providers
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-md-12">
                                <p>Providers register classes for a defined use.
                                </p>
                                <h4>EventServiceProvider</h4>
                                <p>This provider is used to store events and their listeners according to their actions as alias :</p>
                                    <pre class="brush: php">
                                        // app/Providers/EventServiceProvider.php
                                        [
                                            \App\Events\TodoEvent::class => [
                                                'update' => \App\Listeners\UpdateTodoListener::class,
                                                'otherAction' => \App\Listeners\OtherListener::class,
                                            ]
                                        ];
                                    </pre>
                                <h4>MiddlewareServiceProvider</h4>
                                <p>This provider is used to store route middlewares with aliases, and voters :</p>
                                    <pre class="brush:php">
                                        // app/Providers/MiddlewareServiceProvider.php
                                        [
                                            'routeMiddlewares' => [
                                                'todo' => \App\Http\Middlewares\TodoMiddleware::class
                                            ],
                                        
                                            'vote' => [
                                                \App\Voters\TodoVoter::class,
                                            ],
                                        ];
                                    </pre>
                                <h4>MkyServiceProvider</h4>
                                <p>This provider is used to store custom directives and formats for the Mky template engine :</p>
                                    <pre class="brush: php">
                                        // app/Providers/MkyServiceProvider.php
                                        [
                                            'formatters' => [
                                                App\MkyFormatters\TestFormatters::class
                                            ],
                                            'directives' => [
                                                App\MkyDirectives\TestDirective::class
                                            ]
                                        ];
                                    </pre>
                                <h4>Provider</h4>
                                <p>This provider is used to store classes for special uses, such as notification systems, classes are stored with aliases :</p>
                                    <pre class="brush: php">
                                        // app/Providers/Provider.php
                                        [
                                            'alias' => [
                                                'webPush' => \App\Utils\WebPushNotification::class
                                            ]
                                        ];
                                    </pre>
                            </div>

                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line5" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Application
                                    <hr>
                                </h2>
                            </div>
                        </div>
                        <h3 id="line5_1">Model</h3>

                        <div class="row">
                            <div class="col-md-12">
                                <p>Model classes use the PDO class to perform queries in the MYSQL database, it also uses a QueryMysql trait which serves as a Query Builder to simplify the writing of SQL queries.
                                    They must enter:
                                    <li>Table name: <b>protected string $table</b></li>
                                    <p>If the name of the table is the plural of the name of the class model then defining the name of the table is optional, example : model Todo => table todos, otherwise you must enter the name of the table.</p >
                        
                                    <li>Primary key: <b>protected string $primaryKey (if primary key != 'id')</b></li>
                                    <li style="margin-top: 25px;"> Optional record creation time and update time fields <b>protected array $dateTimes</b>. Enterable fields <b>protected array $settable</b> to handle fields</li>
                                </p>
                                <h4 id="line5_1_1">List of model methods</h4>

                                Example : 
                                <pre class="brush: php">
                                    // Class declaration
                                    Todo extends MkyCore\Model;
                                    protected string $table= 'todolist';
                                    protected string $primairKey = 'id';
                                    protected array $dateTimes = ['CREATED_AT' => 'created_todo_at', 'UPDATED_AT' => 'updated_todo_at'];
                                    protected array $settable = ['task', 'completed', 'created_todo_at', 'updated_todo_at'];
                                    // Class instantiation
                                    $todo = new Todo();
                                </pre>

                                <pre class="brush:php">
                                    @method function getTable();
                                </pre>
                                <p>Returns the name of the database table</p>
                                
                                <pre class="brush:php">
                                    @method function getPrimaryKey();
                                </pre>

                                Returns the name of the primary key

                                <pre class="brush:php">
                                    @method static function getCurrentModel();
                                </pre>
                                
                                Returns the currently instantiated model

                                <pre class="brush:php">
                                    @method static function find($id);
                                </pre>
                                
                                Returns the record using the value of its primary key

                                <pre class="brush: php">
                                    @method static function all();  
                                </pre>
                                
                                Returns all records

                                <pre class="brush:php">
                                    @method static function count();
                                </pre>
                                
                                Returns the number of records

                                <pre class="brush:php">
                                    @method static function create(array $data, string $table = '');
                                </pre>
                                
                                create a new record

                                <pre class="brush:php">
                                    @method function save();
                                </pre>
                                
                                Saves the created object from the model instance
                                <br>
                                <b>
                                    $todo = new Todo();<br>
                                    $todo->task = 'Code'; $todo->completed = 1;...<br>
                                    $todo->save();
                                </b>
                                
                                <pre class="brush:php">
                                    @method static function update($id, array $data);
                                </pre>
                                
                                Modify a record

                                <pre class="brush:php">
                                    @method function modify(array $data = []);
                                </pre>

                                Modifies a record from the object
                                <br>
                                <b>
                                    $todo = Todo::find(1);<br>
                                    $todo->task = 'Coder_Modified'; $todo->completed = 0;...<br>
                                    $todo->modify();
                                </b>
                                
                                <pre class="brush:php">
                                    @method static function delete($id);
                                </pre>
                                
                                Delete a record

                                <pre class="brush:php">
                                    @method function destroy();
                                </pre>
                                
                                Deletes the record from its instance
                                <br>
                                <b>
                                    $todo = Todo:find(1); // $todo = instance of Todo<br>
                                    $todo->destroy()<br>
                                    Todo::find(1) => null
                                </b>
                                
                                <pre class="brush:php">
                                    @method static function shuffleId();
                                </pre>
                                
                                Randomly returns a primary key value from the table
                                
                                <pre class="brush: php">
                                    protected function hasMany(string $model, string $foreignKey = '');
                                </pre>
                                
                                Returns all records of the table in relation OneToMany
                                <br>
                                To be used in the class of the current model:
                                <br>
                                <b>@method function todos(){ return $this->hasMany(Todo::class, $fk); } => $user->todos</b><br>
                                if foreign key == table name (singular English) suffixed by '_id' then $fk is optional
                                
                                <pre class="brush:php">
                                    protected function belongsTo(string $model, string $foreignKey = '');
                                </pre>
                                
                                Returns table record by primary key
                                <br>
                                To be used in the class of the current model: <br>
                                <b>@method function user(){ return $this->belongsTo(User::class, $fk); } => $todo->user</b><br>
                                if foreign key == table name (singular English) suffixed by '_id' then $fk is optional
                                
                                <pre class="brush: php">
                                    protected function belongsToMany(string $model, string $pivot = '', string $primaryKeyOne = '', string $primaryKeyTwo = '');
                                </pre>
                                
                                Returns all records in table by primary key in relationship ManyToMany
                                <br>
                                To be used in the class of the current model:<br>
                                <b>@method function categories(){ return $this->belongsToMany(Category::class, $pivot, $pk1, $pk2); } => $todo->categories</b>
                                <br>
                                if the association table == todo_category or category_todo the argument $pivot is optional<br>
                                if primary key 1 == (current class name suffixed by _id), example :todo_id then $pk1 is optional<br>
                                if primary key 2 == (class name of 1st argument suffixed by _id), example :category_id then $pk2 is optional
                                
                                <pre class="brush:php">
                                    protected function hasOne(string $model, string $foreignKey = '');
                                </pre>

                                Returns table record by primary key relationship OneToOne <br>
                                To be used in the class of the current model, example :<br>
                                <b>@method function user(){ return $this->hasOne(User::class, $fk); } => $todo->user</b>
                                <br> if foreign key == table name (singular) suffixed by '_id' then $fk is optional
                                
                                <pre class="brush:php">
                                    @method function with(string $relation, array $properties = []);
                                </pre>

                                <p>Returns related table records and selected fields</p>

                                <pre class="brush: php">
                                    @method function modifyManyRelation(string $relation, string $id, array $data);  
                                </pre>

                                <p>Modify all table records in OneToMany relationship</p>

                                <pre class="brush:php">
                                    @method function attach($table, array $data);
                                </pre>

                                <p>Create new record in the relation table</p>

                                <h4 id="line5_1_2">QueryBuilder</h4>
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql where($args)
                                </pre>
                                if 3 arguments are setted, <b>Todo::where('task', '!=', 'Coder') => WHERE task != 'Coder'</b><br>
                                if 2 arguments are setted, <b>Todo::where('task', 'Coder') => WHERE task = 'Coder'</b>
                                    
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql select($args)
                                </pre>
                                <b>Todo::select('id', 'task')</b> => SELECT id, task...
                                    
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql from(string $table, $alias = null)
                                </pre>
                                <b>Todo::from('todolist', 'tdl')</b> => FROM todolist (if $alias not null: AS tdl), useful if the desired table is different from the current model table, otherwise do not use from() because it is implied
                                <pre class="brush: php">
                                    @method static \Core\QueryBuilderMysql join(string $join_table, string $on, string $operation, string $to, string $alias = '')
                                </pre>
                                <b>Todo::join('users', 'user_id', '=', 'id', 'usr')</b> => JOIN users (if $alias not null: AS usr) ON todo.user_id = users.id ( or with alias usr.id)
                                
                                <pre class="brush:php">
                                    @static method \Core\QueryBuilderMysql first()
                                </pre>
                                <b>Todo::first()</b> => ORDER BY id ASC LIMIT 1, get the first record from the model table
                                
                                <pre class="brush:php">
                                    @method static query \Core\QueryBuilderMysql (string $instruction)
                                </pre>
                                <b>Todo::query('SELECT ....')</b> => execute a query
                                
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql prepare(string $statement, array $attribute)
                                </pre>
                                <b>Todo::prepare('INSERT INTO ....', [...])</b> => executes a prepared statement with the parameter

                                <pre class="brush: php">
                                    @method static \Core\QueryBuilderMysql orderBy($args)
                                </pre>
                                <b>Todo::orderBy('id')</b> => ORDER BY id, if orderBy('id', 'DESC') => ORDER BY id DESC
                                    
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql limit($args)
                                </pre>
                                <b>Todo::limit(1)</b> => LIMIT 1 or <b>Todo::limit(1,2)</b> => LIMIT 1 OFFSET 2
                                    
                                <pre class="brush:php">
                                    @method static \Core\QueryBuilderMysql groupBy($args)
                                </pre>
                                <b>Todo::groupBy('completed')</b> => GROUP BY completed
                                
                                <pre class="brush:php">
                                    @method static array map(string $key, $value = null)
                                </pre>
                                <b>Todo::map('task', $value)</b> => reorganizes all the records in an array with the value $key ('task') as key<br>
                                if $value == null then $value = all fields in the record<br>
                                if $value == type string, example : 'user_id' then the array will be like <b>'task' => user_id ('Coder' => 'USR001')</b><br>
                                if $value == type array, example : [user_id, completed] then <b>'Coder' => ['USR001', true]</b>

                                <pre class="brush: php">
                                    @method static array get() 
                                </pre>
                                retrieves the records following the query passed, by default <b>Todo::get() => SELECT * FROM todolist</b> possible to chain the methods to finish with get(), example :<br>
                                <b>Todo::select('task', 'username')->join('users', 'user_id', 'id')->where('completed', true)->get()</b>

                                <pre class="brush:php">
                                    @method static array toArray()
                                </pre>
                                Transform the instance into an associative array
                                
                                <pre class="brush:php">
                                    @method static \Core\Model|bool last()
                                </pre>
                                <b>Todo::last()</b> => Get the last record from the current table

                                <pre class="brush:php">
                                @method static string stringify()
                                </pre>
                                <b>Todo::select('task', 'created_todo_at')->where('completed', true)->stringify()</b><br>
                                returns the query in string 'SELECT task, created_todo_at FROM todolist WHERE completed = 1'
                            </div>
                        </div>

                        <h3 id="line5_2">Middleware</h3>
                        <p>Middlewares implement the MkyCore\Interfaces\MiddlewareInterface interface with the method
                            <b>process(callable $next, ServerRequestInterface $request)</b> which checks the request passed by the user and performs an action, usually a redirect or a resend of the request to another middleware or otherwise to the controller. RouteMiddlewares must be registered in config/MiddlewareServiceProvider.php file and are to be used in routes:</p>
                        <pre class="brush: php">
                            # routes/web.yaml
                            categories:  
                                index:  
                                    path: /categories  
                                    action: App\Http\Controllers\CategoryController::index  
                                    method: GET
                                    middleware: auth
                        </pre>
                        <p>It can also be used in the application with the static method <b>MkyCore\Middleware::run(App\Http\Middlewares\AuthMiddleware::class)</b> or to use several middlewares: <b>MkyCore\Middleware::run([ Middleware1::class, Middleware2::class,...])</b></p>

                        <h3 id="line5_3">Voters</h3>

                        <p>Inspired by Symfony, the Voter is a permission system that manages user access and possibilities <a style="text-decoration: underline!important;" href="https://grafikart.fr/tutorials/permissions-php-voter-1323">See more</a>.
                            Voters implement the MkyCore\Interfaces\VoterInterface with the methods:
                            <pre class="brush: php">canVote(string $permission, $subject = null)</pre>
                            which checks if the Voter can vote
                            <pre class="brush: php">vote($user, string $permission, $subject = null)</pre>
                            which retrieves the Voter's vote. Voters must be registered in config/MiddlewareServiceProvider.php<br>
                            Voters can be used with routes like RouteMiddleware with a can suffix, example : <b>middleware: can:permission, subject</b>, they can be used in the application with the method
                            <pre class="brush: php">MkyCore\Permission::authorize($user, string $permission, $subject = null)</pre>
                            or the $user can be any user, the return will be a boolean. can be used for views as a directive to display an element according to user rights.</p>
                            
                        <h3 id="line5_4">Event</h3>

                        <p>Event class emits an event from a controller, it implement the MkyCore\Interfaces\EventInterface interface and inherit from MkyCore\Event to use the method:
                            <pre class="brush:php">
                                TodoEvent::dispatch($target = null, $actions = null, array $params = [])
                            </pre>
                            Example :
                            <pre class="brush:php">
                                App\Events\TodoEvent::dispatch($update_todo, ['update'], ['user' => $user])
                                $update_todo => modified Todo instance
                            </pre>
                            The actions are what will make the link between the event and its listeners, so that the application knows which listener to call, the event must be registered in the app/Providers/EventServiceProvider.php with the associated listeners, example :
                            <pre class="brush:php">
                            // [event => ['action' => listener]]
                            [
                                \App\Events\TodoEvent::class => [
                                    'update' => \App\Listeners\UpdateTodoListener::class,
                                    'otherAction' => \App\Listeners\OtherListener::class,
                                ]
                            ];
                            </pre>
                        </p>

                        <h3 id="line5_5">Listener</h3>

                        <p>Listeners implement the MkyCore\Interfaces\ListenerInterface interface. The listener receives the instance of the event which emits the event (subject, action and parameters) in the method handle($event) processes and executes an action, example : sending mail.</p>

                        <h3 id="line5_6">Notification</h3>
                        <li>Notifications</li>
                        <p style="margin-left: 25px">
                            The notifications classes implement the MkyCore\Interfaces\NotificationInterface interface. A notification is used to notify a user through a notification system (database, pusher, ...), the class that will be notified (usually the User model) must use the MkyCore\Traits\Notify trait.
                            The via() method is used to inform the notification system or systems by indicating their alias, indicated in the app/Providers/Provider.php:
                           <pre class="brush:php">
                            // via($notifiable){ return ['webPush']; }
                            [
                                'alias' => [
                                    'webPush' => \App\Utils\WebPushNotification::class
                                ]
                            ];
                           </pre>
                            The alias entered in the via method must have a method named to followed by the name of the alias with the first letter in capitals, example : toWebPush($notifiable) which will create the message according to the format of the system filled in by the alias.
                        </p>
                        <li>Notification systems</li>
                        <p style="margin-left: 25px;">
                            Notification systems must implement the MkyCore\Interfaces\SystemNotificationInterface interface, the system will take care of sending the notification to users.
                        </p>

                        <h3 id="line5_7">Router methods</h3>

                        <p>Route methods:</p>
                        <pre class="brush:php">
                            @method static bool namespaceRoute(string $route = '')
                        </pre>
                        /todos/update/5 => todos
                        
                        <pre class="brush:php">
                            @method static array routesByName()
                        </pre>
                        Returns the list of routes in array by name
                        
                        <pre class="brush:php">
                            @method static \Core\Route[] getRoutes()
                        </pre>
                        Returns the list of routes in array by request methods
                        
                        <pre class="brush:php">
                            @method static string generateUrlByName(string $routeName, array $params = [])
                        </pre>
                        Returns the url of the route thanks to the name and the parameters of the route<br>
                        <b>Route::generateUrlByName('todos.update', ['id' => 1])</b> => /todos/update/1
                        
                        <pre class="brush:php">
                            @method static bool|string currentRoute(string $route = '', bool $path = false)
                        </pre>
                        Returns the current route if no $route entered<br>
                        If $route then check if current route == $route
                        The $path argument if true means the $route is a link and checks the $route link with the current link<br>
                        If $path = false (default) then $route is a route name and checks the route
                        
                        <pre class="brush: php">
                            @method static \Core\Router redirectName(string $name)
                        </pre>
                        Redirect with route name
                        
                        <pre class="brush:php">
                            @method static \Core\Router redirect(string $url)
                        </pre>
                        Redirection with route url
                        
                        <pre class="brush:php">
                            @method static \Core\Router back()
                        </pre>
                        Redirection to previous page
                        
                        <pre class="brush:php">
                            @method static \Core\Router withError(array $errors)
                        </pre>
                        Redirection with error flash message in session in controller:<br>
                        <b>Route::back->withError(['wrong' => 'all is wrong'])</b>, in view: {{ $errors['wrong'] }}
                        
                        <pre class="brush:php">
                            @method static \Core\Router withSuccess(array $success)
                        </pre>
                        Redirection with success flash message in session in controller:<br>
                        <b>Route::back->withSuccess(['right' => 'all is right'])</b>, in view: {{ $success['right'] }}
                        
                        <pre class="brush:php">
                            @method static \Core\Router with(array $messages)
                        </pre>
                        Redirection with a flash message in the session in controller:<br>
                        <b>Route::back->with(['thanks' => 'Thanks for reading'])</b>, in view: {{ $flashMessage['thanks'] }}
                    </section>
                    <!-- end section -->


                    <section id="line6" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">MkyEngine
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <p>Views are prefixed with .mky (index.mky) extension, view folder defaults to /views, this can be changed in config module.php and compiled view cache, defaults to /cache/views can be changed in mkyEngine.php config.
                                    <br>
                                    To display a view use the method <b>MkyCore\Facades\View::render(string $view, array $params = [])</b>,
                                    the $view path is written with a dot todos.index: folder /views/todos/index.mky and the variables passed in the array ['todo' => $todo].
                                </p>
                            
                                <h3 id="line6_1">MkyDirective</h3>
                            
                                <div>
                                    <p>Directives are written in the view with tags (of the html type):</p>

                                    <pre class="brush:html">
                                        &lt;mky:if cond="$todo->task == 'Coder'"&gt
                                            <div>true</div>
                                            &lt;mky:else /&gt
                                            <div>false</div>
                                        &lt;/mky:if&gt
                                    </pre>
                                    <p>If the condition is true then it will display the text true otherwise false, there are 2 types of directives: long range and short range. The long scopes include the html code to transform it, example : if, each, repeat... they are written
                                    <pre class="brush: html">
                                        <mky:directive params="">...html...</mky:directive>
                                    </pre> 
                                    and the short ranges display a result, example : route, json, ... and are written
                                    <pre class="brush:html">
                                        &ltmky:params="" directive /&gt
                                    </pre>
                                    quotes are not required for parameters.</p>

                                    <p>.mky views use the system of <b>extends</b>, <b>yield</b> and <b>sections</b>, with the <b>include</b> directive the view can embed other views, included views inherit parent variables and can receive custom variables.</p>
                                    <pre class="brush:html">
                                    // views/layouts/template.mky
                                    -- HTML HEADER --
                                        &ltmky:yield name="content"/&gt
                                    -- HTML FOOTER --
                                    </pre>
                                    <pre class="brush:html">
                                        // views/todos/index.mky
                                        &ltmky:extends name="name of layouts, example : layouts.template" /&gt
                                        <mky:section name="content">
                                            -- HTML --
                                            &ltmky:include name="includeView" data="['var' => 'variable1']"/&gt
                                        </mky:section>
                                    </pre>

                                    <p>The yield directive can have a default value thanks to the value parameter</p>
                                    <pre class="brush:html">
                                        &ltmky:yield name="title" value="Home"/&gt
                                    </pre>
                                    <p>and section can become a short directive by adding the parameter value</p>
                                    <pre class="brush:html">
                                        &ltmky:section name="title" value="TodoPage"/&gt
                                    </pre>
                                </div>
                            
                                <h3 id="line6_2">List of directives</h3>

                                <div>
                                    <pre class="brush: php">
                                    assets: short
                                    script: short if src, otherwise long
                                    style: short if href, otherwise long
                                    if: long
                                    elseif: short
                                    else: short
                                    each: long
                                    repeat: long
                                    switch: long
                                    box: short
                                    break: short
                                    default: short
                                    dump: short
                                    permission: long
                                    notpermission: long
                                    auth: long
                                    json: short
                                    currentRoute: long
                                    road: short
                                    </pre>
                                </div>
                                <p>
                                    To create directives, declare a class that implements the MkyCore\Interfaces\MkyDirectiveInterface interface and extend from the MkyCore\MkyCompiler\MkyDirectives\Directive class. The class must be registered in the app/Providers/MkyServiceProvider.php
                                </p>
                                <pre class="brush: php">
                                    class TestDirective extends Directive implements MkyDirectiveInterface  
                                    {  
                                    
                                        @method function getFunctions()  
                                        {
                                            // declare the functions in the array
                                            return [
                                                'shortTest' => [[$this, 'shortTest']], // for short directives
                                                'longTest' => [[$this, 'longTest'], [$this, 'endlongTest']] // for long directives
                                            ];
                                        }
                                        
                                        // implement the functions
                                        @method function shortTest($int)
                                        {
                                            // $var = 10;
                                            // in view: <div><mky:shortTest int="$var"/></div>
                                            // becomes <div>$var = 15 (10 + 5)</div>
                                            // to retrieve the name of the variable passed as parameters: $this->getRealVariable($int) => $var
                                            return sprintf('%s = %s (%s + 5)', $this->getRealVariable($int), $int + 5, $int);
                                        }

                                        // <mky:longTest cls="customClass">-- HTML --</mky:longTest>
                                        // becomes <div class="customClass">-- HTML --</div>
                                        @method function longTest($cls) { return '<div class="'.$cls.'">'; }
                                        @method function endlongTest() { return '</div>'; }
                                    }
                                </pre>

                                <h3 id="line6_3">MkyFormatter</h3>

                                <p>
                                    The formatters allow to modify the php variables in the views and are written with a # in front of the variable
                                    <b>{{ $var#euro }}</b>,
                                    if the formatter 'euro' allows to put a figure in currency format in euro then if <b>$var = 5</b> then <b>$var#euro => 5,00 €</b>.
                                    To create formatters, declare a class that implements MkyCore\Interfaces\MkyFormatterInterface.
                                    The class must be registered in the app/Providers/MkyServiceProvider.php
                                </p>
                                
                                <pre class="brush: php">
                                    class ArrayFormatter implements MkyFormatterInterface  
                                    {  

                                        @method function getFormats()
                                        {
                                            // declare the functions in the array
                                            return [
                                                'join' => [$this, 'join'],
                                                'count' => [$this, 'count']
                                            ];
                                        }

                                        // implement the functions
                                        @method function join(array $array, string $glue = ', ')
                                        {
                                            // $var = [1,5,3]; {{ $var#join('!') }} => 1!5!3
                                            return join($glue, $array);
                                        }

                                        @method function count(array $array)
                                        {
                                            // $var = [1,5,3]; {{ $var#count }} => 3
                                            return count($array);
                                        } 
                                    }
                                </pre>
                                <h3>To see more about MkyEngine <a href="https://github.com/Micky-N/mkyengine" target="_blank">Micky-N/mkyengine</a></h3>
                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line7" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">MkyCommand CLI
                                    <hr>
                                </h2>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    CLI commands allow to generate files from the command line, example :
                                    <pre class="brush:powershell">
                                        php micky --create=controller --name=TodoController
                                    </pre>
                                    The TodoController.php file is created in the app/Http/Controllers folder
                                    The list of commands is available by issuing the command:
                                    <pre class="brush:powershell">
                                        php micky --help
                                    </pre>
                                </p>

                                <h3 id="line7_1">List of commands</h3>
                                
                                <div>
                                    <pre class="brush: php">
                                    create:
                                        module:
                                            name: required // module name
                                    
                                        controller:
                                            name: required // controller name (suffix by Controller)
                                            crud: optional // (no value: --crud) to implementof the 7 CRUD methods
                                            path: optional // controller subfolder (App/Http/Controllers/Subfolder/TestController.php)
                                            module: optional // (for HMVC) controller module name (App/Module_Name/Http/Controllers/TestController.php)
                                    
                                        model:
                                            name: required // model name
                                            pk: optional // primary key (for MYSQL database)
                                            table: optional // table name (for MYSQL database)
                                            path: optional // model subfolder (App/Models/Subfolder/Test.php)
                                            module: optional // (for HMVC) model module name (App/Module_Name/Models/Test.php)
                                    
                                        middleware:
                                            name: required // middleware name (suffix by Middleware)
                                            path: optional // middleware subfolder (App/Http/Middlewares/Subfolder/TestMiddleware.php)
                                            route: optional // (no value: --route) if entered, the middleware becomes a RouteMiddleware and is registered in the MiddlewareServiceProdiver with an alias (test => TestMiddleware)
                                            module: optional // (for HMVC) middleware module name (App/Module_Name/Http/Middlewares/TestMiddleware.php)
                                    
                                        vote:
                                            name: required // name of the voter (suffix by Voter)
                                            model: required // subject model name (namespace\\model)
                                            path: optional // middleware subfolder (App/Voters/Subfolder/TestVoter.php)
                                            action: optional // implement a method with the name of the action (private function action_name(...){})
                                            module: optional // (for HMVC) middleware module name (App/Module_Name/Http/Middlewares/TestMiddleware.php)

                                        notification:
                                            name: required // notification class name (suffix by Notification)
                                            via: required // implements, with the name of the parameter, a connection method between the class and the notification system
                                            path: optional // notification subfolder (App/Notifications/Subfolder/TestVoter.php)
                                    
                                        event:
                                            name: required // event name (suffix by Event)
                                            path: optional // event subfolder (App/Voters/Subfolder/TestEvent.php)
                                            module: optional // (for HMVC) event module name (App/Module_Name/Events/TestEvent.php)
                                    
                                        listener:
                                            name: required // listener name (suffix by Listener)
                                            path: optional // listener subfolder (App/Listeners/Subfolder/TestListener.php)
                                            module: optional // (for HMVC) event module name (App/Module_Name/Listeners/TestListener.php)
                                    
                                        format:
                                            name: required // voter name (suffix by Formatter)
                                            format: required // implements a method with the format name for .mky views
                                            path: optional // formatter subfolder (App/MkyFormatters/Subfolder/TestFormatter.php)

                                        guideline:
                                            name: required // directive name (suffix by Directive)
                                            fn: required // implements two methods with format name for .mky views ([[$this, 'test'],[$this, 'endtest]])
                                            path: optional // directive subfolder (App/MkyDirectives/Subfolder/TestDirective.php)
                                    
                                    show:
                                        routes: // show all routes
                                            request: optional // filter routes according to the request entered (get, post,...)
                                            controller: optional // filter routes according to the controller entered
                                    
                                    hidden:
                                        clear:
                                            path: optional // clean all cache or subfolder entered
                                    
                                        create:
                                            path: required // create subfolder in cache
                                    </pre>
                                </div>

                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line8" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">HMVC mode
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    The HMVC structure makes it possible to organize the application into MVC modules where each module (folder) has its own MVC architecture.
                                    To create a module from the command line
                                    <pre class="brush:powershell">
                                        php micky --create=module --name=Todo
                                    </pre>
                                    The command will create the folders and files directly and register the module in the ModuleServiceProvider.php:
                                    <pre class="brush:php">
                                        // config/ModuleServiceProvider.php
                                        [
                                            \App\Todo\TodoModule::class
                                        ];
                                    </pre>
                                </p>

                                <h3 id="line8_1">Folder organization</h3>
                                <div>
                                    <pre class="brush: php">
                                        Events
                                        Http:
                                            - Controllers
                                                - Admin:
                                                    - TodoController.php
                                                - TodoController.php
                                            - Middleware
                                        Listeners
                                        Models
                                        Notifications
                                        Providers:
                                            - MiddlewareServiceProvider.php
                                            - EventServiceProvider.php
                                        roads:
                                            - web.yaml
                                            - admin.yaml
                                            - functions.php
                                        views:
                                            - admin:
                                                - index.mky
                                            - index.mky
                                        Voters
                                        config.php
                                        TodoModule.php
                                    </pre>
                                    <p>
                                        To activate the HMVC mode, in the config point config/app.php put 'structure' => 'HMVC'.
                                    </p>

                                    <h3 id="line8_2">Configuration</h3>

                                    <p>
                                        The configuration of the module is in the file app/Name_of_Module/config.php
                                        <pre class="brush:php">
                                            // app/Todo/config.php
                                            return [
                                                'views' => __DIR__ . '/views',
                                                'layouts' => __DIR__. '/views/layouts'
                                                'url_prefix' => '/products'
                                            ];
                                        </pre>
                                        The config will override the config/module.php by overriding the parameters if these are defined,
                                        by removing the 'layouts' parameter from app/Module/config.php then the layouts should be
                                        in the default layouts entered in config/module.php.
                                    </p>

                                    <h3 id="line8_3">HMVC App</h3>

                                    <p>
                                        Events and listeners must be registered in app/Module/Providers/EventServiceProvider.php
                                        and routeMiddlewares and voters must be registered in app/Module/Providers/MiddlewareServiceProvider.php
                                    </p>

                                </div>
                                

                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line9" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Copyright and license
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">

                                <p>Code released under the <b>MIT License</b>.</p>
                                <p>For more information about copyright and license <a href="https://github.com/Micky-N/mky/blob/master/LICENSE" target="_blank">click here</a>.
                                </p>

                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->
                </div>
                <!-- // end .col -->

            </div>
            <!-- // end .row -->

        </div>
        <!-- // end container -->

    </div>
    <!-- end wrapper -->

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>

    <!-- CUSTOM PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/main.js"></script>

    <script src="js/syntax-highlighter/scripts/shCore.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushXml.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushCss.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushJScript.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushPhp.js"></script>
    <script src="js/syntax-highlighter/scripts/shBrushPowerShell.js"></script>
    <script>
        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
            document.documentElement.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector('#mode').addEventListener('click', () => {
                document.querySelector('html').classList.toggle('dark');
            })
        });
    </script>
</body>

</html>