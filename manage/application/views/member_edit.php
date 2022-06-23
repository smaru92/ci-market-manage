<?
$no = $row->no1;
$tel1 = trim(substr($row->tel1, 0, 3));
$tel2 = trim(substr($row->tel1, 3, 4));
$tel3 = trim(substr($row->tel1, 7, 4));
$tel = $tel1 . "-" . $tel2 . "-" . $tel3;
$rank = $row->rank1;
?>

    <!--정보 입력폼 시작-->
    <div class="alert mycolor1" role="alert">사용자</div>
    <form name="form1" method="post">
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
                        <input type="컨트롤종류" name="name" class="form-control form-control-sm" value="<?=$row->name1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 아이디
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="uid" class="form-control form-control-sm" value="<?=$row->uid1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                    <font color="red">*</font> 암호
                </td>
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="pwd" class="form-control form-control-sm" value="<?=$row->pwd1; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                전화
                <td width="80%" align="left">
                    <div class="form-inline">
                        <input type="컨트롤종류" name="tel1" class="form-control form-control-sm" value="<?=$tel1; ?>">
                        -
                        <input type="컨트롤종류" name="tel2" class="form-control form-control-sm" value="<?=$tel2; ?>">
                        -
                        <input type="컨트롤종류" name="tel3" class="form-control form-control-sm" value="<?=$tel3; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td width="20%" class="info" style="vertical-align:middle">
                등급
                </td>
                <td width="80%" align="left">
                    <div data-toggle="buttons">
                    <label class="btn btn-secondary">
                        <input type="radio" name="rank" value="1" id="option1" autocomplete="off" <? if($rank==1) {?> checked="checked" <?} ?> > 관리자
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="rank" value="0" id="option2" autocomplete="off" <? if($rank==0) {?> checked="checked" <?} ?> > 직원
                    </label>
                    </div>
                </td>
            </tr>
            <tr>
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
