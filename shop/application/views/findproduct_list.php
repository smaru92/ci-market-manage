<?     $tmp = $text1 ? "/text1/$text1/page/$page" : "/page/$page";   ?>

    <script>
		function SendProduct(no, name, price) {
			opener.form1.product_no.value = no; // ①
			opener.form1.product_name.value = name; // ②
			opener.form1.price.value = price; // ③
            opener.form1.prices.value = Number(price) * Number(opener.form1.numo.value);
            
			window.close();
		}
        form1.action="/gigan/lists/text1/" + form1.text1.value+"/text2/" + form1.text2.value +
	"/text3/" + form1.text3.value + "/page";

    </script>
    <!--검색창 시작-->
    <div class="alert mycolor1" role="alert">제품검색</div>
    <br>
    <form name="form1" action="" method="post">
        <div class="row">
            <div class="col-4" align="left">
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
<table class="table  table-bordered  table-sm  mymargin5>
<tr class=" mycolor2">
        <td width="10%">번호</td>
        <td width="20%">구분명</td>
        <td width="20%">제품명</td>
        <td width="20%">단가</td>
        <td width="20%">재고</td>
        </tr>
<?
foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
{
    $no = $row->no1; // 사용자번호
    ?>
<tr>
    <td><?=$no;?></td>
    <td><?=$row->gubun_name1;?></td>
    <td><a href onclick="SendProduct(<?=$row->no1;?>,'<?=$row->name1;?>',<?=$row->price1;?>)"><?=$row->name1;?></a></td>
    <td><?=$row->price1;?></td>
    <td><?=$row->jaego1;?></td>
</tr>
<?
}
?>
</table>
 <!--목록 출력 끝-->
 <!--페이지네이션-->
 <?=$pagination; ?>
 <!--페이지네이션 끝-->
