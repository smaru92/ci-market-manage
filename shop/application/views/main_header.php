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
    function find_text()
    {
        if(!form1.text1.value)
            form1.action="/~four1/member/lists";
        else
            form1.action="/~four1/member/lists/text1/" + form1.text1.value;
        form1.submit();
    }
    function find_product()
{
    window.open("/~four1/findproduct","","resizable=yes,scrollbars=yes,width=500,height=600");
}

    </script>    
</head>

<body>
    <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/~four1/">제목부분</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/~four1/jangbui">매입</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/~four1/jangbuo">매출</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/~four1/gigan">기간조회</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        통계
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/~four1/best">Best제품</a>
                        <a class="dropdown-item" href="/~four1/crosstab">월별제품현황</a>
                        <a class="dropdown-item" href="/~four1/graph">종류별분포도</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        기초정보
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="/~four1/gubun">구분</a>
                        <a class="dropdown-item" href="/~four1/product">제품</a>
                        <a class="dropdown-item" href="/~four1/picture">제품(사진)</a>
                        <div class="dropdown-divider"></div>
                        <?
                        if($this->session->userdata('rank')==1)
                            echo("  <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='/~four1/member'>사용자</a>");
                        ?>
                    </div>
                </li>       
            </ul>
            <?
                if(!$this->session->userdata('uid'))
                    echo("<a href='#exampleModal' data-toggle='modal' class='btn btn-sm btn-outline-secondary btn-dark'>로그인</a>");
                else
                    echo("<a href='/~four1/login/logout' class='btn btn-sm btn-outline-secondary btn-dark'>로그아웃</a>");
            ?>
        </div>
    </nav>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">로그인</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name='login_form' method="post" action="/~four1/login/check">
          <div class="form-group">
            <label for="uid" class="col-form-label">아이디</label>
            <input type="text" class="form-control" id="uid" name="uid">
          </div>
          <div class="form-group">
            <label for="password" class="col-form-label">비밀번호</label>
            <input type="password" class="form-control" id="password" name="pwd">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onClick=login_form.submit();>확인</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
      </div>
    </div>
  </div>
</div>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5000">
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/~four1/my/img/main1.jpg" class="d-block w-100" alt="First slide">
    </div>
    <div class="carousel-item">
      <img src="/~four1/my/img/main2.jpg" class="d-block w-100" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img src="/~four1/my/img/main3.jpg" class="d-block w-100" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>