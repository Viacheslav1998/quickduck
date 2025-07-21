<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table            = 'persons';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'secret', 'imagen', 'role'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
   protected $validationRules = [
        'name'     => 'required|max_length[30]|min_length[3]',
        'email'        => 'required|max_length[254]|valid_email|is_unique[persons.email]',
        'password'     => 'required|max_length[255]|min_length[8]',
        'secret'     => 'max_length[30]|alpha_numeric_space|min_length[3]',
    ];
    protected $validationMessages = [
        'name' => [
            'required' => 'Имя обязательно для заполнения.',
            'max_length' => 'Имя не должно превышать 30 символов.',
            'min_length' => 'Имя должно содержать не менее 3 символов.',
            'alpha_numeric_space' => 'Имя может содержать только буквы, цифры и пробелы.',
        ],
        'email' => [
            'required' => 'Электронная почта обязательна.',
            'max_length' => 'Электронная почта слишком длинная.',
            'valid_email' => 'Введите корректный email.',
            'is_unique' => 'Пользователь с такой почтой уже существует.',
        ],
        'password' => [
            'required' => 'Пароль обязателен.',
            'max_length' => 'Пароль слишком длинный.',
            'min_length' => 'Пароль должен содержать не менее 8 символов.',
        ],
        'secret' => [
            'max_length' => 'Код слишком длинный.',
            'min_length' => 'Код должен содержать не менее 3 символов.',
            'alpha_numeric_space' => 'Код может содержать только буквы, цифры и пробелы.',
        ],
    ];
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
}
