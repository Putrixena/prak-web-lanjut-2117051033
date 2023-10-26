<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;
class UserController extends BaseController
{
    protected $helpers=['form'];
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }

    public function index(){
    $data = [
        'title' => 'List User', 
        'users' => $this->userModel->getUser()
    ];
    return view('pages/list_user', $data);
    }
    public function profile($page = 'profile')
    {
        if (!is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
            throw new PageNotFoundException("not found file " . $page);
        }
        $data['title'] = ucfirst($page);
        return view('templates/header', $data)
            . view('pages/' . $page)
            . view('templates/footer');
    }
    public function create()
    {
        // $kelasModel = new KelasModel ();

        $kelas = $this->kelasModel->getKelas();

        $data = [
            'kelas' => $kelas,
            'title' => 'create user'
        ];

        return view('pages/create_user', $data);
    
    //     $kelas = [
    //         [
    //             'id' => 1,
    //             'nama_kelas' => 'A'
    //         ],
    //         [
    //             'id' => 2,
    //             'nama_kelas' => 'B'
    //         ],
    //         [
    //             'id' => 3,
    //             'nama_kelas' => 'C'
    //         ],
    //         [
    //             'id' => 4,
    //             'nama_kelas' => 'D'
    //         ]
    //     ];
        // $data = [
        //     'kelas' => $kelas
        // ];
        // return view('pages/create_user', $data);
    }
    public function store()
    {
        $path = 'assets/uploads/img/';
        $foto = $this->request->getFile('foto');
        $data=[
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' => $this->request->getVar('kelas')
        ];
        if ($foto->isValid()) {
            $name = $foto->getRandomName();
            
            if ($foto->move($path, $name)) {
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }
        // $userModel = new UserModel();
        if(!$this->validate([
            'npm' => 'required|is_unique[user.npm]',
            'nama' => 'required|alpha_space',
            'kelas' => 'required'
        ])){ 
            return redirect()->back()->withInput();
        }
        $this->userModel->saveUser($data);
        $page = 'create_user';
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        //     'title' => ''
        // ];
        return redirect()->to('/user');     
    }

    public function edit ($id){
        $user = $this->userModel->getUser($id) ;
        $kelas = $this->kelasModel->getKelas() ;

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('pages/edit_user', $data) ;

    }
    public function show($id){
        $user = $this->userModel->getUser($id);

        $data = [
            'title' => 'Profile',
            'user' => $user,

        ];
        // return view('pages/profile', $data);
        return view('templates/header', $data)
            . view('pages/profile')
            . view('templates/footer');
    }
    public function update($id) {
        $path = 'assets/uploads/img/';

        $foto = $this->request->getFile('foto');

        $data = [
            'nama' => $this->request->getVar('nama'),
            'id_kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm')
        ];

        if ($foto->isValid()) {
            $name = $foto->getRandomName();

            if ($foto->move($path, $name)) {
                $foto_path = base_url($path . $name);
                $data['foto'] = $foto_path;
            }
        }

        $result = $this->userModel->updateUser($data, $id);

        if(!$result){
            return redirect()->back()->withInput()
            ->with('error', 'Gagal Menyimpan Data');
        }

        return redirect()->to('/user');
    }
    public function destroy($id){
        $result = $this->userModel->deleteUser($id);
        if (!$result) {
            return redirect()->back()->with('error', 'Gagal Menghapus Data');
        }
        return redirect()->to('/user')
        ->with('success', 'Berhasil Menghapus Data');
    }


}