<?
class crosstab_m extends CI_Model// 모델 클래스 선언

{
    public function getlist($text1,$start,$limit)
    {
            $sql="select product.name1 as product_name1,
            sum(if(month(jangbu.writeday1)=1, jangbu.numo1, 0)) as s1,
            sum(if(month(jangbu.writeday1)=2, jangbu.numo1, 0)) as s2,
            sum(if(month(jangbu.writeday1)=3, jangbu.numo1, 0)) as s3,
            sum(if(month(jangbu.writeday1)=4, jangbu.numo1, 0)) as s4,
            sum(if(month(jangbu.writeday1)=5, jangbu.numo1, 0)) as s5,
            sum(if(month(jangbu.writeday1)=6, jangbu.numo1, 0)) as s6,
            sum(if(month(jangbu.writeday1)=7, jangbu.numo1, 0)) as s7,
            sum(if(month(jangbu.writeday1)=8, jangbu.numo1, 0)) as s8,
            sum(if(month(jangbu.writeday1)=9, jangbu.numo1, 0)) as s9,
            sum(if(month(jangbu.writeday1)=10, jangbu.numo1, 0)) as s10,
            sum(if(month(jangbu.writeday1)=11, jangbu.numo1, 0)) as s11,
            sum(if(month(jangbu.writeday1)=12, jangbu.numo1, 0)) as s12
            from jangbu left join product on jangbu.product_no1=product.no1 
            where year(jangbu.writeday1) = $text1
            group by product.name1";
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

    public function rowcount($text1)
    {  
        $sql="select * from jangbu where year(jangbu.writeday1) = $text1 ";
        return $this->db->query($sql)->num_rows();

    }

    function getlist_product()
{
    $sql="select * from product order by name1";
    return $this->db->query($sql)->result();
}

}

?>
