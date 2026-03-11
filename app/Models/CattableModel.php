<?php

namespace App\Models;

use CodeIgniter\Model;

class CattableModel extends Model {
    
    protected $table = 'cats';
    protected $allowedFields = ['stage_name', 'group_affilation', 'soul_traits', 'story_snippets', 'spotlight_song', 'memory_line', 'portrait_path'];
    protected $validationRules = [
        'stage_name' => 'required|max_length[255]|min_length[3]',
        'group_affilation' => 'required|max_length[255]|min_length[3]',
        'soul_traits' => 'required|max_length[400]|min_length[3]',
        'story_snippets'  => 'required|max_length[5000]|min_length[10]',
        'spotlight_song' => 'required|max_length[255]|min_length[3]',
        'memory_line' => 'required|max_length[1000]|min_length[10]',
    ];

    //read
    public function getCats()
    {
        return $this->findAll();
    }

    //create
    public function insertCat($data, $portrait = null) {
        $portraitPath = null; //muss leer sein weil neu muss extra, weil file nicht post

        if ($portrait && $portrait->isValid() && !$portrait->hasMoved()) { //extrawurst für das bild
            $newName = $portrait->getRandomName();
            $portrait->move(WRITEPATH . 'uploads', $newName);
            $portraitPath = $newName;
        }

        $data['portrait_path'] = $portraitPath;

        return $this->save($data);
    }


    //delete
    public function deleteCat(int $id): bool {
        return $this->where('id', $id)->delete();
    }

    //update
    public function updateCat(int $id, $data, $portrait = null): bool {
        $portraitPath = null;

        if ($portrait && $portrait->isValid() && !$portrait->hasMoved()) {
            $newName = $portrait->getRandomName();
            $portrait->move(WRITEPATH . 'uploads', $newName);
            $portraitPath = $newName;

            //if new picture exists
            $data['portrait_path'] = $portraitPath;
        }

        return $this->update($id, $data);
    }
}