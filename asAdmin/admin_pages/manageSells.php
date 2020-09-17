<?php
  include_once "admin_functions/manageSells.func.php"
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
  <h1 class="flow-text" style="text-align: center;"><b>Sales Management</b></h1>

  <table class="highlight data-table" style="font-size: 0.85em;">

    <thead style="background-color: #508abb; color: #FFFFFF; border-color: #6ea1cc !important;">
      <tr class="white-text text-darken">
        <th>Number</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>sold_date</th>
        <th>Cost (DA)</th>
        <th>Chifa</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $sql = 'SELECT * FROM sales';
    $stmt= $db->prepare($sql);
    $stmt->execute();
    $total  = 0;
    while ($row = ($row = $stmt->fetch(PDO::FETCH_ASSOC)))
    {
      $row['Total'] == 0 ? '' : number_format($row['Total']);
      
      echo '<tr>
          <td>'.$row['id_s'].'</td>
          <td>'.$row['name'].'</td>
          <td>'.$row['Qtt'].'</td>
          <td>'. date('F d, Y') . '</td>
          <td>'.($new=$row['Total'] * $row['Qtt']).'</td>
          <td>'.$row['type'].'</td>
        </tr>';
      $total += $new;
    }?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="4">TOTAL</th>
        <th><?=number_format($total, 2, ',', '')?></th>
      </tr>
    </tfoot>
          </table>

</div>
