<?php 
  session_start(); 
  require "db_config.php";
  
  // Display all categories in Filtering bar
  $sql = "SELECT DISTINCT Category FROM course";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InfoLAND | Online Learning Platform</title>
  <link rel="shortcut icon" href="images/tabicon.ico" type="image/x-icon" />

  <?php include("cssExternal.html"); ?>
</head>
<body>
  <?php include("loader.html"); ?>

  <div id="wrapper">
    <?php include("topbar_header.php"); ?>

    <section class="grey page-title">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <h1>Courses List</h1>
          </div>
          <div class="col-md-6 text-right">
            <div class="bread">
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Courses List</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="white section">
      <div class="container">
        <div id="filters" class="filters-dropdown">
          <ul id="category-filter" class="option-set">
            <li><a href="coursesView.php" data-param="*"><i class="fa fa-filter"></i> All Courses</a></li>
            <li><a href="coursesView.php" data-param="free">Free</a></li>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <li><a href="coursesView.php" data-param="<?= $row['Category']; ?>"><?= $row['Category']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
        <div class="widget-title">
          <h4><span id="records-count">10</span> Records Found <i class="fa fa-search"></i></h4>
        </div>
        
        <div id="courses-container" class="row">
          <!-- Courses Data rendered by JS -->
          
          
          <!-- Courses Data rendered by JS -->
        </div>
       
      </div>
    </section>

    <section class="grey section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-title text-center">
              <h4>Meet Our Learners</h4>
              <p>What Our Learners Say About InfoLAND</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="testimonial">
              <img class="alignleft img-circle" src="upload/xstudent_01.png.pagespeed.ic.756JwMcqdq.png" alt="student1">
              <p>Lorem Ipsum is simply dummy text of the printing and industry. </p>
              <div class="testimonial-meta">
                <h4>John DOE <small><a href="mailto:JohnDOE.com">.com</a></small></h4>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="testimonial">
              <img class="alignleft img-circle" src="upload/xstudent_02.png.pagespeed.ic.y-PM-y4pVj.png" alt="student2">
              <p>Lorem Ipsum is simply dummy text of the most popular items.</p>
              <div class="testimonial-meta">
                <h4>Jenny Anderson <small><a href="mailto:JennyAnderson.com">.com</a></small></h4>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="testimonial">
              <img class="alignleft img-circle" src="upload/xstudent_03.png.pagespeed.ic.uCQY3WNMCJ.png" alt="student3">
              <p>Lorem Ipsum is simply dummy text of the printing.</p>
              <div class="testimonial-meta">
                <h4>Mark BOBS <small><a href="mailto:MarkBOBS.com">.com</a></small></h4>
              </div>
            </div>
          </div>
        </div>
        <div class="button-wrapper text-center">
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since<br> the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. </p>
        </div>
      </div>
    </section>

    <?php include("footer_copyright.php"); ?>
  </div>
 
  <script type="text/javascript">
    // Fetch Method for Courses data
    const coursesDataFetch = async (parameter) => {
      const container = document.getElementById('courses-container');
      const records = document.getElementById('records-count');
      let param = parameter;

      // Prepare for Data Rendering
      records.innerHTML = "";
      container.innerHTML = "";
      
      let response = await fetch(`coursesViewData.php?param=${param}`, { method: "GET" })
      let courses = await response.json();

      // Records empty or not
      if (courses.empty) {
        records.innerHTML = 0;
        container.innerHTML = courses.msg;
      } else {
        // DOM parser from String to HTML element
        let parser = new DOMParser();
        let counter = 0;

        courses.forEach((course) => {
          // Parse String to HTML
          let nodeString = `
            <div class="col-sm-4 col-md-3" style="margin-bottom: 60px;">
              <div class="shop-item-list entry">
                <div>
                  <img src="course_img/${course.Image}" alt="courseImg">
                  <div class="magnifier"></div>
                </div>
                <div class="clearfix" style="max-height: 50px">
                  <h4><a href="course.php?id=${course.Course_ID}">${course.Name}</a></h4>
                </div>
                <div class="visible-buttons">
                  <a title="Add to Cart" href="coursesView.php" class="add-to-cart" data-id="${course.Course_ID}">
                    <span class="fa fa-cart-arrow-down add-to-cart"></span></a>
                  <a title="Read More" href="course.php?id=${course.Course_ID}"><span class="fa fa-search"></span></a>
                </div>
              </div>
            </div>
          `;
          let DOM = parser.parseFromString(nodeString, 'text/html');
          let nodeHTML = DOM.firstChild.children[1].firstChild;

          // Append each course
          container.append(nodeHTML);
          counter++;
        });
        records.innerHTML = counter;
      } 
    }

    // Page loaded
    coursesDataFetch('*');

    // Filter by Course Category
    const filter_category = document.getElementById('category-filter');

    filter_category.addEventListener('click', (event) => {
      event.preventDefault();
      let elem = event.target;

      if (elem.tagName === 'A') {
        let param = elem.dataset.param;
        coursesDataFetch(param);
      }
    });

    // Add to Shopping cart
    const container = document.getElementById('courses-container');
    let session_id_arr;

    if (sessionStorage.getItem('id_arr') === null) {
      session_id_arr = [];
    } else {
      session_id_arr = JSON.parse(sessionStorage.getItem('id_arr'));
    }

    container.addEventListener('click', async (event) => {
      let elem = event.target;
      
      if ((elem.tagName === 'A' || elem.tagName === 'SPAN') && elem.classList.contains('add-to-cart')) {
        event.preventDefault();
        let id = elem.tagName === 'A' ? elem.dataset.id : elem.parentElement.dataset.id;
        
        // Request to check whether authorised and meets Entry LP
        let response = await fetch(`addToShoppingCart.php?id=${id}`, { method: "GET" });
        let res = await response.json();

        if (res.msg) alert(res.msg);
        if (res.need_auth) setTimeout(() => window.location.href = "register_login.php", 1000);
        if (res.valid) {
          if (session_id_arr.length === 0) {
            session_id_arr.push(id);
          } else {
            if (!session_id_arr.includes(id)) {
              session_id_arr.push(id);
            }
          }
          // Store Unique courses in the Session
          sessionStorage.setItem('id_arr', JSON.stringify(session_id_arr));
        }
      }
    });
  </script>
  <?php include("jsExternal.html"); ?>
</body>
</html>

<?php mysqli_close($conn); ?>