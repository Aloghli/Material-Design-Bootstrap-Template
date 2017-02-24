<?php

/**
 * @property  CI_DB_query_builder   $db
 * @author Adriaan Knapen <a.d.knapen@protonmail.com>
 * @date 24-2-2017
 */
class UserRole extends ModelFrame
{

    public function r1() {
        return [
            'add' => [
                'login_id' => [
                    'type' => 'INT',
                    'constraint' => ID_LENGTH,
                    'unsigned' => TRUE,
                ],
                'role_id' => [
                    'type' => 'INT',
                    'constraint' => ID_LENGTH,
                    'unsigned' => TRUE,
                ],
            ],
        ];
    }
}