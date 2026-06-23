<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permission List
        $permissions = [
            'dashboard',
            'role.permission', 'role.permission.create', 'role.permission.store', 'role.permission.edit', 'role.permission.update', 'role.permission.delete',
            'profile',
            'setting', 'reset.password','setting.general','setting.seo.management',
            'user.list', 'user.store','user.update','user.delete',
            'service.list','service.store','service.update','service.delete',
            'testimonial.list','testimonial.store','testimonial.update','testimonial.delete',
            'gallery.list','gallery.store','gallery.update','gallery.delete',
            'faq.list','faq.store','faq.update','faq.delete',
            'slider.list','slider.store','slider.update','slider.delete',
            'article.list','article.store','article.update','article.delete',
            'article.category.list','article.category.store','article.category.update','article.category.delete',
        ];

        // Create Permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Roles
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);

        // Assign All Permissions to Admin
        $superAdminRole->syncPermissions(Permission::all());

        $user = \App\Models\User::find(1);
        if ($user && !$user->hasRole('super-admin')) {
            $user->assignRole($superAdminRole);
        }

        echo "Permissions & Roles seeded successfully\n";
    }
}
