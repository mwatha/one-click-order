 var count = 0;                                                                

  function setInnerHtmlData(id,product,item_name,price,path,product_id,product_type,category) {                                   
    var url = "viewmore.php?product_id=" + product_id + "&product_type=" + product_type;
    td = document.getElementById(id);                                           
    td.className = "data";                                                      
    td.innerHTML = "<a href =" + url + "><img src='" + path + "' width='170' height='150' /></a><br />";
    if (category=="music") {
      td.innerHTML += "<span>Artist:&nbsp;<font style='color:blue;'>" +  product + "</font></span><br />";               
      td.innerHTML += "<span>Album:&nbsp;<font style='color:blue;'>" +  item_name + "</font></span><br />";               
    }else if(category == "video") {
      td.innerHTML += "<span>Title:&nbsp;<font style='color:blue;'>" +  product + "</font></span><br />";               
      td.innerHTML += "<span>Category:&nbsp;<font style='color:blue;'>" +  item_name + "</font></span><br />";               
    }else if(category == "gadget") {
      td.innerHTML += "<span>Name:&nbsp;<font style='color:blue;'>" +  product + "</font></span><br />";               
      td.innerHTML += "<span>Version:&nbsp;<font style='color:blue;'>" +  item_name + "</font></span><br />";               
    }
    td.innerHTML += "<span>Price:&nbsp;<font style='color:blue;'>$" +  price + "</font></span><br />";                 
    td.innerHTML += "<button onclick='add(" + product_id + ");'>Add to cart</button>";                 
  }                                                      



  function add(product_id) {
    var quantity = document.getElementById("quantity" + product_id);
    if (quantity) {
      quantity = quantity.value;
      if (quantity.length < 1)
        return;

    }else{
      quantity = 0;
    }

    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp=new XMLHttpRequest();                                             
    }else{// code for IE6, IE5                                                  
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");                           
    }                                                                           
    xmlhttp.onreadystatechange=function() {                                     
      if (xmlhttp.readyState==4 && xmlhttp.status==200) {                       
        var results = xmlhttp.responseText;                                     
        var r = results.split(',');
        var html = "";
        var total = 0;
        html+="<tr>";
        html+="<td style='color:black;'>Name</td>";
        html+="<td style='color:black;'>Qty</td>";
        html+="<td style='text-align:right;padding-right:10px;color:black;'>Price</td>";
        html+="</tr>";
        for (var i = 0; i < r.length; i++) {
          var name = r[i].split(':')[0];
          var price = r[i].split(':')[1];
          var quantity = r[i].split(':')[2];
          if(name == 'undefined' || name == '') {
            break;
          }
          html+="<tr>";
          html+="<td>" + name + "</td>";
          html+="<td>" + quantity + "</td>";
          html+="<td style='text-align:right;padding-right:10px;'>₤ " +  ((parseFloat(price) * parseFloat(quantity))).toFixed(2); + "</td>";
          html+="</tr>";
          html+="<tr>";
          html+="<td colspan='3'><hr /></td>";
          html+="</tr>";
          total+=(parseFloat(price) * parseFloat(quantity));
        }
        html+="<tr>";
        html+="<td colspan='3' style='color:black;font-weight:bold;font-size:13px;'><span style='float:left;'>Total";
        html+="</span><span style='float:right;padding-right:10px;'>₤ " + Math.round(100*(total))/100 + "</span></td>";
        html+="</tr>";
        html+="<tr>";
        html+="<td colspan='3'><hr /></td>";
        html+="</tr>";
        document.getElementById("cart").innerHTML = html;
        updateCredit(total);
      }                                                                         
    }                                                                           
    xmlhttp.open("GET","addtocart.php?product_id="+product_id+"&quantity="+quantity,true);    
    xmlhttp.send();
  }                      


  function updateCredit(credit) {
    user_credit = document.getElementById("user-credit");
    if(user_credit) {
      c =  (parseFloat(user_credit.value) - (credit)).toFixed(2);
      html ="<tr>";
      html+="<td colspan='3'>Total remaining credit:&nbsp;₤ " + c + "</td>";
      html+="</tr>";
      html +="<tr>";
      html+="<td colspan='3'><hr /></td>";
      html+="</tr>";
      if(c > 0 && credit > 0) {
        html +="<tr>";
        html+="<td colspan='3'><a style='width: 90%;' class='btn' href='order.php'>Press an order</a></td>";
        html+="</tr>";
        html +="<tr>";
        html+="<td colspan='3'><hr /></td>";
        html+="</tr>";
      }
      document.getElementById("credit").innerHTML = html;
    }else{
      return
    }
  }
