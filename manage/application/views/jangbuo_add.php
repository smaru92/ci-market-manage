<script>
	$(function () {
		$('#text1').datetimepicker({
			locale: 'ko',
			format: 'YYYY-MM-DD',
			defaultDate: moment()
		});
	});

	function select_product() {
		var str;
		str = form1.sel_product_no.value;
		if (str == "") {
			form1.product_no.value = "";
			form1.price.value = "";
			form1.prices.value = ""
		} else {
			str = str.split("^^");
			form1.product_no.value = str[0];
			form1.price.value = str[1];
			form1.prices.value = Number(form1.price.value) * Number(form1.numo.value);
		}
	}

	function cal_prices() {
		form1.prices.value = Number(form1.price.value) * Number(form1.numo.value);
		form1.bigo.focus();
	}

</script>
<!--정보 입력폼 시작-->
<div class="alert mycolor1" role="alert">매출장</div>
<form name="form1" method="post" enctype="multipart/form-data" class="form-inline">
	<table class="table table-bordered table-sm mymargin5">

		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				<font color="red">*</font> 날짜
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<div class="input-group  input-group-sm date" id="text1">
						<input type="text" name="writeday" value="" class="form-control form-control-sm"
							onKeydown="if(event.keyCode == 13){ find_text(); }">
						<div class="input-group-append">
							<div class="input-group-text">
								<div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
							</div>
						</div>
					</div>
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				<font color="red">*</font> 제품명
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type='hidden' name='product_no' value="<?=set_value("product_no"); ?>">
					<select name="sel_product_no" class="form-control form-control-sm" onChange="select_product();">
						<option value="">선택하세요</option>
						<?
                                $product_no=set_value("product_no");
                                foreach($list as $row)
                                {
                                    if ($row->no1==$product_no)
                                        echo("<option value='$row->no1^^$row->price1' selected> $row->name1($row->price1)</option>");
                                    else
                                        echo("<option value='$row->no1^^$row->price1'> $row->name1($row->price1)</option>");
                                }
                            ?>
					</select>
				</div>
				<?if(form_error("product_no")==TRUE) echo form_error("product_no"); ?>
			</td>
		</tr>
		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				단가
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="컨트롤종류" name="price" class="form-control form-control-sm" value="" readonly>
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				수량
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="컨트롤종류" name="numo" class="form-control form-control-sm" value=""
						onChange="cal_prices();">
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				금액
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="컨트롤종류" name="prices" value="" class="form-control form-control-sm" readonly>
				</div>
			</td>
		</tr>
		<tr>
			<td width="20%" class="info" style="vertical-align:middle">
				비고
			</td>
			<td width="80%" align="left">
				<div class="form-inline">
					<input type="컨트롤종류" name="bigo" value="" class="form-control form-control-sm">
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
