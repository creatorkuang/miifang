<?php
/**
 * Helpers CSS
 *
 * Contains generic elements that can be used throughout the site.
 *
 * @package Elgg.Core
 * @subpackage UI
 */
?>

.clearfloat { 
	clear: both;
}

.hidden {
	display: none;
}

.centered {
	margin: 0 auto;
}

.center {
	text-align: center;
}

.float {
	float: left;
}

.float-alt {
	float: right;
}

.link {
	cursor: pointer;
}

.elgg-discover .elgg-discoverable {
	display: none;
}

.elgg-discover:hover .elgg-discoverable {
	display: block;
}

.elgg-transition:hover {
	opacity: .7;
}

/* ***************************************
	BORDERS AND SEPARATORS
*************************************** */
.elgg-border-plain {
	border: 1px solid #eeeeee;
}
.elgg-border-transition {
	border: 1px solid #eeeeee;
}
.elgg-divide-top {
	border-top: 1px solid #CCCCCC;
}
.elgg-divide-bottom {
	border-bottom: 1px dashed #CCCCCC;
}
.elgg-divide-left {
	border-left: 1px solid #CCCCCC;
}
.elgg-divide-right {
	border-right: 1px solid #CCCCCC;
}



/* ***************************************
	Spacing (from OOCSS)
*************************************** */
<?php
/**
 * Spacing classes
 * Should be used to modify the default spacing between objects (not between nodes of the same object)
 * Please use judiciously. You want to be using defaults most of the time, these are exceptions!
 * <type><location><size>
 * <type>: m = margin, p = padding
 * <location>: a = all, t = top, r = right, b = bottom, l = left, h = horizontal, v = vertical
 * <size>: n = none, s = small, m = medium, l = large
 */

$none = '0';
$small = '5px';
$medium = '10px';
$large = '20px';

echo <<<CSS
/* Padding */
.pan{padding:$none}
.prn, .phn{padding-right:$none}
.pln, .phn{padding-left:$none}
.ptn, .pvn{padding-top:$none}
.pbn, .pvn{padding-bottom:$none}

.pas{padding:$small}
.prs, .phs{padding-right:$small}
.pls, .phs{padding-left:$small}
.pts, .pvs{padding-top:$small}
.pbs, .pvs{padding-bottom:$small}

.pam{padding:$medium}
.prm, .phm{padding-right:$medium}
.plm, .phm{padding-left:$medium}
.ptm, .pvm{padding-top:$medium}
.pbm, .pvm{padding-bottom:$medium}

.pal{padding:$large}
.prl, .phl{padding-right:$large}
.pll, .phl{padding-left:$large}
.ptl, .pvl{padding-top:$large}
.pbl, .pvl{padding-bottom:$large}

/* Margin */
.man{margin:$none}
.mrn, .mhn{margin-right:$none}
.mln, .mhn{margin-left:$none}
.mtn, .mvn{margin-top:$none}
.mbn, .mvn{margin-bottom:$none}

.mas{margin:$small}
.mrs, .mhs{margin-right:$small}
.mls, .mhs{margin-left:$small}
.mts, .mvs{margin-top:$small}
.mbs, .mvs{margin-bottom:$small}

.mam{margin:$medium}
.mrm, .mhm{margin-right:$medium}
.mlm, .mhm{margin-left:$medium}
.mtm, .mvm{margin-top:$medium}
.mbm, .mvm{margin-bottom:$medium}

.mal{margin:$large}
.mrl, .mhl{margin-right:$large}
.mll, .mhl{margin-left:$large}
.mtl, .mvl{margin-top:$large}
.mbl, .mvl{margin-bottom:$large}


/* border-radius*/
.brs{border-radius: $small $small $small $small;-moz-border-radius:$small $small $small $small;-webkit-border-radius: $small $small $small $small;}
.brm{border-radius: $medium $medium $medium $medium;-moz-border-radius:$medium $medium $medium $medium;-webkit-border-radius: $medium $medium $medium $medium;}
.brl{border-radius: $large $large $large $large;-moz-border-radius:$large $large $large $large;-webkit-border-radius: $large $large $large $large;}

