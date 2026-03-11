<?php

namespace App\Models;

use CodeIgniter\Model;

class UploadModel extends Model {
    
    protected $table = 'cats';
    protected $allowedFields = ['stage_name', 'group_affilation', 'soul_traits', 'story_snippets', 'spotlight_song', 'memory_line', 'portrait_path'];

    public function getUpload($id, $data) {

    }
    
    public function getCats() {
        return $this->findAll();
    }

    public function deleteCat(int $id): bool {
        return $this->where('id', $id)->delete();
    }


    public function updateCat(int $id, $data): bool {
        return $this->update($id, $data); //this ist das aktuelle Model, update() gehört zue Model-Klasse
    }
}