<?php
class Menu {
    public $menu;
    public $html;
    public $json;
    
        public function __construct() {
            $this->menu = $this->getData();
            $this->html = $this->html();
            $this->json = $this->json();
        }
    
        private function getData() {
            $files = array();        
            $iterator = new DirectoryIterator(dirname(__FILE__));
            while($iterator->valid()) {
                $file = $iterator->current();
                if($file->isFile() and (pathinfo($file->getFilename(), PATHINFO_EXTENSION) === 'html'))
                    $files[$file->getBaseName('.html')] = $file->getFileName();
                $iterator->next();
            }
            return $files;
        }
        
        private function html() {
            if(!empty($this->menu)) {
                $menu = '<ul>';
                foreach($this->menu as $name => $link) 
                    $menu .= '<li><a href="'.$link.'">'.$name.'</a></li>';
                $menu .= '</ul>';
                return $menu;
            }
            return '';
        }
        
        private function json() {
            return json_encode($this->menu);
        }
}

$menu = new Menu();
        
if(isset($_GET['json']))
    echo $menu->json;
else
    echo $menu->html;
?>
