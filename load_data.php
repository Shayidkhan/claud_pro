<?php

include "config/db.php";

$result = mysqli_query($conn,"SELECT * FROM employee_details ORDER BY id DESC");

?>

<table class="table table-bordered table-hover table-striped align-middle">

    <thead class="table-dark">

        <tr>

            <th width="60">#</th>

            <th>Date</th>

            <th>Employee ID</th>

            <th>Name</th>

            <th>Phone</th>

            <th>Type</th>

            <th>Status</th>

            <th>Availability</th>

            <th>Location</th>

            <th width="180">Action</th>

        </tr>

    </thead>

    <tbody>

<?php

if(mysqli_num_rows($result)>0)
{

    $no=1;

    while($row=mysqli_fetch_assoc($result))
    {

?>

<tr>

    <td><?php echo $no++; ?></td>

    <td><?php echo date("d-m-Y",strtotime($row['emp_date'])); ?></td>

    <td><?php echo htmlspecialchars($row['emp_id']); ?></td>

    <td><?php echo htmlspecialchars($row['name']); ?></td>

    <td><?php echo htmlspecialchars($row['phone']); ?></td>

    <td><?php echo htmlspecialchars($row['emp_type']); ?></td>

    <td>

<?php

$status = $row['status'];

if($status=="New")
{
    echo '<span class="badge bg-primary">New</span>';
}
elseif($status=="Pending")
{
    echo '<span class="badge bg-warning text-dark">Pending</span>';
}
elseif($status=="Completed")
{
    echo '<span class="badge bg-success">Completed</span>';
}
else
{
    echo '<span class="badge bg-secondary">'.$status.'</span>';
}

?>

    </td>

    <td>

<?php

$availability = $row['availability'];

if($availability=="Available")
{
    echo '<span class="badge bg-success">Available</span>';
}
elseif($availability=="Busy")
{
    echo '<span class="badge bg-danger">Busy</span>';
}
elseif($availability=="Leave")
{
    echo '<span class="badge bg-secondary">Leave</span>';
}
else
{
    echo $availability;
}

?>

    </td>

    <td><?php echo htmlspecialchars($row['location']); ?></td>

    <td>

        <button

        class="btn btn-warning btn-sm editBtn"

        data-id="<?php echo $row['id'];?>">

        <i class="bi bi-pencil-square"></i>

        Edit

        </button>


        <button

        class="btn btn-danger btn-sm deleteBtn"

        data-id="<?php echo $row['id'];?>">

        <i class="bi bi-trash"></i>

        Delete

        </button>

    </td>

</tr>

<?php

    }

}
else
{

?>

<tr>

<td colspan="10" class="text-center text-danger">

No Records Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>