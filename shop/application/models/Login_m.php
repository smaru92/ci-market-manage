<?
class login_m extends CI_Model// 모델 클래스 선언

{
    public function getrow($uid, $pwd)
    {
        $sql="select * from member where uid1 = '$uid' and pwd1='$pwd'";
        return $this->db->query($sql)->row();
    }
    
}

?>
