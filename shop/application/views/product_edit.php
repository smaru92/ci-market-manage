<?
$no = $row->no1;

?>

    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="post" enctype="multipart/form-data" class="form-inline">>
        <table class="table table-bordered table-sm mymargin5">
            <tr>
                <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호 </td>
                <td width="80%" align="left"><?=$row->no1; ?></td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 구분명
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                    
                        <select name="gubun_no" class="form-control form-control-sm">
                            <option value="">선택하세요</option>
                            <?
                                foreach($list as $row1)
                                {
                                    if ($row->gubun_no1==$row1->no1)
                                        echo("<option value='$row1->no1' selected> $row1->name1</option>");
                                    else
                                        echo("<option value='$row1->no1'> $row1->name1</option>");
                                }
                            ?>
                        </select> 
                    </div>
                    <?if(form_error("gubun_no")==TRUE) echo form_error("gubun_no"); ?>
                    </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 제품명
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="name" class="form-control form-control-sm" value="<?=$row->name1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 단가
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="price" class="form-control form-control-sm" value="<?=$row->price1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 재고
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="jaego" class="form-control form-control-sm" value="<?=$row->jaego1; ?>">
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
<?
    if ($row->pic1)     // 이미지가 있는 경우
        echo("<img src='/~four1/product_img/$row->pic1' width='200’ class='img-fluid img-thumbnail'>");
    else                   // 이미지가 없는 경우
        echo("<img src='' width='200’ class='img-fluid img-thumbnail'>");
?>

                        <input type="file" name="pic" value="" class="form-control form-control-sm" >
                    </div>
                </td>
            </tr>
        </table>
        <!--정보 입력폼 끝-->
        <!--버튼모음 시작-->
        <div align="center">
            <input type="submit" value="저장" role="button" class="btn btn-primary mycolor1">
            <input type="button" value="이전화면" role="button" class="btn btn-primary mycolor1" onClick="history.back();">
        </div>
        <!--버튼모음 끝-->
        </form>
