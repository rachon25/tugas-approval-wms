<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(["name"=> "crud_item"]);
        Permission::create(["name"=> "transaksi_rilis_mr"]);
        Permission::create(["name"=> "barang_keluar"]);
        Permission::create(["name"=> "approval_mr"]);

        $role_adminpmo = Role::create(["name"=> "PMO"]);
        $role_adminpmo->syncPermissions(["crud_item","approval_mr"]);

        $role_superadmin = Role::create(["name"=> "Superadmin"]);
        $role_superadmin->syncPermissions(["crud_item","transaksi_rilis_mr","barang_keluar","approval_mr"]);

        $role_admincosting = Role::create(["name"=> "Admin Costing"]);
        $role_admincosting->syncPermissions(["crud_item","transaksi_rilis_mr"]);


        $role_admingudang = Role::create(["name"=> "Admin Warehouse"]);
        $role_admingudang->syncPermissions(["barang_keluar"]);


        $akun_superadmin = new User();
        $akun_superadmin->fill([
        'name' => "Super admin",
        'username' => "superadmin",
        'posisi' => "Superadmin",
        'email' => "superadmin@gmail.com",
        'email_verified_at' => now(),
        'password' => Hash::make("qwerty12345"),
        'remember_token' => Str::random(10),
        ]);
        $akun_superadmin->save();
        $akun_superadmin->assignRole($role_superadmin);

        $akun_adminpmo = new User();
        $akun_adminpmo->fill([
        'name' => "Nama PMO",
        'username' => "PMO",
        'posisi' => "PMO",
        'email' => "pmo@gmail.com",
        'email_verified_at' => now(),
        'password' => Hash::make("qwerty12345"),
        'remember_token' => Str::random(10),
        ]);
        $akun_adminpmo->save();
        $akun_adminpmo->assignRole($role_adminpmo);
        
        $akun_admingudang = new User();
        $akun_admingudang->fill([
        'name' => "Nama admin gudang",
        'username' => "admingudang",
        'posisi' => "Admin Warehouse",
        'email' => "admingudang@gmail.com",
        'email_verified_at' => now(),
        'password' => Hash::make("qwerty12345"),
        'remember_token' => Str::random(10),
        ]);
        $akun_admingudang->save();
        $akun_admingudang->assignRole($role_admingudang);

        $akun_admincosting = new User();
        $akun_admincosting->fill([
        'name' => "Nama Admin Costing",
        'username' => "admincosting",
        'posisi' => "Admin Costing",
        'email' => "admincosting@gmail.com",
        'email_verified_at' => now(),
        'password' => Hash::make("qwerty12345"),
        'remember_token' => Str::random(10),
        ]);
        $akun_admincosting->save();
        $akun_admincosting->assignRole($role_admincosting);

        $this->call(DaftarMaterialSeeder::class);
    }
}
