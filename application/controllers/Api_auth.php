    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    require APPPATH . 'libraries/REST_Controller.php';
        
    class Api_auth extends REST_Controller {
        
        /**
         * Get All Data from this method.
         *
         * @return Response
        */
        public function __construct() {
            parent::__construct();
            $this->load->model('Api_model');
            $this->config->load('api');
        }
        
        // public function index_post()
        // {
            
        //         $data = $this->input->request_headers();
        //         // $this->db->insert('items',$input);

        //         // $data = array ('user' => $usr, 'psswd' => $psswd);

        //         //Data BODY
        //         $username =  $this->input->post('username');
        //         $token =  $this->input->post('remember_token');
        //         // $password =  $this->input->post('password');

        //         $cekuser= array(
        //             'username' => $username
        //             // 'password' => $password
        //         );
                
        //         $this->load->model('auth_model');
        //         $ceklog=$this->auth_model->ceklogin("pengguna",$cekuser);
                        
                
        //         if($ceklog->num_rows() > 0) {
        //             $this->auth_model->mark_for_loggin($username,$token);
        //             $this->response([TRUE], REST_Controller::HTTP_OK);
        //         } else {
        //             $this->response([FALSE], REST_Controller::HTTP_OK);
        //         }
        // }

        public function api_image () {

            $apiKey = $this->input->get_request_header('X-API-KEY');
            $validKey = $this->config->item('api_keys')['SIMBADA'];

            if ($apiKey !== $validKey) {
                return $this->output
                    ->set_status_header(401)
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Unauthorized'
                    ]));
            }

            $register = $this->input->get('register', TRUE);
            if (!$register) {
                return $this->output
                    ->set_status_header(400)
                    ->set_content_type('application/json')
                    ->set_output(json_encode([
                        'status' => false,
                        'message' => 'Register wajib diisi'
                    ]));
            }

            $images = $this->Api_model->get_list_by_register($register);

            $data = [];
            foreach ($images as $img) {
                $data[] = [
                    'register'      => $img->register,
                    'created_date'  => $img->created_date,
                    'created_time'  => $img->created_time,
                    'url'           => site_url('api/image/'.$img->id) // endpoint API
                ];
            }
            
            return $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => true,
                    'data'   => $data
                ]));
        }
            
    }