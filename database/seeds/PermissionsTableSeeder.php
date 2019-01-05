<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Cache;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = collect(config('cruds.routes',[]))->transform(function($item){
            return ['name'=>$item['permission']];
        })->all();

        foreach ($permission as $key => $value) {
            Permission::firstorcreate($value);
        }

        Cache::flush();
    }
}
