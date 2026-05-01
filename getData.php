<?php
    include 'config.php';
    try{
        $selectDat = "SELECT * FROM ajax_tb ORDER BY id DESC";
        $result = $conn->query($selectDat);
        if($result){
            while($row = $result->fetch_assoc()){
                $id = htmlspecialchars($row['id']);
                echo '
                    <tr>
                        <td>'.$id.'</td>
                        <td>'.htmlspecialchars($row['name']).'</td>
                        <td>'.htmlspecialchars($row['gender']).'</td>
                        <td>'.htmlspecialchars($row['contact']).'</td>
                        <td>'.htmlspecialchars($row['salary']).'</td>
                        <td>'.htmlspecialchars($row['email']).'</td>
                        <td>'.htmlspecialchars($row['password']).'</td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm deleteCustomer" data-id="'.$id.'">Delete</button>
                        </td>
                    </tr>
                ';  
                }
        }else{
            echo 'error fetch';
        }

    }catch(Exception $e){
        echo 'error fetch'.$e->getMessage();
    }
