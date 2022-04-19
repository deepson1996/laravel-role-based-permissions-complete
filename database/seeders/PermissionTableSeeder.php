<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $excludes = ['api', '_ignition', 'sanctum', 'login', 'logout', 'register', 'password'];
        foreach (Route::getRoutes()->getRoutes() as $key => $route) {
            $include = true;
            foreach ($excludes as $exclude) {
                if (strpos($route->uri, $exclude) !== false) {
                    $include = false;
                    break;
                }
            }
            if ($include && $route->uri != '/' && $route->uri != 'home') {
                $action = $route->getActionname();
                $_action = explode('@', $action);

                $controller = $_action[0];
                $method = end($_action);
                $_controller = explode('\\', $controller);

                $controller_name = end($_controller);
                $prefix = str_replace('Controller', '', $controller_name);
                $permission_name = $prefix . '-' . $method;
                $permission_check = Permission::where(
                    ['name' => $permission_name]
                )->first();
                if (!$permission_check) {
                    Permission::create(['name' => $permission_name]);
                }
            }
        }
    }
}
