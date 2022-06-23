<?     $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   ?>
    <script>
        function zoomimage(iname, pname)
        {
            w=window.open("/~four1/picture/zoom/iname/"+iname+'/pname/'+pname,"imageview","resizable=yes,scrollbars=yes,status=no,width=800,height=600");
            w.focus();
        }
    </script>
    <!--검색창 시작-->
    <br>
    <form name="form1" action="" method="post">
        <div class="row">
            <div class="col-3" align="left">
                <div class="input-group  input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text">이름</span>
                    </div>
                    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if (event.keyCode == 13) { find_text(); }" >
                    <div class="input-group-append">
                        <button class="btn btn-sm mycolor1" type="button" onClick="find_text();">
                        검색
                    </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!--검색창 끝-->
    <!--목록 출력-->
<div class="row">
<?
foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
{
    $iname=$row->pic1 ? $row->pic1 : "";
    $pname=$row->name1;
    ?>
    <div class="col-3">
        <div class="mythumb_box">
            <a href="javascript:zoomimage('<?=$iname ?>','<?=$pname ?>');">
                <img src="/~four1/product_img/thumb/<?=$iname ?>" class="mythumb_image">
            </a>
            <div class="mythumb_text"><?=$pname?></div>
        </div>
    </div>
<?
}
?>
</div>
 <!--목록 출력 끝-->
 <!--페이지네이션-->
 <?=$pagination; ?>
 <!--페이지네이션 끝-->
