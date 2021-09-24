<?php include_once "dbconstant.php"; ?>
<!DOCTYPE html>
<html lang="en">
        <head>
          <meta name='keyword' content='findine,finedine website,restaurant finder in lagos,restaurant finder in nigeria,restaurant,reservation,eatery,classical restaurants in lagos,food delivery,,desert,dish,cuisine,clasical restaurant,best restaurants in lagos'>
          <meta name='description' content='Finedine is an online restaurant finder where you can order food '>
          <meta name='author' content='Ikuyinminu Solomon'>
	        <meta charset="utf-8">
	        <meta='viewport' content='width=device-width,initial-scale=1, shrink-to-fit=no'>
	        <link href='css/bootstrap.css' rel='stylesheet' type='text/css'>
           <link rel='stylesheet' type='text/css' href='fontawesome/css/all.css'>
            <title><?php echo APP_NAME ?>|About us</title>
            <style type='text/css''>
            #image {
            height: 300px;
            position: relative;
            background-image:url('picture/bbb.jpg');
            background-size:cover;
             }
    
              #tv,#abt {
               height: 850px;
                background:rgb(240,240,240);
                border-radius: 50% / 10%;
              
               }
               

                section {
                height: 50vh;
                display: flex;
                text-align: center;
                }
                #about{
                  font-size: 70px;
                  color:#fff;
                  text-align:center;
                  margin-top: 50px;

                }

        


          </style>
              </head>
                  <body>
                      <div class='container'>

                       <?php include "findinenavbar.php" ?>
                        <div class='row' id='image'>
                          <div class='col-md-12'>
                            <p id="about">ABOUT FINDINE</p>
                          </div>
                        </div>

                        <div class='row' id='tv'>
                          <div class='col-md-12'>
                            <h1 class='mt-5' style='font-family:gabriola,serif;text-align:center;'>WHO WE ARE</h1>
                            <p>Launched in 2021, Our technology platform connects customers and restaurant partners serving their multiple needs. Customers use our platform to search and discover restaurants,order food . On the other hand, we provide restaurant partners with industry-specific marketing tools which enable them to engage and acquire customers to grow their business while the restaurant provide a reliable and efficient last mile delivery service.Findine is on a mission to transform the way customers eat. A key ingredient of our success is having the best selection of popular restaurants to choose from. Whether people want a Swallow in the evening, a salad at lunch, or freshly scrambled eggs for breakfast - we’ve got it covered.By constantly innovating and expanding, we offer the best choice and convenience.</p>
                          </div>
                        </div>
                          <div class='row' id='abt'>
                          <div class='col-md-12'>
                       <div class='mt-5' style='width:200px;height:200px;border-radius:100%;float:left;'><img src='picture/myself.jpg'style='width:200px;height:200px;border-radius:100%'></div>
                    <h2 class='mt-5' style="text-align:center;color:#000000;font-family:gabriola,serif;">THE DEVELOPER</h2>
                    <p class='mt-5' style='color:#000000'> Ikuyiminu Solomon hail from Ondo State.He's career-driven software Developer and businessman with over 10 years experience.He has always sought out opportunities and challenges that are meaningful to him. Although 

                    his professional path has taken many twists and turns,from working as a teacher to working as an hotelier to being who he is today.He has never stopped engaging his passion to help others and solve problems.

                    As a software developer and businessman, he enjoy using his obsessive attention to detail,his unequivocal love for making things, and his mission-driven work ethic to literally change the world. That's why he's excited to make a big impact at a high growth company.

                      </p>
                  </div>
                  </div>
                </div>
                          
                        
                        
               <?php include "findinefooter.php" ?>
       <!--jsvascript files ,jquery, popper,bootstrap-->
       <script type='text/javascript' src='js/jquery.min.js'></script>
       <script type='text/javascript' src='js/popper.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.js'></script>
        </body>
</html>