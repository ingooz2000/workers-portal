<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Professionals Resume HTML Bootstrap Template | Smarteyeapps.com</title>

    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" href="editsec.css">
</head>

<body>
  <?php
    include 'profile.php';
  ?>
    <div class="container-fluid overcover">
        
            <div class="top-cover">
                <div class="covwe-inn">
                    <div class="row no-margin">
                        <div class="col-md-3 img-c">
                            <img src="assets/images/profile.jpg" alt="">
                        </div>
                        <div class="col-md-9 tit-det">
                            <h2></h2>
                            
                        </div>
                    </div>
                </div>
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"  id="profile-tab" data-toggle="tab" href="#resume" role="tab" aria-controls="profile" aria-selected="false">Resume</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="profile" aria-selected="false">Portfolio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Edit</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <div class="row no-margin home-det">
                      <div class="col-md-4 big-img">
                         
                         <h4 class="ltitle">Edit</h4>
                        
                         
                        
                          <h4 class="ltitle">Referencess</h4>

                        <div class="refer-cov">
                            
                            <p><b></b></p>
                            <span></span>
                        </div>
                        <div class="refer-cov">
                           
                            <p> <b></b>  </p>
                            <span></span>
                        </div>
                        
                      </div>
                      <div class="col-md-8 home-dat">
                          <h2 class="rit-titl"> Skills</h2>
                        <div class="profess-cover row no-margin">
                            <div class="col-md-6">
                                <div class=" prog-row row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row prog-row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="links">
                          <div class="row ">
                              <div class="col-xl-6 col-md-12">
                                  
                              </div>

                          </div>
                      </div>
                      <div class="jumbo-address">
                         <div class="row no-margin">
                                  <div class="col-lg-6 no-padding">

                                  

                          </div>
                          <div class="col-lg-6 no-padding">
                               
                          </div>
                         </div>

                      </div>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade exp-cover" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <div class="data-box">
                          <div class="sec-title">

                            <div id="profile-details">
                              <h1>Profile Details</h1>
                              <p><strong>Name:</strong><?php echo $user_data['first'] ?></p>
                              <p><strong>Age:</strong> <?php echo $user_data['age'] ?></p>
                              <p><strong>Phone No:</strong><?php echo $user_data['phone'] ?></p>
                              <p><strong>Place:</strong><?php echo $user_data['place'] ?></p>
                              <p><strong>Type Of Work:</strong><?php echo $user_data['type'] ?></p>
                          </div>
                                        
                                  </div>
                           
                       </div>
              </div>
              <div class="tab-pane fade exp-cover" id="resume" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="sec-title">
                                        <h2> </h2>
                                  </div>
                                   <div class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6></h6>
                                            
                                          </div>
                                          <div class="col-sm-9 rgbf">
                                              <h5> </h5>
                                              
                                          </div>
                                      </div>
                                      <div class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6></h6>
                                            <p> </p>
                                          </div>
                                          <div class="col-sm-9 rgbf">
                                              <h5> </h5>
                                              
                                          </div>
                                      </div>
                                      <div class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6></h6>
                                            <p></p>
                                          </div>
                                          <div class="col-sm-9 rgbf">
                                              <h5></h5>
                                              
                                          </div>
                                      </div>
                                      <div class="service no-margin row">
                                          <div class="col-sm-3 resume-dat serv-logo">
                                              <h6></h6>
                                            <p></p>
                                          </div>
                                          <div class="col-sm-9 rgbf">
                                              <h5> </h5>
                                             
                                          </div>
                                      </div>
              </div>
              <div class="tab-pane fade gallcoo" id="gallery" role="tabpanel" aria-labelledby="contact-tab">
                  <div class="row no-margin gallery">
                                          
                                          
                                      </div>
              </div>
              <div class="tab-pane fade contact-tab" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <!-- <div class="row no-margin"> -->
                                          <!-- <div class="col-md-6 no-padding">
                                               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3176144.0450019627!2d-107.79423426090409!3d38.97644533805396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C+USA!5e0!3m2!1sen!2sin!4v1547222354537"  frameborder="0" style="border:0" allowfullscreen></iframe>
                                          </div> -->
                                          
                                          <form action="editsec.php" method="POST">
                                            <div class="user-details">
                                              <div class="input-box">
                                                <span class="details">Name</span>
                                                <input type="text" name="first" placeholder="Enter your  name" required>
                                              </div>
                                              <div class="input-box">
                                                <span class="details">Email</span>
                                                <input type="text" name="mail" placeholder="Enter your Mail" required>
                                              </div>
                                              <div class="input-box">
                                                <span class="details">Age</span>
                                                <input type="text" name="age" placeholder="Enter your Age" required>
                                              </div>
                                              <div class="input-box">
                                                <span class="details">Phone</span>
                                                <input type="text" name="phone" placeholder="Enter your Phone No" required>
                                              </div>
                                              <div class="input-box">
                                                <span class="details">Place</span>
                                                <input type="text" name="place" placeholder="Enter your place" required>
                                              </div>
                                              <div class="input-box">
                                                <!-- <span class="details">Type of Works</span> -->
                                                <!-- <input type="text" name="type" placeholder="Enter your Work" required> -->
                                                <label for="dropdown">Type Of Works:</label>
                                                <!-- <div class="styled-select"> -->
                                                  <select id="dropdown" name="type">
                                                    <option value="select">Select</option>
                                                    <option value="Painter">Painter</option>
                                                    <option value="Carpenter">Carpenter</option>
                                                    <option value="Plumber">Plumber</option>
                                                    <option value="Mover">Mover</option>
                                                  </select>
                                              </div>
                                              <div class="button">
                                                <input type="submit" value="Submit">
                                              </div>
                                              
                                              
                                              
                                            </div>
                                            
                                          </form>
                                      <!-- </div> -->
              </div>
            </div>
        
    </div>
</body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>


</html>