<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoLAND | Online Learning Platform</title>
  <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

  <?php include("cssExternal.html"); ?>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
      // Method for Shopping cart Items
      const display_cart_items = async () => {
        const t_body = document.getElementById('t-body');
        let parser = new DOMParser();

        t_body.innerHTML = "";

        // Empty Shopping cart case
        if (sessionStorage.getItem('id_arr') === null || JSON.parse(sessionStorage.getItem('id_arr')).length === 0) {
          let nodeString = `
            <table>
              <tbody>
                <tr>
                  <td colspan="3">No items in the Shopping Cart</td>
                </tr>
              </tbody>
            </table>
          `;
          let DOM = parser.parseFromString(nodeString, 'text/html');
          let nodeHTML = DOM.firstChild.children[1].children[0].children[0].children[0];
          
          t_body.append(nodeHTML);
        } else {
          // Items exit case
          let courses_id_arr = JSON.parse(sessionStorage.getItem('id_arr'));
          let courses_param = '?courses[]=' + courses_id_arr.join('&courses[]=');
          let total = 0;

          document.getElementById('total-display').innerText = "";

          let response = await fetch(`shoppingCartData.php${courses_param}`, { method: "GET" });
          let items = await response.json();

          items.forEach((item) => {
            let nodeString = `
              <table>
                <tbody>
                  <tr>
                    <td>
                      <a href="course.php?id=${item.Course_ID}"><img src="course_img/${item.Image}" alt="item" 
                        class="alignleft img-thumbnail">${item.Name}</a>
                    </td>
                    <td>£ ${item.Price}</td>
                    <td class="remove">
                      <a href="shoppingCart.php" class="remove-item" data-id="${item.Course_ID}">Remove</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            `;
            let DOM = parser.parseFromString(nodeString, 'text/html');
            let nodeHTML = DOM.firstChild.children[1].children[0].children[0].children[0];
            
            t_body.append(nodeHTML);
            total += parseFloat(item.Price);
          });

          document.getElementById('total-display').innerText = total;
        }
      }

      // Page loaded
      display_cart_items();

      // Remove Item from Shopping Cart
      const t_body = document.getElementById('t-body');

      t_body.addEventListener('click', (event) => {
        let elem = event.target;

        if (elem.tagName === 'A' && elem.classList.contains('remove-item')) {
          event.preventDefault();
          let id = elem.dataset.id;
          let id_arr = JSON.parse(sessionStorage.getItem('id_arr'));
          let index = id_arr.indexOf(id);

          // Remove the Index
          id_arr.splice(index, 1);
          sessionStorage.setItem('id_arr', JSON.stringify(id_arr));

          display_cart_items();         
        }
      });

      // Enroll & Payment impl
      const enroll = document.getElementById('enroll');

      enroll.addEventListener('click', async (event) => {
        event.preventDefault();
        document.getElementById('enroll-msg').innerText = "";

        if (sessionStorage.getItem('id_arr') === null || JSON.parse(sessionStorage.getItem('id_arr')).length === 0) {
          document.getElementById('enroll-msg').innerText = "Shopping Cart is Empty.";
          setTimeout(() => window.location.href = "coursesView.php", 1500);
        } else {
          let items = JSON.parse(sessionStorage.getItem('id_arr'));

          let response = await fetch('coursesEnroll.php', {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(items)
          })
          let res = await response.json();

          if (res.msg) document.getElementById('enroll-msg').innerText = res.msg;
          if (res.success) {
            sessionStorage.removeItem('id_arr');
            sessionStorage.clear();
            setTimeout(() => window.location.href = "profile.php", 1500);
          }
        }
      })
    });
  </script>
</head>
<body>
  <?php include("loader.html"); ?>

  <div id="wrapper">
    <?php include("topbar_header.php"); ?>

    <section class="grey section">
      <div class="container">
        <div class="row">
          <div id="content" class="col-md-12 col-sm-12 col-xs-12">
            <div class="blog-wrapper">
              <div class="row second-bread">
                <div class="col-md-6 text-left">
                  <h1>Shopping Cart & Enroll</h1>
                </div>
                <div class="col-md-6 text-right">
                  <div class="bread">
                    <ol class="breadcrumb">
                      <li><a href="index.php">Home</a></li>
                      <li class="active">Cart & Enroll</li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <div class="blog-wrapper">
              <div class="blog-desc">
                <div class="shop-cart">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Item Name</th>
                        <th>Item Price</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody id="t-body">                      
                      <!-- Data Rendered by javascript -->


                      <!-- Data Rendered by javascript -->
                    </tbody>
                    <tfoot>
                      <tr>
                        <th colspan="5" class="text-right">
                          Total: £ <span id="total-display">0.00</span>
                        </th>
                      </tr>                      
                    </tfoot>
                  </table>                  
                  <hr class="invis">                                   
                  <button id="enroll" class="btn btn-primary">Enroll & Pay</button>
                  <p id="enroll-msg" class="text-danger"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include("footer_copyright.php"); ?>
  </div>

  <?php include("jsExternal.html"); ?>
</body>
</html>