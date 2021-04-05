<?php

use Illuminate\Database\Migrations\Migration;
use App\Module;

class CreateTaskCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $module = Module::create(['module_name' => 'task category', 'description' => 'Task Category management module']);
        $module->permissions()->create(['name' => 'create_task_category', 'display_name' => 'Create task category data']);
        $module->permissions()->create(['name' => 'view_task_category', 'display_name' => 'View task category data']);
        $module->permissions()->create(['name' => 'edit_task_category', 'display_name' => 'Edit task category data']);
        $module->permissions()->create(['name' => 'delete_task_category', 'display_name' => 'Delete task category data']);
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
