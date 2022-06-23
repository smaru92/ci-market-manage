
    <!--검색창 시작-->
    <div class="alert mycolor1" role="alert">매입장</div>
    <br>
    <script>    
        function find_text()
        {
            form1.action="/~four1/jangbui/lists/text1/"+form1.text1.value+"/page";
            form1.submit();
        }
        $(function() {
            $('#text1').datetimepicker({
                locale : 'ko',
                format : 'YYYY-MM-DD',
                defaultDate: moment()
            });

            $('#text1').on('dp.change', function (e){
                find_text();
            });
        });
    </script>

    <form name="form1" action="" method="post">
        <div class="row">
            <div class="col-3" align="left">
                <div class="input-group  input-group-sm date" id="text1">
                    <div class="input-group-prepend">
                        <span class="input-group-text">날짜</span>
                    </div>
                    <input type="text" name="text1" value="<?=$text1;?>" class="form-control" onKeydown="if(event.keyCode == 13){ find_text(); }" >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <div class="input-group-addon"><i class="far fa-calendar-alt fa-lg"></i></div>
                        </div>
                    </div>
                    <? $tmp =  "/text1/$text1/page/$page";   ?>
                </div>
            </div>
            <div class="col-9" align="right">
                <a href="/~four1/jangbui/add<?=$tmp; ?>" class="btn btn-sm mycolor1">추가</a>
            </div>
        </div>
    </form>
    <!--검색창 끝-->
    <!--목록 출력-->
<table class="table  table-bordered  table-sm  mymargin5>
<tr class=" mycolor2">
        <td width="10%">번호</td>
        <td width="20%">날짜</td>
        <td width="20%">제품명</td>
        <td width="15%">단가</td>
        <td width="10%">수량</td>
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
    <td><a href="/~four1/jangbui/view/no/<?=$no?><?=$tmp; ?>"><?=$row->product_name1;?></a></td>
    <td><?=$row->price1;?></td>
    <td><?=$row->numi1;?></td>
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
