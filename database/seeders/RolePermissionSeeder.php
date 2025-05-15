<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $actions = [
            'acessar',
            'criar',
            'editar',
            'detalhar',
            'apagar',
            'adicionar_ao_carrinho',
            'acessar_carrinho',
            'acessar_venda'
        ];
        $resources = [
            'eletronico',
            'roupa',
            'alimento',
            'livro',
            'carrinho'
        ];

        $arrayOfPermissionNames = [];
        foreach ($resources as $resource) {
            foreach ($actions as $action) {
                $arrayOfPermissionNames[] = $resource . '_' . $action;
            }
        }

        $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
            return ['name' => $permission, 'guard_name' => 'web'];
        });
        Permission::insert($permissions->toArray());

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $comprador = Role::firstOrCreate(['name' => 'comprador']);

        // Admin: recebe todas as permissões, exceto qualquer permissão que contenha 'acessar_venda', 'adicionar_ao_carrinho' ou 'acessar_carrinho'
        $adminPerms = Permission::where('name', 'not like', '%acessar_venda%')
            ->where('name', 'not like', '%adicionar_ao_carrinho%')
            ->where('name', 'not like', '%acessar_carrinho%')
            ->pluck('name');
        $admin->syncPermissions($adminPerms);

        // Comprador: recebe apenas todas as permissões que contenham 'acessar_venda' ou 'acessar_carrinho' (NENHUMA adicionar_ao_carrinho)
        $compradorPerms = Permission::where(function ($q) {
            $q->where('name', 'like', '%acessar_venda%')
                ->orWhere('name', 'like', '%acessar_carrinho%');
        })->where('name', 'not like', '%adicionar_ao_carrinho%')
            ->pluck('name');
        $comprador->syncPermissions($compradorPerms);
    }
}
