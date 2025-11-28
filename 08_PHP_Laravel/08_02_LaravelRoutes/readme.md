# 08_02 Rutes en Laravel

## Descripció
Aquest exemple mostra els diferents tipus de rutes que es poden definir en Laravel i com utilitzar-les.

## Contingut
- **rutes.php**: Exemples comentats de definició de rutes.

## Fitxers de rutes en Laravel
- `routes/web.php`: Rutes web (sessions, CSRF)
- `routes/api.php`: Rutes API (sense estat)
- `routes/console.php`: Comandes Artisan
- `routes/channels.php`: Broadcasting

## Tipus de rutes

### Rutes bàsiques
```php
Route::get('/hola', function () {
    return 'Hola, món!';
});
```

### Rutes amb paràmetres
```php
// Obligatori
Route::get('/usuari/{id}', function ($id) {
    return "Usuari: $id";
});

// Opcional
Route::get('/saluda/{nom?}', function ($nom = 'Visitant') {
    return "Hola, $nom";
});
```

### Mètodes HTTP
```php
Route::get('/productes', ...);     // Obtenir
Route::post('/productes', ...);    // Crear
Route::put('/productes/{id}', ...); // Actualitzar
Route::delete('/productes/{id}', ...); // Eliminar
```

### Controladors
```php
Route::get('/usuaris', [UsuariController::class, 'index']);

// Resource (genera CRUD complet)
Route::resource('articles', ArticleController::class);
```

### Grups
```php
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', ...);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil', ...);
});
```

### Noms de rutes
```php
Route::get('/contacte', ...)->name('contacte');

// Generar URL
$url = route('contacte');
```

## Com executar
1. Crear projecte Laravel: `composer create-project laravel/laravel app`
2. Copiar exemples a `routes/web.php`
3. Executar: `php artisan serve`
4. Accedir a `http://localhost:8000`

## Comandes útils
```bash
php artisan route:list  # Veure totes les rutes
php artisan make:controller NomController  # Crear controlador
```
