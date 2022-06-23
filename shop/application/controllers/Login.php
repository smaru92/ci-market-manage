<?
class login extends CI_Controller
{ // login클래스 선언
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->database(); // 데이터베이스 연결
        $this->load->model("login_m"); // 모델 login_m 연결

        //$this->load->helper(array("url","date"));              // Helper 선언
        date_default_timezone_set("Asia/Seoul");         // 지역설정
        //$today=date("Y-m-d");                                        // 오늘날짜

    }
    public function index() // 제일 먼저 실행되는 함수
    {
        if($this->session->userdata('rank')!=1) redirect("/");
    }

    public function check()
    {
        $uid1 = $this->input->post("uid",true);
        $pwd1 = $this->input->post("pwd",true);

        $row=$this->login_m->getrow($uid1, $pwd1);
        if($row)
        {
            $data=array('uid'=>$row->uid1,'rank'=>$row->rank1);
            $this->session->set_userdata($data);
        }
        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("main_footer"); // 하단 출력
    }

    public function logout()
    {
        $data =array('uid','rank');
        $this->session->unset_userdata($data);

        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("main_footer"); // 하단 출력
    }

}
?>