/* button*/
.btn{
background:#F8F8F9;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f8f8f9',endColorstr='#e6e6e8');
background: -webkit-gradient(linear,0 0,0 100%,from(#F8F8F9),to(#E6E6E8));
background: -moz-linear-gradient(top,#F8F8F9,#E6E6E8);
-webkit-box-shadow: 0 1px 0 white inset,0 1px 0 rgba(0, 0, 0, .1);
-moz-box-shadow: 0 1px 0 #fff inset,0 1px 0 rgba(0,0,0,.1);
-o-box-shadow: 0 1px 0 #fff inset,0 1px 0 rgba(0,0,0,.1);
box-shadow: 0 1px 0 white inset,0 1px 0 rgba(0, 0, 0, .1);
text-shadow: 0 1px 0 white;
border: 1px solid #BBB;
color: #666!important;
}
.block{
display:block;
}
.inblock{
display:inline-block;
}
.bgwhite{
background:white;
}
CSS;


?>
.f12{font-size:12px} .f13{font-size:13px} .f14{font-size:14px} .f16{font-size:16px} .f20{font-size:20px} 
.f1h{font-size:1.5em} .f2{font-size:2em} .f2h{font-size:2.5em} .f3{font-size:3em}
.fb{font-weight:bold} 
.fn{font-weight:normal} 
.t2{text-indent:2em} 
.lh150{line-height:150%} 
.lh180{line-height:180%} 
.lh200{line-height:200%} 
.unl{text-decoration:underline;} 
.no_unl{text-decoration:none;}

.tl{text-align:left}
.tc{text-align:center}
.tr{text-align:right}
.bc{margin-left:auto;margin-right:auto;}
.fl{float:left;display:inline}
.fr{float:right;display:inline}
.cb{clear:both}
.cl{clear:left}
.cr{clear:right} 

.vm{vertical-align:middle}
.pr{position:relative}
.pa{position:absolute}
.abs-right{position:absolute;right:0}
.zoom{zoom:1}
.none{display:none}

.w10{width:10px} 
.w20{width:20px} 
.w30{width:30px} 
.w40{width:40px} 
.w50{width:50px} 
.w60{width:60px} 
.w70{width:70px}

.w80{width:80px}
.w90{width:90px}
.w100{width:100px}
.w200{width:200px}
.w250{width:250px}
.w300{width:300px}
.w400{width:400px}
.w500{width:500px}
.w600{width:600px}
.w700{width:700px}
.w800{width:800px}
.w900{width:900px}
.w{width:100%}
.w9{width:90%}

.h50{height:50px}
.h80{height:80px}
.h100{height:100px}
.h200{height:200px}
.h{height:100%}
.h9{height:90%}

.m10{margin:10px} 
.m15{margin:15px} 
.m30{margin:30px} 
.mt5{margin-top:5px} 
.mt10{margin-top:10px} 
.mt15{margin-top:15px} 
.mt20{margin-top:20px} 
.mt30{margin-top:30px} 
.mt50{margin-top:50px} 
.mt100{margin-top:100px}
.mb10{margin-bottom:10px}
.mb15{margin-bottom:15px}
.mb20{margin-bottom:20px}
.mb30{margin-bottom:30px}
.mb50{margin-bottom:50px}
.mb100{margin-bottom:100px}
.ml5{margin-left:5px}
.ml10{margin-left:10px}
.ml15{margin-left:15px}
.ml20{margin-left:20px}
.ml30{margin-left:30px}
.ml50{margin-left:50px}
.ml100{margin-left:100px}
.mr5{margin-right:5px}
.mr10{margin-right:10px}
.mr15{margin-right:15px}
.mr20{margin-right:20px}
.mr30{margin-right:30px}
.mr50{margin-right:50px}
.mr100{margin-right:100px}
.p10{padding:10px;}
.p15{padding:15px;}
.p30{padding:30px;}
.pt5{padding-top:5px}
.pt10{padding-top:10px}
.pt15{padding-top:15px}
.pt20{padding-top:20px}
.pt30{padding-top:30px}
.pt50{padding-top:50px}
.pb5{padding-bottom:5px}

.pb10{padding-bottom:10px}
.pb15{padding-bottom:15px}
.pb20{padding-bottom:20px}
.pb30{padding-bottom:30px}
.pb50{padding-bottom:50px}
.pb100{padding-bottom:100px}
.pl5{padding-left:5px}
.pl10{padding-left:10px}
.pl15{padding-left:15px}
.pl20{padding-left:20px}
.pl30{padding-left:30px}
.pl50{padding-left:50px}
.pl100{padding-left:100px}
.pr5{padding-right:5px}
.pr10{padding-right:10px}
.pr15{padding-right:15px}
.pr20{padding-right:20px}
.pr30{padding-right:30px}
.pr50{padding-right:50px}
.pr100{padding-right:100px}