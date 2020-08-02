<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/vphp', function () {
    return phpinfo();
});

//Notas: Las rutas pueden identificar a un controlador o a una acción y estas
//siempre nos devuelven una estructura o un recurso




/*
NOTA: Diderencia enre Comillas simpres y Apostrofos  Los apostofros muestran el texto tal como esta defilnido
y el uso de comillas dobles interpreta caracteres especiales y ademas expande el valor de las variables
para mostrarlo
*/


/*||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||*/

Route::get('/usuario', function(){
  $nombre = 'Juan Carlos';
  return 'hola Usuario '.$nombre;
});


/***************  Usando variables con Apostrofe  *************************/
Route::get('/socio', function(){
  $nombre = 'Enrique';
  return 'hola Socio {$nombre}';
});


/***************  Usando variables con Comillas Simples  *************************/

Route::get('/cliente', function(){
  $nombre = 'Miguel';
  return "hola Socio {$nombre}";
});

/*||||||||||||||||||||||||||||||||||| USO DE PARAMETROS EN LAS RUTAS |||||||||||||||||||||||||||||||||||||||||||||||*/

Route::get('/empleado/{nombre}/{apellidos}', function($nombre="",$apellidos=""){
return "Hola Empleado ". $nombre ." ".$apellidos;
});



/*||||||||||||||||||||||||||||||||||| PARAMETROS OPCIONALES |||||||||||||||||||||||||||||||||||||||||||||||*/

/*
Ocasionalmente, puede necesitar especificar un parámetro de ruta, pero hacer que la presencia de ese parámetro de ruta sea opcional. Puede hacerlo colocando un? marca después del nombre del parámetro. Asegúrese de dar a la variable correspondiente de la ruta un valor predeterminado:
*/
Route::get('/empleado2/{nombre?}/{apellidos?}', function($nombre="",$apellidos="NA"){
return "Hola Empleado ". $nombre ." ".$apellidos;
});

/*||||||||||||||||||||||||||||||||||| EXPRESIONES REGULARES  |||||||||||||||||||||||||||||||||||||||||||||||*/

//Podemos hacer que unicamente en los nombres y apellidos acepte  letras

Route::get('/alumno/{nombre?}/{apellidos?}', function($nombre="",$apellidos=""){
return "Hola Alumno ". $nombre ." ".$apellidos;
})->where(['nombre' => '[A-Za-z]+', 'apellidos' => '[A-Za-z]+']);




/*||||||||||||||||||||||||||||||||||| GRUPOS DE RUTAS  |||||||||||||||||||||||||||||||||||||||||||||||
Las rutas con nombre permiten la generación conveniente de URL o redireccionamientos para rutas específicas. Puede especificar un nombre para una ruta encadenando el método de nombre en la definición de ruta:
*/

/*||||||||||||||||||||||||||||||||||| GRUPOS DE RUTAS  |||||||||||||||||||||||||||||||||||||||||||||||

Los grupos de ruta le permiten compartir atributos de ruta, como middleware o espacios de nombres, en una gran cantidad de rutas sin necesidad de definir esos atributos en cada ruta individual. Los atributos compartidos se especifican en un formato de matriz como el primer parámetro del método Route :: group.


Los grupos anidados intentan "fusionar" de manera inteligente los atributos con su grupo principal. Middleware y donde las condiciones se combinan mientras se agregan nombres, espacios de nombres y prefijos. Los delimitadores y barras diagonales en los prefijos de URI se agregan automáticamente cuando corresponde.
*/


Route::group(['prefix'=>'admin'], function(){

  Route::get('/alumno/{nombre?}/{apellidos?}', function($nombre="",$apellidos=""){
  return "Hola Alumno ". $nombre ." ".$apellidos;
  })->where(['nombre' => '[A-Za-z]+', 'apellidos' => '[A-Za-z]+']);

});




/*|||||||||||||||||||||||| Visualizar una variabl del HELPER (env)  ||||||||||||||||||||||||||||||||||||*/
/* Con el Helper nos solamente podemos Acceder y obtener los valors sino tambien modificar esos valores
de configuración  */

Route::get('/host',function(){
  return env('DB_HOST');
});
Route::get('/zona',function(){
  return config('app.timezone');
});


