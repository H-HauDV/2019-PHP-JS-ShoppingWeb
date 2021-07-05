<?php
class PerPage {
	public $perpage;
	
	function __construct() {
		$this->perpage = 12;
	}
	
	function getAllPageLinks($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . ' <li class="page-item disabled"><a class="page-link">&#8810;</a></li><li class="page-item disabled"><a class="page-link">&#60;</a></li>';
			else	
				$output = $output . '<li class="page-item"><a class="page-link first" onclick="getresult(\'' . $href . (1) . '\')" >&#8810;</a></li>  <li class="page-item"><a class="page-link" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >&#60;</a></li>';
			
			
			if(($_GET["page"]-3)>0) {
				if($_GET["page"] == 1)
					$output = $output . '<li class="page-item active"><span id=1 class="page-link current">1</span></li>';
				else				
					$output = $output . '<li class="page-item"><a class="page-link" onclick="getresult(\'' . $href . '1\')" >1</a></li>';
			}
			if(($_GET["page"]-3)>1) {
					$output = $output . '<li class="page-item disabled"><span class="dot">...</span></li>';
			}
			
			for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				if($i<1) continue;
				if($i>$pages) break;
				if($_GET["page"] == $i)
					$output = $output . '<li class="page-item active"><span id='.$i.' class="page-link current">'.$i.'</span></li>';
				else				
					$output = $output . '<li class="page-item"><a class="page-link" onclick="getresult(\'' . $href . $i . '\')" >'.$i.'</a></li>';
			}
			
			if(($pages-($_GET["page"]+2))>1) {
				$output = $output . '<span class="dot">...</span>';
			}
			if(($pages-($_GET["page"]+2))>0) {
				if($_GET["page"] == $pages)
					$output = $output . '<li class="page-item active"><span id=' . ($pages) .' class="page-link current">' . ($pages) .'</span></li>';
				else				
					$output = $output . '<li class="page-item"><a class="page-link" onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a></li>';
			}
			
			if($_GET["page"] < $pages)
				$output = $output . '<li class="page-item"><a  class="page-link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a></li>   <li class="page-item"><a  class="page-link" onclick="getresult(\'' . $href . ($pages) . '\')" >&#8811;</a></li>';
			else				
				$output = $output . '<li class="page-item"><span class="page-link disabled">></span></li>   <li class="page-item"><span class="page-link disabled">&#8811;</span></li>';
			
			
		}
		return $output;
	}
	function getPrevNext($count,$href) {
		$output = '';
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		if($this->perpage != 0)
			$pages  = ceil($count/$this->perpage);
		if($pages>1) {
			if($_GET["page"] == 1) 
				$output = $output . '<span class="link disabled first">Prev</span>';
			else	
				$output = $output . '<a class="link first" onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" >Prev</a>';			
			
			if($_GET["page"] < $pages)
				$output = $output . '<a  class="link" onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >Next</a>';
			else				
				$output = $output . '<span class="link disabled">Next</span>';
			
			
		}
		return $output;
	}
}
?>