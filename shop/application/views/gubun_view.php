<?
$no = $row->no1;
?>

<?    $tmp = $text1 ? "$no/text1/$text1/page/$page" : "$no/page/$page";   ?>

    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="gubun_insert.html">
        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
                <td width="80%" align="left"><?=$row->no1; ?></td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 이름
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <?=$row->name1; ?>
                    </div>
                </td>
            </tr>
        </table>
        <!--정보 입력폼 끝-->
        <!--버튼모음 시작-->
        <div align="center">
            <a class="btn btn-primary mycolor1" href="/~four1/gubun/edit/no/<?=$tmp; ?>" role="button">수정</a>
            <a class="btn btn-primary mycolor1" href="/~four1/gubun/del/no/<?=$tmp; ?>" role="button">삭제</a>
            <input type="button" value="이전화면" role="button" class="btn btn-primary mycolor1" onClick="history.back();">
        </div>
    </form>
        <!--버튼모음 끝-->
