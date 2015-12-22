<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     *
     * @return void
     */
    public function run()
    {
        Schema::drop('permission_role');
        Schema::drop('permissions');
        Schema::drop('role_user');
        Schema::drop('roles');
        Schema::drop('users');

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating roles to users (Many-to-Many)
        Schema::create('role_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'role_id']);
        });

        // Create table for storing permissions
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Create table for associating permissions to roles (Many-to-Many)
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned();
            $table->integer('role_id')->unsigned();

            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'role_id']);
        });

        $roles = [
            [
                'name'         => 'admin',
                'display_name' => '站台管理'
            ],
            [
                'name'         => 'luxgen-owner',
                'display_name' => '總公司管理'
            ],
            [
                'name'         => 'la-owner',
                'display_name' => '北智捷管理'
            ],
            [
                'name'         => 'lb-owner',
                'display_name' => '桃智捷管理'
            ],
            [
                'name'         => 'lc-owner',
                'display_name' => '中智捷管理'
            ],
            [
                'name'         => 'ld-owner',
                'display_name' => '南智捷管理'
            ],
            [
                'name'         => 'le-owner',
                'display_name' => '高智捷管理'
            ],

        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        $permissions = [
            [
                'name'         => 'basic_employee',
                'display_name' => '員工管理'
            ],
            [
                'name'         => 'adv_vote',
                'display_name' => '投票管理'
            ],
            [
                'name'         => 'adv_sysmgr',
                'display_name' => '系統設定'
            ],
            [
                'name'         => 'adv_signup',
                'display_name' => '報名管理'
            ],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        $role1 = Role::findOrFail(1);
        $role1->perms()->sync([1, 2, 3, 4]);
        $role2 = Role::findOrFail(2);
        $role2->perms()->sync([1]);
        $role3 = Role::findOrFail(3);
        $role3->perms()->sync([1]);
        $role4 = Role::findOrFail(4);
        $role4->perms()->sync([1]);
        $role5 = Role::findOrFail(5);
        $role5->perms()->sync([1]);
        $role6 = Role::findOrFail(6);
        $role6->perms()->sync([1]);
        $role7 = Role::findOrFail(7);
        $role7->perms()->sync([1]);
    }
}
