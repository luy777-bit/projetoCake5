<?php
declare(strict_types=1);

namespace App\Controller;

use App\Upload;

/**
 * Importaarquivos Controller
 *
 */
class ImportaarquivosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {   
        if($this->request->is('post')){


            //echo "<pre>";
            //print_r($_FILES);
            //exit;
            $Upload = new Upload;
            $nm_pasta = 'arquivosXLS';
            echo $Upload->uploadArquivo($nm_pasta);
            exit;
        }
    }

}
