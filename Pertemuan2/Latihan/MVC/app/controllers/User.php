<?php

class User extends Controller
{
  public function index()
  {
    $data['Judul'] = 'Data User';
    $data['users'] = $this->model('User_model')->getAllUser();
    $this->view('list', $data);
  }

  public function detail($id)
  {
    $data['Judul'] = 'Detail User';
    $data['user'] = $this->model('User_model')->getUserById($id);
    $this->view('detail', $data);
  }
}
