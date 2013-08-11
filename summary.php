

<style>
.table-container {
}

.btn {
   border-bottom-color: rgba(0, 0, 0, 0.25);
    border-left-color-ltr-source: physical;
    border-left-color-rtl-source: physical;
    border-left-color-value: rgba(0, 0, 0, 0.1);
    border-right-color-ltr-source: physical;
    border-right-color-rtl-source: physical;
    border-right-color-value: rgba(0, 0, 0, 0.1);
    border-top-color: rgba(0, 0, 0, 0.1);

   -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: rgb(245, 245, 245);
    background-image: -moz-linear-gradient(center top , rgb(255, 255, 255), rgb(230, 230, 230));
    background-repeat: repeat-x;
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
    border-bottom-style: solid;
    border-bottom-width: 1px;
    border-image-outset: 0 0 0 0;
    border-image-repeat: stretch stretch;
    border-image-slice: 100% 100% 100% 100%;
    border-image-source: none;
    border-image-width: 1 1 1 1;
    border-left-color-ltr-source: physical;
    border-left-color-rtl-source: physical;
    border-left-color-value: rgb(230, 230, 230);
    border-left-style-ltr-source: physical;
    border-left-style-rtl-source: physical;
    border-left-style-value: solid;
    border-left-width-ltr-source: physical;
    border-left-width-rtl-source: physical;
    border-left-width-value: 1px;
    border-right-color-ltr-source: physical;
    border-right-color-rtl-source: physical;
    border-right-color-value: rgb(230, 230, 230);
    border-right-style-ltr-source: physical;
    border-right-style-rtl-source: physical;
    border-right-style-value: solid;
    border-right-width-ltr-source: physical;
    border-right-width-rtl-source: physical;
    border-right-width-value: 1px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-top-style: solid;
    border-top-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: rgb(51, 51, 51);
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    line-height: 18px;
    margin-bottom: 0;
    padding-bottom: 4px;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 4px;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    vertical-align: middle;
    -moz-text-blink: none;
    -moz-text-decoration-color: -moz-use-text-color;
    -moz-text-decoration-line: none;
    -moz-text-decoration-style: solid;
}

.orders th {
  border-style: solid !important;
  border-width: 0px; 0px; 1px 0px !important;
}

</style>




<div class="table-container">
            <table class="orders" style="width: 100%;">                                                          
              <tr>                                                                          
                <th style="text-align: left;width: 60%;">Product</th>                                                
                <th style="text-align: right;">Price</th>                                   
                <th style="text-align: right;">Quantity</th>                                
                <th style="text-align: right;">Total cost</th>                              
                <th style="text-align:center;">&nbsp;</th>                                  
              </tr>          
              
              <?php
                $total = 0;
                $product_ids = explode(",", $_SESSION["cart"]);
                $product_quantities =  $_SESSION["quantity"];
                for($i=0; $i < count($product_ids); $i++) {
                  $shoe_id = $product_ids[$i];
                  $query = "SELECT shoe_id, name, price, quantity FROM shoes WHERE shoe_id = $shoe_id;"; 
                  $results = mysql_query($query,$db);            
                  $r = mysql_fetch_row($results);   
              ?>
              <tr>                                                                        
                <td style="text-align: left;"><?php echo $r[1]; ?></td>                                             
                <td style="text-align: right;"><?php echo $r[2]; ?></td>                                             
                <td style="text-align: right;"><?php echo $product_quantities[$product_ids[$i]]; ?></td> 
                <?php
                  $product_cost = ($r[2] *  $product_quantities[$product_ids[$i]]);
                  $total += $product_cost;
                ?>                                            
                <td style="text-align: right;"><b><?php echo $product_cost; ?></b></td>                                             
                <td style="text-align:center;">
                  <!--input type="checkbox" id="<?php //echo $r[5]; ?>" 
                    onclick="javascript:removeItem(this)" / -->
                </td>                                             
              </tr>                                                         
             <?php
                } ?>

             <?php if($product_ids){ ?>                                                    
                <tr>                                                                        
                  <td colspan="3" style="text-align:left;background-color:lightblue;font-weight:bold;">Total cost</td>
                  <td style="text-align:right;background-color:lightblue;font-weight:bold;">$<?php echo $total ?></td>
                </tr>                                                                       
                <tr>                                                                        
                  <td colspan="4">&nbsp;</td>                                               
                </tr>                                                                       
                <tr>                                                                        
                  <td colspan="2"></td>                                                     
                  <td style="text-align: right;"><a class="btn" href="cancelorder.php">Cancel order</a></td>
                  <td style="text-align: right;"><a class="btn" href="createorder.php">Process order</a></td>
                </tr>                                                                       
              <?php } ?>
              </table>
           </div>
