<div class="main_wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success">
            <h3 id="completeMessage"></h3> 
            </div> 
            <div class="divider"></div>
            <div id="browse" class="hidden text-center">
                <input type="hidden" value="<?= SERVER_URL?>" name="server_url">
                <input type="hidden" value="<?= $_GET['email']?>" name="server_email">
                <a href="../license.php?email=<?= $_GET['email']?>" class="btn btn-default ">Browse  application</a>
            </div> 
        </div>
    </div>
</div>
 