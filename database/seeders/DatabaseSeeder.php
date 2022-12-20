<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->importRoles();
        $this->importRole();
        $this->importRoles1();
        $this->importRoles2();
        $this->importGroupRole();
    }
    public function importRoles()
    {
        $groups = ['Product','Category'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash',];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRole()
    {
        $groups = ['Customer', 'Order'];
        $actions = ['viewAny', 'view'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRoles1()
    {
        $groups = ['Group'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importRoles2()
    {
        $groups = ['User'];
        $actions = ['viewAny', 'view', 'create', 'update', 'delete', 'restore', 'forceDelete','viewtrash','adminUpdatePass'];
        foreach ($groups as $group) {
            foreach ($actions as $action) {
                DB::table('roles')->insert([
                    'name' => $group . '_' . $action,
                    'group_name' => $group,

                ]);
            }
        }
    }
    public function importGroupRole()
    {
        for ($i = 1; $i <= 35; $i++) {
            DB::table('group_role')->insert([
                'group_id' => 1,
                'role_id' => $i,
            ]);
        }
    }

}
