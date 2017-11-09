<?php

/* @var $this yii\web\View */

$this->title = 'BPLS';
?>
<div class="site-index">
    <!-- <img src="img/seal.png" style="height:32px;"/> -->
    <div class="jumbotron">
        <br>
        <img src="img/seal.png" height = "190px" >
        <h3>Welcome to OpenLGU Business Permits and Licensing System Module</h3>
        <!-- <h5>A web application designed to make the entire business permit and licensing process faster and more efficient.</h5> -->
    </div>

            <div class="col-lg-4">                
            <?php
                if (Yii::$app->user->isGuest) {
                    echo "<h3>Features</h3>

                        <ul>
                    	<li><h5>Account Creation</h5></li>
                    	<li><h5>Business Registration</h5></li>
                    	<li><h5>Assessment of Fees</h5></li>
                    	<li><h5>Payment of Fees</h5></li>
                    	<li><h5>Business Permit Generation</h5></li>

                    </ul>";
                }
            ?>        
            </div>
</div>
