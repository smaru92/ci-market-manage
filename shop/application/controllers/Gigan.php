<?
require_once __DIR__ ."/../libraries/PhpSpreadsheet/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

class gigan extends CI_Controller
{ // gigan클래스 선언
    public function __construct() // 클래스생성할 때 초기설정

    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->library("pagination");
        $this->load->library('session');
        $this->load->database(); // 데이터베이스 연결
        $this->load->model("gigan_m"); // 모델 gigan_m 연결

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
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month")) ;
        $text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d") ;
        $text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "0" ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;
        $data["text1"]=$text1;                                      // text1 값 전달을 위한 처리
        $data["text2"]=$text2;  
        $data["text3"]=$text3;  
        $data["page"]=$page;                                      // page 값 전달을 위한 처리
        $base_url = "/gigan/lists/text1/$text1/text2/$text2/text3/$text3/page";    // $page_segment = 6;
        $page_segment = substr_count( substr($base_url,0,strpos($base_url,"page")) , "/" )+1;
        $base_url = "/~four1" . $base_url;

        $config["per_page"]	 = 5;                              // 페이지당 표시할 line 수
        $config["total_rows"] = $this->gigan_m->rowcount($text1,$text2,$text3);  // 전체 레코드개수 구하기
        $config["uri_segment"] = $page_segment;		 // 페이지가 있는 segment 위치
        $config["base_url"]	 = $base_url;                // 기본 URL
        $this->pagination->initialize($config);           // pagination 설정 적용

        $data["page"]=$this->uri->segment($page_segment,0);  // 시작위치, 없으면 0.
        $data["pagination"] = $this->pagination->create_links();  // 페이지소스 생성

        $start=$data["page"];                 // n페이지 : 시작위치
        $limit=$config["per_page"];        // 페이지 당 라인수
        $data["list"]=$this->gigan_m->getlist($text1,$text2,$text3,$start,$limit);   // 해당페이지 자료읽기
        $data["list_product"]=$this->gigan_m->getlist_product();

        $this->load->view("main_header"); // 상단출력(메뉴)
        $this->load->view("gigan_list", $data); // gigan_list에 자료전달
        $this->load->view("main_footer"); // 하단 출력
    }

    public function excel()
    {
        $uri_array=$this->uri->uri_to_assoc(3);
        $text1 = array_key_exists("text1",$uri_array) ? urldecode($uri_array["text1"]) : date("Y-m-d", strtotime("-1 month")) ;
        $text2 = array_key_exists("text2",$uri_array) ? urldecode($uri_array["text2"]) : date("Y-m-d") ;
        $text3 = array_key_exists("text3",$uri_array) ? urldecode($uri_array["text3"]) : "0" ;
        $page = array_key_exists("page",$uri_array) ? urldecode($uri_array["page"]) : "" ;

        $count = $this->gigan_m->rowcount($text1,$text2,$text3);  // 전체 레코드개수 구하기
        $list = $this->gigan_m->getlist_all($text1,$text2,$text3);   // 해당페이지 자료읽기

        $sheet = new Spreadsheet();
        
        //각 열의 너비, 정렬
        $sheet->getActiveSheet()->getColumnDimension("A")->setWidth(12);
        $sheet->getActiveSheet()->getColumnDimension("B")->setWidth(25);
        $sheet->getActiveSheet()->getColumnDimension("C")->setWidth(12);
        $sheet->getActiveSheet()->getColumnDimension("D")->setWidth(12);
        $sheet->getActiveSheet()->getColumnDimension("E")->setWidth(12);
        $sheet->getActiveSheet()->getColumnDimension("F")->setWidth(12);
        $sheet->getActiveSheet()->getColumnDimension("G")->setWidth(12);

        $sheet->getActiveSheet()->getStyle("A")->getAlignment()->setHorizontal("center");
        $sheet->getActiveSheet()->getStyle("B")->getAlignment()->setHorizontal("left");
        $sheet->getActiveSheet()->getStyle("C:F")->getAlignment()->setHorizontal("right");
        $sheet->getActiveSheet()->getStyle("G")->getAlignment()->setHorizontal("left");

        //제목 크기조절, 굵게
        $sheet->setActiveSheetIndex(0)->setCellValue("A1", "매출입장");
        $sheet->getActiveSheet()->getStyle("A1")->getFont()->setSize(13);
        $sheet->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);

        //기간(정렬)
        $sheet->setActiveSheetIndex(0)->setCellValue("G1", "기간:$text1 - $text2");
        $sheet->getActiveSheet()->getStyle("G1")->getAlignment()->setHorizontal("right");

        //헤더 정렬, 배경색
        $sheet->getActiveSheet()->getStyle("A2:G2")->getAlignment()->setHorizontal("center");
        $sheet->getActiveSheet()->getStyle("A2:G2")->getFill()->setFillType("\PhpOffice\PhpSpreadsheet\Style\Fill:FILL_SOLID")->getStartColor()->setARGB("FFCCCC");

        $sheet->setActiveSheetIndex(0)->setCellValue("A2","날짜")
                                        ->setCellValue("B2","제품명")
                                        ->setCellValue("C2","단가")
                                        ->setCellValue("D2","매입수량")
                                        ->setCellValue("E2","매출수량")
                                        ->setCellValue("F2","금액")
                                        ->setCellValue("G2","비고");
        $i=3;
        foreach($list as $row)
        {
            $sheet->setActiveSheetIndex(0)
            ->setCellValue("A$i","$row->writeday1")
            ->setCellValue("B$i","$row->product_name1")
            ->setCellValue("C$i","$row->price1")
            ->setCellValue("D$i","$row->numi1")
            ->setCellValue("E$i","$row->numo1")
            ->setCellValue("F$i","$row->prices1")
            ->setCellValue("G$i","$row->bigo1");
            $i++;
        }

        $sheet->setActiveSheetIndex(0);
        $fname="매출입장($text1-$text2).xlsx";
        $fname=iconv("UTF-8","EUC-KR",$fname);
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition:attachment;filename=$fname");
        header("Cache-Control:max-age=0");
        header("Cache-Control:max-age=1");

        $writer = IOFactory::createWriter($sheet, "Xlsx");
        $writer->save("php://output");
    }
}
?>