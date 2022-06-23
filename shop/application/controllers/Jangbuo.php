<?
class jangbuo extends CI_Controller
{ // jangbuo클래스 선언
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->database(); // 데이터베이스 연결
        $this->load->model("jangbuo_m"); // 모델 jangbuo_m 연결

        //$this->load->helper(array("url","date"));              // Helper 선언
        date_default_timezone_set("Asia/Seoul");         // 지역설정
        //$today=date("Y-m-d");                                        // 오늘날짜

    }
    public function index() // 제일 먼저 실행되는 함수
    {
        $this->lists(); // list 함수 호출
    }
    public function lists()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d") ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $base_url = "/jangbuo/lists/text1/$text1/page";    // $page_segment = 6;
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        $base_url = "/~four1" . $base_url;

        $config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
        $config["total_rows"] = $this->jangbuo_m->rowcount($text1);  // 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;                // 기본 URL
        $this->pagination->initialize($config);           // pagination 설정 적용

        $data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

        $start=$data["page"];                 // n페이지 : 시작위치
        $limit=$config["per_page"];        // 페이지 당 라인수
        $data["list"]=$this->jangbuo_m->getlist($text1,$start,$limit);   // 해당페이지 자료읽기


        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("jangbuo_list", $data); // jangbuo_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }
    public function view()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
        $data["row"] = $this->jangbuo_m->getrow($no);
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("jangbuo_view", $data); // jangbuo_list에 자료전달
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
        $this->jangbuo_m->deleterow($no);
        redirect("/~four1/jangbuo/lists/" . $text1 . $page); // 목록화면으로 돌아가기
    }
    public function add()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? "/text1/" . urldecode($uri_array["text1"]) : date("Y-m-d") ;
        $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $this->load->library("form_validation");
        $this->load->helper(array("url", "date"));
        $this->form_validation->set_rules("writeday","날짜","required");
        $this->form_validation->set_rules("product_no","제품명","required");
      
     

        if ($this->form_validation->run()==FALSE) // 목록화면의 추가버튼 클릭한 경우
        {
            $data["list"] = $this->jangbuo_m->getlist_product();
            $this->load->view("main_header");
            $this->load->view("jangbuo_add", $data);    // 입력화면 표시
            $this->load->view("main_footer");
        }
        else              // 입력화면의 저장버튼 클릭한 경우
        {
            $io = 1;
            $writeday = $this->input->post("writeday",true);
            $product_no = $this->input->post("product_no",true);
            $price = $this->input->post("price",true);
            $numi = 0;
            $numo = $this->input->post("numo",true);
            $prices = $this->input->post("prices",true);
            $bigo = $this->input->post("bigo",true);            

            $data=array('io1'=>$io, 'writeday1'=>$writeday,'product_no1'=>$product_no,'price1'=>$price, 'numi1'=>$numi, 'numo1'=>$numo, 'prices1'=>$prices, 'bigo1'=>$bigo );
            
            $this->jangbuo_m->insertrow($data); 
    
            redirect("/~four1/jangbuo/lists/". $text1 . $page);    //   목록화면으로 이동.
        }
    
    }
    public function edit()
    {
        $this->load->library("form_validation");
        $this->load->helper(array("url", "date"));
        
        $this->form_validation->set_rules("writeday","날짜","required");
        $this->form_validation->set_rules("product_no","제품명","required");
      

        $uri_array=$this->uri->uri_to_assoc(3);
        $no	= array_key_exists("no",$uri_array) ? $uri_array["no"] : "" ;
        $text1 = array_key_exists("text1",$uri_array) ? "/text1/".urldecode($uri_array["text1"]) : "" ;
        $page = array_key_exists("page",$uri_array) ? "/page/" . urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
    
        if ($this->form_validation->run()==FALSE ) // 목록화면의 추가버튼 클릭한 경우
        {
            $data["list"] = $this->jangbuo_m->getlist_product();
            $data["row"] = $this->jangbuo_m->getrow($no);
            $this->load->view("main_header"); // 상단출력(메뉴)
            $this->load->view("jangbuo_edit", $data); // jangbuo_list에 자료전달
            $this->load->view("main_footer"); // 하단 출력
        }
        else              // 입력화면의 저장버튼 클릭한 경우
        {
            $io = 1;
            $writeday = $this->input->post("writeday",true);
            $product_no = $this->input->post("product_no",true);
            $price = $this->input->post("price",true);
            $numi = 0;
            $numo = $this->input->post("numo",true);
            $prices = $this->input->post("prices",true);
            $bigo = $this->input->post("bigo",true);            

            $data=array('io1'=>$io, 'writeday1'=>$writeday,'product_no1'=>$product_no,'price1'=>$price, 'numi1'=>$numi, 'numo1'=>$numo, 'prices1'=>$prices, 'bigo1'=>$bigo );
            
            $this->jangbuo_m->updaterow($data,$no); 
            redirect("/~four1/jangbuo/lists/" . $text1 . $page);    //   목록화면으로 이동.
        }
    
    }

    public function call_upload()
    {
        $config['upload_path']	= './jangbuo_img';
        $config['allowed_types']	= 'gif|jpg|png'; 
        $config['overwrite']	= TRUE; 
        $this->upload->initialize($config); 
        if (!$this->upload->do_upload('pic')) 
            $picname="";
        else
            $picname=$this->upload->data("file_name");
        return $picname;
    }

}
?>