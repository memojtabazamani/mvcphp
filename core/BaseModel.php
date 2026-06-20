<?php 

require_once __DIR__ . "/Database.php";

class BaseModel {
	protected PDO $db;
	
	public function __construct()
    {
        $database = new Database();

        $this->db = $database->connection();
    }

    /**
     * @param string $column
     * @param $value
     * @return mixed
     */
    public function firstWhere(
        string $column,
               $value
    )
    {
        $stmt = $this->db->prepare(
            "SELECT *
         FROM {$this->table}
         WHERE {$column} = :value
         LIMIT 1"
        );

        $stmt->execute([
            'value' => $value
        ]);

        return $stmt->fetch();
    }

    public function create(array $data)
    {
        $colNames = implode(", ", array_keys($data));
        $valuesOfCols = "";

        foreach ($data as $k => $value) {

            if($k == array_key_last($data)) {
                $valuesOfCols .= ":" . $k;
            } else {
                $valuesOfCols .= ":" . $k . ", ";
            }
        }

        $stmt = $this->db->prepare(
            "INSERT INTO {$this->table} ({$colNames}) VALUES ({$valuesOfCols})"
        );

        $stmt->execute($data);
        return $stmt->fetch();
    }
}

?>