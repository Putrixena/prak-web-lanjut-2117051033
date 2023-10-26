<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;
class KelasController extends BaseController
{
    protected $helpers=['form'];
    public $kelasModel;
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }
    public function index()
    {
        $data = [
            'title' => 'List Kelas', 
            'kelas' => $this->kelasModel->getKelas()
        ];
        return view('pages/list_kelas', $data);
    }

    public function edit($id){
        $kelas = $this->kelasModel->getKelas($id);
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
        ];

        return view('pages/edit_kelas', $data);

    }
    
    public function update($id){
        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas'),
        ];

        $result = $this->kelasModel->updateKelas($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
            ->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to('/kelas');
    }
    public function destroy($id){
        $result = $this->kelasModel->deleteKelas($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal Menghapus Data');
        }
        return redirect()->to('/kelas')
        ->with('success', 'Berhasil Menghapus Data');
    }
    public function create(){
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
            'title' => 'create kelas'
        ];

        return view('pages/create_kelas', $data);
    }
    public function store(){
        $data=[
            'nama_kelas' => $this->request->getVar('nama_kelas')
        ];
        if(!$this->validate([
            'nama_kelas' => 'required|is_unique[kelas.nama_kelas]'
        ])){ 
            return redirect()->back()->withInput();
        }
        $this->kelasModel->saveKelas($data);
        return redirect()->to('/kelas');
    }
}
