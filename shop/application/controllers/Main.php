<?
class Main extends CI_Controller {               // 클래스이름 첫 글자는 대문자
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library('session');
        date_default_timezone_set("Asia/Seoul");         // 지역설정
    }
    public function index()                              // 제일 먼저 실행되는 함수
    {
        $this->load->view("main_header");   // view폴더의 main_header.php 와
        $this->load->view("main_footer");     //                   main_footer.php 호출
    }
}
?>
