<?php

require_once __DIR__ . '/../../core/BaseModel.php';

class User extends BaseModel
{
    protected string $table = 'users';

    public function all()
    {
        $stmt = $this->db->query(
            "SELECT * FROM {$this->table}"
        );

        return $stmt->fetchAll();
    }


}