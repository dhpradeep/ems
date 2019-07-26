<!DOCTYPE html>
<html>
<head>
	<title>Message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="description" content="">
	  <meta name="author" content="">
	  <link rel="stylesheet" href="<?= CSS_DIR.DS ?>bootstrap.min.css">
      <link rel="stylesheet" href="<?= CSS_DIR.DS ?>custom.css">
      <link href="<?= CSS_DIR.DS ?>message.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
        rel="stylesheet">
        <script type="text/javascript" src="<?= JS_DIR.DS ?>jquery-3.2.1.min.js"></script>
</head>
<body>
    <div class="container-fluids" style="width: 100%; height: 100vh">
        <!--whole containter startsr-->
        <div class="row">
            <!--chat heads vertical nav bar-->
        
            <div class="col-lg-2 bg-secondary m-0 p-0 pl-3" style="height: 100vh; width: 100%;">
                
                <!--main flexing nav part -->
                <ul class="nav flex-column overflow-auto ">
                    
                    <!--search bar-->
                    <li>
                        <div class=" p-3">
                            <input class=" searchBoxBlackBackground form-control border-0" type="text" placeholder="Search" aria-label="Search"
                            style="border-radius: 20px;">
                        </div>
                    </li>
                    <!--end search bar-->

                    <?php
                        foreach ($this->otherUsers as $key) { ?>
                    <!--chat heads -->
                    <li class="nav-itemx nav-active">
                        <div class="container">
                            <div class="row row-no-gutters" style="height:60px">
                                
                                <!--photo-->
                                <div class="col-3 p-3 h-100">
                                        <img src="../image/profile/<?= $key['pic'] ?>" style="border-width:3px !important" class="rounded float-left border rounded-circle 
                                        <?php if($key['status'] == 1)  echo 'border-success'; else echo 'border-dark';?>" id="<?php echo $key['id']."-image" ?>" alt="...">
                                </div>
                                <!--end photo-->

                                <!--text part-->
                                <div class = "col-7 p-0 h-100">
                                    <div class="container">
                                        <!--user name part-->
                                        <div class="row row-no-gutters">
                                            <input type="hidden" name="userID" id="userId" value="<?php echo $this->currentUser['id']; ?>">
                                            <input type="hidden" name="pic" id="pic" value="<?php echo $this->currentUser['pic']; ?>">
                                            <a class="nav-link text-light text-center p-0 pt-2" href="#" ><?php echo $key['fname']." ".$key['lname']; ?></a>    
                                        </div>
                                        <!-- end user name part-->

                                        <!-- user message part-->
                                        <div class="row row-no-gutters">
                                            <p class="text-left" style="font-size: 12px; color:gainsboro;"> This is test</p>
                                        </div>      
                                        <!--end user message part-->
                                    </div>   
                                </div>
                                <!--end text name part-->
                                
                                <div class="col-2 nav-link text-center text-light h-100 pt-3">...</div>

                            </div>    
                        </div>
                    </li>
                    <!-- end chat heads part-->
                    <?php   
                        }
                    ?>

                </ul>
                <!--nav bar listing section end -->
            </div>
            <!-- whole nav bar end -->
            <!-- chat part-->
            <div class="col-lg-8 " style="height: 100vh;">              
            
                    

                            <!--whole chat history part -->
                            <div class="msg_history overflow-auto" id = "chat" style="height: 92vh;">                                
                            <!--message start-->
                            
                            <!-- message end-->
                            </div>
                            
                            <!-- chat log division finished-->

                            <!-- sending message division-->
                            <div class="type_msg">
                                <div class="row">
                                    <!-- attachment portion-->
                                    <div class="pl-3 pt-3 pr-3 ">
                                        <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
                                    </div>
                                    <!-- send message portion-->
                                    <div class="input_msg_write" style="width: 92.5%">
                                        <input type="text" class="write_msg" id="msg" placeholder="Type a message" />
                                    </div>
                                    <!--send message end-->
                                    
                                    <!--send message icon-->
                                    <div>
                                        <button class="msg_send_btn" id="send" type="button"><i class="fa fa-paper-plane-o"
                                                aria-hidden="true"></i></button>
                                    </div>
                                    <!--send message icon finish-->
                                </div>
                            </div>
                            <!--division finished for sending message -->
                        
                        
            </div>
            <!--chat section end -->


            <!-- profile detail section-->
            <div class="col-lg-2"> 

                <!--menu bar for profile-->
                <div class="col-12 pr-4 pb-3 pt-3 m-2 h-3 mb-5">
                    <!--<img class="float-right" src= "../icons/ellipsis-h-solid.svg" style="height: 20px; width: 20px">-->
                    <form class="float-right" action= "<?= SITE_URL ?>/user/logout" method="POST">
                        <div>
                            <button class="btn-info" style="border-radius: 20px; padding: 5px 15px;" value="Logout" type = "submit" name="logout"> Logout </button>
                        </div>
                    </form>
                </div>
                <!--menu bar for profile end-->

                <!-- profile photo block -->
                <div class="col-12 pl-4 pr-4 pb-4 pt-2 ml-4">
                    <img src="<?= IMAGE_DIR ?>/profile/<?= $this->currentUser['pic']; ?>" class="rounded-circle " alt="..." style="height: 20vh; width :20vh">
                </div>
                <!-- profile photo block -->

                <!-- profile name-->
                <div class="col-12 pl-0 pb-2 ">
                    <p class="text-center p-0 m-0"> <?php echo $this->currentUser['fname']." ".$this->currentUser['lname']; ?></p>
                    <p class="text-center p-0"> <?php echo $this->currentUser['email']; ?></p>
                </div>
                <!-- profile name end-->

                <!-- online status-->
                <div class="col-12 pt-0">
                    <!--drop down dvider-->
                    <div class="dropdown-divider"></div>

                    <!--online status-->
                    <div>
                        <i class="p-0 m-0"><small> <?php echo $this->currentUser['fname']." ".$this->currentUser['lname']; ?></small></i>
                        <i class="pl-5"><small>online</small></i>
                    </div>
                    <!--drop down dvider-->
                    <div class="dropdown-divider"></div>

                </div>
                <!--online section end-->
            </div>
            <!--profile detail section end-->
        </div>  

        
        
        <!--whole container row end -->
    </div>
    <!-- whole container ends -->

</body>
<script type="text/javascript" src="<?= JS_DIR ?>/connection.js"></script>
<script type="text/javascript" src="<?= JS_DIR ?>/ajax.js"></script>
</html>