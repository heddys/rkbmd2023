<?php defined('BASEPATH') OR exit ('No direct script access allowed');

class Pagination extends CI_Controller {

     public function __construct()
     {
          parent::__construct();
          $this->load->model('pagination_model');
     }
     public function index($num = '')
     {
          $perpage = 7;
          $config['next_link'] = 'Selanjutnya';
          $config['prev_link'] = 'Sebelumnya';
          $config['first_link'] = 'Awal';
          $config['last_link'] = 'Akhir';
          $config['full_tag_open'] = '<ul class="pagination">';
          $config['full_tag_close'] = '</ul>';
          $config['num_tag_open'] = '<li>';
          $config['num_tag_close'] = '</li>';
          $config['cur_tag_open'] = '<li class="active"><a href="#">';
          $config['cur_tag_close'] = '</a></li>';
          $config['prev_tag_open'] = '<li>';
          $config['prev_tag_close'] = '</li>';
          $config['next_tag_open'] = '<li>';
          $config['next_tag_close'] = '</li>';
          $config['last_tag_open'] = '<li>';
          $config['last_tag_close'] = '</li>';
          $config['first_tag_open'] = '<li>';
          $config['first_tag_close'] = '</li>';
          $offset = $this->uri->segment(1);
          $data['semua_pengguna'] = $this->pagination_model->getDataPagination($perpage, $offset)->result();

          $config['base_url'] = site_url();
          $config['total_rows'] = $this->pagination_model->getAll()->num_rows();
          $config['per_page'] = $perpage;
          $this->pagination->initialize($config);

          $this->load->view('pagination', $data);
     }

}