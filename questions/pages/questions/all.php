<?php
/**
 * All questions  
 *
 */
if (!elgg_is_logged_in()){
	forward('');
}

elgg_register_title_button();
$offset = (int)get_input('offset', 0);
$cat=get_input('cat');
$proccess=get_input('proccess');
$level=sanitize_string(get_input('level'));

if(!$cat){

	$lists=elgg_list_entities(array(
			'type' => 'object',
		    'subtype' => 'question-top',
			'limit' => 6,
			'offset' => $offset,
			'full_view' => false,
			'pagination' => true,
			'list_class'=>'question-list brs',
			'item_class'=>'question-item bx',
			'view_toggle_type' => false
			));
}else{

$cat_value=array('c_1','c_2','c_3');
$p_value=array('p_1','p_2','p_3','p_4','p_5','p_6');
$l_value=array('what','how','why');

if($cat=='null'){
 $cat=$cat_value;
}else{
	$cat_class[array_search($cat,$cat_value)]="class=\"selected\"";	
}
if($proccess=='null'){
	$proccess=$p_value;	
}else{
	$p_class[array_search($proccess,$p_value)]="class=\"selected\"";	
}
if($level=='null'){
	$level=$l_value;
}else{
	$l_class[array_search($level,$l_value)]="class=\"selected\"";
}


$lists=elgg_list_entities_from_metadata(array(
		'type' => 'object',
		'subtype' => 'question-top',
		'metadata_name_value_pairs'=>array(
				array('name'=>'catagory','value'=>$cat,'operand' => '='),
				array('name'=>'proccess','value'=>$proccess,'operand' => '='),
				array('name' =>'level','value' =>$level,'operand' => '='),
 					                      ),	
		'limit' => 6,
		'offset' => $offset,
		'full_view' => false,
		'pagination' => true,
		'list_class'=>'question-list brs',
		'item_class'=>'question-item bx',
		'view_toggle_type' => false));
}
if(!$lists){
	$lists=elgg_echo("No question");

}



$cat_name=array(elgg_echo("question:form:cat"),elgg_echo('question:list:unlimited'),elgg_echo('question:cat:nature'),elgg_echo('question:cat:human'),elgg_echo('question:cat:sociaty'));
$p_name=array(elgg_echo("question:form:proccess"),elgg_echo('question:list:unlimited'),elgg_echo('question:process:review'),elgg_echo('question:process:method'),elgg_echo('question:process:design'),elgg_echo('question:process:experiment'),elgg_echo('question:process:analysic'),elgg_echo('question:process:conclusion'));
$l_name=array(elgg_echo("question:form:level"),elgg_echo('question:list:unlimited'),elgg_echo('question:level:what'),elgg_echo('question:level:how'),elgg_echo('question:level:why'));

$fliter=<<<html
<div class="mbm pam elgg-divide-bottom " id="fliter_all">


<div class="pbm">
$cat_name[0]
<a href="#" id="cat_0"  >$cat_name[1]</a>
<a href="#" id="cat_1"  $cat_class[0] >$cat_name[2]</a>
<a href="#" id="cat_2" $cat_class[1] >$cat_name[3]</a>
<a href="#" id="cat_3"  $cat_class[2] >$cat_name[4]</a>
</div>
<div class="pbm" >
$p_name[0]
<a href="#" id="p_0">$p_name[1]</a>
<a href="#" id="p_1" $p_class[0] >$p_name[2]</a>
<a href="#" id="p_2" $p_class[1] >$p_name[3]</a>
<a href="#" id="p_3" $p_class[2] >$p_name[4]</a>
<a href="#" id="p_4" $p_class[3] >$p_name[5]</a>
<a href="#" id="p_5" $p_class[4] >$p_name[6]</a>
<a href="#" id="p_6" $p_class[5] >$p_name[7]</a>
</div>
<div class="pbs" >
$l_name[0]
<a href="#" id="level_0">$l_name[1]</a>
<a href="#" id="level_1" $l_class[0] >$l_name[2]</a>
<a href="#" id="level_2" $l_class[1] >$l_name[3]</a>
<a href="#" id="level_3" $l_class[2] >$l_name[4]</a>
</div>
</div>
html;