/*|||||||||||||||||||||||| FORMAS DE INGRESAR A UNA VISTA ||||||||||||||||||||||||||||||||||||*/

/*Forma 1 */
//Nota: view es un Helper que utilizamos
Route::view('/articulo','articulo');

/*Forma 2 */
//Otra forma de acceder a vista
Route::get('cosas',function(){
  return view('cosas');
});


/**************Transferir parametros a la vista (CLave => Valor) ********** */
Route::get('producto',function(){
  return view('producto',["nombre"=>"Impresora LX300", "marca"=>"Epson"]);
});


/**************Transferir parametros a la vista usando Helper (With) ********** */
Route::get('producto2',function(){
  return view('producto2')->with("nombre","impresora LX300");
});

/**************Transferir parametros usando With con varios parametros ********** */
Route::get('producto3',function(){
  return view('producto3')->with(["nombre"=>"Cartucho 1010", "marca"=>"Sony"]);
});


/**************Transferir parametros usando Compact ********** */
Route::get('producto4',function(){
  $nombre="Laptop  5500";
$marca="Dell";
  return view('producto4',compact("nombre","marca"));
});




/*|||||||||||||||||||||||| PROBANDO LARAVEL ||||||||||||||||||||||||||||||||||||*/

Route::view('/prueba_bootstrap','prueba_bootstrap');



/*|||||||||||||||||||||||| Estructrua de control con Blade ||||||||||||||||||||||||||||||||||||*/

Route::get('estructura/{nota?}/{numero?}',function($nota=0, $numero=0){
  $lista=["Plátano", "Naranjas","Uvas","Mandarinas"];
  return view('estructuras',compact("nota","numero","lista"));
});


/*|||||||||||||||||||||||| Blade Herencia de plantillas ||||||||||||||||||||||||||||||||||||*/

Route::view('/productox','producto.index');

Route::view('/ventas','ventas.index');


/*|||||||||||||||||||||||| Blade Usando Vue ||||||||||||||||||||||||||||||||||||*/

Route::get('/vue', function(){
  return view('pruebavue');
});



/*|||||||||||||||||||||||| Cargando Imagen ||||||||||||||||||||||||||||||||||||*/

Route::get('/imagen', function(){
  return view('imagenxx.cargaimg');
});


/*|||||||||||||||||||||||| Personalizar vista de error ||||||||||||||||||||||||||||||||||||*/

Route::get('/rutaerronea', function(){
  return view('errors.404');
});

Route::get('/error500', function(){
  return view('errors.500');
});


