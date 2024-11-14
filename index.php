<?php
require 'connect.php';
$id = $_GET['id'];
    echo $id;
    $result = mysqli_query($conn, "SELECT * FROM carts WHERE id= '$id'  ");
    $row11 = mysqli_fetch_assoc($result);

if(isset($_POST['class']) && isset($_POST['course'])){
    $class = $_POST['class'];
    $course = $_POST['course'];
    $query = "SELECT * FROM books  WHERE class = '$class' AND  course = '$course' ";
    $SearchResult = FilterTable($query);
}elseif(isset($_POST['clear'])) {
    $query = "SELECT * FROM books ORDER BY rand() LIMIT 10";
    $SearchResult = FilterTable($query); 
}elseif(isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM books  WHERE CONCAT (`firstname`, `lastname`, `class`, `course`, `studentid`, `parent-id`) LIKE '%".$search."%' ";
    
    $SearchResult = FilterTable($query);
}
else{
    $query = "SELECT * FROM books ORDER BY id DESC LIMIT 10";
    $SearchResult = FilterTable($query); 
}

function FilterTable($query){
    $connect = mysqli_connect('localhost', 'root', '', 'book');
    $FilterResult = mysqli_query($connect, $query);
    return $FilterResult;
}



?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/main2.css">
</head>
<body>
    <div id="head">
        <nav>
            <h1>ILARO <span class="span100">BOOKSTORE</span></h1>
            
                <form action="">
            <ul>
                <b><li><input type="search" name="search" class="input1" placeholder="search books..."></li></b>
                <b><li><input type="submit" name="submit" class="input2" value="search"></li></b>
                <!-- <b><li><a href="#"><img src="images/search.png" alt=""></a></li></b> -->
            </ul>
            </form>
            <div id="user">
                <a onclick="show()" id="show"><img src="images/cart.png" alt=""></a>
                <h1 class="span"></h1>
            </div>
            
        </nav>
        <div id="discount">
            <h1>Sale up to 50% Biggest Discount. <span class="span_1">Shop Here</span> to Grab Your Item!</h1>
        </div>
        <div id="heading">
            <div id="head-content">
                <h1>Bookstore Sale</h1> 
                <h2>Over 1000+ Books</h2> 
                <h3>Lorem, ipsum dolor sit amet consectetur adipisicing <br>elit. Labore perferendis odio eligendi quibusdam<br> qui voluptate dolor atque asperiores assumenda nulla?</h3>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </h1>
                <a href="#" class="start">SHOP NOW</a>
            </div>
            <div id="head-img">
                <img src="images/p2.jpg" alt="">
            </div>
        </div>

    </div>
    <div id="section_2a">
        <div class="nav2">
            <div class="category">
                <select name="category" id="category" class="categ">
                    <option value="science">Science</option>
                    <option value="fiction">Fiction</option>
                    <option value="politics">Politics</option>
                    <option value="business">Business</option>
                    <option value="biography">Biography</option>
                    <option value="nonfiction">Non-Fiction</option>
                    <option value="religion">Religion</option>
                    <option value="entertainment">Entertainment</option>
                    <option value="technology">Technology</option>
                </select>
                
                </form>
            </div>
            <ul>
                <b><li><a href="#section_2a" class="active">All</a></li></b>
                <b><li><a href="#section_2b">Science</a></li></b>
                <b><li><a href="#section_2c">Art</a></li></b>
                <b><li><a href="#">Management</a></li></b>
            </ul>
        </div>
    </div>

    <div class="shelf">
    <?php while($row = mysqli_fetch_array($SearchResult)):?>
        <div class="book">
            <div class="img">
                <img src="uploads/<?php echo $row['image'];?>" alt="">
                <div class="title">
                    <a href="show.php?id=<?php echo $row['id'];?>">CheckOut</a>
                </div>
                <div class="title2">
                    <h1><?php echo $row['title'];?></h1>
                    <div class="title3">
                        <h2><?php echo $row['author'];?></h2>
                        <h3>$<?php echo $row['price'];?></h3>
                    </div><br><br>
                    <a href="show1.php?id=<?php echo $row['id'];?>">Buy Now</a>
                </div>
            </div>
        </div>
        <?php endwhile;?>
    </div>

    <div class="shelf">
        <div class="book">
            <div class="img">
                <img src="images/p1.jpg" alt="">
                <div class="title">
                    <a href="#">CheckOut</a>
                </div>
                <div class="title2">
                    <h1>Nelson Mandela Auto Biography</h1>
                    <div class="title3">
                        <h2>Jules Belly</h2>
                        <h3>$11</h3>
                    </div><br><br>
                    <a href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="book">
            <div class="img">
                <img src="images/p2.jpg" alt="">
                <div class="title">
                    <a href="#">CheckOut</a>
                </div>
                <div class="title2">
                    <h1>h1e Species Of Extinction</h1>
                    <div class="title3">
                        <h2>Arnold Dave</h2>
                        <h3>$13</h3>
                    </div><br><br>
                    <a href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="book">
            <div class="img">
                <img src="images/p3.jpg" alt="">
                <div class="title">
                    <a href="#">CheckOut</a>
                </div>
                <div class="title2">
                    <h1>h1eory Of Optic Fibres</h1>
                    <div class="title3">
                        <h2>Eder Martins</h2>
                        <h3>$32</h3>
                    </div><br><br>
                    <a href="#">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="book">
            <div class="img">
                <img src="images/p4.jpg" alt="">
                <div class="title">
                    <a href="#">CheckOut</a>
                </div>
                <div class="title2">
                    <h1>Anabael h1e Gre Timer</h1>
                    <div class="title3">
                        <h2>Ray Confort</h2>
                        <h3>$20</h3>
                    </div><br><br>
                    <a href="#">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
      
    
    
    <div id="section_8">
        <div class="suscribe">
            <div class="cont">
                <h1>ILARO <span class="span">BOOKSTORE </span></h1>
                <h2>Suscribe to get Free 50% Discount</h2>
            </div>
            <div class="form">
                <input class="input1" type="text" placeholder="Enter Your Email">
                <input class="input2" type="submit" placeholder="submit">
            </div>
        </div>
        <div class="links">
            <div class="row">
                <img src="images/logo(1).png" alt="">
                <div id="section_7b">
                    <div class="service6">
                        <img src="images/icon-pay-01.png" alt="">
                    </div>
                    <div class="service6">
                        <img src="images/icon-pay-03.png" alt="">
                    </div>
                    <div class="service6">
                        <img src="images/icon-pay-04.png" alt="">
                    </div>
                    <div class="service6">
                        <img src="images/icon-pay-05.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script>
        function view(id){
            location.href= "show/"+ id;        
        }
    </script>  
</body>
</html>