$content=<<<html
$fliter
$lists

html;


$title = elgg_echo('questions:everyone');

$body = elgg_view_layout('qq_two_column', array(
	
	'content' => $content,
	'title' => $title,
	'nav'=>'',
	
));

echo elgg_view_page($title, $body);
?>
<script type="text/javascript"> 



$(document).ready(function(){
	var cats=new Array($('#cat_0'),$('#cat_1'),$('#cat_2'),$('#cat_3'))
    var cats_value=new Array('null','c_1','c_2','c_3')

	var proccess=new Array($('#p_0'),$('#p_1'),$('#p_2'),$('#p_3'),$('#p_4'),$('#p_5'),$('#p_6'))
    var p_value=new Array('null','p_1','p_2','p_3','p_4','p_5','p_6')

	var levels=new Array($('#level_0'),$('#level_1'),$('#level_2'),$('#level_3'))
    var levels_value=new Array('null','what','how','why')
    	
   //get the value from url 
	String.prototype.GetValue= function(para) {  
		  var reg = new RegExp("(^|&)"+ para +"=([^&]*)(&|$)");  
		  var r = this.substr(this.indexOf("\?")+1).match(reg);  
		  if (r!=null) return unescape(r[2]); return null;  
		}  
		var str = location.href;  

  
        function link(i,j,h){
			  j[i].click(function(){
			            location.href=(h[i])
			        
			        })
			    }
       
	    
	link_b=elgg.config.wwwroot+'questions/all?';			
	var cat_links=new Array();
	cat_links[0]=link_b+"cat="+cats_value[0]+"&level="+str.GetValue("level")+"&proccess="+str.GetValue("proccess");
	cat_links[1]=link_b+"cat="+cats_value[1]+"&level="+str.GetValue("level")+"&proccess="+str.GetValue("proccess");
	cat_links[2]=link_b+"cat="+cats_value[2]+"&level="+str.GetValue("level")+"&proccess="+str.GetValue("proccess");
	cat_links[3]=link_b+"cat="+cats_value[3]+"&level="+str.GetValue("level")+"&proccess="+str.GetValue("proccess");
	
	var p_links=new Array();
	p_links[0]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[0];
	p_links[1]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[1];
	p_links[2]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[2];
	p_links[3]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[3];
	p_links[4]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[4];
	p_links[5]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[5];
	p_links[6]=link_b+"cat="+str.GetValue("cat")+"&level="+str.GetValue("level")+"&proccess="+p_value[6];
	
	var level_links=new Array();
	level_links[0]=link_b+"cat="+str.GetValue("cat")+"&level="+levels_value[0]+"&proccess="+str.GetValue("proccess");
	level_links[1]=link_b+"cat="+str.GetValue("cat")+"&level="+levels_value[1]+"&proccess="+str.GetValue("proccess");
	level_links[2]=link_b+"cat="+str.GetValue("cat")+"&level="+levels_value[2]+"&proccess="+str.GetValue("proccess");
	level_links[3]=link_b+"cat="+str.GetValue("cat")+"&level="+levels_value[3]+"&proccess="+str.GetValue("proccess");
	  
	    link(0,cats,cat_links)
	    link(1,cats,cat_links)
	    link(2,cats,cat_links)
	    link(3,cats,cat_links)
	    
	    link(0,proccess,p_links)
	    link(1,proccess,p_links)
	    link(2,proccess,p_links)
	    link(3,proccess,p_links)
	    link(4,proccess,p_links)
	    link(5,proccess,p_links)
	    link(6,proccess,p_links)
	    
	    link(0,levels,level_links)
        link(1,levels,level_links)
        link(2,levels,level_links)
        link(3,levels,level_links)

       
});
</script>
