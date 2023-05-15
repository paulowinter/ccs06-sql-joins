<?php

require "config.php";

use App\Department;
use App\Employee;

$depts = Department::list();

echo "</table>";

if (isset($_GET['dept_no'])) {
    $dept_no = $_GET['dept_no'];
    $emps = Employee::listByDepartment($dept_no);

} ?>

<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Bebas+Neue' rel='stylesheet'>
    <title>List of Employees</title>
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
            padding: 8px 10px;
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

    </style>
</head>

<body>
    <h1>List of Employees</h1>
        <table>
            <tr>
                <th>Employee Title</th>
                <th>Employee Name</th>
                <th>Birthday</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Hire Date</th>
                <th>Latest Salary</th>
                <th>Link</th>
            </tr>

<?php foreach ($emps as $emp) {
        echo "<tr>";
        echo "<td>{$emp['employee_title']}</td>";
        echo "<td>{$emp['employee_name']}</td>";
        echo "<td>{$emp['birth_date']}</td>";
        echo "<td>{$emp['employee_age']}</td>";
        echo "<td>{$emp['gender']}</td>";
        echo "<td>{$emp['hire_date']}</td>";
        echo "<td>\${$emp['latest_salary']}</td>";
        echo "<td><a href=\"/salary-history.php?emp_no={$emp['emp_no']}\">View Salary History</a></td>";
        echo "</tr>";
    } ?>

</table>
    <button type="button" onclick= "location.href='/index.php'">Back to Departments</a>
</body>
</html>