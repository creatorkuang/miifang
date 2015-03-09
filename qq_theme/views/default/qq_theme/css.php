<?php

?>
/*******************************
	qq-theme css file

	
********************************/

html{
  background-image:url('<?php echo $vars['url']; ?>mod/qq_theme/graphics/bg.png');
   background-repeat:repeat;
   background-size:cover;
   background-attachment: fixed;
}
fieldset > div:first-child {
	margin-top: 15px;
}

/*index page*/
#index-top{margin-left:30%;margin-top:100px;position:fixed}
#index-bottom{background: white;width: 100%;margin-top: 320px;position: fixed;height: 100%;}
.elgg-menu-index,
.elgg-menu-index li,
.elgg-menu-index li a{
display:inline-block;
color:white;
}
#slogan{color:white;font-size:1.4em;width:200px;line-height: 25px;}
#apply{margin-left: 45%;margin-top:50px;}
/* Submit: This button should convey, "you're about to take some definitive action" */
.elgg-button-index {
	color: white;
	text-shadow: 1px 1px 0px black;
	text-decoration: none;
	border:1px solid rgba(0,0,0,0.1);	
	background: -webkit-gradient(linear, 0 0, 0 100%, from(rgba(0,0,0,0.1)), color-stop(30%, rgba(0,0,0,0.3)), color-stop(70%, rgba(0,0,0,0.2)));
	background: -moz-linear-gradient(top, rgba(0,0,0,0.1), rgba(0,0,0,0.3) 30%, rgba(0,0,0,0.1) 70%);
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='rgba(0,0,0,0.1)', endColorstr='rgba(0,0,0,0.3)');
	background-color:rgba(0,0,0,0.1);
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 5px;
	moz-box-shadow: inset 0px 1px 0px 0px #fff;
	-webkit-box-shadow: inset 0px 1px 0px 0px #fff;
	box-shadow: inset 0px 1px 0px 0px #fff;
}

.elgg-button-index:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, rgba(0,0,0,0.1)), color-stop(1, rgba(0,0,0,0.3)) );
	background:-moz-linear-gradient( center top, rgba(0,0,0,0.1) 5%, rgba(0,0,0,0.3) 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='rgba(0,0,0,0.1)', endColorstr='rgba(0,0,0,0.3)');
	background-color:rgba(0,0,0,0.3);
}




/* header*/
.elgg-page-header {
	position: fixed;
	background: #315CA1 url(<?php echo $vars['url']; ?>_graphics/header_shadow.png) repeat-x bottom left;
	width: 100%;
	z-index:2;
}
.elgg-page-body{
padding-top:60px;
}
.elgg-page-footer{
	z-index:2;
}
#header-messages-new{
	color: white;
	background-color: red;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	-moz-box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	box-shadow: -2px 2px 4px rgba(0, 0, 0, 0.50);
	text-align: center;
	top: 0px;
	left: 26px;
	min-width: 16px;
	height: 16px;
	font-size: 10px;
	font-weight: bold;
}
.container{
background:white;
border-radius: 10px 10px 10px 10px;-moz-border-radius:10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;
}
#logo{display:inline;float:left;margin-right:10px;margin-bottom:0;}
#logo a span{
color: white;overflow:hidden;display:block;line-height:0;}
#logo a{display:block;}
.elgg-page-default .elgg-page-header > .elgg-inner {
	width: 990px;
	margin: 0 auto;
	height: 20px;
}
ul.elgg-menu-htabs{
display:inline-block;
}
.elgg-menu-htabs li a{
color:white;
margin:10px;
padding-top:2px;
}
.elgg-menu-htabs li.elgg-state-selected {
background:#04477c;

}

#menubar ul.menus li {
	float:left;
	list-style:none; 
	margin-right:1px; 
}

#menubar ul.menus li a {
	padding:2px 10px; 
	display:block;
	color:#FFF; 
	text-decoration:none; 
}


#menubar ul.menus ul {
	position:absolute;
	background:#315CA1;
}

#menubar ul.menus li a:hover {
	background:#04477c;
}

#menubar ul.children {
	display:none; 
	padding:0;
	margin:0;
}

#menubar ul.children li {
	float:none; 
	margin:0;
	padding:0;
}

#menubar ul li .children a {
	width:90px;
}

/* sidebar menu*/
ul.sidebar-menu{
padding:5px;
}
.sidebar-menu li {
display:block;
padding:5px;
}

.sidebar-menu li.elgg-state-selected {
background:white;
-webkit-border-radius: 4px;
-moz-border-radius: 4px;
-o-border-radius: 4px;
border-radius: 4px;
-moz-box-shadow: 0 1px 1px #b8bbbf;
-webkit-box-shadow: 0 1px 1px 
#B8BBBF;
-o-box-shadow: 0 1px 1px #b8bbbf;
box-shadow: 0 1px 1px 
#B8BBBF;
}

/*river-tab css*/
ul.river-tab{
display:block;
}
ul.river-tab li {
border: 1px solid #eee;
border-bottom: 0;
background: #666;
margin: 0 -25px 0 0;
-webkit-border-radius: 15px 15px 0 0;
-moz-border-radius: 5px 5px 0 0;
border-radius: 15px 15px 0 0;
width: 150px;
z-index: 0;
top: 0;
}
ul.river-tab li a{
	text-decoration: none;
	display: block;
	padding: 3px 10px 0;
	text-align: center;
	height: 21px;
	color: white;
}

ul.river-tab li.elgg-state-selected {
	border-color: #eee;
	background: white;
	z-index: 1;
	top: 1px;
	padding-bottom:1px
	
}
ul.river-tab li.elgg-state-selected a{
	color:#666;
	position: relative;
}

.elgg-river-item {
	padding: 20px 15px;
}
/*river list*/
.forward-list{

padding:5px;
}

/* help center css */
.help-sidebar{
float: left;
padding: 12px 10px;
width: 150px;
border: 1px solid #C7CACC;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
position: fixed;
-moz-box-shadow: inset 0 0px 3px #ccc;
-webkit-box-shadow: inset 0 0px 3px #CCC;
-o-box-shadow: inset 0 0px 3px #ccc;
box-shadow: inset 0 0px 3px #CCC;
}
ul.help-sidebar a{
color:#666;
}
.separator{
border-top: 1px solid #E2E6E8;
overflow: hidden;
border-bottom: 1px solid #FEFFFE;
border-width: 1px 0;
}
.help-content{
float:right;
width: 780px;
padding:10px;
min-height:600px;
display:inline-block;
background: white;
-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}
.help-content p{
line-height:1.2;

}