<?
class best_m extends CI_Model// 모델 클래스 선언

{
    public function getlist($text1, $text2,$start,$limit)
    {
            $sql="select product.name1 as product_name1, count(jangbu.numo1) as cnumo, sum(jangbu.numo1) as sumo 
            from jangbu left join product on jangbu.product_no1=product.no1 
            where io1 = 1 and jangbu.writeday1 between '$text1' and '$text2' 
            group by product.name1
            order by cnumo desc";
        return $this->db->query($sql)->result();
    }
    
    public function getrow($no)
    {
        $sql="select jangbu.*, product.name1 as product_name1 
        from jangbu left join product on jangbu.product_no1=product.no1 
        where jangbu.no1=$no"; // select문 정의
        return  $this->db->query($sql)->row(); // 쿼리실행, 결과 리턴
    }

    public function deleterow($no)
    {
        $sql = "delete from jangbu where no1=$no";
        return $this->db->query($sql);
    }
    function insertrow($row)
    {
        $this->db->insert("jangbu",$row);
        return $this->db->insert_id();
    }
    function updaterow( $row, $no )
    {
    $where=array( "no1"=>$no );
    return $this->db->update( "jangbu", $row, $where );
    }

    public function rowcount($text1, $text2)
    {  
            $sql="select * from jangbu where jangbu.writeday1 between '$text1' and '$text2' ";
        return $this->db->query($sql)->num_rows();

    }

    function getlist_product()
{
    $sql="select * from product order by name1";
    return $this->db->query($sql)->result();
}

}

?>
