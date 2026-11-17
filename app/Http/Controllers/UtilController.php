<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UtilController extends Controller
{
    public function loadWelcome() {
    return view('welcome');
}

public function loadHomepage() {

// dados no futuro estaorao no controlador e vem da base de dados
    $courseName = "SD";

    // simulo que vou a base de dados e trago a lista de alunos
    $students = ['Roberta', 'Antonella', 'Aline'];

    // array associativo
    // dados que serao carregados da base de dados
    $contactInfo = [
        'name' => 'Bruna',
        'contact' => 'bruna@cesae.pt',
    ];

    $istec_info = [
        'name' => 'ISTEC',
        'address' => 'R. de Silva Tapada 115 4200-501 Porto',
        'email' => 'istec@gmail.com',
    ];

    // dd($contactInfo);
    // var_dump($contactInfo);
    
    return view('home', compact('courseName', 'students', 'contactInfo', 'istec_info'));

    }
} // fim da classe

