<!DOCTYPE html>
<html>
    <head>
        <title>Orders Page</title>
        <link rel="stylesheet" href="./resources/css/index.css">
    </head>
    <body>
    
    <div class="page-content">
        <div style="border-bottom: #F0F0F0 1px solid;margin-bottom: 15px;">
        Pagination Setting:<br> <select name="pagination-setting" onChange="changePagination(this.value);" class="pagination-setting" id="pagination-setting">
        <option value="all-links">Display All Page Link</option>
        <option value="prev-next">Display Prev Next Only</option>
        </select>
        </div>
        
        <div id="pagination-result">
        <input type="hidden" name="rowcount" id="rowcount" />
        </div>
    </div>
    <script>
    function getresult(url) {
        $.ajax({
            url: url,
            type: "GET",
            data:  {rowcount:$("#rowcount").val(),"pagination_setting":$("#pagination-setting").val()},
            beforeSend: function(){$("#overlay").show();},
            success: function(data){
            $("#pagination-result").html(data);
            setInterval(function() {$("#overlay").hide(); },500);
            },
            error: function() 
            {} 	        
    });
    }
    function changePagination(option) {
        if(option!= "") {
            getresult("getresult.php");
        }
    }
    </script>
    </body>
</html>
