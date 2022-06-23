<?     $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   ?>
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
            <div class="col-9" align="right">
                <a href="/~four1/gubun/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>
    <!--검색창 끝-->
    <!--목록 출력-->
<table class="table  table-bordered  table-sm  mymargin5>
<tr class=" mycolor2">
        <td width="10%">번호</td>
        <td width="20%">이름</td>
        </tr>
<?
foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
{
    $no = $row->no1; // 사용자번호
    $name = $row->name1
    ?>
<tr>
    <td><?=$no;?></td>
    <td><a href="/~four1/gubun/view/no/<?=$no?><?=$tmp; ?>"><?=$name;?></a></td>
</tr>
<?
}
?>
</table>
 <!--목록 출력 끝-->
 <!--페이지네이션-->
 <?=$pagination; ?>
 <!--페이지네이션 끝-->
