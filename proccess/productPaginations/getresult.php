<?php
define('SITEURL','http://localhost/web4/');
require_once("dbcontroller.php");
require_once("pagination.class.php");
$db_handle = new DBController();
$perPage = new PerPage();

if(isset($_GET["searchText"])){
	$searchText=$_GET["searchText"];
}
else{
	$searchText="";
}
$sql = "SELECT * from products where name like '%$searchText%'";
$paginationlink = "./proccess/productPaginations/getresult.php?page=";	
				
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage->perpage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage->perpage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}


$perpageresult = $perPage->getAllPageLinks($_GET["rowcount"], $paginationlink);	

$output = '';
$i=0;
foreach($faq as $k=>$v) {
	if($i==0) $output .='<div class="row">';
	$output .='<div class="col-sm">';
	$output .='<div class="card text-center" style="width: 18rem;">';
	$output .='<img id="productImage" src="'.$faq[$k]["img"].'" class="card-img-top" alt="Image Error">';
	$output .='<h6 class="card-title">'.$faq[$k]["name"].'</h6>';
	$output .='<form class="card-body" action="./proccess/addToCart1.php" method="POST">';
	$output .='<h6 class="card-title">'.$faq[$k]["price"].'</h6>';
	$output .='<p class="card-text text-truncate">
				'.$faq[$k]["infor"].'
            </p>';
	$output .='<input type="text" hidden id="hiddenID" name="hiddenID" value="'.$faq[$k]["ID"].'">';
	$output .='<input type="text" hidden id="hiddenName" name="hiddenName" value="'.$faq[$k]["name"].'">';
	$output .='<input type="number" class="form-control" id="quantity" name="quantity" placeholder="How Many">';
	$output .='<input type="submit" class="btn btn-success" name="submit" value="Add to cart">
                </form>
            </div>
			</div>';
	if($i==3) $output .='</div> <br>';
	$i++;
	if($i==4) $i=0;
 	#$output .= '<div class="question"><input type="hidden" id="rowcount" name="rowcount" value="' . $_GET["rowcount"] . '" />' . $faq[$k]["name"] . '</div>';
 	#$output .= '<div class="answer">' . $faq[$k]["infor"] . '</div>';
}
if(!empty($perpageresult)) {
	
	$output .='<br><br>';
	$output .='<nav class="d-flex justify-content-center" aria-label="Page navigation example">';
	$output .= '<ul class="pagination" id="pagination">' . $perpageresult . '</ul>';
	$output .= '</nav>';
}
print $output;
?>
