<?php

// $path="http://localhost/childeducationsupport";
$path ="http://".$_SERVER['HTTP_HOST'];

?> 

 
 
<div class="sidebar-collapse">

            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                    <?php
              
               $id = $_SESSION['id'];
               
                $query = mysqli_query($conn,"select * from sponsor where id='$id'");
                $result = mysqli_fetch_array($query);
                ?>


                <img alt="image" class="rounded-circle" width="100px" height="100px" src="http://ces.local/frontend/image/<?php echo $result['image']?>">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold"><?php echo $result['full_name']?> </span>
                    
                </a> 
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul> 
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li> 

            <li><a href="<?php echo $path?>/frontend/dashboard.php">Dashboard</a></li>
                
              <li class="active">
            <a  href="<?php echo $path?>/frontend/listofchild.php"><i class="fa fa-th-large"></i> <span class="nav-label">Waiting for sponsorship</span> </a>
        </li>
        <li class="active">
            <a href="<?php echo $path?>/frontend/sponsoredchild.php"><i class="fa fa-th-large"></i> <span class="nav-label">Your children</span> </a>
            
      ></li>
      <li class="active">
            <a href="<?php echo $path?>/frontend/Aboutyou.php"><i class="fa fa-th-large"></i> <span class="nav-label">About you</span> </a>
     
        </li>
s            </ul>  

        </div> 

