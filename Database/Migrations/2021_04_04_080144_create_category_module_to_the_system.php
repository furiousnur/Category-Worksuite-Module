<?php

use Illuminate\Database\Migrations\Migration;
use App\Module;

class CreateCategoryModuleToTheSystem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = Module::create(['module_name' => 'category', 'description' => 'Category management module']);
        $module->permissions()->create(['name' => 'create_category', 'display_name' => 'Create category data']);
        $module->permissions()->create(['name' => 'view_category', 'display_name' => 'View category data']);
        $module->permissions()->create(['name' => 'edit_category', 'display_name' => 'Edit category data']);
        $module->permissions()->create(['name' => 'delete_category', 'display_name' => 'Delete category data']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Module::where('module_name', 'category')->first()->delete();
    }
}
