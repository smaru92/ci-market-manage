<?
class Member_m extends CI_Model// 모델 클래스 선언

{
    public function getlist($text1,$start,$limit)
    {
        if (!$text1)
            $sql="select * from member order by name1 limit $start,$limit";    // 전체 자료
        else
            $sql="select * from member where name1 like '%$text1%' order by name1 limit $start,$limit";

        return $this->db->query($sql)->result();
    }

    public function getrow($no)
    {
        $sql="select * from member where no1=$no"; // select문 정의
        return  $this->db->query($sql)->row(); // 쿼리실행, 결과 리턴
    }

    public function deleterow($no)
    {
        $sql = "delete from member where no1=$no";
        return $this->db->query($sql);
    }
    function insertrow($row)
    {
        $this->db->insert("member",$row);
        return $this->db->insert_id();
    }
    function updaterow( $row, $no )
    {
    $where=array( "no1"=>$no );
    return $this->db->update( "member", $row, $where );
    }

    public function rowcount($text1)
    {
        if (!$text1)
            $sql="select * from member";
        else
            $sql="select * from member where name1 like '%$text1%' ";
        return $this->db->query($sql)->num_rows();

    }

}

?>
