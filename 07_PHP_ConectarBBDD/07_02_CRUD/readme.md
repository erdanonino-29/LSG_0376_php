# 07_02 Operacions CRUD

## Descripció
Aquest exemple mostra com implementar les operacions CRUD (Create, Read, Update, Delete) amb PDO utilitzant SQLite.

## Contingut
- **crud.php**: Aplicació completa de gestió de productes amb CRUD.
- **productes.db**: Base de dades SQLite (es crea automàticament).

## Què és CRUD?
CRUD són les quatre operacions bàsiques per gestionar dades:
- **C**reate: Crear nous registres
- **R**ead: Llegir/consultar dades
- **U**pdate: Actualitzar registres existents
- **D**elete: Eliminar registres

## Com executar
```bash
php -S localhost:8000
```
Accedir a: http://localhost:8000/crud.php

**Nota:** No cal configurar MySQL. Utilitza SQLite (fitxer local).

## Consultes SQL utilitzades

### CREATE
```php
$stmt = $pdo->prepare("INSERT INTO productes (nom, preu) VALUES (:nom, :preu)");
$stmt->execute([':nom' => $nom, ':preu' => $preu]);
```

### READ
```php
$stmt = $pdo->query("SELECT * FROM productes");
$productes = $stmt->fetchAll();
```

### UPDATE
```php
$stmt = $pdo->prepare("UPDATE productes SET nom = :nom WHERE id = :id");
$stmt->execute([':nom' => $nom, ':id' => $id]);
```

### DELETE
```php
$stmt = $pdo->prepare("DELETE FROM productes WHERE id = :id");
$stmt->execute([':id' => $id]);
```

## Seguretat
- **Prepared Statements**: Sempre utilitzar per prevenir SQL Injection
- **Validació**: Validar i sanititzar totes les entrades
- **Escapar sortida**: Usar `htmlspecialchars()` per mostrar dades
