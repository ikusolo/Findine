        
    <div class="container-fluid cust_table" style="display:none">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-8"><h2>Customer <b>Orders</b></h2></div>
                        <div class="col-sm-4">
                            <div class="search-box table">
                                <form method="POST" action="">
                                <i class="material-icons">&#xE8B6;</i>
                                <input type="text" class="form-control" placeholder="Search&hellip;" id="custsearch">
                            </form>
                            </div>
                            <div id="custresult"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered ">
                    <thead class='table-info'>
                        <tr>
                            <th>S/N</th>
                            <th>Order Id</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email Address</th>
                            <th>Food</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "finapjtconn.php";
                        $obj=new Restaurant;
                        $output=$obj->listorder($_SESSION['id'])

                        ?>
                        <?php
                        $counter=1;
                        foreach ($output as $key => $value) {
                           ?>
                        

                         
                        <tr>
                            <td><?php echo $counter++; ?></td>
                            <td><?php echo $value['order_id'] ; ?></td>
                            <td id="<?php echo $value['custom_fname'] ; ?>"><?php echo $value['custom_fname'] ; ?></td>
                            <td><?php echo $value['custom_lname'] ; ?></td>
                            <td><?php echo $value['custom_address'] ; ?></td>
                            <td><?php echo $value['custom_phone_num'] ; ?></td>
                            <td><?php echo $value['custom_email'] ; ?></td>
                            <td><?php echo $value['food_name'] ; ?></td>
                            <td>&#8358;<?php echo $value['total_amt'] ; ?></td>
                            <td><?php echo $value['order_status'] ; ?></td>
                            <td><?php echo $value['total_qty'] ; ?></td>
                            <td><?php echo $value['order_date'] ; ?></td>
                            <td>
                                <a href="deleterestorder.php?orderid=<?php echo $value['order_id']?>" class="btn btn-info" id='confirm'>DELETE</a>
                                
                            </td>
                            <?php
                        }
                            ?>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div> 
    </div>      
