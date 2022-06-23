<?
$no = $row->no1;

?>

<?    $tmp = $text1 ? "/no/$no/text1/$text1/page/$page" : "/no/$no/page/$page";   ?>

    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="product_insert.html">
        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
                <td width="80%" align="left"><?=$row->no1; ?></td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 구분명
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <?=$row->gubun_name1; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 제품명
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <?=$row->name1; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 단가
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <?=$row->price1; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 재고
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <?=$row->jaego1; ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 사진
                </td>
                <td width="80%" align="left">
                <div class="form-inline">
                    <b>파일이름</b> : <?=$row->pic1 ?> <br>
                </div>
<?
    if ($row->pic1)     // 이미지가 있는 경우
        echo("<img src='/~four1/product_img/$row->pic1' width='200’ class='img-fluid img-thumbnail'>");
    else                   // 이미지가 없는 경우
        echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
?>

                    </div>
                </td>
            </tr>
        </table>
        <!--정보 입력폼 끝-->
        <!--버튼모음 시작-->
        <div align="center">
            <a class="btn btn-primary mycolor1" href="/~four1/product/edit<?=$tmp; ?>" role="button">수정</a>
            <a class="btn btn-primary mycolor1" href="/~four1/product/del<?=$tmp; ?>" role="button">삭제</a>
            <input type="button" value="이전화면" role="button" class="btn btn-primary mycolor1" onClick="history.back();">
        </div>
    </form>
        <!--버튼모음 끝-->
