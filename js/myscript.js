$(document).ready(function(){
  
  $("#loginAsAdmin").click(function(){
        $(".loginAsAdminForm").slideToggle("slow")
    });

   $("#loginAsEmployee").click(function(){
        $(".loginAsEmployeeForm").slideToggle("slow");
	});
   $("#loginAsadmin").click(function(){
        $(".loginAsAdminForm").slideToggle("slow")
    });

   $("#loginAsuser").click(function(){
        $(".loginAsEmployeeForm").slideToggle("slow");
  });

   $("#modifyEmployee").click(function(){
    	$(".updatePostEmploueeManagement").slideToggle("fast");
	});
   $("#modifyProduct").click(function(){
      
      $(".updatePostProductManagement").slideToggle("fast");
  });
    $("#modifyProd,#editProduct").click(function(){
      
      $(".updatePostProductManagement").slideToggle("fast");
  });
   $("#delateEmployees").click(function(){
      $(".delateEmployeeform").slideToggle("fast");
  });
   $("#removeProduct,#getRidOfProduct").click(function(){
      $(".delateProductform").slideToggle("fast");
  });
    $("#deleteSal").click(function(){
      $(".updatePostProductManagement").slideToggle("fast");
  });

});