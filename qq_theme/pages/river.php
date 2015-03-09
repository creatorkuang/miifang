<?php
/**
 * Main activity stream list page
 */
if(!elgg_is_logged_in()){
	forward();
}

$fliter=get_input('fliter');


$activity = elgg_list_river(array('limit'=>15));
if (!$activity) {
	$activity = elgg_echo('river:none');
}
$t_title1=elgg_echo("river-tab:all");
$t_title2=elgg_echo("river-tab:question");
$t_title3=elgg_echo("river-tab:follow");

$list =<<<html

<div class="elgg-border-plain pam">

$activity
</div>
html;

switch ($fliter){
	case "question":
		$tab_content="<div class=\"elgg-border-plain pam\"><div id=\"rt1_content\"></div></div>";
		break;
	case "follow":
		$tab_content="<div class=\"elgg-border-plain pam\"><div id=\"rt2_content\"></div></div>";
		break;
	default:
		$tab_content=$list;

}
$menu=elgg_view('qq_theme/river_menu');
$content=<<<html
$menu
$tab_content
html;
$body=elgg_view_layout('qq_two_column',array('content'=>$content));

echo elgg_view_page($title, $body);
?>
<script type="text/javascript">
$(document).ready(function(){
	  //get the value from url 
	String.prototype.GetValue= function(para) {  
		  var reg = new RegExp("(^|&)"+ para +"=([^&]*)(&|$)");  
		  var r = this.substr(this.indexOf("\?")+1).match(reg);  
		  if (r!=null) return unescape(r[2]); return null;  
		}  
		var str = location.href;  
		fliter=str.GetValue("fliter");		
	if(fliter=='question'){
	     	elgg.get('/qq_ajax/question_update', {
			      data:{guid:elgg.get_logged_in_user_guid()},
			      beforeSend:function(XMLHttpRequest)  
		            {  
			    	  $('#rt1_content').html("<div class=\"elgg-ajax-loader\"></div>"); 
		                },  
			      success: function(resultText, success, xhr) {
		       	      $('#rt1_content').html(resultText);
	      				},
	      
				});
	 
	}else if (fliter=='follow'){
	     	elgg.get('/qq_ajax/follow_update', {
			      data:{guid:elgg.get_logged_in_user_guid()},
			      beforeSend:function(XMLHttpRequest)  
		            {  
			    	  $('#rt2_content').html("<div class=\"elgg-ajax-loader\"></div>"); 
		                },  
			      success: function(resultText, success, xhr) {
		       	      $('#rt2_content').html(resultText);
	      				}
				});
	 
	}
})

</script>
