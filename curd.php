
<?php
$insert=false;
$update=false;
$delete=false;
$servername='localhost';
$username='root';
$database='notes';
$password='';
$port=3306;

$conn=mysqli_connect($servername,$username,$password,$database,$port);
if(!$conn){
    echo '<div class="alert alert-primary" role="alert">
    Not able to make the Connection!
  </div>
  ';
}

if(isset($_GET['delete'])){
  $sno=$_GET['delete'];
  $delete=true;
  $sql="DELETE from `notes` WHERE `sno`=$sno";
  $result= mysqli_query($conn,$sql);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoEdit'])){
      $sno=$_POST['snoEdit'];
      $title=$_POST['titleEdit'];
      $description=$_POST['descriptionEdit'];
      $sql="UPDATE `notes` SET `title` = '$title', `description`='$description' WHERE `notes`.`sno` = $sno";
      $result=mysqli_query($conn,$sql);
      if($result){
        $update=true;
      }else{

      }

  }
  else{
  $title=$_POST['title'];
  $description=$_POST['description'];
  $sql="INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, '$title', '$description', current_timestamp());";
  $result=mysqli_query($conn,$sql);
  if($result){
    // echo "Record was inserted sucessfullly";
    $insert=true;
  }
  else{
    echo "Record was not able to insert Sucessfully because".mysqli_error($conn);
  }
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CURD</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
  </head>
  <body>
      <!-- Edit trigger modal -->
      <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Edit Modal
      </button> -->
      <!-- Edit Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="/vicky/curd.php" method="POST">
              <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="title" >Node Title</label>
              <input type="text" name="titleEdit" class="form-control" id="titleEdit" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
                <label for="description">Node Description</label>
                <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">UPDATE NOTE</button>
          </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">CURD</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <?php
        if($insert){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sucess!</strong> Your Note is inserted.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      ?>
      <?php
        if($update){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sucess!</strong> Your Note is Updated Sucessfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      ?>
      <?php
        if($delete){
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Sucess!</strong> Your Note is deleted Sucessfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
      ?>
          
    
      <div class="container" style="margin-bottom: 20px;">
      <h3 style="margin-left: 90px,margin-top:15px; ">Add a Note</h3>
        <form action="/vicky/curd.php" method="POST">
            <div class="mb-3">
              <label for="title" >Title</label>
              <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
              </div>
            <button type="submit" class="btn btn-primary">ADD NOTE</button>
          </form>
      </div>

      <div class="container my-8"> 
        <table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php
        $sql="SELECT * FROM `notes`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
          $sno+=1;
          echo "<tr>
          <th scope='row'>".$sno."</th>
          <td>".$row['title']."</td>
          <td>".$row['description']."</td>
          <td><button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button style='margin-right:5px'; class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button></td>
        </tr>";
        }
        ?> 
  </tbody> 
</table>
      </div>
      <hr>
      <script
			  src="https://code.jquery.com/jquery-3.6.4.min.js"
			  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
			  crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      let table = new DataTable('#myTable');
      </script>
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"></script>
      <script>
      edits=document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click", (e)=>{
           console.log("edit",); 
           tr=e.target.parentNode.parentNode;
           title= tr.getElementsByTagName("td")[0].innerText;
           description= tr.getElementsByTagName("td")[1].innerText;
           console.log(title,description);
           descriptionEdit.value=description;
           titleEdit.value=title;
           snoEdit.value=e.target.id;
           console.log(e.target.id);
           $('#editModal').modal('show');
        })
      })

      deletes=document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click", (e)=>{
           console.log("edit",); 
           sno=e.target.id.substr(1,);
           
          if(confirm("Press a Button!"))
          {
            console.log("yes");
            window.location=`/vicky/curd.php?delete=${sno}`;
          }
          else{
            console.log("no");
          }
        })
      })
    </script>
  </body>
</html>