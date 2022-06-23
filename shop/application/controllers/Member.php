<?
class Member extends CI_Controller
{ // Member클래스 선언
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->database(); // 데이터베이스 연결
        $this->load->model("member_m"); // 모델 Member_m 연결
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
            $base_url = "/member/lists/page";                        // $page_segment = 4;
        else 
            $base_url = "/member/lists/text1/$text1/page";    // $page_segment = 6;
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        $base_url = "/~four1" . $base_url;

        $config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
        $config["total_rows"] = $this->member_m->rowcount($text1);  // 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;                // 기본 URL
        $this->pagination->initialize($config);           // pagination 설정 적용

        $data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

        $start=$data["page"];                 // n페이지 : 시작위치
        $limit=$config["per_page"];        // 페이지 당 라인수
        $data["list"]=$this->member_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기


        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("member_list", $data); // member_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }
    public function view()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
        $data["row"] = $this->member_m->getrow($no);
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("member_view", $data); // member_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }
    public function del()
    {
        $this->load->helper(array("url", "date"));
        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $this->member_m->deleterow($no);
        redirect("/~four1/member/lists/" . $text1 . $page); // 목록화면으로 돌아가기
    }
    public function add()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
            
        $this->load->library("form_validation");
        $this->load->helper(array("url", "date"));
        $this->form_validation->set_rules("name","이름","required|max_length[20]");
        $this->form_validation->set_rules("uid","아이디","required|max_length[20]");
        $this->form_validation->set_rules("pwd","암호","required|max_length[20]");
    

        if ($this->form_validation->run()==FALSE ) // 목록화면의 추가버튼 클릭한 경우
        {
            $this->load->view("main_header");
            $this->load->view("member_add");    // 입력화면 표시
            $this->load->view("main_footer");
        }
        else              // 입력화면의 저장버튼 클릭한 경우
        {
            $name1 = $this->input->post("name",true);
            $uid1 = $this->input->post("uid",true);
            $pwd1 = $this->input->post("pwd",true);
            $tel01 = $this->input->post("tel1",true);
            $tel02 = $this->input->post("tel2",true);
            $tel03 = $this->input->post("tel3",true);
            $tel1 = $tel01.$tel02.$tel03;
            $rank1 = $this->input->post("rank",true);
            $data=array('name1'=>$name1,'uid1'=>$uid1,'pwd1'=>$pwd1,'tel1'=>$tel1,'rank1'=>$rank1);
            $this->member_m->insertrow($data); 
    
            redirect("/~four1/member/lists/". $text1 . $page);    //   목록화면으로 이동.
        }
    
    }
    public function edit()
    {
        $this->load->library("form_validation");
        $this->load->helper(array("url", "date"));
        $this->form_validation->set_rules("name","이름","required|max_length[20]");
        $this->form_validation->set_rules("uid","아이디","required|max_length[20]");
        $this->form_validation->set_rules("pwd","암호","required|max_length[20]");

        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
    
        if ($this->form_validation->run()==FALSE ) // 목록화면의 추가버튼 클릭한 경우
        {
            $data["row"] = $this->member_m->getrow($no);
            $this->load->view("main_header"); // 상단출력(메뉴)
            $this->load->view("member_edit", $data); // member_list에 자료전달
            $this->load->view("main_footer"); // 하단 출력
        }
        else              // 입력화면의 저장버튼 클릭한 경우
        {
            $name1 = $this->input->post("name",true);
            $uid1 = $this->input->post("uid",true);
            $pwd1 = $this->input->post("pwd",true);
            $tel01 = $this->input->post("tel1",true);
            $tel02 = $this->input->post("tel2",true);
            $tel03 = $this->input->post("tel3",true);
            $tel1 = $tel01.$tel02.$tel03;
            $rank1 = $this->input->post("rank",true);
            $data=array('name1'=>$name1,'uid1'=>$uid1,'pwd1'=>$pwd1,'tel1'=>$tel1,'rank1'=>$rank1);
            $this->member_m->updaterow($data,$no); 
            redirect("/~four1/member/lists/" . $text1 . $page);    //   목록화면으로 이동.
        }
    
    }

}
?>