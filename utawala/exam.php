<?php
session_start();
if(empty($_SESSION['Admin'])){
    header("location:../ingia.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Amosi Stationary</title>
    <meta name="description" content="Amosi Stationary">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider-swiper-bundle.min.css">
    <link rel="stylesheet" href="../assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="../assets/css/left.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            // DataTable initialization
            $('#myDataTable').DataTable({
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "pageLength": 10,
                "pagingType": "simple_numbers",
                "searching": true
            });
        });
    </script>
</head>

<body style="background-color: antiquewhite;">
    <?php include_once("../includes/top_admin.php") ?>

    <div style="margin-left:200px;">
        <br><br>
        <br><br>
        <br><br>
        <div class="container">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Past Papers(Examinations)</h3>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="examination.php">Upload Primary Examination</a> &nbsp;
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="examintion_secondary.php">Upload Secondary Examination</a>
        </div>
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">Examinations List</p>
                </div>
                <div class="card-body">
                    <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                        <table id="myDataTable" class="table my-0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Year</th>
                                    <th>Exam Type</th>
                                    <th>Class</th>
                                    <th>Subject</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("../includes/connection.php");
                                $vuta = "SELECT * FROM mitihani";
                                $sql = mysqli_query($con,$vuta);
                                $sno=1;
                                while($me = mysqli_fetch_array($sql)){
                                    $eid = $me['eid'];
                                    $examtype = $me['examtype'];
                                    $etype = $me['etype'];
                                    $subject = $me['subject'];
                                    $exam = $me['exam'];
                                    $year = $me['year'];

                                    echo "
                                    <tr>
                                        <td>$sno</td>
                                        <td>$year</td>
                                        <td>$examtype</td>
                                        <td>$etype</td>
                                        <td><a href='../assets/img/examination/$exam'>$subject</a></td>
                                        <td><a href='delete_exam.php?x=$eid' class='btn bg-danger'>Delete</a></td>
                                    </tr>";
                                    $sno++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>No.</strong></td>
                                    <td><strong>Year</strong></td>
                                    <td><strong>Exam Typa</strong></td>
                                    <td><strong>Class</strong></td>
                                    <td><strong>Subject</strong></td>
                                    <td><strong>Action</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/baguetteBox.min.js"></script>
    <script src="../assets/js/creative.js"></script>
    <script src="../assets/js/Simple-Slider-swiper-bundle.min.js"></script>
    <script src="../assets/js/Simple-Slider.js"></script>
</body>

</html>