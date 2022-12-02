<?php include_once("navabar.php");
    include("db_connect.php");

    $posid = $_GET['pid'];
    $_SESSION['currentPost'] = $posid;
?>
<?php
    $viewPost_query =  mysqli_query($conn,"SELECT * FROM postview where  postID = $posid");
    $data  = mysqli_fetch_assoc($viewPost_query);                         
    $theTitle = $data['title'];
    $userName = $data['username'];
    $dateCreated = $data['dateCreated'];
    $imgPath = $data['picture'];
    $postDesc = $data['content'];
?>



<div class="bordered text-center shadow">
    <div class="col-5">
        <div class="card mb-4">

            <div class="card-header">
                <h2><?php echo $theTitle;?></h2>
            </div>

            <div class="card-body ">

                <div class="media mb-3">

                    <div class="media-body ml-3">

                        <?php //Username
                            echo " <strong>$userName</strong>";
                           //Date Created
                                 $dateCreated = strtotime($dateCreated); echo "<br>";
                                 $dateCreated = date("d-M-Y H:i", $dateCreated);
                                 echo "<small> $dateCreated</small> ";
                        ?>
                    </div>
                    <hr>
                    <p>
                        <!-- //Post Image -->
                        <img src="<?php echo $imgPath; ?>" class="d-block ui-w-40 rounded-3 w-100" alt="">
                        <!-- //Post Content -->
                        <?php  echo $postDesc;?>
                    </p>
                </div>


                <a href="javascript:void(0)" class="ui-rect ui-bg-cover"
                    style="background-image: url('./Pictures/Profiles/bp.jpg');"></a>
            </div>

            <div class="card-footer">
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none">
                    <i class="fas fa-heart"></i>
                    <small class="align-middle p-3">
                        <!--Favourite-->
                    </small>
                </a>
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                    <i class="fas fa-comment align-middle text-muted "></i>
                    <small class=" p-3 align-middle">
                        <!--Comment Count-->
                    </small>
                </a>
                <a href="javascript:void(0)" class="d-inline-block text-decoration-none ml-3">
                    <i class="fas fa-eye align-middle text-muted "></i>
                    <small class="align-middle">
                        <!--View Count-->
                    </small>
                </a>
                <?php
                        include_once("comments.php");
                ?>
            </div>
        </div>
    </div>
</div>