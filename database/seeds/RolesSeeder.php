<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $roles = [
    	[
    		'name' => 'admin',
    		'description' => 'Should perform all tasks on the platform',
    		'display_name' => 'Administrator',
    	],
    	[
    		'name' => 'comms',
    		'description' => 'Should take orders',
    		'display_name' => 'Data Comms',
    	],
    	[
    		'name' => 'logistics',
    		'description' => 'People that handle product delivery',
    		'display_name' => 'Delivery Persons',
    	],
    	[
    		'name' => 'confirmers',
    		'description' => 'Edit/Confirms Orders',
    		'display_name' => 'Order Confirmation',
    	],
        [
            'name' => 'inventory',
            'description' => 'Responsible for managing regional inventory',
            'display_name' => 'Inventory',
        ],
        [
            'name' => 'comms-admin',
            'description' => 'Datacomms team lead',
            'display_name' => 'Datacomms Team Lead',
        ],
        [
            'name' => 'accounts',
            'description' => 'Basically handles things concerning finance',
            'display_name' => 'Accounts',
        ],
        [
            'name' => 'inventory-accra',
            'description' => 'Responsible for managing Accra inventory',
            'display_name' => 'Inventory:Accra',
        ],
        [
            'name' => 'inventory-others',
            'description' => 'Responsible for managing Other Regions inventory',
            'display_name' => 'Inventory:Other Regions',
        ],
    ];
    public function run()
    {
    	foreach ($this->roles as $role) {
    		Role::create($role);
    	}
    }
}
