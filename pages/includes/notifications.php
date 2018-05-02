 <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?php echo  $countt; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">APPOINTMENTS</li>
                            <li class="body">
                                <ul class="menu">

<?php 

 if ($countt > 0) {

              while ($roww = mysqli_fetch_array($resultt)) { $uid = $roww['id'];?>


                                    <li>
                                        <a href="javascript:void(0);">
                                           


<?php 

$status = $roww ['status'] ;

                               if ($status == 1) {
						$css = "bg-brown" ;
				}
				elseif($status == 2) {
						$css = "label-warning" ;
				}
                                elseif($status == 3) {
						$css = "label-primary" ;
				}
                                elseif($status == 4) {
						$css = "bg-black" ;
				}
                                 elseif($status == 5) {
						$css = "bg-purple" ;
				}
                                 elseif($status == 6) {
						$css = "label-success" ;
				}
				
?>
       
           
                    <div class="icon-circle <?php echo $css; ?>">

</td>
                                      
                                            </div>
                                            <div class="menu-info">
                                               
                                               <h4><?php echo $roww['name'];?></h4>

  <p>
                                                    <i class="material-icons">Last contacted on</i> <?php echo $roww['date'];?>
                                                </p>
                                               
                                            </div>
                                        </a>
                                    </li>
   <?php } }?>                  

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
