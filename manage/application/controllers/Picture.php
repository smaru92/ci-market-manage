<?
class picture extends CI_Controller
{ // picture클래스 선언
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->database(); // 데이터베이스 연결
        $this->load->model("product_m"); // 모델 product_m 연결
    }
    public function index() // 제일 먼저 실행되는 함수
    {
        $this->lists(); // list 함수 호출
    }
    public function lists()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        if ($text1=="") 
            $base_url = "/picture/lists/page";                        // $page_segment = 4;
        else 
            $base_url = "/picture/lists/text1/$text1/page";    // $page_segment = 6;
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        $base_url = "/~four1" . $base_url;

        $config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
        $config["total_rows"] = $this->product_m->rowcount($text1);  // 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;                // 기본 URL
        $this->pagination->initialize($config);           // pagination 설정 적용

        $data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

        $start=$data["page"];                 // n페이지 : 시작위치
        $limit=$config["per_page"];        // 페이지 당 라인수
        $data["list"]=$this->product_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기


        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("picture_list", $data); // picture_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }
    public function zoom()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $data["iname"] = array_key_exists("iname",$uri_array) ? urldecode($uri_array["iname"]) : "" ;
        $data["pname"] = array_key_exists("pname",$uri_array) ? urldecode($uri_array["pname"]) : "" ;

        $this->load->view("main_header_nomenu");
        $this->load->view("picture_zoom", $data); // picture_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }

}
?>