<!DOCTYPE html>
<html>
<head>
<title>حواله {{$bills->order_no}} | حواله‌ها | آی‌تی‌تلکام</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    @page{
        /* size: 8.5in 11in;  <length>{1,2} | auto | portrait | landscape */
	      /* 'em' 'ex' and % are not allowed; length values are width height */
          header: page-header;
        footer: page-footer;
        margin-header: 0mm; /* <any of the usual CSS values for margins> */
	    margin-footer: 0mm; /* <any of the usual CSS values for margins> */
        margin-top: 0.3cm;
        margin-bottom: 0.6cm;
        margin-left: 0.3cm;
        margin-right: 0.3cm;
    }
    body{font-family:'font',sans-serif;direction:rtl}
    .text-right{text-align:right}
    .text-center{text-align:center}
    .text-justify{text-align:justify}
    .text-left{text-align:left}
    .float-right{float:right}
    .float-left{float:left}
    .col-1{width:100%}
    .col-1-1{width:75%}
    .col-1-2{width:66.66%}
    .col-2{width:50%}
    .col-3{width:33.33%}
    .col-4{width:25%}
    .col-5{width:20%}
    .col-6{width:16.66%}
    .col-7{width:14.28%}
    .col-8{width:12.5%}
    .col-9{width:11.11%}
    .col-10{width:10%}
    .col-11{width:9.09%}
    .h1{font-size:1.27rem;font-family:'bold',sans-serif;}
    .border{border:1px solid #000}
    .descry p{padding:0 10px;margin:0}
    .red{color:red}
    .padd-15{padding:0 5px}
    .width-auto{width:auto}
    .bold{font-weight:bold;}
</style>

<style>
    .border-head{background:rgba(108, 168, 221,0.2);border:2px solid rgb(108, 168, 221);border-radius:7px;margin-bottom:-2px;padding:4px}
    .border-box{border:1px solid rgb(108, 168, 221);border-radius:7px;}
    .border-content{background:#fff;border:2px solid rgb(108, 168, 221);border-radius:7px;margin-bottom:3px}
    .border-left{border-left:2px solid rgb(108, 168, 221);}
    .border-top{border-top:2px solid rgb(108, 168, 221);}
    .border-bottom{border-bottom:2px solid rgb(108, 168, 221);}
    .last .border-bottom{border-bottom:0px solid rgb(108, 168, 221);}
</style>

</head>
<body>
<htmlpageheader name="page-header">
    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxODQ1IDU5NS4zIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxODQ1IDU5NS4zOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KCS5zdDB7ZmlsbDojRjFGMUY1O30NCgkuc3Qxe2ZpbGw6I0ZFRjJGNTt9DQoJLnN0MntmaWxsOiNGOUYxRjU7fQ0KCS5zdDN7ZmlsbDojRjlGMEY1O30NCgkuc3Q0e2ZpbGw6I0YzRjFGNDt9DQoJLnN0NXtmaWxsOiNGMkYxRjQ7fQ0KCS5zdDZ7ZmlsbDojRjdGMUY1O30NCgkuc3Q3e2ZpbGw6I0ZBRjJGNjt9DQoJLnN0OHtmaWxsOiNGNEY0Rjg7fQ0KCS5zdDl7ZmlsbDojRjZGM0Y5O30NCjwvc3R5bGU+DQo8Zz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTI2OC42LDM2Ny4yYzAsOC4zLDAsMTYuOSwwLDI1LjJjMCwyLjctMC45LDMuNi0zLjYsMy4zYy0yLjctMC4zLTUuMywwLTgsMGMtMy42LDAtMy45LTAuMy0zLjktNC4yDQoJCWMwLTE0LjUsMC42LTI5LjEtMC4zLTQzLjNjLTAuNi0xMS45LTEyLjItMTcuNS0yMS4xLTEyLjdjLTUsMi43LTcuMSw3LjQtNy4xLDEzYy0wLjMsMTQuMiwwLDI4LjUsMCw0Mi40YzAsNC4yLDAsNC4yLTQuMiw0LjINCgkJYy0xLjUsMC0zLjMsMC00LjcsMGMtMi43LDAuMy0zLjYtMS4yLTMuNi0zLjZjMC00LjcsMC05LjUsMC0xNC41YzAtOS41LDAtMTksMC0yOC44YzAtNi4yLTQuMi0xMi41LTkuNS0xNC41DQoJCWMtNS4zLTIuMS0xMy42LDEuNS0xNi4zLDYuOGMtMS44LDMuMy0yLjQsNi41LTIuNCwxMC40YzAsMTMuNiwwLDI3LDAsNDAuNmMwLDMuNi0wLjMsNC4yLTQuMiw0LjJjLTIuNywwLTUuMywwLTgsMA0KCQljLTIuNCwwLTMuMy0wLjktMy4zLTMuM2MwLTE2LTAuMy0zMS43LDAtNDcuN2MwLTguMyw0LjctMTQuNSwxMS4zLTE5LjZjMTEuMy04LjYsMjcuNi03LjQsMzcuMSwyLjRjMS41LDEuNSwyLjQsMS4yLDMuNiwwDQoJCWM4LTcuNCwxNy41LTkuOCwyNy42LTYuOGM5LjIsMi43LDE2LDguOSwxOS42LDE4LjFjMC42LDEuMiwwLjYsMi40LDAuNiwzLjZDMTI2OC42LDM1MC45LDEyNjguNiwzNTguOSwxMjY4LjYsMzY3LjJ6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTk3MC40LDM1OC4zYy03LjcsMC0xNS40LDAtMjIuOCwwYy0yLjQsMC0zLDAuOS0yLjcsM2MxLjIsOC42LDguMywxNy4yLDE4LjEsMTguMWMzLjksMC4zLDcuMSwwLDExLTAuOQ0KCQljNC40LTAuOSw3LjQtMy42LDguNi03LjdjMS41LTYuMiw5LjItOS4yLDEzLjMtOS44YzEuNS0wLjMsMi4xLDAuMywyLjEsMS44Yy0wLjMsOS44LTIuNywxOC43LTkuNSwyNS44DQoJCWMtNS4zLDUuNi0xMi41LDguMy0yMC4yLDguOWMtNy4xLDAuNi0xMy45LTAuMy0yMC41LTMuOWMtNi4yLTMuMy0xMC43LTgtMTMuOS0xMy45Yy0zLjktNy4xLTUuNi0xNC41LTUuMy0yMi41DQoJCWMwLjMtMTEsMy4zLTIxLjEsMTEuNi0yOC44YzYuMi01LjksMTMuNi04LjksMjIuMi05LjJjNy43LTAuMywxNC44LDAuOSwyMS4xLDUuM2M4LDUuOSwxMi43LDEzLjksMTMuNiwyNGMwLjMsMi4xLDAuNiwzLjksMC42LDUuOQ0KCQljMCwyLjctMC42LDMuNi0zLjMsMy42Qzk4Ni4xLDM1OC4zLDk3OC40LDM1OC4zLDk3MC40LDM1OC4zeiBNOTY1LjYsMzQ1LjJjNC43LDAsOS41LDAsMTQuNSwwYzAuOSwwLDIuNCwwLDEuMi0xLjUNCgkJYy0zLjYtNC43LTcuNy04LjMtMTQuMi04LjNjLTIuNCwwLTQuNywwLjYtNy4xLDAuOWMtMy45LDAuNi03LjEsMi43LTkuMiw2LjJjLTEuNSwyLjQtMS4yLDIuNywxLjUsMi43DQoJCUM5NTYuNCwzNDUuMiw5NjAuOSwzNDUuMiw5NjUuNiwzNDUuMnoiLz4NCgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNTk5LjQsMzY1LjdjLTIuMS0zLjMtNS0zLjYtOC42LTMuNmMtMTAuNywwLjMtMjEuMSwwLTMxLjcsMGMtMi43LDAtNC4yLTAuOS01LjMtMy4zDQoJCWMtNC40LTkuNS0xMC4xLTE4LjQtMTUuNC0yNy4zYy0xLjItMS44LTEuMi0zLjMsMC01LjNjNS45LTEwLjEsMTEuNi0yMC4yLDE3LjItMzAuNWMxLjItMi4xLDEuMi0zLjksMC01LjkNCgkJYy01LjktMTAuMS0xMS42LTIwLjUtMTcuNS0zMC41Yy0wLjktMS41LTAuNi0zLTAuMy00LjdjMS4yLTMuOSwzLjYtNi44LDUuMy0xMC4xYzMuMy01LjksNi44LTExLjksOS44LTE4LjFjMS44LTMuOSwzLTQuMiw3LjEtMy42DQoJCWMyLjEsMC4zLDQuNCwwLjMsNi44LDAuM2M3LjctMC4zLDE1LjQsMC4zLDIyLjgtMC4zYzIuMS0wLjMsMy42LDEuNSw0LjcsMy4zYzMuNiw2LjIsNy4xLDEyLjUsMTAuNywxOC43YzEuNSwyLjcsMyw1LDQuNCw3LjQNCgkJYzEuNSwyLjEsMS41LDQuMiwwLjMsNi41Yy00LjIsNy4xLTguMywxNC41LTEyLjUsMjEuOWMtMS44LDMtMy45LDUuNi01LjMsOC42Yy0xLjIsMi40LTEuMiw0LjIsMC4zLDYuNWMyLjcsNC4yLDUuMyw4LjYsNy4xLDEzDQoJCWMtMC4zLDAuMy0wLjMsMC42LTAuMywxLjJjMC42LDMsMC45LDYuMiwwLjksOS41YzAsMS41LTAuNiwyLjQtMi40LDIuNGMtMC4zLTAuMy0wLjYtMC4zLTAuNi0wLjZjLTQuNy04LjMtOS41LTE2LjYtMTQuMi0yNC42DQoJCWMtMS4yLTIuMS0xLjItNC40LDAtNi41YzUuMy05LjgsMTAuNy0xOS42LDE2LTI5LjFjMS44LTMsMS44LTUuNi0wLjMtOC42Yy0zLjMtNS4zLTYuNS0xMC40LTkuMi0xNmMtMC45LTEuOC0yLjQtMi43LTQuNC0yLjcNCgkJYy03LjQsMC0xNC41LDAtMjEuOSwwYy0yLjQsMC0zLjksMS4yLTQuNywzLjNjLTAuMywxLjItMC45LDIuNC0xLjUsMy4zYy0yLjcsNC40LTUsOC45LTcuNywxM2MtMS41LDIuNy0xLjIsNC43LDAuMyw3LjQNCgkJYzUuNiw5LjIsMTEsMTguNywxNi4zLDI4LjJjMS41LDMsMS41LDUuNi0wLjMsOC42Yy0wLjksMS41LTIuMSwzLjMtMyw0LjdjLTMuNiw1LjMtNS45LDExLjYtMTAuNCwxNi4zYy0yLjEsMi40LTMuMyw1LjYtNC43LDguNg0KCQljLTAuOSwxLjgtMC42LDMuNiwwLjYsNS4zYzMsNC43LDUuOSw5LjIsOC42LDEzLjljMS44LDMuOSwzLjksNS4zLDguNiw1YzExLjYtMC42LDIzLjEtMC4zLDM0LjctMC4zYzAuOSwzLjksMC42LDcuNywwLjYsMTEuNg0KCQlDNjAxLjIsMzY0LjIsNjAxLjIsMzY1LjQsNTk5LjQsMzY1Ljd6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEwNDIuNywzOThjLTE2LjYsMC45LTI5LjktMTEuMy0zNC4xLTI2LjdjLTIuNy05LjgtMi43LTE5LjMsMC42LTI4LjhjNC43LTEzLjYsMTguNC0yMy4xLDMyLjYtMjMuNA0KCQljOS41LDAsMTcuNSwzLDI0LDkuOGM0LjQsNC43LDYuOCwxMC43LDguMywxNi45YzAuMywxLjUtMC4zLDIuNC0xLjUsMy4zYy0zLjMsMS44LTguMywxLjItMTEtMS41Yy0yLjQtMi40LTUtNC43LTcuMS03LjENCgkJYy0zLjYtNC40LTguMy00LjQtMTMuMy0zLjljLTExLjMsMC45LTE2LjksMTAuNC0xNy44LDE5LjljLTEuMiw4LjksMS44LDE2LDguOSwyMS4xYzYuNSw0LjQsMTguMSw0LjIsMjQuMywwLjMNCgkJYzIuMS0xLjIsMy4zLTMsMy45LTVjMS44LTYuOCw3LjEtOC45LDEzLjMtMTAuNGMxLjUtMC4zLDIuMSwwLDIuMSwxLjhjMC42LDkuNS0xLjUsMTguMS04LDI1LjJjLTUuMyw1LjktMTIuNSw4LjktMjAuNSw5LjUNCgkJQzEwNDUuNCwzOTgsMTA0My45LDM5OCwxMDQyLjcsMzk4eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik03MjQuMywzNTUuM2MwLTEyLjcsMC0yNS4yLDAtMzhjMC0yLjEtMC42LTMuMy0yLjctM2gtMC4zYy05LjIsMC05LjIsMC0xMy4zLTguM2MtMC42LTEuNS0xLjItMi43LTIuMS00LjINCgkJYy0xLjUtMi4xLTAuMy0yLjQsMS41LTIuNGM3LjcsMCwxNS43LDAuMywyMy40LDBjMTAuNy0wLjYsMjEuMy0wLjMsMzItMC42YzIuNywwLDMuOSwwLjYsMy42LDMuNmMtMC4zLDIuNywwLDUuMywwLDguMw0KCQljMCwyLjctMC45LDMuOS0zLjYsMy45Yy02LjIsMC0xMi43LDAtMTksMGMtMi40LDAtMywwLjktMywzYzAsMjUuMiwwLDUwLjcsMCw3NS45YzAsNC4yLTAuMyw0LjQtNC40LDQuNGMtMi43LDAtNS4zLDAtOCwwDQoJCWMtMy4zLDAtMy45LTAuNi0zLjktMy45YzAtMTIuMiwwLTI0LjMsMC0zNi41QzcyNC4zLDM1Ni44LDcyNC4zLDM1Ni4yLDcyNC4zLDM1NS4zeiIvPg0KCTxwYXRoIGNsYXNzPSJzdDIiIGQ9Ik04MTQuNCwzMTUuOWMtNi4yLDAtNi4yLDAtNi4yLDYuMmMwLDI0LjMsMCw0OC42LDAsNzIuOWMwLDQuMi0wLjMsNC40LTQuNCw0LjRjLTIuNCwwLTUsMC03LjQsMA0KCQljLTQuNCwwLTQuNy0wLjMtNC43LTQuNGMwLTI0LjksMC00OS44LDAtNzQuN2MwLTMuOSwwLTMuOS0zLjktMy45Yy00LjQsMC04LjYsMC0xMywwYy0zLjMsMC0zLjktMC45LTMuOS00LjJjMC0yLjcsMC01LDAtNy43DQoJCXMxLjItMy42LDMuOS0zLjZjMTQuMiwwLDI4LjUsMCw0Mi43LDBjMCwxLjItMC4zLDIuMS0wLjMsMy4zQzgxNS45LDMwNy45LDgxNS4zLDMxMS43LDgxNC40LDMxNS45eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDMiIGQ9Ik04MjYuOSwzODEuMWMtMy4zLTQuNy00LjctMTAuNC01LjYtMTZjLTEuNS04LjMsMC0xNiwyLjctMjMuN2M0LjItMTIuMiwxNy41LTIxLjMsMzAuMi0yMS4zDQoJCWM2LjgsMCwxMy42LDAuNiwxOS42LDQuMmMwLjksMC42LDIuMSwwLjksMi43LDIuMWMtMywyLjctNS42LDUuNi04LjYsOC4zYy0wLjYsMC42LTEuMiwxLjUtMC45LDIuNGMtNC40LTEuMi04LjYtMS41LTEzLTAuNg0KCQljLTQuMiwwLjktOCwzLTEwLjQsNi41Yy0xLjIsMS44LTAuOSwyLjQsMS41LDIuNGMzLjksMCw3LjQsMCwxMS4zLDBjMCwxLjItMC45LDEuOC0xLjUsMi40Yy0yLjEsMi4xLTQuMiw0LjQtNi41LDYuMg0KCQljLTEuNSwxLjItMi4xLDIuNy0xLjIsNC40Yy0yLjEsMC00LjQsMC4zLTYuNSwwYy0yLjctMC4zLTMsMS4yLTIuNywzYzAuMywyLjcsMS4yLDUuMywyLjQsNy43Yy0xLjUsMC42LTIuNywxLjgtMy45LDMNCgkJQzgzMy4xLDM3NC45LDgzMC40LDM3OC41LDgyNi45LDM4MS4xeiIvPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik02MzUuNiwyNTQuNWMtNSwwLTEwLjEsMC0xNS4xLDBjLTIuNywwLTQuNC0wLjktNS45LTMuNmMtNS04LjMtOS44LTE2LjktMTQuOC0yNS41Yy0xLjItMi4xLTEuMi0zLjksMC01LjkNCgkJYzQuNC03LjcsOS41LTE1LjEsMTMuNi0yMy4xYzIuNy01LjYsNi41LTYuOCwxMi4yLTYuNWM3LjQsMCwxNC44LDEuNSwyMS45LDAuNmM1LjYtMC42LDguNiwxLjUsMTEsNi4yYzQuMiw4LDkuMiwxNS43LDEzLjYsMjMuNw0KCQljMC42LDAuOSwwLjYsMS44LDAsM2MtNS45LDkuNS0xMS42LDE5LjMtMTcuMiwyOS40Yy0wLjksMS44LTIuNywyLjQtNC40LDIuNEM2NDYsMjU0LjUsNjQwLjcsMjU0LjUsNjM1LjYsMjU0LjV6IE02MzUuMywxOTYuMQ0KCQljLTMuNiwwLTcuMSwwLTEwLjQsMGMtMi4xLDAtNC4yLDAuNi01LjMsMi43Yy0zLjYsNi44LTcuNCwxMy42LTExLjMsMjAuMmMtMC45LDEuOC0wLjksMy4zLDAsNC43YzMuOSw2LjgsNy43LDEzLjYsMTEuOSwyMC44DQoJCWMwLjYsMS4yLDEuNSwxLjgsMi43LDEuNWM3LjctMC4zLDE1LjEsMC45LDIyLjgsMC42YzMuMywwLDUuNi0xLjIsNy4xLTQuMmMzLjMtNS42LDYuMi0xMS4zLDkuNS0xNi42YzEuOC0zLDEuNS01LjYsMC04LjYNCgkJYy0zLjMtNS42LTYuOC0xMS4zLTEwLjEtMTcuMmMtMS41LTMtMy45LTQuMi03LjEtNC4yQzY0MS44LDE5Ni4xLDYzOC42LDE5Ni4xLDYzNS4zLDE5Ni4xeiIvPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik05MTcuNiwzNDguOGMwLDE1LjEsMCwyOS45LDAsNDUuMWMwLDMuNi0wLjMsMy45LTMuOSwzLjljLTIuNCwwLTUsMC03LjQsMGMtMi43LDAtMy42LTAuOS0zLjYtMy42DQoJCWMwLTYuOCwwLTEzLjYsMC0yMC41YzAtMjMuNCwwLTQ2LjYsMC03MGMwLTQuMiwwLTQuMiw0LjItNC4yYzIuNCwwLDQuNywwLDcuMSwwYzIuNywwLDMuNiwxLjIsMy42LDMuOQ0KCQlDOTE3LjYsMzE4LjYsOTE3LjYsMzMzLjcsOTE3LjYsMzQ4Ljh6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTEwODYuNiwzNTkuOGMtMC4zLTUsMC4zLTkuNSwxLjUtMTQuMmMwLjMtMS44LDEuMi0xLjgsMi40LTEuMmMzLjksMi43LDcuNyw1LDExLjYsNy43DQoJCWMxLjIsMC42LDAuOSwxLjgsMC45LDIuN2MwLDMtMC4zLDUuNiwwLjMsOC42YzMsMTMuMywxMy45LDE5LjYsMjcsMTZjMi40LTAuNiw1LjMtMC45LDYuOC0zLjZjMC42LTAuOSwxLjItMC42LDEuNSwwDQoJCWMzLjMsMi43LDYuMiw1LjMsOS41LDcuN2MxLjUsMS4yLDEuNSwyLjEsMC4zLDMuNmMtNC43LDUuOS0xMS4zLDguOS0xOC43LDEwLjRjLTkuOCwyLjEtMTksMC45LTI3LjMtNC40DQoJCWMtOC4zLTUuMy0xMi41LTEzLjYtMTQuOC0yMi44QzEwODYuOSwzNjYuNiwxMDg2LjMsMzYzLDEwODYuNiwzNTkuOHoiLz4NCgk8cGF0aCBjbGFzcz0ic3Q0IiBkPSJNODI2LjksMzgxLjFjMy4zLTIuNyw1LjktNS45LDkuMi04LjljMS4yLTEuMiwyLjQtMi40LDMuOS0zYzAuOSwwLjksMS44LDEuOCwyLjcsM2MzLjMsNC43LDcuNyw2LjUsMTMuMyw3LjQNCgkJYzMuNiwwLjYsNy4xLDAsMTAuNy0wLjZjNC43LTAuOSw3LjQtMy45LDguOS04LjNjMS44LTQuNyw4LjMtOS41LDEzLjMtOS41YzAuOSwwLDEuOCwwLDEuOCwxLjVjMC4zLDguOS0xLjUsMTYuOS03LjQsMjQNCgkJYy04LjYsMTAuMS0xOS42LDEyLjctMzIsMTFjLTEwLjQtMS41LTE4LjEtNi41LTIzLjctMTUuMUM4MjcuMSwzODIsODI3LjEsMzgxLjQsODI2LjksMzgxLjF6Ii8+DQoJPHBhdGggY2xhc3M9InN0NSIgZD0iTTYyMi4zLDMyNy44Yy0xLjUsMC0zLDAtNC40LDBjLTEuOCwwLTMtMC42LTMuOS0yLjRjLTUtOC42LTkuOC0xNy41LTE0LjgtMjYuMWMtMS41LTIuNC0xLjItNC43LDAtNi44DQoJCWM1LjMtOS41LDExLTE5LDE2LjMtMjguNWMxLjUtMi40LDMuOS0zLDYuMi0yLjdjOS41LDAuNiwxOS4zLDAuNiwyOC44LDAuNmMtMS4yLDMuMy0yLjQsNi4yLTUsOC42Yy02LjUsMC0xMi43LDAtMTkuMywwDQoJCWMtMi43LDAtNS4zLDAuNi02LjgsMy4zYy0zLDUuMy02LjIsMTAuNC04LjksMTZjLTAuOSwyLjEtMS4yLDQuMiwwLDYuMmMyLjcsNC43LDUuMyw5LjgsOCwxNC41YzIuMSwzLjksNC43LDYuOCw5LjUsNi4yDQoJCUM2MjcsMzIxLjIsNjI0LjMsMzI0LjIsNjIyLjMsMzI3Ljh6Ii8+DQoJPHBhdGggY2xhc3M9InN0MSIgZD0iTTY5OC44LDM2Ni45YzAsOC45LDAsMTcuOCwwLDI2LjdjMCwzLjMtMC42LDMuOS0zLjksMy45Yy0yLjcsMC01LjMsMC04LDBjLTIuNCwwLTMuNi0xLjItMy42LTMuNg0KCQljMC0xOC4xLDAtMzYuMiwwLTU0LjNjMC0xLjgsMC42LTIuNCwyLjQtMi40YzMuNiwwLDcuMSwwLDEwLjcsMGMyLjEsMCwyLjQsMC42LDIuNCwyLjRDNjk4LjgsMzQ4LjgsNjk4LjgsMzU4LDY5OC44LDM2Ni45eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDYiIGQ9Ik04NjYuNiwzMzYuNmMwLTAuOSwwLjMtMS44LDAuOS0yLjRjMy0yLjcsNS42LTUuNiw4LjYtOC4zYzUuNiwzLjMsOC45LDguMywxMSwxNC4yYzEuOCw0LjcsMi4xLDkuOCwyLjcsMTQuOA0KCQljMC4zLDIuNC0wLjYsMy4zLTMuMywzLjNjLTEzLjMsMC0yNi43LDAtNDAsMGMtMC45LTEuOC0wLjMtMywxLjItNC40YzIuNC0yLjEsNC4yLTQuMiw2LjUtNi4yYzAuNi0wLjYsMS41LTEuMiwxLjUtMi40DQoJCWM1LjYsMCwxMS4zLDAsMTYuNiwwYzAuNiwwLDEuNSwwLjMsMS44LTAuNmMwLjMtMC42LTAuNi0wLjktMC45LTEuNUM4NzEuOSwzNDAuNSw4NjguNywzMzksODY2LjYsMzM2LjZ6Ii8+DQoJPHBhdGggY2xhc3M9InN0MyIgZD0iTTczMS43LDI0OC45YzAuOSwxLjUsMS44LDMsMyw0LjRjMi43LDMuOSwwLjYsNi44LTEuNSwxMC4xYy00LjQsNy43LTkuMiwxNS40LTEzLjYsMjMuMWMtMS4yLDIuMS0zLDMuMy01LjYsMw0KCQljLTEwLjQsMC0yMC44LDAtMzEuMSwwYy0yLjEsMC0zLjYtMC42LTQuNC0yLjdjLTAuOS0xLjgtMi40LTMuMy0zLTUuM2MyLjctMS4yLDUuMy0yLjQsNy40LTQuNGMyLjEsMS4yLDMuMywzLjYsNi4yLDMuNg0KCQljNi4yLTAuMywxMi4yLDAsMTguNCwwYzMuMywwLDUuNi0xLjUsNy4xLTQuNGMyLjQtNC43LDUtOS41LDgtMTMuOWMxLjgtMywyLjQtNS42LDAuNi04LjZDNzI2LjYsMjUzLDcyOC43LDI1MC40LDczMS43LDI0OC45eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDMiIGQ9Ik02MjIuMywzMjcuOGMyLjQtMy42LDUtNi41LDUuNi0xMC43YzUuOSwwLDExLjYsMCwxNy41LDBjMi40LDAsMy45LTAuOSw0LjctMi43YzMuMy01LjksNi44LTExLjYsMTAuMS0xNy41DQoJCWMxLjItMi4xLDEuMi00LjQtMC4zLTYuNWMtMS41LTIuMS0yLjQtNC4yLTMuOS02LjJjMS4yLDAsMS44LTAuOSwyLjEtMi4xYzAuOS0yLjEsMi4xLTMuOSwzLTUuOWMyLjcsMi43LDMuOSw2LjUsNS45LDkuNQ0KCQljMS4yLDEuOCwyLjEsMy45LDMuMyw1LjZjMS41LDIuMSwxLjIsNC4yLDAsNi4yYy01LjMsOS4yLTEwLjcsMTguNy0xNS43LDI3LjljLTAuOSwxLjUtMi4xLDIuMS0zLjksMi4xDQoJCUM2NDEuMiwzMjcuOCw2MzEuOCwzMjcuOCw2MjIuMywzMjcuOHoiLz4NCgk8cGF0aCBjbGFzcz0ic3Q3IiBkPSJNNjQ3LjIsMzMyLjJjNy43LTEuOCwxMSwzLDEzLjksOC45YzMuNiw3LjcsNy43LDE1LjEsMTEsMjIuOGMwLjksMi4xLDAuOSwzLjktMC4zLDUuOQ0KCQljLTUsOC45LTEwLjQsMTcuOC0xNS40LDI2LjdjLTAuOSwxLjgtMi40LDIuNy00LjQsMi40Yy0xLjUsMC0zLjMsMC00LjcsMGMtMC4zLTMuNiwwLjYtNy4xLTAuNi0xMC43YzIuNC0wLjYsNC43LTEuNSw2LjItMy45DQoJCWMzLTUuMyw2LjItMTAuNyw5LjItMTZjMS41LTMsMi40LTYuMiwwLTkuNWMtMS41LTEuOC0yLjQtNC4yLTMuOS02LjJjLTMtNC4yLTMuOS0xMC43LTEwLjctMTENCgkJQzY0Ny4yLDMzOC43LDY0Ny4yLDMzNS41LDY0Ny4yLDMzMi4yeiIvPg0KCTxwYXRoIGNsYXNzPSJzdDQiIGQ9Ik02NjIuOSwyNjAuN2MtMi4xLTIuMS0yLjEtNC40LTAuNi02LjhjNC40LTcuNCw4LjktMTQuOCwxMy0yMi41YzMuOS03LjEsMy4zLTYuMiwxMS45LTYuMg0KCQljOCwwLDE2LjMsMC4zLDI0LjMsMGM0LjctMC4zLDgsMS4yLDkuMiw1LjZjLTEuOCwzLTQuNCw0LjQtOCw1Yy0xLjItMS44LTMtMi40LTUtMi4xYy01LjMsMC42LTEwLjQsMC42LTE1LjcsMA0KCQljLTMuMy0wLjYtNy4xLDAuNi04LjYsM2MtMy4zLDYuNS03LjQsMTIuNy0xMSwxOWMtMC45LDAtMS41LDAuOS0yLjEsMS4yQzY2OC4yLDI1OC40LDY2Ni4yLDI2MC40LDY2Mi45LDI2MC43eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDEiIGQ9Ik02OTAuNSwyOTkuOWMxLjUsMCwzLDAuMyw0LjQsMGMzLjktMC42LDUuOSwxLjIsNy4xLDQuNGMxLjIsMi43LDIuNyw1LjMsNC40LDcuN2MxLjUsMi4xLDEuOCw0LjIsMC4zLDYuNQ0KCQljLTIuNCwzLjktNC43LDgtNi41LDEyLjJjLTAuNiwxLjItMS4yLDEuNS0yLjQsMS41Yy00LjcsMC05LjUsMC0xNC4yLDBjLTEuMiwwLTIuMS0wLjYtMi43LTEuNWMtMi40LTQuNC00LjctOC42LTcuNC0xMw0KCQljLTAuOS0xLjUtMC42LTIuNywwLTMuOWMyLjQtNC4yLDQuNC04LDYuNS0xMi4yYzAuNi0xLjIsMS41LTEuOCwzLTEuOEM2ODUuNCwyOTkuOSw2ODcuOCwyOTkuOSw2OTAuNSwyOTkuOXogTTY5MC44LDMyNC4yDQoJCUw2OTAuOCwzMjQuMmMxLjUsMCwzLjYsMC42LDQuNCwwYzEuOC0xLjgsMy4zLTQuMiw0LjQtNi41YzAuOS0xLjgtMC42LTIuNC0wLjktMy42Yy0zLjMtNy40LTMuMy03LjEtMTAuNy03LjENCgkJYy0xLjUsMC0yLjQsMC42LTMsMS44Yy0zLDQuMi00LjIsOC0wLjYsMTIuN2MxLjIsMS44LDIuMSwzLDQuNCwyLjRDNjg5LjMsMzI0LjIsNjg5LjksMzI0LjIsNjkwLjgsMzI0LjJ6Ii8+DQoJPHBhdGggY2xhc3M9InN0NCIgZD0iTTg0Mi4zLDMwMC41YzcuNywwLDE1LjQsMCwyMy4xLDBjMy42LDAsMy45LDAuMyw0LjIsNC4yYzAsMi40LDAsNC43LDAsNy4xYzAsMy45LTAuMyw0LjItNC4yLDQuMg0KCQljLTguNiwwLTE3LjUsMC0yNi4xLDBjMC0wLjYsMC0xLjUsMC4zLTIuMUM4NDAuNSwzMDkuMSw4NDEuNywzMDQuOSw4NDIuMywzMDAuNXoiLz4NCgk8cGF0aCBjbGFzcz0ic3Q4IiBkPSJNNTk5LjQsMzY1LjdjMS44LTAuMywxLjgtMS41LDEuOC0yLjdjMC0zLjksMC4zLTcuNy0wLjYtMTEuNmMyLjcsMC4zLDMuOSwyLjQsNSw0LjRjNS4zLDkuNSwxMC43LDE5LDE2LDI4LjUNCgkJYy0wLjksMC42LTAuNiwxLjgtMC42LDIuN2MwLDQuMiwwLDgsMCwxMi4yYy0yLjctMC42LTQuNC0yLjQtNS45LTQuN2MtNC43LTguNi04LjktMTcuMi0xNC4yLTI1LjINCgkJQzYwMC4zLDM2OC4xLDU5OS43LDM2Ni45LDU5OS40LDM2NS43eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xMTEzLjYsMzIwYzIzLjQtNC40LDM5LjQsOS44LDQxLjUsMjguMkMxMTQxLjEsMzM4LjcsMTEyNy41LDMyOS44LDExMTMuNiwzMjB6Ii8+DQoJPHBhdGggY2xhc3M9InN0NiIgZD0iTTg0Mi4zLDMwMC41Yy0wLjMsNC40LTEuOCw4LjYtMi43LDEzYzAsMC42LTAuMywxLjUtMC4zLDIuMWMtOC4zLDAtMTYuNiwwLTI0LjksMGMwLjktNC4yLDEuNS04LDIuNC0xMS45DQoJCWMwLjMtMS4yLDAuMy0yLjEsMC4zLTMuM0M4MjUuNywzMDAuNSw4MzQsMzAwLjUsODQyLjMsMzAwLjV6Ii8+DQoJPHBhdGggY2xhc3M9InN0OCIgZD0iTTU5OC4zLDMyMi4xYzEuOCwwLDIuNC0wLjksMi40LTIuNGMwLTMuMy0wLjMtNi4yLTAuOS05LjVjMC0wLjYtMC4zLTAuOSwwLjMtMS4yYzMsMy45LDQuNyw4LjMsNy4xLDEyLjUNCgkJYzIuMSwzLjMsMy45LDYuNSw1LjYsMTAuMWMwLjYsMC45LDEuMiwwLjksMi4xLDAuOWMyLjEsMCwzLjksMCw1LjksMGMxLjIsMy42LDAuNiw2LjgtMC42LDEwLjFjLTEuOCwwLTMuNiwwLjMtNS4zLDANCgkJYy0yLjEtMC4zLTQuNywwLTYuMi0yLjFDNjA1LjEsMzM0LjMsNjAxLjUsMzI4LjMsNTk4LjMsMzIyLjF6Ii8+DQoJPHBhdGggY2xhc3M9InN0OSIgZD0iTTYyMS4xLDM5OS4yYzAtNC4yLDAtOCwwLTEyLjJjMC0wLjktMC4zLTEuOCwwLjYtMi43YzEuOCwzLjMsNC43LDMuOSw4LDMuOWM1LjYsMCwxMS4zLDAsMTYuOSwwDQoJCWMxLjIsMy42LDAuMyw3LjEsMC42LDEwLjdDNjM4LjYsMzk5LjIsNjI5LjcsMzk5LjIsNjIxLjEsMzk5LjJ6Ii8+DQoJPHBhdGggY2xhc3M9InN0OSIgZD0iTTYyMC41LDM0Mi4zYzEuMi0zLjMsMS44LTYuOCwwLjYtMTAuMWM4LjYsMCwxNy41LDAsMjYuMSwwYzAsMy4zLDAsNi41LDAsOS41DQoJCUM2MzguMywzNDEuNCw2MjkuNCwzNDIuMyw2MjAuNSwzNDIuM3oiLz4NCgk8cGF0aCBjbGFzcz0ic3Q2IiBkPSJNNjYyLjksMjYwLjdjMy0wLjMsNS0yLjQsNy40LTMuOWMwLjYtMC42LDEuMi0xLjIsMi4xLTEuMmMtMC42LDMsMS4yLDUuMywyLjQsOGMyLjcsNC40LDUsOS4yLDcuNywxMy42DQoJCWMtMi4xLDIuMS00LjcsMy42LTcuNCw0LjRjLTIuNC0yLjctMy45LTUuNi01LjYtOC42QzY2Ny42LDI2OSw2NjUsMjY1LjIsNjYyLjksMjYwLjd6Ii8+DQoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTExMTcuNywzMzYuMWMwLDAuNi0wLjYsMC42LTAuOSwwLjljLTIuNywwLjYtNC43LDIuMS02LjUsNC4yYy0xLjIsMS4yLTEuOCwxLjItMy4zLDAuMw0KCQljLTMuNi0yLjQtNy4xLTQuNy0xMC43LTcuMWMtMS41LTEuMi0xLjgtMS44LTAuMy0zLjNjNy4xLTYuNSw0LjQtNi44LDEyLjctMS4yYzIuNywxLjgsNS4zLDMuNiw4LjMsNS42DQoJCUMxMTE3LjEsMzM1LjIsMTExNy43LDMzNS4yLDExMTcuNywzMzYuMXoiLz4NCgk8cGF0aCBjbGFzcz0ic3Q2IiBkPSJNNzEzLDIzNS44YzMuMy0wLjYsNi4yLTIuMSw4LTVjMy42LDUuOSw3LjEsMTIuMiwxMC43LDE4LjFjLTIuNywxLjUtNSw0LjItOC42LDQuNA0KCQlDNzE5LjUsMjQ3LjcsNzE2LjksMjQxLjUsNzEzLDIzNS44eiIvPg0KCTxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xMTQyLjMsMzUyLjFjNSwzLjMsOS41LDYuMiwxMy45LDkuOGMwLjYsMC4zLDEuMiwxLjIsMC45LDEuOGMtMC45LDMsMCw1LjktMC45LDguOWMtMC4zLDEuMi0wLjksMS4yLTEuOCwwLjYNCgkJYy0zLjYtMi40LTcuMS00LjctMTAuNy03LjFjLTAuOS0wLjYtMS4yLTEuNS0xLjItMi40QzExNDIuMywzNTkuOCwxMTQyLjMsMzU2LjIsMTE0Mi4zLDM1Mi4xeiIvPg0KCTxwYXRoIGNsYXNzPSJzdDYiIGQ9Ik02NjEuNCwyNzYuMmMtMC45LDIuMS0yLjEsNC4yLTMsNS45Yy0wLjYsMC45LTAuOSwyLjEtMi4xLDIuMWMtMS4yLTEuMi0xLjUtMi40LTIuNC0zLjYNCgkJYy0yLjQtMy42LTMuMy04LjMtOC4zLTkuOGMyLjctMi40LDMuOS01LjMsNS04LjZjMi43LTAuNiwzLjksMC42LDUsM0M2NTcuMywyNjguNyw2NjAuMiwyNzIsNjYxLjQsMjc2LjJ6Ii8+DQo8L2c+DQo8L3N2Zz4NCg=="
              width="1000%" style="margin:400px 0px 0px 0px">
</htmlpageheader>
<htmlpagefooter name="page-footer">
	<div class="text-left border-top" style="margin-left:0px;margin-top:200px">
        @if ( $bills->show_company == '1' )
        @foreach($companys_group as $row_com)
            @if($row_com->parentId == $bills->company_id)
                @if(\Carbon\Carbon::parse($invoices->created_at)->lessThanOrEqualTo('2024-01-16 11:59:00 AM'))
                <div class="text-right" style="font-size:12px;width:85%"><span class="que bold">آدرس: </span> جنت آباد جنوبی، خ. شهیدمحمدجوادحیدری (چهارباغ شرقی)، پلاک۸۲، واحد۳  {!! ' <span class="que bold">کدپستی: </span> ' . \Morilog\Jalali\CalendarUtils::convertNumbers( 1473845845 ) !!} {!!  $row_com->telnum ? '، <span class="que bold">شماره تلفن: </span> '. \Morilog\Jalali\CalendarUtils::convertNumbers($row_com->telnum) : '' !!}
                @else
                <div class="text-right" style="font-size:12px;width:85%"><span class="que bold">آدرس: </span> جنت‌آباد جنوبی، انتهای خیابان چهارباغ غربی، پلاک ۵۵  {!! ' <span class="que bold">کدپستی: </span> ' . \Morilog\Jalali\CalendarUtils::convertNumbers( 1474774591 ) !!} {!!  $row_com->telnum ? '، <span class="que bold">شماره تلفن: </span> '. \Morilog\Jalali\CalendarUtils::convertNumbers($row_com->telnum) : '' !!}
                @endif
            {!!  $row_com->fax  ? '، <span class="que bold">نمابر: </span> ' . \Morilog\Jalali\CalendarUtils::convertNumbers($row_com->fax) : '' !!}</div>
            @endif
        @endforeach
        @endif
        <div style="font-size:13px;width:10%">صفحه {PAGENO} از {nbpg}</div>
    </div>
</htmlpagefooter>
<header>
    <div class="col-3 float-right">
        <img src="{{ resource_path('/bill/logo'.'/0.svg') }}" width="170">
    </div>
    <div class="col-3 h1 bold float-right text-center" style="padding:0">
        <span>حواله خروج کالا</span>
        <br>
{{--        <img src="{{ resource_path(config('path.bill.icons').'/slimi.svg') }}" width="100" style="margin-top:-0px">--}}
        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMy4wLjAsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAxNDQuNSAyNC4zIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAxNDQuNSAyNC4zOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQo8c3R5bGUgdHlwZT0idGV4dC9jc3MiPg0KCS5zdDB7ZmlsbDojMTgxODE4O30NCjwvc3R5bGU+DQo8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTAyLjUsMTBjLTEuOCwwLjEtMi45LTAuOC0zLjYtMi4zYy0wLjctMS42LTAuMy0zLjEsMC44LTQuNGMyLjEtMi40LDUuOS0yLjksOC40LTEuMmMyLjYsMS44LDMuNCw0LjgsMS45LDcuOQ0KCWMtMC4xLDAuMi0wLjEsMC4zLTAuMywwLjdjMC45LDAsMS42LTAuNSwyLjItMC45YzUuNS0yLjYsMTEtNS4zLDE3LjEtNi42YzIuNS0wLjYsNS0wLjksNy41LTAuNGMyLjcsMC41LDQuNywyLDYsNC40DQoJYzEuNCwyLjcsMC44LDUuNi0xLjYsNy42Yy0zLjEsMi42LTcuOSwzLjEtOS45LDFjMC4xLTAuMSwwLjItMC4zLDAuMy0wLjRjMi43LDAuOSw1LjQsMC43LDcuOS0wLjVjMy41LTEuNyw0LTYuMiwxLjItOQ0KCWMtMi4zLTIuMi01LjEtMi42LTguMS0yLjNjLTMuMSwwLjMtNi4xLDEuMy05LjEsMi4zYy0zLjksMS40LTcuNiwzLjItMTEuMyw1Yy0wLjIsMC4xLTAuNSwwLjItMC42LDAuNmMwLjcsMC40LDEuNiwwLjMsMi40LDAuNA0KCWMxLjMsMC4yLDIuNywwLjUsMy45LDEuMWMwLjQsMC4yLDAuOCwwLjMsMC44LDAuOWMtMC4xLDAuNi0wLjYsMC44LTEuMSwwLjljLTIuNCwwLjQtNC44LDAuMS02LjgtMS4yYy0xLjUtMS0yLjctMC45LTQuMi0wLjENCgljLTIuNSwxLjItNS4xLDIuNC03LjgsMy4xYy0xLjUsMC40LTMuMSwwLjItNC43LDAuNWMwLjYsMC44LDEuNSwwLjgsMi4xLDEuMmMwLjksMC41LDEuNywxLDIuNCwxLjdjMC4zLDAuMywwLjcsMC42LDAuNSwxLjENCgljLTAuMiwwLjUtMC43LDAuNi0xLjIsMC42Yy0yLjgsMC4yLTUuMy0wLjctNy4yLTIuOGMtMC45LTEtMS44LTEuNi0zLTEuOGMtMS44LTAuNC0zLjUtMS4xLTUtMi4xYy0wLjMtMC4zLTAuNS0wLjUtMC44LTAuOA0KCWMtMC41LTAuOC0wLjktMS43LTEuNi0yLjNjLTAuNC0wLjYtMC44LTEuMS0xLjMtMS43Yy0yLjUtMy4yLTYuMi00LjMtOS42LTNjLTIuOCwxLjEtNC45LDQuMS00LjgsNi43YzAuMSwyLjYsMi4yLDQuOSw1LjMsNS45DQoJYzEuNCwwLjQsMi44LDAuNSw0LjMsMC4zYzIuOS0wLjUsNS0yLjgsNC44LTUuM2MtMC4xLTIuNS0yLjYtNS01LjItNS4yYy0zLjItMC4zLTUuOCwyLjctNC43LDUuNmMwLjUsMS4zLDEuNCwyLjEsMi44LDIuMg0KCWMxLjMsMC4xLDIuMy0wLjQsMi45LTEuNWMwLjQtMC43LDAuNC0xLjUtMC4zLTJjLTAuNy0wLjUtMS4zLTAuNC0xLjgsMC40QzcyLjYsMTQsNzIuMywxNC4yLDcyLDE0Yy0wLjQtMC4yLTAuNC0wLjYtMC4zLTENCgljMC4zLTAuOSwxLTEuMywxLjktMS40YzItMC4xLDMuMywyLDIuNCw0Yy0wLjcsMS41LTIsMi4yLTMuNSwyLjRjLTEuNywwLjItMy0wLjUtNC0xLjljLTIuMS0zLjEtMC4xLTcuNCwzLjgtNy45DQoJYzMuMi0wLjQsNS40LDEuMiw3LjIsMy43YzIuNCw0LjktMS45LDkuOC04LjEsOC45Yy00LTAuNi03LTIuNi04LTdjLTEuOCwyLjktNC42LDMuNi03LjQsNC4zYy0wLjgsMC4yLTEuMywwLjUtMS44LDEuMg0KCWMtMS45LDIuMy00LjQsMy40LTcuNCwzLjNjLTAuNSwwLTEuMSwwLTEuMy0wLjZjLTAuMi0wLjYsMC4zLTAuOSwwLjctMS4zYzEuMi0xLjIsMi43LTEuNyw0LjMtMi40Yy0wLjMtMC41LTAuOC0wLjUtMS4xLTAuNQ0KCWMtMywwLjEtNS43LTEtOC40LTIuMWMtMC43LTAuMy0xLjQtMC42LTItMC45Yy0xLjktMS4xLTMuNi0xLjYtNS44LDBjLTEuNiwxLjEtMy43LDEuMi01LjcsMWMtMC42LTAuMS0xLjQtMC4xLTEuNi0wLjkNCgljLTAuMS0wLjgsMC43LTAuOSwxLjItMS4xYzEuNC0wLjYsMy0wLjgsNC41LTFjMC40LDAsMC45LDAuMSwxLjMtMC41Yy0xLjEtMC45LTIuNC0xLjMtMy42LTEuOUMyMy44LDcuOCwxOC4yLDUuMywxMiw0LjUNCgljLTIuNC0wLjMtNC44LDAtNi45LDEuNEMzLDcuMywxLjcsOS4yLDIuMiwxMS44YzAuNCwyLjYsMi4xLDQuMSw0LjYsNC43YzEuNiwwLjQsMy4yLDAuNiw0LjksMC4yYzEuNi0wLjQsMi40LTEuNywxLjktMy4zDQoJYy0wLjUtMS41LTIuNS0yLjgtMy43LTIuM2MtMC41LDAuMi0wLjksMC41LTAuOCwxLjJjMC4xLDAuMywwLjMsMC44LTAuMiwwLjljLTAuMiwwLjEtMC41LDAtMC43LTAuMWMtMC40LTAuMi0wLjUtMC42LTAuNC0xLjENCgljMC4yLTAuNywwLjYtMS4yLDEuMy0xLjZjMS41LTAuOCwzLjYtMC4zLDQuNywxLjFjMS4yLDEuNiwxLjIsMy4zLTAuMSw0LjdjLTEuOCwyLjEtNC4xLDItNi40LDEuNWMtMC42LTAuMS0xLjItMC40LTEuNy0wLjYNCgljLTMuMS0xLjQtNC43LTMuOC00LjUtNi4zYzAuMi0zLDIuNS01LjgsNS40LTYuN0M5LjksMywxMy4yLDMuNiwxNi41LDQuNUMyMiw1LjksMjcsOC4zLDMyLDEwLjdjMC42LDAuMywxLjMsMC42LDEuOSwwLjkNCgljMC4yLDAuMSwwLjQsMC4zLDAuNiwwLjFjMC0wLjEtMC4xLTAuMy0wLjItMC40Yy0xLjctNC4zLTAuMS03LjksMy44LTguOWMyLjQtMC42LDUuMywwLjQsNi44LDIuNGMxLjEsMS41LDEuMiwzLjEsMC4zLDQuNg0KCWMtMC45LDEuNS0yLjUsMi4yLTQuMiwxLjljLTEuMS0wLjItMS41LTEuMS0xLjgtMS45Yy0wLjItMC42LDAuMi0xLDAuOC0xLjJjMC40LTAuMSwwLjgtMC4yLDEuMSwwLjFjMC4zLDAuNC0wLjEsMC41LTAuMywwLjgNCgljLTAuNSwxLDAuMiwxLjIsMC45LDEuM2MxLDAuMSwxLjgtMC4zLDIuNC0xLjFjMC43LTEsMC45LTIsMC4zLTNjLTEtMS42LTIuMy0yLjktNC40LTIuOGMtMi4yLDAuMS00LjIsMC42LTUuMiwyLjgNCgljLTAuOSwyLTAuMSw0LjYsMi4xLDYuM2MzLjcsMi44LDgsMy44LDEyLjgsNC42Yy0wLjgtMS4xLTEuOS0xLjUtMi41LTIuNGMtMC40LTAuNy0xLjQtMS41LTAuOC0yLjNjMC42LTAuNywxLjYsMCwyLjMsMC40DQoJYzEuNSwwLjcsMi41LDIsMy41LDMuMmMxLjUsMS43LDMuNCwyLDUuNiwwLjVjLTAuOS0wLjItMS42LTAuMy0yLjMtMC41Yy0yLjctMC41LTMuOS0yLjctMi45LTUuM2MwLjktMi40LDIuOS0zLjksNS4zLTMuOQ0KCWMyLjYsMCw0LjYsMS4zLDUuNSwzLjdjMC4xLDAuMiwwLjIsMC40LDAuMywwLjZjMC40LTAuMSwwLjQtMC40LDAuNS0wLjdDNjYsNiw3Mi40LDMsNzcuNCw3YzEsMC44LDEuOSwxLjUsMi42LDIuNg0KCWMwLjUsMC43LDAuNywwLjcsMS4xLTAuMmMxLTIuNiwzLjItNCw1LjgtMy45YzIuNSwwLjIsNC41LDIsNS4xLDQuNmMwLjUsMi4yLTAuNiw0LTIuOCw0LjVjLTAuOCwwLjItMS42LDAuMy0yLjUsMC41DQoJYzIuMSwxLjUsNC4xLDEuMiw1LjYtMC41YzEuMy0xLjUsMi42LTMuMSw0LjctMy42YzAuNC0wLjEsMC44LTAuNSwxLjEsMGMwLjMsMC40LDAuMSwwLjktMC4xLDEuM2MtMC42LDEtMS4zLDEuOS0yLjQsMi41DQoJYy0wLjIsMC4xLTAuNSwwLjItMC41LDAuNmMwLjEsMCwwLjIsMC4xLDAuMywwLjFjNC0wLjYsNy44LTEuNiwxMS4yLTMuOGMxLjMtMC44LDIuMy0yLDMtMy40YzEuMS0yLjYtMC4zLTUuNS0zLjEtNi4xDQoJYy0yLTAuNS00LTAuNS01LjYsMS4yYy0wLjksMS0xLjUsMi0xLjEsMy40YzAuNCwxLjMsMS40LDEuOSwyLjcsMi4xQzEwMi41LDkuNCwxMDIuNSw5LjcsMTAyLjUsMTB6IE02MS40LDEzLjcNCgljMC42LTAuNiwwLjctMS4zLDAuMy0yYy0wLjUtMC44LTEuMy0xLjMtMi4zLTEuNGMtMC42LDAtMC45LDAuNC0xLjEsMC45Yy0wLjIsMC41LTAuMywxLjEsMC4yLDEuNmMwLjMsMC4zLDAuNywwLjQsMSwwLjINCgljMC4zLTAuMiwwLjEtMC41LTAuMS0wLjdjLTAuNC0wLjQtMC4xLTAuNywwLjItMC45YzAuMy0wLjMsMC43LTAuMiwxLDBjMC44LDAuNiwwLjksMS40LDAuNCwyLjJjLTAuMiwwLjEtMC4zLDAuMy0wLjIsMC40DQoJQzYxLjEsMTQuMiw2MS4yLDEzLjksNjEuNCwxMy43eiBNNjAuMiwxNC4zYy0xLjksMC4yLTMtMC41LTMuMi0yYy0wLjEtMC44LDAuMS0xLjYsMC41LTIuM2MwLjgtMS4yLDIuMS0wLjksMy4zLTENCgljLTIuMi0yLjQtNi40LTEuMi03LjMsMS42Yy0wLjQsMS4zLTAuMiwyLjYsMS4xLDMuNGMxLjUsMS4xLDQuNSwxLjMsNS44LDAuNGMwLjEtMC4xLDAuMi0wLjIsMC4yLTAuMg0KCUM2MC40LDE0LjIsNjAuMywxNC4yLDYwLjIsMTQuM3ogTTg0LjIsMTMuNGMxLjEsMC45LDQuMiwwLjcsNS43LTAuNWMxLjMtMSwxLjYtMi44LDAuNy00LjFjLTEtMS41LTIuOS0yLjUtNC43LTIuMQ0KCWMtMC44LDAuMS0xLjcsMC40LTIuMiwxLjJjMi45LDAuNCwzLjcsMSwzLjcsMi44Qzg3LjUsMTIuNCw4Ni42LDEzLjIsODQuMiwxMy40eiBNODMuMSwxMi42YzAuMi0wLjcsMC0xLjMsMC4zLTEuOA0KCWMwLjMtMC40LDAuNi0wLjksMS4yLTAuN2MwLjUsMC4yLDAuOCwwLjYsMC4zLDEuMmMtMC4xLDAuMS0wLjIsMC4zLDAsMC41YzAuMiwwLjIsMC40LDAuMiwwLjcsMC4xYzAuNS0wLjIsMC43LTAuNSwwLjctMS4xDQoJYzAtMC43LTAuMi0xLjQtMC45LTEuNmMtMS4xLTAuMy0yLDAuNC0yLjYsMS4yQzgyLjIsMTEuMiw4Mi4zLDExLjksODMuMSwxMi42eiIvPg0KPC9zdmc+DQo="
             width="100" style="margin-top:-0px">
    </div>
    <div class="col-3 float-right">
        <div class="col-12 float-right">
            <div class="border-box red bold float-left text-center" style="margin-top:5px;width:100px">
            {{  \Morilog\Jalali\CalendarUtils::convertNumbers( $bills->order_no ) }}
            </div>
            <div class="width-auto float-right text-left" style="padding-left:5px;width:140px">شماره حواله:</div>
        </div>
        <div class="col-12 float-right">
            <div class="border-box bold float-left text-center" style="margin-top:5px;width:100px;margin-bottom:5px">
                @if ( $bills->ordered_at == '0000-00-00 00:00:00' )
                    {{  \Morilog\Jalali\CalendarUtils::convertNumbers( jdate($bills->created_at)->format('%d / %m / %Y') ) }}
                @else
                    {{ $bills->ordered_at }}
                @endif
            </div>
            <div class="width-auto float-right text-left" style="padding-left:5px;width:140px">تاریخ:</div>
        </div>
    </div>
</header>
<main>

    <div class="border-head bold text-center ">مشخصات خریدار</div>

    <div class="border-content padd-15">
        <div class="col-12">
            <div class="text-right col-2"><span class="que bold">نام خریدار:</span> {{ $bills->name }}</div>
        </div>
    </div>


    <div class="border-head bold text-center ">مشخصات كالا</div>

    <div class="border-content">

        <table class="head-table col-1" style="border-spacing:0;border-collapse:collapse;display:table">

        <tr class="head-table">
            <td class=" border-left border-bottom bold" width="5.00%" style="padding:5px 10px">ردیف</td>
            <td class=" col-2 border-left border-bottom bold">شرح کالا</td>
            <td class=" col-11 border-left border-bottom bold">پارت نامبر</td>
            <td class=" col-11 border-bottom bold">تعداد</td>

        </tr>

        @php
            $i = 0;
        @endphp

        @foreach ( $BillItem as $row_item )
            @php
                $i++;
            @endphp
        @endforeach

        @foreach ( $BillItem as $row_item )

        <tr class="head-table @if( $i == $loop->index+1 ) last @endif">
            <td class=" border-left border-bottom" width="5.00%" style="padding:5px 10px">{{ \Morilog\Jalali\CalendarUtils::convertNumbers( $loop->index+1 ) }}</td>
            <td class=" col-2 border-left border-bottom">{!! $row_item->product_name !!}</td>
            <td class=" col-11 border-left border-bottom">{{ $row_item->part_no }}</td>
            <td class=" col-11 border-bottom">{{ $row_item->unit }}</td>
        </tr>

        @endforeach

        </table>
    </div>

    <div class="border-content" style="margin-top:-5px;padding:5px 15px">

        <div class="col-2">
            <span class="bold">به حروف: </span>
                {{ $bills->total_amount != 0 ? $num2word->numberToWords( number_format ( $bills->total_amount ,0,'.', '') ) : 'صفر' }}
            ریال
        </div>

        <div class="col-2 bold">
            هزینه‌ی حمل‌و‌نقل:
                {{ \Morilog\Jalali\CalendarUtils::convertNumbers( number_format ( $bills->total_amount ,0,'', ',') ) }}
            ریال
        </div>

    </div>

    <div class="border-content" style="margin-top:-5px;">
        <table class="head-table col-1" style="border-spacing:0;border-collapse:collapse;display:table;vertical-align: middle;">
            <tr class="head-table">
                <td class="border-left" width="49.4%" style="padding:10px 10px">
                    <div class="bold" style="padding-top:8px;">توضیحات:</div>
                    <div class="descry">
                        {!! $bills->description ? $bills->description : '<br><br>' !!}
                    </div>
                </td>
                <td width="25%" style="padding:5px 10px">
                    <span class="col-3" style="padding:5px 10px">نام و امضاء تحویل گیرنده:</span>
                </td>
                <td width="25%" style="padding:5px 10px">
                    <span class="col-3" style="margin:5px 10px">نام و امضاء تحویل دهنده:</span>
                </td>
            </tr>
        </table>
    </div>

{{--    @if( $bills->signature != '0' )--}}
        {{-- <img src="{{ resource_path(config('path.bill.stamp').'/'. $bills->signature .'.svg') }}" width="180" style="margin-top:-25px;margin-left:200px"> --}}
{{--    @endif--}}

</main>
</body>
</html>
