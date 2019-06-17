<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => "ID",
            'first_name' => "First name",
            'last_name' => "Last name",
            'email' => "Email",
            'password' => "Password",
            'password_repeat' => "Password Confirmation",
            'activated' => "Activated",
            'forbidden' => "Forbidden",
            'language' => "Language",
                
            //Belongs to many relations
            'roles' => "Roles",
                
        ],
    ],

    'employee' => [
        'title' => 'Employees',

        'actions' => [
            'index' => 'Employees',
            'create' => 'New Employee',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'avatar' => "Avatar",
            'name' => "Name",
            'is_at_work' => "Working",
            'last_seen_at' => "Last seen",
            'is_published' => 'Published',
            
        ],
    ],

    'device' => [
        'title' => 'Devices',

        'actions' => [
            'index' => 'Devices',
            'create' => 'New Device',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => "ID",
            'ip' => "Ip",
            'mac' => "Mac",
            'hostname' => "Hostname",
            'employee_id' => "Employee",
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];