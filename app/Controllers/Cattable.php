<?php

namespace App\Controllers;

use App\Models\CattableModel;

class Cattable extends BaseController {

    public function index() {
        $model = model(CattableModel::class);

        $data = [
            'cat_list' => $model->getCats(),
        ];

        return view('cattable/cattable', $data);
    }

    //showCreate and new need to be refactored as one --> for create and update
    public function showCreate() {
        helper('form');
        
        return view('cattable/create2');
    }

    public function new() {
        helper('form');

        return view('cattable/create2');
    }

    //updates cat in table
    public function edit($id) {
        helper('form');

        $model = model(CattableModel::class);
        $cat = $model->find($id);

            if (!$cat) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }

    return view('cattable/create2', [
        'single_cat' => $cat
    ]);
    }

    //creates cat in table
    public function create() {
        // helper('form'); //wird nicht gebraucht, weil in der view nicht "form_open()" verwendet wird

        // ohne portrait_path weil file!
        $data = $this->request->getPost(['stage_name', 'group_affilation', 'soul_traits', 'story_snippets', 'spotlight_song','memory_line']);

        //neu Refactor
        $portrait = $this->request->getFile('portrait_path');

        $model = model(CattableModel::class);
        //error handling model
        if (!$model->insertCat($data, $portrait)) {
        //returns view with error and old data if it doesn't insert
        return view('cattable/create2', [
            'errors' => $model->errors(),
            'old' => $data //old ist praktisch für set_value() in der View → Nutzer muss nicht alles neu eingeben
            ]);
        }
        return view('cattable/success');
    }


    //delete cat in table
    public function delete(int $id){
        $model = model(CattableModel::class);
        $model->deleteCat($id);
        return view('cattable/success');
    }

    //updates cat in table with fields filled with data that cab be changed
    public function update($id) {
        $model = model(CattableModel::class);

        $cat = $model->find($id);

        if (!$cat) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = $this->request->getPost([
            'stage_name',
            'group_affilation',
            'soul_traits',
            'story_snippets',
            'spotlight_song',
            'memory_line'
        ]);

        $portrait = $this->request->getFile('portrait_path');

        if (!$model->updateCat($id, $data, $portrait)) {

            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $model->errors());
        }

        return view('cattable/success');
    }


    // Verwaltung für Bildpfad: Controller-Endpunkte für die Bilder (in wroritepath gespeichert, muss aber von woanders auf Bilder zugegriffen werden wegen Sicherheit)
    // URL /cattable/portrait/abc123.jpg liefert das Bild aus writable/uploads
    // später Logik für Berechtigungen einbauen (nur bestimmte User dürfen sehen)
    public function managePortraitpath($portraitPath) { //besserer Name--> eher dateiname als pfad, ändern
        $filepath = WRITEPATH . 'uploads/' . $portraitPath;

        if (!is_file($filepath)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        // automatic MIME type recognition
        $mime = mime_content_type($filepath);
        
        return $this->response->setHeader('Content-Type', $mime)->setBody(file_get_contents($filepath));
    }
}