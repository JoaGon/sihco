<!DOCTYPE html>
<html>
<head>

  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

  <!-- <link rel="stylesheet" href="sass/main.css" media="screen" charset="utf-8"/> -->
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="content-type" content="text-html; charset=utf-8">
  <style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, test, tr, th, td,
article, aside, canvas, details, embed,
figure, figcaption, footer, header, hgroup,
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
  margin: 0;
  padding: 0;
  border: 0;
  font: inherit;
  font-size: 100%;
  vertical-align: baseline;
}

html {
  line-height: 1;
}

ol, ul {
  list-style: none;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
}

caption, th, td {
  text-align: left;
  font-weight: normal;
  vertical-align: middle;
}

q, blockquote {
  quotes: none;
}
q:before, q:after, blockquote:before, blockquote:after {
  content: "";
  content: none;
}

a img {
  border: none;
}

article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
  display: block;
}

body {
    font-family: "Times New Roman", sans-serif;
    font-weight: 300;
    font-size: 14px;
    margin: 0;
    padding: 0;
    color: black;
    margin-left: 70px;
    margin-right: 70px;
}
body a {
  text-decoration: none;
  color: inherit;
}
body a:hover {
  color: inherit;
  opacity: 0.7;
}
body .container {
  min-width: 460px;
  margin: 0 auto;
  padding: 0 20px;
}
body .clearfix:after {
  content: "";
  display: table;
  clear: both;
}
body .left {
  float: left;
}
body .right {
  float: right;
}
body .helper {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
body .no-break {
  page-break-inside: avoid;
}

header {
  margin-top: 15px;
  margin-bottom: 45px;
}
header figure {
  float: left;
  margin-right: 10px;
  width: 65px;
  height: 70px;

  text-align: center;
}
header figure img {
  margin-top: 10px;
}
header .company-info {
  float: right;
  color: #66BDA9;
  line-height: 14px;
}
header .company-info .address, header .company-info .phone, header .company-info .email {
  position: relative;
}
header .company-info .address img, header .company-info .phone img {
  margin-top: 2px;
}
header .company-info .email img {
  margin-top: 3px;
}
header .company-info .title {
  color: #66BDA9;
  font-weight: 400;
  font-size: 1.33333333333333em;
}
header .company-info .icon {
  position: absolute;
  left: -15px;
  top: 1px;
  width: 10px;
  height: 10px;
  background-color: #66BDA9;
  text-align: center;
  line-height: 0;
}

section .details {
    min-width: 440px;
    margin-bottom: 40px;
    padding: 5px 10px;
    /* background-color: #CC5A6A; */
    color: black;
    line-height: 20px;
}
section .details .client {
  width: 50%;
}
section .details .client .name {
  font-size: 1.16666666666667em;
  font-weight: 600;
}
section .details .data {
  width: 50%;
  font-weight: 600;
  text-align: right;
}
section .details .title {
  margin-bottom: 5px;
  font-size: 1.33333333333333em;
  text-transform: uppercase;
}
section table {
  width: 100%;
  margin-bottom: 20px;
  table-layout: fixed;
  border-collapse: collapse;
  border-spacing: 0;
}
section table .qty, section table .unit, section table .total {
  width: 30%;
}
section table .qty, section table .unit, section table .code {
  width: 50%;
}
section table .qty, section table .unit, section table .patro {
  width: 40%;
}
section table .desc {
  width: 55%;
}
section table test {
  display: table-header-group;
  vertical-align: middle;
  border-color: black;
  background:#eee;
}
section table test th {
padding: 7px 10px;
    background: #eee;
    border: 1px solid black;
    color: black;
    text-align: center;
    font-weight: bold;
    text-transform: uppercase;

}
section table test th:last-child {
 
}
section table tbody tr:first-child td {
    border-top: 1px solid black;
}

section table tbody td {
  padding: 10px 10px;
  text-align: center;
  border-right: 3px solid #66BDA9;
}

section table tbody td {
    text-align: center;
    border: 1px solid black;
}
section table tbody h3 {
  margin-bottom: 5px;
  color: #66BDA9;
  font-weight: 600;
}
section table.grand-total {
  margin-bottom: 50px;
}

section table.grand-total tbody tr td {
  padding: 0px 10px 12px;
  border: none;
  background-color: #B2DDD4;
  color: #555555;
  font-weight: 300;
  text-align: right;
}
section table.grand-total tbody tr:first-child td {
  padding-top: 12px;
}
section table.grand-total tbody tr:last-child td {
  background-color: transparent;
}
section table.grand-total tbody .grand-total {
  padding: 0;
}
section table.grand-total tbody .grand-total div {
  float: right;
  padding: 11px 10px;
  background-color: #66BDA9;
  color: #ffffff;
  font-weight: 600;
}
section table.grand-total tbody .grand-total div span {
  display: inline-block;
  margin-right: 20px;
  width: 80px;
}

footer {
  margin-bottom: 15px;
  padding: 0 5px;
}
footer .thanks {
  margin-bottom: 40px;
  color: #66BDA9;
  font-size: 1.16666666666667em;
  font-weight: 600;
}
footer .notice {
  margin-bottom: 15px;
}
footer .end {
  padding-top: 5px;
    border-top: 2px solid black;
  text-align: center;
}
.bold-{
  position:relative;
  font-weight:bold;
}
.subnivel{
  padding-left:15px;
  padding-right:15px;
}
.top-cont{
  border-top: 2px solid black;
}
  </style>
</head>

<body onload="window.print()">
 



<canvas id="the-canvas"></canvas>

<header class="clearfix">
    <div class="container ">

      <div class="company-info" style="float:right">
        <h2 class="title" style="color:black">Reporte Consultas </h2>
        <h2 class="title"  style="color:black"> </h2>
    
    
      </div>
    </div>
  </header>
  

  <section>
    <div class="container top-cont">

 
      <table border="0" cellspacing="0" cellpadding="0">
        <test>
          <tr style="border:1px solid black">
        
            <th class="qty" style="text-align:center;border:1px solid black;background:#eee">Nombre</th>
            <th class="qty" style="text-align:center;border:1px solid black;background:#eee">Apellido</th>
            <th class="qty" style="text-align:center;border:1px solid black;background:#eee">C.I.</th>
             <th class="total" style="text-align:center;border:1px solid black;background:#eee">Direccion</th>
            <th class="patro" style="text-align:center;border:1px solid black;background:#eee">Fecha Consulta</th>
         
              
                        
          </tr>
        </test>
        <tbody>
          @foreach($data as $item)
            <tr>

              <td class="qty">{{ $item->nombre }}</td>
              <td class="desc">{{ $item->apellido }}</td>
              <td class="unit">{{ $item->ci }}</td>\
              <td class="total">{{ $item->direccion }}</td>
              <td class="total">{{ $item->fecha_consulta }}</td>

              
            </tr>
          @endforeach

        </tbody>
      </table>
      
        </div>
  </section>

  <footer>
    <div class="container">

      <div class="end"> </div>
    </div>
  </footer>

</body>

</html>