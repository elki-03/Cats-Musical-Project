<?php
namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Pages extends BaseController 
{
    public function index()
    {
        return view('welcome_message');

    }

    public function view(string $page = 'home') //cattable, home oder about, funktion/button auslöser für Auswahl später
    {
        if (! is_file(APPPATH . 'Views/pages/' .$page . '.php')) {
            throw new PageNotFoundException($page);
        }

        $data['$title'] = ucfirst($page); // macht ersten Buchstaben groß

        return view('pages/' .$page, $data);
    }
}