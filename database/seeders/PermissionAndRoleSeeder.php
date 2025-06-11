<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionAndRoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // الفئات
            ['name' => 'create_categories', 'display_name' => 'إنشاء الفئات', 'table' => 'categories'],
            ['name' => 'show_categories', 'display_name' => 'عرض الفئات', 'table' => 'categories'],
            ['name' => 'edit_categories', 'display_name' => 'تعديل الفئات', 'table' => 'categories'],
            ['name' => 'delete_categories', 'display_name' => 'حذف الفئات', 'table' => 'categories'],

            // المنتجات
            ['name' => 'create_products', 'display_name' => 'إنشاء المنتجات', 'table' => 'products'],
            ['name' => 'show_products', 'display_name' => 'عرض المنتجات', 'table' => 'products'],
            ['name' => 'edit_products', 'display_name' => 'تعديل المنتجات', 'table' => 'products'],
            ['name' => 'delete_products', 'display_name' => 'حذف المنتجات', 'table' => 'products'],

            // المستخدمين
            ['name' => 'create_users', 'display_name' => 'إنشاء المستخدمين', 'table' => 'users'],
            ['name' => 'show_users', 'display_name' => 'عرض المستخدمين', 'table' => 'users'],
            ['name' => 'edit_users', 'display_name' => 'تعديل المستخدمين', 'table' => 'users'],
            ['name' => 'delete_users', 'display_name' => 'حذف المستخدمين', 'table' => 'users'],

            // الطلبات
            ['name' => 'create_orders', 'display_name' => 'إنشاء الطلبات', 'table' => 'orders'],
            ['name' => 'show_orders', 'display_name' => 'عرض الطلبات', 'table' => 'orders'],
            ['name' => 'edit_orders', 'display_name' => 'تعديل الطلبات', 'table' => 'orders'],
            ['name' => 'delete_orders', 'display_name' => 'حذف الطلبات', 'table' => 'orders'],

            // المبيعات
            ['name' => 'create_sales', 'display_name' => 'إنشاء المبيعات', 'table' => 'sales'],
            ['name' => 'show_sales', 'display_name' => 'عرض المبيعات', 'table' => 'sales'],
            ['name' => 'edit_sales', 'display_name' => 'تعديل المبيعات', 'table' => 'sales'],
            ['name' => 'delete_sales', 'display_name' => 'حذف المبيعات', 'table' => 'sales'],

            // الموردين
            ['name' => 'create_suppliers', 'display_name' => 'إنشاء الموردين', 'table' => 'suppliers'],
            ['name' => 'show_suppliers', 'display_name' => 'عرض الموردين', 'table' => 'suppliers'],
            ['name' => 'edit_suppliers', 'display_name' => 'تعديل الموردين', 'table' => 'suppliers'],
            ['name' => 'delete_suppliers', 'display_name' => 'حذف الموردين', 'table' => 'suppliers'],

            // المخزون
            ['name' => 'create_stocks', 'display_name' => 'إنشاء المخزون', 'table' => 'stocks'],
            ['name' => 'show_stocks', 'display_name' => 'عرض المخزون', 'table' => 'stocks'],
            ['name' => 'edit_stocks', 'display_name' => 'تعديل المخزون', 'table' => 'stocks'],
            ['name' => 'delete_stocks', 'display_name' => 'حذف المخزون', 'table' => 'stocks'],

            // العملاء
            ['name' => 'create_Customers', 'display_name' => 'إنشاء العملاء', 'table' => 'Customers'],
            ['name' => 'show_Customers', 'display_name' => 'عرض العملاء', 'table' => 'Customers'],
            ['name' => 'edit_Customers', 'display_name' => 'تعديل العملاء', 'table' => 'Customers'],
            ['name' => 'delete_Customers', 'display_name' => 'حذف العملاء', 'table' => 'Customers'],

            // العملاء
            ['name' => 'create_Settings', 'display_name' => 'إنشاء العملاء', 'table' => 'Settings'],
            ['name' => 'show_Settings', 'display_name' => 'عرض العملاء', 'table' => 'Settings'],
            ['name' => 'edit_Settings', 'display_name' => 'تعديل العملاء', 'table' => 'Settings'],
            ['name' => 'delete_Settings', 'display_name' => 'حذف العملاء', 'table' => 'Settings'],
        ];

        // إضافة الصلاحيات
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission['name'],
                'display_name' => $permission['display_name'],
                'table' => $permission['table'],
                'guard_name' => 'web',
            ]);
        }

        $permissionNames = array_column($permissions, 'name');

        // صلاحيات الكاشير: إنشاء فقط
        $cashierPermissions = array_filter($permissionNames, function ($perm) {
            return str_starts_with($perm, 'create_');
        });

        // صلاحيات الأدمن: كل شيء ما عدا الحذف
        $adminPermissions = array_filter($permissionNames, function ($perm) {
            return !str_starts_with($perm, 'delete_');
        });

        // إنشاء دور الكاشير
        $cashier = Role::firstOrCreate([
            'name' => 'Cashier',
            'display_name' => 'كاشير',
            'guard_name' => 'web',
        ]);

        $cashier->syncPermissions($cashierPermissions);

        // إنشاء دور الأدمن
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'display_name' => 'أدمن',
            'guard_name' => 'web',
        ]);

        $admin->syncPermissions($adminPermissions);

        // إنشاء دور السوبر أدمن
        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin', // تغيير الاسم ليكون أكثر وضوحًا
            'display_name' => 'سوبر أدمن',
            'guard_name' => 'web',
        ]);

        $superAdmin->syncPermissions($permissionNames);

        // إنشاء مستخدم الأدمن
        $adminUser = User::firstOrCreate([
            'email' => 'admin@gmail.com',
        ], [
            'name' => 'diaa',
            'password' => bcrypt('password123'),
        ]);

        $adminUser->assignRole('Admin');

        // إنشاء مستخدم الكاشير
        $cashierUser = User::firstOrCreate([
            'email' => 'cashier@gmail.com',
        ], [
            'name' => 'ahmed',
            'password' => bcrypt('password123'), // تصحيح كلمة المرور
        ]);

        $cashierUser->assignRole('Cashier');
        $cashierUser->syncPermissions($cashierPermissions);

        // إنشاء مستخدم السوبر أدمن
        $superAdminUser = User::firstOrCreate([
            'email' => 'superadmin@gmail.com', // تصحيح البريد الإلكتروني ليكون متسقًا
        ], [
            'name' => 'sabah',
            'password' => bcrypt('password123'),
        ]);

        $superAdminUser->assignRole('Super Admin');
        $superAdminUser->syncPermissions($permissionNames);
    }
}