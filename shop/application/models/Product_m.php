<?
class product_m extends CI_Model// 모델 클래스 선언

{
    public function getlist($text1,$start,$limit)
    {
        if (!$text1)
            $sql="select product.*, gubun.name1 as gubun_name1 
            from product left join gubun on product.gubun_no1=gubun.no1 
            order by name1 limit $start,$limit";    // 전체 자료
        else
            $sql="select product.*, gubun.name1 as gubun_name1 
            from product left join gubun on product.gubun_no1=gubun.no1 
            where name1 like '%$text1%' 
            order by name1 limit $start,$limit";

        return $this->db->query($sql)->result();
    }
    
    public function getrow($no)
    {
        $sql="select product.*, gubun.name1 as gubun_name1 
        from product left join gubun on product.gubun_no1=gubun.no1 
        where product.no1=$no"; // select문 정의
        return  $this->db->query($sql)->row(); // 쿼리실행, 결과 리턴
    }

    public function deleterow($no)
    {
        $sql = "delete from product where no1=$no";
        return $this->db->query($sql);
    }
    function insertrow($row)
    {
        $this->db->insert("product",$row);
        return $this->db->insert_id();
    }
    function updaterow( $row, $no )
    {
    $where=array( "no1"=>$no );
    return $this->db->update( "product", $row, $where );
    }

    public function rowcount($text1)
    {
        if (!$text1)
            $sql="select * from product";
        else
            $sql="select * from product where name1 like '%$text1%' ";
        return $this->db->query($sql)->num_rows();

    }

    function getlist_gubun()
{
    $sql="select * from gubun order by name1";
    return $this->db->query($sql)->result();
}
    function cal_jaego()
    {
        $sql="drop table if exists temp";
        $this->db->query($sql); //temp 테이블이 있으면 삭제

        $sql="create table temp(
                no1 int not null auto_increment,
                product_no1 int,
                jaego1 int default 0,
                primary key(no1));";
        $this->db->query($sql); //temp 테이블 생성

        $sql="update product set jaego1=0;";
        $this->db->query($sql); //product테이블의 jaego값 일괄적으로 0으로 초기화

        $sql="insert into temp(product_no1, jaego1)
                select product_no1, sum(numi1)-sum(numo1) from jangbu
                group by product_no1";
        $this->db->query($sql); //jaego 계산

        $sql="update product inner join temp on product.no1=temp.product_no1
                set product.jaego1 = temp.jaego1;";
        $this->db->query($sql); //계산한값을 product 테이블에 복사
    }
}

?>
