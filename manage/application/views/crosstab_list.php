<!--검색창 시작-->
<div class="alert mycolor1" role="alert">매출장</div>
<br>
<script>
	$(function () {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY',
			viewMode: 'years',
			defaultDate: moment()
		});

		$('#text1').on('dp.change', function (e) {
			find_text();
		});
	});

	function find_text() {
		form1.action = "/~four1/crosstab/lists/text1/" + form1.text1.value + "/page";
		form1.submit();
	}

</script>

<form name="form1" action="" method="post">
	<div class="row">
		<div class="col-12 form-inline" align="left">
			<div class="input-group-prepend">
				<span class="input-group-text">날짜</span>
			</div>
			<div class="input-group input-group-sm date" id="text1">

				<input type="text" name="text1" value="<?=$text1;?>" class="form-control"
					onKeydown="if(event.keyCode == 13){ find_text(); }">
				<div class="input-group-append">
					<div class="input-group-text">
						<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
					</div>
				</div>
			</div>

			<? $tmp =  "/text1/$text1/page/$page";   ?>
		</div>
	</div>
</form>
<!--검색창 끝-->
<!--목록 출력-->
<table class="table  table-bordered  table-sm  mymargin5">
<tr class=" mycolor2">
	<td width="20%">제품명</td>
	<td width="5%">1월</td>
	<td width="5%">2월</td>
	<td width="5%">3월</td>
	<td width="5%">4월</td>
	<td width="5%">5월</td>
	<td width="5%">6월</td>
	<td width="5%">7월</td>
	<td width="5%">8월</td>
	<td width="5%">9월</td>
	<td width="5%">10월</td>
	<td width="5%">11월</td>
	<td width="5%">12월</td>
	</tr>
	<?
foreach ($list as $row) // 연관배열 list를 row를 통해 출력한다.
{
    ?>
	<tr>
		<td><?=$row->product_name1;?></td>
		<td><?=$row->s1;?></td>
		<td><?=$row->s2;?></td>
		<td><?=$row->s3;?></td>
		<td><?=$row->s4;?></td>
		<td><?=$row->s5;?></td>
		<td><?=$row->s6;?></td>
		<td><?=$row->s7;?></td>
		<td><?=$row->s8;?></td>
		<td><?=$row->s9;?></td>
		<td><?=$row->s10;?></td>
		<td><?=$row->s11;?></td>
		<td><?=$row->s12;?></td>
	</tr>
	<?
}
?>
</table>
<!--목록 출력 끝-->
<!--페이지네이션-->
<!--페이지네이션 끝-->
