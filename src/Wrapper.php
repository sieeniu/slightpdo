<?php


namespace SlightPDO;


use PDO;

class Wrapper
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;

        $this->pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
    }

    public function insert(string $table, array $data): int
    {
        $columns = [];
        $values = [];

        foreach ($data as $column => $value) {
            $columns[] = "`$column`";
            $values[] = "\"$value\"";
        }

        return (int)$this->query(
            sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $table,
                implode(",", $columns),
                implode(",", $values)
            ),
            true
        );
    }

    public function query($statement, bool $numberAffected = false, $fetchMode = PDO::FETCH_OBJ)
    {
        $stmt = $this->pdo->prepare($statement);
        $stmt->execute();

        if ($numberAffected) {
            return $stmt->rowCount();
        }

        return $stmt->fetchAll($fetchMode);
    }

    public function fetchOne($statement)
    {
        $results = $this->query($statement);

        if (is_array($results)) {
            return array_shift($results);
        }

        return [];
    }

    public function fetchAll($statement)
    {
        return $this->query($statement);
    }
}