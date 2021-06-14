<?php
    namespace Fitin\Controllers\Admin;

use Ninja\DatabaseTable;

class User {
    public function __construct(DatabaseTable $usersTable) {
        $this->usersTable = $usersTable;
    }

    public function edit() {
        $updatedUser = [
            'id' => $_POST['id'],
            $_POST['field'] => $_POST['value']
        ];

        $this->usersTable->save($updatedUser);
    }
}