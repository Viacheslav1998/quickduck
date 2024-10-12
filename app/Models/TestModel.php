<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class TestModel extends Model
{
    protected $table            = 'test';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // Methods
    public function getData()
    {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM test");
        $result = $query->getResult();
        // render
        foreach ($result as $res) {
            echo "<pre>";
            echo $res->name . "<br>";
            echo $res->title . "<br>";
            echo $res->desk . "<br>";
            echo "<div style='border-bottom: 1px solid red;'></div>";
            echo "</pre>";
        }
    }

    /**
     * @return array
     * @method getResultArray()
     */
    public function getTestData()
    {
        $db = Database::connect();
        $query = $this->db->table('test')->get();
        $result = $query->getResultArray();
        return $result;
    }

    /**
     * @return array|array[]|object[]|\stdClass[]
     * @method getResult()
     */
    public function getDataExample1()
    {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM test");
        $tdata = $query->getResult();
        return $tdata;
    }

    /**
     * @return mixed
     * @format json
     */
    public function getJsonTestData()
    {
        $db = Database::connect();
        $query = $db->query("SELECT * FROM test");
        return $query->getResultArray();
    }

}
