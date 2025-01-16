<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class NewsTagsControllers extends ResourceController
{
    protected $modelName = 'App\Models\NewsTagsModel';
    protected $format = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     * Build tags with news
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $newsId = $this->request->getPost('news_id');
        $tagsId = $this->request->getPost('tags_id');

        if (!$newsId || empty($tagsId)) {
            return $this->failValidationErrors('news_id и tags_id обязательны');
        }

        $db = \Config\Database::connect();
        foreach($tagsId as $tagId) {
            $db->table('news_tags')->insert([
                'news_id' => $newsId,
                'tags_id' => $tagId,
            ]);
        }

        return $this->respondCreated([
            'message' => 'Теги связаны с новостью'
        ]);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($newsId = null)
    {
        $tagsId = $this->request->getPost('tags_id');

        if (!$newsId || empty($tagsId)) {
            return $this->failValidationErrors('news_id и tags_id обязательны для удаления');
        }

        $db = \Config\Database::connect();
        forech($tagsId as $tagId) {
            $db->table('news_tags')
              ->where('news_id', $newsId)
              ->where('tag_id', $tagId)
              ->delete();
        }

        return $this->responseDeleted([
            'message' => 'Связь удалена'
        ]); 
    }
}
