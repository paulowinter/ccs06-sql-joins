<?php

require "config.php";

use App\Employee;

// Retrieve the employee number from the query string
if (isset($_GET['emp_no'])) {
    $emp_no = $_GET['emp_no'];
} else {
    die("Employee not specified.");
}
?>

<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Bebas+Neue' rel='stylesheet'>
  <title>Salary History</title>
  <style>
    body{
            font-family:'Montserrat';
            background-color: #FFF5EE;
            text-align: center;
            margin: 50px;
        }

        h1{
            color: 	#DE3163;
            font-family:'Bebas Neue';
            text-shadow: 10px 5px 5px rgba(248, 0, 0, 0.10);
            font-size: 63px;
        }

        table{
            border-collapse: collapse;
            margin: 25px 0;
            text-align: center;
            margin-left: auto; 
            margin-right: auto;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.50);
            background-color: white;
        }

        table tr th{
            background-color: #DE3163;
            color: white;
            text-align: center;
        }

        table th,
        table td{
            padding: 8px 10px;

        }

        table td{
            border-bottom: 1px solid #dddddd;
        }

        table tr:last-of-type{
            border-bottom: 10px solid #DE3163;
        }

        table td a{
            text-decoration: none;
        }

        table td a:hover{
            text-decoration: underline;
            color: #DE3163;
            font-size: 103%;
        }

        tr:nth-child(odd) {
            background-color: #FFF5EE;
            color: #DE3163;
        }
        
        button{
            border: transparent;
            font-family: 'Montserrat';
            font-size: 100%;
            padding: 10px;
            border-radius: 10px;
            background-color: white;
            border-color: #DE3163;
            color: #DE3163;
            box-shadow: 0 0 50px rgba(222, 49, 99, 1);
        }

        button:hover{
            font-size: 110%;
            background-color: #DE3163;
            border-color: #DE3163;
            color: white;
        }

        p{
            font-family: 'Montserrat';
            color: #E30B5C;
            font-weight: bold;
        }

    </style>
</head>
<body>
<?php
    // Retrieve the employee information
    $sql = "SELECT CONCAT(first_name, ' ', last_name) AS employee_name, birth_date, gender, hire_date
            FROM employees
            WHERE emp_no = :emp_no
            LIMIT 10";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':emp_no', $emp_no);
    $statement->execute();
    $employee = $statement->fetch();

    if (!$employee) {
        die("Employee not found.");
    }

    echo "<h1>Salary History for {$employee['employee_name']}</h1>";
    echo "<p>Birthday: {$employee['birth_date']}</p>";
    echo "<p>Gender: {$employee['gender']}</p>";
    echo "<p>Hire Date: {$employee['hire_date']}</p>";

    // Retrieve the employee's salary history
    $sql = "SELECT from_date, to_date, salary
            FROM salaries
            WHERE emp_no = :emp_no
            ORDER BY to_date DESC";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':emp_no', $emp_no);
    $statement->execute();
    $salary_history = $statement->fetchAll();

    // Display the salary history in a table
    echo "<table>";
    echo "<tr><th>From Date</th><th>To Date</th><th>Salary</th></tr>";

foreach ($salary_history as $salary) {
        echo "<tr>";
        echo "<td>{$salary['from_date']}</td>";
        echo "<td>{$salary['to_date']}</td>";
        echo "<td>\${$salary['salary']}</td>";
        echo "</tr>";
    }
?>
</table>
<button type="button" onclick= "location.href='/employees.php?dept_no=d005'">Back to Employees</a>
</body>
</html>