/*|||||||||||||||||||||||| Probar Conexion ||||||||||||||||||||||||||||||||||||*/
Route::get('/probarconexion',function(){
    try{
        DB::connection()->getPdo();
        return "Conexion exitosa MYSQL";
    } catch(\Exception $e){
        die("No se puede Conectar a la base de datos. Revise porfavor su configuración.
        Error: ".$e);
    }
});



Route::get('/conexion-mysql',function(){
    try{
       DB::connection('mysql')->getPdo();
        return "Conexion exitosa MYSQL Satisfactorio";
    } catch(\Exception $e){
        die("No se puede Conectar a la base de datos. Revise porfavor su configuración.
        Error: ".$e);
    }
});









  Route::get('/conexion-sie',function(){
                    try{
                        DB::connection('sie')->getPdo();
                        return "Conexion exitosa a BD SIE";
                    } catch(\Exception $e){
                        die("No se puede Conectar a la base de datos. Revise porfavor su configuración.
                        Error: ".$e);
                    }
                });

Route::get('/conexion-respaldoayer',function(){
            try{
                  DB::connection('respaldoayer')->getPdo();
                    return "Conexion exitosa a BD Respaldo Ayer";
                    } catch(\Exception $e){
                    die("No se puede Conectar a la base de datos. Revise porfavor su configuración.
                  Error: ".$e);
                                    }
  });




/*|||||||||||||||||||||||| QUERY BUILDER ||||||||||||||||||||||||||||||||||||*/
Route::get('/consulta',function(){
    $usuarios=DB::table('users')
    ->select('name','email')
    ->get();
    dd($usuarios);
});



Route::get('/consulta-entradas',function(){
    $usuarios=DB::table('entradas')
    ->select('titulo','contenido')
    ->where('titulo','like','%laravel%')
    ->orwhere('titulo','like','%php%')
    ->toSql();
    dd($usuarios);
});







Route::get('/join',function(){
    $usuarios=DB::table('entradas')
    ->join('users','entradas.user_id','=','users.id')
    ->select('users.*', 'entradas.titulo')
    ->get();
    dd($usuarios);
});




/******************************** MULTPLE CONEXIONES A BD**********************/

Route::get('/consulta-sie',function(){
    $usuarios=DB::connection('sie')
    ->table('sieusuario')
    ->select('idusuario','nombre', 'idorigen')
    ->get();
    dd($usuarios);
});


Route::get('/consulta-respaldoayer',function(){
    $usuarios=DB::connection('respaldoayer')
    ->table('usuarios')
    ->select('idusuario','nombre', 'idorigen')
    ->get();
    dd($usuarios);
});




/*||||||||||||||||||||||||(INSERT , UPDATE Y DELETE) QUERY BUILDER ||||||||||||||||||||||||||||||||||||*/

Route::get('/insertar',function(){
    $insertado=DB::table('users')
    ->insert([
      "name"  => "Juan Moreno",
      "email" => "majuanjose@morenoweb.mx",
      "password" => "12313456"
    ]);
    dd($insertado);
});

Route::get('/consulta-insertado',function(){
    $consultar=DB::table('users')
      ->get();
    dd($consultar);
});




Route::get('/insertar-array',function(){
    $insertado=DB::table('users')
    ->insert(
      [
          [
            "name"  => "Simon Dijo",
            "email" => "simon@morenoweb.mx",
            "password" => "111111111"
          ],
          [
            "name"  => "Perengano Pere",
            "email" => "perengano@morenoweb.mx",
            "password" => "22222222222"
          ]
      ]

  );
    dd($insertado);
});


Route::get('/insertar-getid',function(){
    $insertado=DB::table('users')
    ->insertGetId([
      "name"  => "Victor Moreno",
      "email" => "victor@morenoweb.mx",
      "password" => "12313456"
    ]);
    dd($insertado);
});


Route::get('/insertar-getid',function(){
    $insertado=DB::table('users')
    ->insertGetId([
      "name"  => "Victor Moreno",
      "email" => "victor@morenoweb.mx",
      "password" => "12313456"
    ]);
    dd($insertado);
});



Route::get('/update',function(){
    $insertado=DB::table('users')
    ->where('id','=','13')
    ->update([
      "name"  => "Israel Moreno",
      "email" => "israel@morenoweb.mx",
      "password" => "12313456"
    ]);
    dd($insertado);
});




Route::get('/delete',function(){
    $insertado=DB::table('users')
    ->where('id','=','14')
    ->delete();
    dd($insertado);
});


/*||||||||||||||||||||||||     CONROLADORES  ||||||||||||||||||||||||||||||||||||*/

Route::resource('/entrada-mid','EntradaController');

//Route::resource('/entrada','EntradaController')->except("index");


/*||||||||||||||||||||||||   RUTA  MIDDLWARE  ||||||||||||||||||||||||||||||||||||*/

Route::resource('/entrada-mid','EntradaController')->middleware("language");



/*||||||||||||||||||||||||   RUTA  RESPONSE  ||||||||||||||||||||||||||||||||||||*/

Route::resource('/entrada3','Entrada3Controller')->only(["index"]);



/*||||||||||||||||||||||||   RUTAS CREADAS POR LA IMPLEMENTACIÓN   ||||||||||||||||||||||||||||||||||||*/



Auth::routes(['verify'=>'true']);
Route::group(['middleware'=>'verified'],function(){
    Route::resource('/entrada','EntradaController');
    Route::post('/entrada/comentario', 'EntradaController@comentarioGuardar')->name('comentario.guardar');
    Route::get('/home', 'HomeController@index')->name('home');
});
Route::get('/','BlogController@index')->name('blog.index');
Route::get('/blog/{id}','BlogController@show')->name('blog.show');


/*||||||||||||||||||||||||  RUTA PROYECTO  ||||||||||||||||||||||||||||||||||||*/
