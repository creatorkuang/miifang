<?php


$mapping = array(
	   
	'questions:menu' => '问题',
	'questions:everyone'=>'所有问题',
	'questions:add'=>'提出问题',
	'question:save'=>'保存',
	'question:edit'=>'编辑问题',
	'question:question'=>'提出问题',
	'question:follow'=>'关注问题',
	'question:unfollow'=>'取消关注',
	'question:follownum'=>'已有<b> %s</b> 人关注',
	'question:widget:activities'=>'最新信息',
    'question:widget:friends'=>'我的关注',
	'question:widget:friendsof'=>'我的粉丝',
	'question:widget:ask'=>'我的问题',
	'question:widget:answer'=>'所答问题',

	

	//header menu
	'menu:logout'=>"退出",
	'menu:profile'=>"个人页面",
	'menu:setting'=>"设置",
	'menu:account'=>"账户",
	'menu:ask'=>"提出问题",

		
	//form
       	'question:form:title'=>'问题:',
		'question:form:title:tips'=>'至少6个字以上',
       	'question:form:description'=>'详细描述:',
       	'question:form:tags'=>'标签:(英文逗号隔开)',
       	'question:form:proccess'=>'研究阶段:',
       	'question:process:review'=>'选题',
       	'question:process:method'=>'研究方法',
       	'question:process:design'=>'研究设计',
       	'question:process:experiment'=>'实验',
       	'question:process:analysic'=>'数据分析',
       	'question:process:conclusion'=>'结论',
       	'question:form:level'=>'问题类别:',
       	'question:level:what'=>'What',
       	'question:level:how'=>'How',
       	'question:level:why'=>'Why',
       	'question:form:cat'=>'所属领域:',
       	'question:cat:nature'=>'自然科学',
       	'question:cat:human'=>'人文科学',
       	'question:cat:sociaty'=>'社会科学',

	//reference 		
       	'question:reference'=>'提供线索:',
        'reference:add'=>'添加',
	'references:address'=>'链接',
	'reference:posted'=>'添加成功，感谢您的帮助!',
		
		'question:order:time'=>'按时间',
		'question:order:vote'=>'按投票',
		
	//question all page 
	'question:list:unlimited'=>'不限',
	'question:all:newest'=>'最新的',	
	'question:all:hottest'=>'最热的',	
	'question:all:recommended'=>'推荐的',
		
       	//river message
       	'river:create:object:default'=>'%s 问: %s?',
       	'river:reference:object:default'=>'%s 为问题:%s ?添加参考资料:',
	'river:follow:object:default'=>' %s 关注了问题: %s ?', 
	'river-tab:all'=>'所有动态',
	'river-tab:question'=>'问题动态',
	'river-tab:follow'=>'关注动态',
	'river:forward:object:default'=>'%s转发帮问:%s ?',
     	
       	//system message
       	'questions:saved'=>'问题保存成功!',
        'question:notfound'=>'没有找到问题',
	'thumbs:already'=>'已经投票过',
	'thumbs:notfound'=>'投票对象不存在',
	'thumbs:failure'=>'投票保存不成功',
	'thumbsup:success'=>'赞成投票成功',
	'thumbsdown:success'=>'反对投票成功',


       	//error messgae
       	'questions:error:no_save'=>'问题保存失败!',
	'questions:error:no_title'=>'请输入题目',
	'questions:saved'=>'提问成功!',		
		);

add_translation('zh', $mapping);
