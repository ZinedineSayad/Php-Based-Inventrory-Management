<?php
  include_once "admin_functions/manageSells.func.php";
?>
<div class="dashboardMenu">
  <a href="index.php?page=addEmployee" class="waves-effect waves-light btn"><i class="material-icons right">person_add</i>Add an Employee</a>
  <a href="index.php?page=manageEmployee" class="waves-effect waves-light btn"><i class="material-icons right">group</i>Manage Employees</a>
  <a href="index.php?page=addProduct" class="waves-effect waves-light btn"><i class="material-icons right">add_box</i>Add a Product</a>
  <a href="index.php?page=manageProduct" class="waves-effect waves-light btn"><i class="material-icons right">edit</i>Manage Products</a>
  <a href="index.php?page=addSell" class="waves-effect waves-light btn"><i class="material-icons right">add_circle</i>Add a sale</a>
  <a href="index.php?page=manageSells" class="waves-effect waves-light btn"><i class="material-icons right">toc</i>Manage Sales</a>
  <!--view_list -->
  <a href="index.php?page=sellsState" class="waves-effect waves-light btn"><i class="material-icons right">list</i>sales State</a>
  <a href="index.php?page=productState" class="waves-effect waves-light btn"><i class="material-icons right">list</i>Product State</a>
</div>

<head>
  <style type="text/css">
   
    table {

      margin: auto;
      font-family: "Lucida Sans Unicode", "calibri", "Segoe Ui";
      font-size: 20px;
    }

    table td {
      transition: all .5s;
    }
    .ne:hover{
      text-decoration:underline; 
    }
  </style>
</head>
<div class="dashboardCore" >
  <h1 class="flow-text" style="text-align: center;"><b>Sales status</b></h1>

  <table class="highlight data-table" style="font-size: 0.85em;">

    <thead style="background-color: #508abb; color: #FFFFFF; border-color: #6ea1cc !important;">
      <tr class="white-text text-darken">
        <th>sold by</th>
        <th>Butch</th>
        <th>Sale_Number</th>
        <th>Chifa</th>
        <th class="ne"><a  href="#" id="deleteSal"><b>Delete</b></a></th>
      </tr>
    </thead>
    <?php
    
    $total  = 0;
    foreach (display_sells() as $sells)
  {
    ?>
            <tbody>
            <tr>
                <td title="check manage Employee section "><?=$sells['name_emp']?></td>
                <td><?=$sells['id_lot']?></td>
                <td><?=$sells['id_s']?></td>
                <td><?=$sells['type']?></td>
                <td><i class="material-icons ">delete</i></td>
              </tr>
          </tbody>
            <?php
          }?>

  </table>

</div>
<?php
      if(isset($_POST['delateSale'])){
              $ids=htmlspecialchars(trim($_POST['id_s']));

              if(!empty($ids)){
              global $db; 
            $stmt = $db->prepare("DELETE FROM sales where id_s =  :id");
            $stmt->execute(array('id' =>$_POST['id_s']));
            
          $r=$db->prepare("UPDATE product SET total_cost=Qtt*PPA");
          $r->execute();
          $r->closeCursor();
                
              }else{?>
              <div class="dashboardErrorAddEmployee">
                  <p><?php echo "please enter Batch number";?></p>
                </div><?php
              }
            }
    ?>
<div class="updatePostProductManagement">
<p>do you want to delate a sale? please set the identifier</p>
  <form action="index.php?page=sellsState" method="POST">
    <div class="row">
        <div class="col s12 m12">
          <input type="text" name="id_s" placeholder="identifier" autocomplete="off">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12">
         <input type="submit" name="delateSale" value="Remove" class="btn wave-effect wave-light red">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12">
          <input type="submit" name="concelEmp" value="concel" class="btn wave-effect wave-light red">
        </div>
      </div>

  </form>
</div>