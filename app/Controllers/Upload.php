<?php
namespace App\Controllers;

class Upload extends BaseController {

    public function index() {
        return view('upload_form');
    }

    public function store() {
        $file = $this->request->getFile('cat_image'); // entspricht "<input type="file" name="cat_image">"

        if($file->isValid() && !$file->hasMoved()) { // !$file->hasMoved() prüfen ob Datei schon verschoben wurde (sie darf nur einmal verschoben werden)
            $newName = $file->get RandomName(); // !!!!!generates a cryptographically secure random filename, auch damit Dateien nicht überschrieben werden.--> muss bei größeren Projekten sicherer sein, weil gleiche Namen überschrieben werde.n 
            $file->move('uploads', $NewName); // Datei speichern. Wird gespeichert in /public/uploads 
            
            echo "Upload erfolgreich!";
        }
        else {
            echo "Upload leider nicht erfolgreich.";
        }
    }
}