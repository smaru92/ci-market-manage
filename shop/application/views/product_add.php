
    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="post" enctype="multipart/form-data" class="form-inline">
        <table class="table table-bordered table-sm mymargin5">

            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 구분명
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <select name="gubun_no" class="form-control form-control-sm">
                            <option value="">선택하세요</option>
                            <?
                                $gubun_no=set_value("gubun_no");
                                foreach($list as $row)
                                {
                                    if ($row->no1==$gubun_no)
                                        echo("<option value='$row->no1' selected> $row->name1</option>");
                                    else
                                        echo("<option value='$row->no1'> $row->name1</option>");
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
                        <input type="컨트롤종류" name="name" class="form-control form-control-sm" value="">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 단가
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="price" class="form-control form-control-sm" value="">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 재고
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="jaego" class="form-control form-control-sm" value="">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 사진
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
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
