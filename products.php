
<!DOCTYPE html>
<html>

<head>
    <title>Product Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendors/css/grid.css">
    <link rel="stylesheet" href="./resources/css/index.css"> -->
    <script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script>
    function getresult(url) {
        $.ajax({
            url: url,
            type: "GET",
            data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val(),searchText:$("#searchText").val()},
            beforeSend: function(){$("#overlay").show();},
            success: function(data){
            $("#pagination-result").html(data);
            setInterval(function() {$("#overlay").hide(); },500);
            },
            error: function() 
            {} 	        
    });
    }
    </script>
</head>

<body>
    <?php include_once("resources/assets/header.php") ?>
    <div class="container-fluid">
    <?php include_once("resources/assets/alert.php")?>
        <!-- form section start -->
    <br>
    <?php 
        if(isset($_GET['searchText'])){
            $searchText=$_GET['searchText'];
        }
        else{
            $searchText="";
        }
        if(isset($_GET['category'])){
            $category=$_GET['category'];
        }
        else{
            $category="";
        }
    ?>
    <div class="container-sm">
        <form class="input-group" method="GET" action="products.php?searchText=<?=$searchText?>">
            <input name="searchText" class="form-control" placeholder="Search" id="searchText" value="<?=$searchText?>" />
            <!-- <a class="btn-search" href="productProcess.php?" type="submit" name="submit">Search</a> -->
            <input type="submit" class="btn btn-outline-success" value="Search">
         </form>
    </div>
    <!-- form section end -->
    <!-- product display -->
    <br>
    <h2 class="text-center" id="textChange">Products</h2>

    <div id="result" class="bg-light p-5 rounded-lg m-3">
        <div id="pagination-result">
		    <input type="hidden" name="rowcount" id="rowcount" />
	    </div>
    </div>    
    <script>
        getresult("./proccess/productPaginations/getresult.php");
    </script>
    <div class="clearfix"></div>
    <!-- footer section start -->
    <?php include_once("resources/assets/footer.php") ?>
    <!-- footer section end -->

</body>

</html>