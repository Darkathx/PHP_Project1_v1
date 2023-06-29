<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = count($infoArrays[0]);
                    for($i = 0; $i < $count; $i++) {
                        echo "<tr>";
                        echo "<td>{$infoArrays[0][$i]}</td>";
                        echo "<td>{$infoArrays[1][$i]}</td>";
                        echo "<td>{$infoArrays[2][$i]}</td>";
                        echo '<td>' . formatCurrency($infoArrays[3][$i]) . '</td>';
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td><?php echo "<p>\$$amtArray[0]</p>";?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td><?php echo "<p>-\$$amtArray[1]</p>";?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                        <?php 
                        if($amtArray[2] < 0) {
                            echo "-\$$amtArray[2]";
                        } else {
                            echo "\$$amtArray[2]";
                        }
                    ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
