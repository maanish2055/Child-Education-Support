<?php

// $path="http://localhost";
$path = "http://" . $_SERVER['HTTP_HOST'];
?>



<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element">

                <?php

                $id = $_SESSION['id'];

                $query = mysqli_query($conn, "select * from user where id='$id'");
                $result = mysqli_fetch_array($query);
                ?>


                <img alt="image" class="rounded-circle" width="100px" height="100px" src="http://ces.local/admin/images/user/<?php echo $result['image'] ?>">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold"><?php echo $result['first_name'] ?> <?php echo $result['last_name'] ?></span>
                   
                </a>

            <div class="logo-element">
                IN+
            </div>
        </li>

        <li><a href="<?php echo $path ?>/admin/dashboard.php">Dashboard</a></li>

        <li class="active">
            <a> <span class="nav-label">Users</span> <span class="fa arrow"></span></a>
        <li><a href="<?php echo $path ?>/admin/user/create.php">Add</a></li>
        <li><a href="<?php echo $path ?>/admin/user/list.php">List</a></li>

        </li>

        <li class="active">
            <a> <span class="nav-label">Child</span> <span class="fa arrow"></span></a>
        <li><a href="<?php echo $path ?>/admin/child/child.php">Add</a></li>
        <li><a href="<?php echo $path ?>/admin/child/childlist.php">List</a></li>

        </li>
        <li class="active">
            <a> <span class="nav-label">Sponsors</span> <span class="fa arrow"></span></a>

        <li><a href="<?php echo $path ?>/admin/sponsor/sponsorlist.php">List</a></li>

        </li>
    </ul>
    <script>
        $(".navl-label").click(function() {
            $(this).slideToggle();
        });
    </script>

</div>