<?php

require "config.php";

use App\Department;
use App\Employee;

$depts = Department::list();
$emps = Employee::listByDepartment('dept_no');
?>

<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Bebas+Neue' rel='stylesheet'>
    <title>List of Departments</title>
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

    </style>
</head>

<body>
    <h1>List of Departments</h1>
<table>
    <tr>
        <th>Department Number</th>
        <th>Department Name</th>
        <th>Manager Name</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Number of Years</th>
        <th>Link</th>
    </tr>


<?php foreach ($depts as $dept) {
    echo "<tr>";
    echo "<td>{$dept['dept_no']}</td>";
    echo "<td>{$dept['dept_name']}</td>";
    echo "<td>{$dept['manager_name']}</td>";
    echo "<td>{$dept['from_date']}</td>";
    echo "<td>{$dept['to_date']}</td>";
    echo "<td>{$dept['num_years']}</td>";
    echo "<td><a href=\"/employees.php?dept_no={$dept['dept_no']}\">View Employees</a></td>";
    echo "</tr>";
} ?>

</body>
</table>
</html>