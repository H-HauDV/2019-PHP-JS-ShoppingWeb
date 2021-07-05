<br>
<br>
<?php 
    $alertContent="";
    $alertClass="";
    if(isset($_SESSION['alert'])){
        if($_SESSION['alert']=="NotLogin")
        {
            $alertContent="You are not Login yet.";
            $alertClass="alert alert-warning alert-dismissible fade show";
        }else if($_SESSION['alert']=="LoginFailed")
        {
            $alertContent="Login Failed! Please check your PASSWORD or EMAIL.";
            $alertClass="alert alert-warning alert-dismissible fade show";
        }else if($_SESSION['alert']=="LoginSuccess")
        {
            $alertContent="Login Successfully.";
            $alertClass="alert alert-primary alert-dismissible fade show";
        }else if($_SESSION['alert']=="AddProductSuccess")
        {
            $alertContent="Add to cart Successfully.";
            $alertClass="alert alert-success alert-dismissible fade show";
        }else if($_SESSION['alert']=="AddProductFailed")
        {
            $alertContent="Add to cart Failed, Please check the quantity!.";
            $alertClass="alert alert-danger alert-dismissible fade show";
        }
        
        #add case here
        unset($_SESSION['alert']);
    }
?>
<div id="alertBox" class="<?php echo $alertClass;?>" role="alert">
    <div><?php echo $alertContent;?></div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<br>
<script>
    hide_alert("<?php echo $alertContent; ?>");
    function hide_alert(alertStatus){
        //document.write("aa");
        if(alertStatus==""){
            document.getElementById("alertBox").style.display="none";
        }
    }
</script>

