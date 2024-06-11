<!-- 
    See pseudo code for table structure 
    To optimize this script, we can use caching with javascript for lighter effect
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Needed meta data for devices, standard for html5 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halloween Calendar</title>
    <style>
        /* Stlye data for displayed table, usually in a css document */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        /* Odd/Even row color for readability */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Halloween Calendar</h1>
    <table id="table">
        <!-- Table, display readable information of what we showcase -->
        <tr>
            <th>Date</th>
            <th>Year</th>
            <th>Day</th>
            <th>Week Number</th>
            <th>Days Remaining</th>
        </tr>
        <?php
        /* 
            Return array data from year
            This code can either stay here or go into a seprated file we call upon (require_once, or include),
            for a cleaner code
        */
        function getHalloweenData($year) {
            $date = new DateTime("$year-10-31"); // 31st, of each 10th month
            $currentDate = new DateTime();
            $weekNumber = $date->format("W");
            $daysRemaining = $date->diff($currentDate)->format("%a"); // Returns the date as positive
            
            // Return generated data
            return [
                'date' => $date->format("Y-m-d"),
                'year' => $year,
                'day' => $date->format("l"),
                'weekNumber' => $weekNumber,
                'daysRemaining' => $daysRemaining,
            ];
        }

        $currentYear = date("Y");
        $years = range($currentYear, $currentYear + 10);
        
        // Print out with a loop, for each year, into table (31st each month, 10th month (see above))
        foreach ($years as $year) {
            $halloweenData = getHalloweenData($year);
            echo "<tr>";
                echo "<td>{$halloweenData['date']}</td>";
                echo "<td>{$halloweenData['year']}</td>";
                echo "<td>{$halloweenData['day']}</td>";
                echo "<td>{$halloweenData['weekNumber']}</td>";
                echo "<td>{$halloweenData['daysRemaining']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
