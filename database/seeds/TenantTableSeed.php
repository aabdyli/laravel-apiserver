<?php

use Illuminate\Database\Seeder;

class TenantTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Tenant::class, 10)->create()->each(function ($tenant)
        {
            $tenant->campaign()->save(factory(\App\Campaign::class)->make());
            $tenant->campaign()->save(factory(\App\Campaign::class)->make());
        });
    }
}
