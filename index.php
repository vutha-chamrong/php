<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container mt-5">
    <div>
      <div class="d-flex justify-content-between">
        <h3>Customer List</h3>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" id="AddUser" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Add +
        </button>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Header -->
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle">Modal User</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

            </div>

            <!-- Body -->
            <div class="modal-body">

              <form action="" method="POST">

                <!-- Name -->
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required>

                </div>

                <!-- Gender -->
                <div class="mb-3">
                  <label class="form-label">Gender</label>
                  <select name="gender" class="form-select" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    

                  </select>
                </div>

                <!-- Contact -->
                <div class="mb-3">
                  <label class="form-label">Contact</label>
                  <input type="text" name="contact" class="form-control" required>

                </div>

                <!-- Salary -->
                <div class="mb-3">
                  <label class="form-label">Salary</label>
                  <input type="number" name="salary" class="form-control" required>

                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" required>

                </div>

                <!-- Password -->
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" required>

                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-end gap-2">
                  <button type="submit" class="btn btn-danger w-100">
                    cancel
                  </button>
                  <button type="submit" class="btn btn-primary w-100">
                    create account
                  </button>
                </div>

              </form>

            </div>

          </div>
        </div>
      </div>

      <table class="table table-bordered table-striped mt-4">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Salary</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tableCustomer"></tbody>
      </table>
    </div>
  </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#AddUser").click(function(){
            $("#modalTitle").text("user")
            $("#name").value('')
            $("#gender").value('')
            $("#contacte").value('')
            $("#salary").value('')
            $("#email").value('')
            $("#password").value('')
        })
        $("#Btnsave").click(function(){
            // get value
           let name = $("#name").value('')
           let gender = $("#gender").value('')
           let contacte = $("#contacte").value('')
           let salary = $("#salary").value('')
           let email = $("#email").value('')
           let password =$("#password").value('')

           console.log(name)
           console.log(email)
           ///check validate
           if(!name || !email || !password){
                alert("name and password and email and id  ");
                return;
           }
           let url = id? ' udate.php' : 'store.php'
           let date = id?
           {name, geender,contact,salary,email,password}
           : {name,geender,contact,salary,email,password}
           
           $.ajax({
            type: "method",
            url: "url",
            data: "data",
            dataType: "dataType",
            success: function (response) {
              
            }

           });
        })
        function loadData(){
            $.ajax({
                type: "GET",
                url: "getData.php",
                success: function (response) {
                    $("#tableCustomer").html(response)
                }
            });
        }

        $(document).on("click", ".deleteCustomer", function(){
            let id = $(this).data("id");

            if(!confirm("Delete this customer?")){
                return;
            }

            $.ajax({
                type: "POST",
                url: "delete.php",
                data: { id: id },
                success: function (response) {
                    if(response.trim() === "success"){
                        loadData();
                    }else{
                        alert(response);
                    }
                },
                error: function () {
                    alert("Delete failed");
                }
            });
        });

        loadData();
    })
</script>
</html>
