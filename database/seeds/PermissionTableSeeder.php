<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data[] = ['name' => 'invoice.index', 'display_name' => 'Ver Factura', 'guard_name' => 'web', 'group_name' => 'facturas', 'created_at' => now()];
        $data[] = ['name' => 'invoice.create', 'display_name' => 'Crear Factura', 'guard_name' => 'web', 'group_name' => 'facturas', 'created_at' => now()];
        $data[] = ['name' => 'invoice.edit', 'display_name' => 'Actualizar Factura', 'guard_name' => 'web', 'group_name' => 'facturas', 'created_at' => now()];
        $data[] = ['name' => 'invoice.delete', 'display_name' => 'Eliminar Factura', 'guard_name' => 'web', 'group_name' => 'facturas', 'created_at' => now()];

        $data[] = ['name' => 'orders.index', 'display_name' => 'Ver Orden de Compra', 'guard_name' => 'web', 'group_name' => 'Compras', 'created_at' => now()];
        $data[] = ['name' => 'orders.create', 'display_name' => 'Crear Orden de Compra', 'guard_name' => 'web', 'group_name' => 'Compras', 'created_at' => now()];
        $data[] = ['name' => 'orders.edit', 'display_name' => 'Actualizar Orden de Compra', 'guard_name' => 'web', 'group_name' => 'Compras', 'created_at' => now()];
        $data[] = ['name' => 'orders.delete', 'display_name' => 'Eliminar Orden de Compra', 'guard_name' => 'web', 'group_name' => 'Compras', 'created_at' => now()];

        $data[] = ['name' => 'cuenta.index', 'display_name' => 'Ver Cliente', 'guard_name' => 'web', 'group_name' => 'clientes', 'created_at' => now()];
        $data[] = ['name' => 'cuenta.create', 'display_name' => 'Crear Cliente', 'guard_name' => 'web', 'group_name' => 'clientes', 'created_at' => now()];
        $data[] = ['name' => 'cuenta.edit', 'display_name' => 'Actualizar Cliente', 'guard_name' => 'web', 'group_name' => 'clientes', 'created_at' => now()];
        $data[] = ['name' => 'cuenta.delete', 'display_name' => 'Eliminar Cliente', 'guard_name' => 'web', 'group_name' => 'clientes', 'created_at' => now()];

        $data[] = ['name' => 'supplier.index', 'display_name' => 'Ver Proveedor', 'guard_name' => 'web', 'group_name' => 'proveedores', 'created_at' => now()];
        $data[] = ['name' => 'supplier.create', 'display_name' => 'Crear Proveedor', 'guard_name' => 'web', 'group_name' => 'proveedores', 'created_at' => now()];
        $data[] = ['name' => 'supplier.edit', 'display_name' => 'Actualizar Proveedor', 'guard_name' => 'web', 'group_name' => 'proveedores', 'created_at' => now()];
        $data[] = ['name' => 'supplier.delete', 'display_name' => 'Eliminar Proveedor', 'guard_name' => 'web', 'group_name' => 'proveedores', 'created_at' => now()];

        $data[] = ['name' => 'product.index', 'display_name' => 'Ver Artículo', 'guard_name' => 'web', 'group_name' => 'artículos', 'created_at' => now()];
        $data[] = ['name' => 'product.create', 'display_name' => 'Crear Artículo', 'guard_name' => 'web', 'group_name' => 'artículos', 'created_at' => now()];
        $data[] = ['name' => 'product.edit', 'display_name' => 'Actualizar Artículo', 'guard_name' => 'web', 'group_name' => 'artículos', 'created_at' => now()];
        $data[] = ['name' => 'product.delete', 'display_name' => 'Eliminar Artículo', 'guard_name' => 'web', 'group_name' => 'artículos', 'created_at' => now()];

        $data[] = ['name' => 'stock.index', 'display_name' => 'Ver Stock', 'guard_name' => 'web', 'group_name' => 'stock', 'created_at' => now()];
        $data[] = ['name' => 'stock.create', 'display_name' => 'Crear Stock', 'guard_name' => 'web', 'group_name' => 'stock', 'created_at' => now()];
        $data[] = ['name' => 'stock.edit', 'display_name' => 'Actualizar Stock', 'guard_name' => 'web', 'group_name' => 'stock', 'created_at' => now()];
        $data[] = ['name' => 'stock.delete', 'display_name' => 'Eliminar Stock', 'guard_name' => 'web', 'group_name' => 'stock', 'created_at' => now()];

        $data[] = ['name' => 'tables.index', 'display_name' => 'Ver Tablas', 'guard_name' => 'web', 'group_name' => 'tablas', 'created_at' => now()];
        $data[] = ['name' => 'tables.create', 'display_name' => 'Crear Tablas', 'guard_name' => 'web', 'group_name' => 'tablas', 'created_at' => now()];
        $data[] = ['name' => 'tables.edit', 'display_name' => 'Actualizar Tablas', 'guard_name' => 'web', 'group_name' => 'tablas', 'created_at' => now()];
        $data[] = ['name' => 'tables.delete', 'display_name' => 'Eliminar Tablas', 'guard_name' => 'web', 'group_name' => 'tablas', 'created_at' => now()];

        $data[] = ['name' => 'usuarios.index', 'display_name' => 'Ver Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.create', 'display_name' => 'Crear Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.edit', 'display_name' => 'Actualizar Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];
        $data[] = ['name' => 'usuarios.delete', 'display_name' => 'Eliminar Usuarios', 'guard_name' => 'web', 'group_name' => 'usuarios', 'created_at' => now()];

        $data[] = ['name' => 'role.index', 'display_name' => 'Ver Roles', 'guard_name' => 'web', 'group_name' => 'roles', 'created_at' => now()];
        $data[] = ['name' => 'role.create', 'display_name' => 'Crear Roles', 'guard_name' => 'web', 'group_name' => 'roles', 'created_at' => now()];
        $data[] = ['name' => 'role.edit', 'display_name' => 'Actualizar Roles', 'guard_name' => 'web', 'group_name' => 'roles', 'created_at' => now()];
        $data[] = ['name' => 'role.delete', 'display_name' => 'Eliminar Roles', 'guard_name' => 'web', 'group_name' => 'roles', 'created_at' => now()];
        $data[] = ['name' => 'role.assign', 'display_name' => 'Assignar Roles', 'guard_name' => 'web', 'group_name' => 'roles', 'created_at' => now()];

        DB::table('permissions')->insert($data);
    }
}
