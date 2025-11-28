<?php
/**
 * Exemple 08_02: Conceptes de Rutes en Laravel
 * 
 * Aquest fitxer mostra exemples de com definir rutes en Laravel.
 * Per executar-lo, copia el contingut al fitxer routes/web.php d'un projecte Laravel.
 */

/*
|--------------------------------------------------------------------------
| RUTES BÀSIQUES
|--------------------------------------------------------------------------
*/

// Ruta simple que retorna una vista
// Route::get('/', function () {
//     return view('welcome');
// });

// Ruta que retorna text
// Route::get('/hola', function () {
//     return 'Hola, món!';
// });

// Ruta que retorna JSON
// Route::get('/api/info', function () {
//     return response()->json([
//         'nom' => 'API Laravel',
//         'versio' => '1.0',
//         'estat' => 'actiu'
//     ]);
// });

/*
|--------------------------------------------------------------------------
| RUTES AMB PARÀMETRES
|--------------------------------------------------------------------------
*/

// Paràmetre obligatori
// Route::get('/usuari/{id}', function ($id) {
//     return "Mostrant usuari amb ID: $id";
// });

// Paràmetre opcional
// Route::get('/salutacio/{nom?}', function ($nom = 'Visitant') {
//     return "Hola, $nom!";
// });

// Múltiples paràmetres
// Route::get('/producte/{categoria}/{id}', function ($categoria, $id) {
//     return "Categoria: $categoria, Producte ID: $id";
// });

// Restricció amb expressió regular
// Route::get('/article/{id}', function ($id) {
//     return "Article ID: $id";
// })->where('id', '[0-9]+');

/*
|--------------------------------------------------------------------------
| MÈTODES HTTP
|--------------------------------------------------------------------------
*/

// GET - Obtenir dades
// Route::get('/productes', function () {
//     return 'Llistat de productes';
// });

// POST - Crear dades
// Route::post('/productes', function () {
//     return 'Producte creat';
// });

// PUT/PATCH - Actualitzar dades
// Route::put('/productes/{id}', function ($id) {
//     return "Producte $id actualitzat";
// });

// DELETE - Eliminar dades
// Route::delete('/productes/{id}', function ($id) {
//     return "Producte $id eliminat";
// });

// Múltiples mètodes
// Route::match(['get', 'post'], '/formulari', function () {
//     return 'Accepta GET i POST';
// });

// Tots els mètodes
// Route::any('/qualsevol', function () {
//     return 'Accepta qualsevol mètode HTTP';
// });

/*
|--------------------------------------------------------------------------
| RUTES AMB CONTROLADORS
|--------------------------------------------------------------------------
*/

// Ruta a un controlador
// Route::get('/usuaris', [UsuariController::class, 'index']);
// Route::get('/usuaris/{id}', [UsuariController::class, 'show']);
// Route::post('/usuaris', [UsuariController::class, 'store']);

// Resource controller (genera totes les rutes CRUD)
// Route::resource('productes', ProducteController::class);
// Genera:
// GET    /productes          -> index
// GET    /productes/create   -> create
// POST   /productes          -> store
// GET    /productes/{id}     -> show
// GET    /productes/{id}/edit -> edit
// PUT    /productes/{id}     -> update
// DELETE /productes/{id}     -> destroy

/*
|--------------------------------------------------------------------------
| GRUPS DE RUTES
|--------------------------------------------------------------------------
*/

// Prefix comú
// Route::prefix('admin')->group(function () {
//     Route::get('/dashboard', function () {
//         return 'Dashboard Admin';
//     });
//     Route::get('/usuaris', function () {
//         return 'Gestió Usuaris';
//     });
// });

// Middleware
// Route::middleware(['auth'])->group(function () {
//     Route::get('/perfil', function () {
//         return 'Perfil (requereix login)';
//     });
// });

// Namespace i prefix combinats
// Route::prefix('api/v1')
//     ->namespace('Api')
//     ->group(function () {
//         Route::get('/productes', [ProducteController::class, 'index']);
//     });

/*
|--------------------------------------------------------------------------
| RUTES AMB NOM
|--------------------------------------------------------------------------
*/

// Definir nom de ruta
// Route::get('/contacte', function () {
//     return view('contacte');
// })->name('contacte');

// Generar URL amb nom
// $url = route('contacte');

// Redirecció amb nom
// return redirect()->route('contacte');

/*
|--------------------------------------------------------------------------
| EXEMPLE D'ÚS PRÀCTIC
|--------------------------------------------------------------------------
*/

// Bloc de codi que es pot copiar directament a routes/web.php

echo "Aquest fitxer és una referència de rutes Laravel.\n";
echo "Copia el contingut desitjat al fitxer routes/web.php del teu projecte Laravel.\n\n";

echo "Exemples de rutes:\n";
echo "==================\n\n";

$exemples = [
    "Ruta bàsica" => "Route::get('/', function () { return view('welcome'); });",
    "Amb paràmetre" => "Route::get('/usuari/{id}', function (\$id) { return \"Usuari: \$id\"; });",
    "Controlador" => "Route::get('/productes', [ProducteController::class, 'index']);",
    "Resource" => "Route::resource('articles', ArticleController::class);",
    "Grup amb prefix" => "Route::prefix('admin')->group(function () { ... });",
    "Amb middleware" => "Route::middleware(['auth'])->group(function () { ... });",
];

foreach ($exemples as $nom => $codi) {
    echo "$nom:\n";
    echo "  $codi\n\n";
}
?>
