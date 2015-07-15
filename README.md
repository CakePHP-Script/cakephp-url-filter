# cakephp-url-filter
CakePHP url filtering



###The View (View/Maps/index.ctp)


    <?php
    	$base_url = array('controller' => 'maps', 'action' => 'view_map');
    	echo $this->Form->create('Map',array('url'=>$base_url));        
    	echo $this->Form->input('street_name',array('div'=>FALSE, 'type'=>'text','id'=>'street_name','label'=>false,'placeholder'=>"Street Name"));
    	echo $this->Form->input('zip',array('div'=>FALSE, 'type'=>'text','id'=>'zip','label'=>false,'placeholder'=>"Zip Code"));
    	echo $this->Form->input('Get Location',array('div'=>FALSE, 'type'=>'submit', 'id'=>'submit','label'=>false));
    	echo $this->Form->end();
    ?>
    
    


###The Controller (Controller/MapsController.php)


    if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Map'])) {
                $filter_url['page'] = 1;
                foreach ($this->data['Map'] as $name => $value) {
                    if ($value) {
                        $filter_url[$name] = urlencode($value);
                    }
                }
                return $this->redirect($filter_url);
            }
            
            
            
##A few notes

* I’m using a very simple search here, just a like. But all I wanted was to show you the basic algorithm for filtering.
* In order to respect the DRY principle, you might want to put this code inside a component and a helper
* You could use some rewrite rules to make beautiful urls to improve the SEO.
* In this example I am only using 1xN relationships. If you want to filter NxN relations, you’ll need to work a little more on the controller side (making manual joins).

Hope this helps :). Please leave a comment if something is not working correctly on the code or post an issue on github. I’ll write a few unit test later and push it
