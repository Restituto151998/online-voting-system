<?php
include_once './header.php';

// $posts = Post::getAllPublishedPost($connection);
?>
<div class="row">
    <div class="col-12">
        <div class="card mb-0">
            <div class="card-body">
                <h4 class="m-0">Dashboard</h4>

            </div>
        </div>
    </div>
</div>
<div class="row mt-4">

    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Hi <?php echo Auth::user()->firstname . ' ' . Auth::user()->lastname ?></h4>
            </div>
            <div class="card-body">
                <p>We are thankful for your subscription in our system. <br>
                    To keep updated we will send notification in your email provided @ <a href="#"> <?php echo Auth::user()->email ?></a> <br> 
                    We are looking forward for your participation.
                </p>
                Best Regards, <br>
                Evsu App | User Management
            </div>
        </div>
    </div>

</div>

<?php include './footer.php';
