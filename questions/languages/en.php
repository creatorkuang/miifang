<?php


$mapping = array(
	'questions:menu' => 'Questions',
	'questions:everyone'=>'All questions',
	'questions:add'=>'Ask a question',
	'question:save'=>'Save',
	'question:edit'=>'Edit the question',
	'question:question'=>'Question the question',
	'question:follow'=>'Follow',
	'question:unfollow'=>'Unfollow',
	'question:follownum'=>'<b>%s</b> people followed',
	'question:widget:activities'=>'Recent news',
	'question:widget:friends'=>'My follow',
	'question:widget:friendsof'=>'My follower',
	'question:widget:ask'=>'My question',
	'question:widget:answer'=>'My answer',

		//header menu
		'menu:logout'=>"Logout",
		'menu:profile'=>"Profile",
		'menu:setting'=>"Setting",
		'menu:account'=>"Account",
		'menu:ask'=>"Ask question",
		
		
	//form
		'question:form:title'=>'Title:',
		'question:form:title:tips'=>'at least 6 characters',
		'question:form:description'=>'Description:',
		'question:form:tags'=>'Tags:(commas seperated)',
		'question:form:proccess'=>'Study Stage:',
		'question:process:review'=>'Topic',
		'question:process:method'=>'Method',
		'question:process:design'=>'Design',
		'question:process:experiment'=>'Experiment',
		'question:process:analysic'=>'Analysic',
		'question:process:conclusion'=>'Conclusion',
		'question:form:level'=>'Question Level:',
		'question:level:what'=>'What',
		'question:level:how'=>'How',
		'question:level:why'=>'Why',
		'question:form:cat'=>'Catagory:',
		'question:cat:nature'=>'Science',
		'question:cat:human'=>'Humanities',
		'question:cat:sociaty'=>'Social Science',
		
		'question:reference'=>'References:',
		'reference:add'=>'Add',
		'references:address'=>'Link',
		'reference:subject'=>'Someone add an reference for you!',
		'reference:body'=>' %s in your question(<a href="%s">%s</a>): add reference:%s.',
		
		'question:order:time'=>'By time',
		'question:order:vote'=>'By Vote',
		
		//question all page 
		'question:list:unlimited'=>'Unlimited',
		'question:all:newest'=>'Newest',
		'question:all:hottest'=>'Hottest',
		'question:all:recommended'=>'Recommended',
		
			//river message
       	'river:create:object:default'=>'%s ask: %s?',
       	'river:reference:object:default'=>'%s in question:%s ? add reference:',
		'river:follow:object:default'=>' %s follow this question: %s ?', 
		'river-tab:all'=>'All',
		'river-tab:question'=>'Questions',
		'river-tab:follow'=>'Following',
		'river:forward:object:default'=>'%s forward this question:%s ?',
		
			//system message
       	'questions:saved'=>'Question save.',
        'question:notfound'=>'Question Not found',
	'thumbs:already'=>'Already voted',
	'thumbs:notfound'=>'Vote object did not exist.',
	'thumbs:failure'=>'vote failed,pleas try again later.',
	'thumbsup:success'=>'Thumbs up success',
	'thumbsdown:success'=>'Thumbs down success',


       	//error messgae
       	'questions:error:no_save'=>'Save failed',
	'questions:error:no_title'=>'Please enter title:',
	'questions:saved'=>'Submit success.',		
		);
		
		

add_translation('en', $mapping);
