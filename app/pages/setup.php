<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <div id="message"></div>
        </div>
        <div class="col-sm-12">
            <form action="./app/controller/Setup_process.php" method="post" id="setupForm">
              
              <input type="hidden" name="csrf_token" value="<?= (!empty($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : null) ?>" width=100%>
              <div class="form-group">
                <label for="upload">Upload SQL File</label>
                <input type="file" class="form-control" id="upload">
                <p class="text-danger" id="upload-help-block">
                  <?php 
                    if(file_exists('./public/files/MySql.sql')) {
                      echo "The email file is already exits!. you can replace it by uploading another database.";
                    } else {
                      echo "The Upload SQL File field is required";
                    }
                  ?>
                </p>
              </div>
              <div class="form-group">
                <label for="hostname">Hostname</label>
                <input type="text" class="form-control" id="hostname" placeholder="Hostname" name="hostname" value="<?= (isset($_POST['hostname']) ? $_POST['hostname'] : 'localhost') ?>">
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= (isset($_POST['username']) ? $_POST['username'] : 'root') ?>">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?= (isset($_POST['password']) ? $_POST['password'] : null) ?>">
              </div>
              <div class="form-group">
                <label for="password">Database</label>
                <input type="text" class="form-control" id="database" placeholder="Database" name="database" value="<?= (isset($_POST['database']) ? $_POST['database'] : null) ?>">
              </div>
              <div class="form-group">
                <label for="password">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= (isset($_POST['email']) ? $_POST['email'] : null) ?>">
              </div>
              <a href="?step=requirements" class="cbtn left-right"> <i class="fa fa-backward"></i> Previous</a>
              <div class="pull-right">
                <button type="reset" class="cbtn">Reset</button>
                <button type="submit" class="cbtn">Install</button>
              </div>
            </form> 
        </div>
    </div>
</div>
