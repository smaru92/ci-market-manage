<?php
    $no=$row->no;
    $tel1 = trim(substr($row->tel,0,3));
    $tel2 = trim(substr($row->tel,3,4));
    $tel3 = trim(substr($row->tel,7,4));
    $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
    $rank = $row->rank==0 ? '직원' : '관리자';
?>

    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="member_insert.html">
        <table class="table table-bordered table-sm mymargin5">
            <tr>        
                <td width="20%" class="mycolor2" style="vertical-align:middle"> 번호</td>
                <td width="80%" align="left"><?=$row->no; ?><//td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 이름
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 아이디
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 암호
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                전화
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                        -
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                        -
                        <input type="컨트롤종류" name="필드이름" class="form-control form-control-sm" …>
                    </div>
                </td>
            </tr>
            <tr>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"
                    checked>
                <label class="form-check-label" for="exampleRadios1">
                    직원
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    관리자
                </label>
            </div>
        </tr>
        </table>
        <!--정보 입력폼 끝-->
        <!--버튼모음 시작-->
        <div align="center">
            <a class="btn btn-primary mycolor1" href="#" role="button">수정</a>
            <a class="btn btn-primary mycolor1" href="#" role="button">삭제</a>
            <a class="btn btn-primary mycolor1" href="#" role="button">저장</a>
            <a class="btn btn-primary mycolor1" href="#" role="button">이전화면</a>
        </div>
        <!--버튼모음 끝-->