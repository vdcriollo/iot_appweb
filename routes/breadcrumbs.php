<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('inicio', function (BreadcrumbTrail $trail) {
    $trail->push('Inicio', route('dashboard'));
});



Breadcrumbs::for('rol-permisos.index', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Rol y permisos', route('rol-permisos.index'));
});

// usuarios
Breadcrumbs::for('usuarios', function (BreadcrumbTrail $trail) {
    $trail->parent('inicio');
    $trail->push('Usuarios', route('usuarios.index'));
});

Breadcrumbs::for('usuarios.create', function (BreadcrumbTrail $trail) {
    $trail->parent('usuarios');
    $trail->push('Crear', route('usuarios.create'));
});

Breadcrumbs::for('', function (BreadcrumbTrail $trail) {
    $trail->parent('usuarios');
    $trail->push('Crear', route('usuarios.create'));
});

// Home > Blog > [Category]
Breadcrumbs::for('usuarios.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('inicio');
    $trail->push('Editar', route('usuarios.edit', $user));
});




