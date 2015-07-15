<?php
	$base_url = array('controller' => 'maps', 'action' => 'view_map');
	echo $this->Form->create('Map',array('url'=>$base_url));        
	echo $this->Form->input('street_name',array('div'=>FALSE, 'type'=>'text','id'=>'street_name','label'=>false,'placeholder'=>"Street Name"));
	echo $this->Form->input('zip',array('div'=>FALSE, 'type'=>'text','id'=>'zip','label'=>false,'placeholder'=>"Zip Code"));
	echo $this->Form->input('Get Location',array('div'=>FALSE, 'type'=>'submit', 'id'=>'submit','label'=>false));
	echo $this->Form->end();
?>