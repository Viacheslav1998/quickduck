<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentsModel extends Model
{
    protected $table            = 'comments';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['post_name', 'person_name', 'comment', 'user_id', 'post_id', 'status', 'created_at', 'reaction'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
    protected $deletedField  = '';

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

    // get count comments
    public function getCommentCount($user_id, $post_id)
    {
        return $this->db->table('comments')
                    ->where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->countAllResults();
    }

    // get only one comment current user if exits
    public function getCommentByUserAndPost($user_id, $post_id)
    {
        return $this->db->table('comments')
                    ->where('user_id', $user_id)
                    ->where('post_id', $post_id)
                    ->get()
                    ->getRowArray();
    }

    public function insertComment($data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        return $this->db->table('comments')->insert($data);
    }

    public function validateCommentData($data)
    {
        if (empty($data['user_id']) || empty($data['post_id'])) {
            return 'не указан user_id или post_id' ;
        }
        if (empty($data['comment'])) {
            return 'комментарий не может быть пустым';
        }

        return true;
    }

}
