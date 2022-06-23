<!--검색창 시작-->
<div class="alert mycolor1" role="alert">매출장</div>
<br>
<script>
	$(function () {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
		$('#text2').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});

		$('#text1').on('dp.change', function (e) {
			find_text();
		});
		$('#text2').on('dp.change', function (e) {
			find_text();
		});
	});

	function find_text() {
		form1.action = "/~four1/gigan/lists/text1/" + form1.text1.value + "/text2/" + form1.text2.value +
			"/text3/" + form1.text3.value + "/page";
		form1.submit();
	}

	function make_excel() {
		form1.action = "/~four1/gigan/excel/text1/" + form1.text1.value + "/text2/" + form1.text2.value +
			"/text3/" + form1.text3.value + "/page";
		form1.submit();
	}

</script>

<form name="form1" action="" method="post">
	<div class="row">
		<div class="col-12 form-inline" align="left">
			<div class="input-group-prepend">
				<span class="input-group-text">날짜</span>
			</div>
			<div class="input-group  input-group-sm date" id="text1">
				<input type="text" name="text1" value="<?=$text1;?>" class="form-control"
					onKeydown="if(event.keyCode == 13){ find_text(); }">
				<div class="input-group-append">
					<div class="input-group-text">
						<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>
			</div>

			-
			<div class="input-group  input-group-sm date" id="text2">
				<input type="text" name="text2" value="<?=$text2;?>" class="form-control"
					onKeydown="if(event.keyCode == 13){ find_text(); }">
				<div class="input-group-append">
					<div class="input-group-text">
						<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>
			</div>

			<div class="input-group-prepend">
				<span class="input-group-text">제품명</span>
			</div>
			<div class="input-group-append">
				<select name="text3" class="form-control form-control-sm" onChange="find_text();">
					<option value="0">전체</option>
					<?
                                foreach($list_product as $row1)
                                {
                                    if ($row1->no1== $text3)
                                        echo("<option value='$row1->no1' selected> $row1->name1($row1->price1)</option>");
                                    else
                                        echo("<option value='$row1->no1'> $row1->name1($row1->price1)</option>");
                                }
                            ?>

				</select>
			</div>
			<input type="button" value="엑셀파일 변환" class="form-control btn btn-sm mycolor1"
				onClick="if (confirm('엑셀파일로 저장할까요?')) make_excel();">
			<? $tmp =  "/text1/$text1/page/$page";   ?>
		</div>
	</div>
</form>
<!--검색창 끝-->
<!--목록 출력-->
<table class="table  table-bordered  table-sm  mymargin5">
	<tr class=" mycolor2">
		<td width="10%">번호</td>
		<td width="15%">날짜</td>
		<td width="20%">제품명</td>
		<td width="15%">단가</td>
		<td width="10%">매입수량</td>
		<td width="10%">매출수량</td>
		<td width="15%">금액</td>
		<td width="20%">비고</td>
	</tr>
	<?
foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
{
    $no = $row->no1; // 사용자번호
    ?>
	<tr>
		<td><?=$no;?></td>
		<td><?=$row->writeday1;?></td>
		<td><?=$row->product_name1;?></td>
		<td><?=$row->price1;?></td>
		<td><?=$row->numi1;?></td>
		<td><?=$row->numo1;?></td>
		<td><?=$row->prices1;?></td>
		<td><?=$row->bigo1;?></td>
	</tr>
	<?
}
?>
</table>
<!--목록 출력 끝-->
<!--페이지네이션-->
<?=$pagination; ?>
<!--페이지네이션 끝-->
