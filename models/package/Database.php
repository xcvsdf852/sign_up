<?php
class Database
{
    const DATABASE_HOST = 'localhost';
    const DATABASE_NAME = 'sign';
    const DATABASE_USERNAME = 'root';
    const DATABASE_PASSWORD = '';
    private $connection = null;
    public function __construct()
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s', static::DATABASE_NAME, static::DATABASE_HOST);
        try {
            $this->connection = new PDO($dsn, static::DATABASE_USERNAME, static::DATABASE_PASSWORD);
            $this->connection -> exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo 'Connection failed: '.$e->getMessage();
        }
    }
    /**
     * Execute select query
     *
     * @param   string  SQL select query
     * @return  array
     */
    public function select($sql)
    {
        $statement = $this->connection->query($sql, PDO::FETCH_ASSOC);
        return $statement->fetchAll();
    }
    /**
     * Execute update query
     *
     * @param   string  SQL update query
     * @return  int     number of affected rows
     */
    public function update($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Execute insert query
     *
     * @param   string  SQL insert query
     * @return  bool
     */
    public function insert($sql)
    {
        $rowEffect = $this->exec($sql);
        if ($rowEffect > 0) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * Execute delete query
     *
     * @param   string  SQL delete query
     * @return  int     number of affected rows
     */
    public function delete($sql)
    {
        return $this->exec($sql);
    }
    /**
     * Last insert id
     *
     * @return  int
     */
    public function lastInsertId()
    {
        return (int)$this->connection->lastInsertId();
    }
    /**
     * Execute any SQL query
     *
     * @param   string  SQL query
     * @return  int     number of affected rows
     */
    public function exec($sql)
    {
        return $this->connection->exec($sql);
    }
    
    public function get_connection(){
        return $this->connection;
    }
}