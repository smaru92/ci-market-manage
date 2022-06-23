<!DOCTYPE html>
<html lang="kr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>판매관리</title>
	<link href="/~four1/my/css/bootstrap.min.css" rel="stylesheet">

	<link href="/~four1/my/css/my.css" rel="stylesheet">
	<script src="/~four1/my/js/jquery-3.3.1.min.js"></script>
	<script src="/~four1/my/js/popper.min.js"></script>
	<script src="/~four1/my/js/bootstrap.min.js"></script>

	<script src="/~four1/my/js/moment-with-locales.min.js"></script>
	<script src="/~four1/my/js/bootstrap-datetimepicker.js"></script>
	<link href="/~four1/my/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="/~four1/my/css/fontawesome-all.min.css" rel="stylesheet">
	<script>
		function find_text() {
			if (!form1.text1.value)
				form1.action = "/~four1/member/lists";
			else
				form1.action = "/~four1/member/lists/text1/" + form1.text1.value;
			form1.submit();
		}


	</script>
</head>

<body>
	<div class="container-fluid">
