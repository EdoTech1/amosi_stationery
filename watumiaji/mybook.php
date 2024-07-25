<?php
session_start();
if (empty($_SESSION['user'])) {
    header("location:../ingia.php");
}
$mtu = $_SESSION['user'];
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
            var dataTable = $('#myDataTable').DataTable({
                "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                "pageLength": 10,
                "pagingType": "simple_numbers",
                "searching": true
            });

            // Apply the search functionality to the custom search input
            $('#dataTable_filter input').on('keyup', function () {
                dataTable.search(this.value).draw();
            });
        });
    </script>
</head>

<body style="background-color: antiquewhite;">
    <?php include_once("../includes/top_user.php") ?>
    
    <div style="margin-left:80px;">
        <br><br>
        <div class="container">
            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 fw-bold">My books</p>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive mt-2">
                        <table id="myDataTable" class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Book Name</th>
                                    <th>Authors</th>
                                    <th>Book type</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once("../includes/connection.php");
                                $vuta = "SELECT * FROM book, request, users WHERE book.bid = request.bid AND users.email = request.email AND request.statuz = 'Paid' AND users.email = '$mtu'";
                                $sql = mysqli_query($con, $vuta);
                                $sno = 1;
                                while ($me = mysqli_fetch_array($sql)) {
                                    $bid = $me['bid'];
                                    $bname = $me['bname'];
                                    $btype = $me['btype'];
                                    $author = $me['author'];
                                    $price = $me['price'];
                                    $cover = $me['cover'];

                                    echo "
                                    <tr>
                                        <td>$sno</td>
                                        <td><img class='rounded-circle me-2' width='30' height='30' src='../assets/img/books/$cover' /> $bname</td>
                                        <td>$author</td>
                                        <td>$btype</td>
                                        <td><a href='view_book.php?x=$bid' class='btn bg-success text-light'>Open</a></td>
                                    </tr>";
                                    $sno++;
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>No.</strong></td>
                                    <td><strong>Book Name</strong></td>
                                    <td><strong>Author</strong></td>
                                    <td><strong>Book Type</strong></td>
                                    <td><strong>View</strong></td>
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
