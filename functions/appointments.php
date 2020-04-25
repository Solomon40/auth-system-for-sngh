<?php

function get_appointments($dept){
    $rows = '';
    $row_num = 0;
    $all_appointments = scandir('db/appointments/');
    $num = count($all_appointments);
    for ($i = 2; $i < $num; $i++) {

        $appointment = json_decode(file_get_contents('db/appointments/' . $all_appointments[$i]));
        if ($appointment->department == $dept) {
            $row_num++;
            $rows .= "
             <tr>
                <th scope='row'>$row_num</th>
                <td>$appointment->patient_name</td>
                <td>$appointment->nature</td>
                <td>$appointment->date</td>
                <td>$appointment->time</td>
                <td>$appointment->department</td>
                  <td>$appointment->complaint</td>
            </tr>
            ";
        }
    }
    if ($rows == '') {
        return false;
    }
    return $rows;
}