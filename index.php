<?php
include('./private/db.php');

session_start();
echo $_SESSION['name'] = 'edison';
session_destroy();
echo $name = "<h1>bobby</h1>";
//variables
/*
global
local
*/


// $id = 1;
// $fname = "Bobby";
// $lname = "Builder";
// $rate = 8.5;


// $completeName = getName();
// $array = ['Mark', 30, 9.5, 'New York City'];
// $array = array(
//     'name' => 'Mark',
//     'age' => 30,
//     'rate' => 9.5,
//     'hometown' => 'New York City'
// );

// echo count($array);
//concatenate "."
// echo "<h1>Hello World<h1>"; //element or message
// print_r($array);
// echo 'Name:' . $name . ' Rate:' . $rate;
// $description = "";
// $description .= "Name:";
// $description .= getName($fname, $lname);;
// $description .= " Rate:";
// $description .= $rate;
// echo $description;




// echo $rate + $id;

//condition
// if ($fname != null) {
//     echo $fname;
// }

// if (!empty($fname)) {
//     echo $fname;
// }
// $rate = '1';
// if ($id === $rate) {
//     echo "same";
// } else {
//     echo "not same";
// }

// if (isset($id)) {
//     echo "id is set" . $id;
// } else {
//     echo "Id not set";
// }



//loops and arrays

// for ($i = 0; $i < count($array); $i++) {
//     echo $array[$i] . '<br>';
// }

// foreach ($array as $i) {
//     echo "<br>" . $i . "<br>";
// }

//functions
// function getName($fname = '', $lname = 'builder')
// {
//     global $fname;
//     return $fname . " " . $lname;
// }


//database functions
function printArr($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

unset($_POST);

if (isset($_POST['s']) and $_POST['s'] == 1) {
    printArr($_POST);
    //     printArr($_FILES);

    $errors = [];
    $countError = 0;

    $name = strip_tags($_POST['name']);
    $salary = strip_tags($_POST['salary']);

    $name = $conn->real_escape_string($name);
    $salary = $conn->real_escape_string($salary);
    if (empty($name)) {
        array_push($errors, "Name Required");
        $countError++;
    }
    if (empty($salary)) {
        array_push($errors, "Salary Required");
        $countError++;
    }

    if ($countError == 0) {
        $sql = "INSERT INTO test (name, salary) VALUES ('$name', '$salary')";
        if ($conn->query($sql) === TRUE) {
            echo "Successfully Inserted";
        } else {
            echo "Sql" . $sql . "Error" . $conn->errno;
        }
        unset($sql);
    } else {
        // printArr($errors);
        foreach ($errors as $error) {
            echo '<div class="alert alert-danger" role="alert">';
            echo $error;
            echo '</div>';
        };
    }
}
?>


<!--  <form method="POST" action="<?php //$_SERVER['PHP_SELF'] 
                                    ?>" enctype="multipart/form-data">
     <label for="name">name</label><input type="text" name="name" id="name">
     <label for="salary">salary</label><input type="text" name="salary" id="salary">
     <input type="file" name="image" id="image">
     <input type="submit" value="Submit" name="submit">
 </form> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <form method="POST" action="<?php echo strip_tags($_SERVER['PHP_SELF'])
                                ?>">
        <label for="name">name</label><input type="text" name="name" id="name">
        <label for="salary">salary</label><input type="text" name="salary" id="salary">
        <input type="submit" value="Submit" name="submit">
        <input type="hidden" name="s" value='1'>
    </form>

    <?php

    // if ($conn->query("DELETE FROM test WHERE id= 1")) {
    //     echo "Successfully Deleted";
    // } else {
    //     echo "Sql" . $sql . "Error" . $conn->errno;
    // }
    // unset($sql);


    if ($conn->query("UPDATE test SET name='tsukoyomi sato', salary='200' WHERE id=16")) {
        echo "Updated";
    } else {
        echo "Sql" . $sql . "Error" . $conn->errno;
    }

    ?>


    <div class="container">
        <table>
            <tr>
                <th><i class="ion-document-text"></i></th>
                <th>Name</th>
                <th>Salary</th>
            </tr>

            <?php

            $sql = "SELECT * FROM test";
            if ($result = $conn->query($sql)) {
                // echo "Success";
                // printArr($result);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

            ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['salary'] ?></td>
                        </tr>
            <?php

                    }
                } else {
                    echo "<h1>No Data</h1>";
                }
            } else {
                echo "Sql" . $sql . "Error" . $conn->errno;
            }
            unset($sql);

            ?>
        </table>
    </div>


</body>

</html>