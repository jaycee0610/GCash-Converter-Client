<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(0);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>GCash Convert</title>
    <style>
        body {
            background-image: url('https://img.freepik.com/premium-vector/white-dotted-texture-seamless-vector-background-polka-dot-tileable-pattern_547648-2475.jpg');

        }
    </style>
    <?php
    date_default_timezone_set('Asia/Manila');
    $current_date_time = date('m/d/Y g:i:s a');
    ?>
</head>

<body>
    <div class="container mt-3 p-4">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">

                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo_text.png" class="img-fluid w-75 mb-3 p-4 pb-0">

                        </div>
                        <div>
                            <?php


                            if (!isset($_GET['id']) || !isset($_GET['status'])) {
                                echo '<h2 class="text-danger text-center">Transaction Not Found</h2>';
                                echo '<i class="text-muted">Reload Time : ' . $current_date_time . ' <br /> Request ID: #' . rand(99999, 999999) . '</i>';
                            } else {
                                $id = htmlspecialchars(strip_tags($_GET['id']));
                                $status = htmlspecialchars(strip_tags($_GET['status']));
                                switch ($status) {
                                    case 'Completed':
                                        $status = 'Completed';
                                        $trans_color = 'bg-success';
                                        break;
                                    case 'Pending':
                                        $status = 'Pending Payment';
                                        $trans_color = 'bg-warning';
                                        break;
                                    case 'Failed';
                                        $status = 'Failed';
                                        $trans_color = 'bg-danger';
                                        break;
                                    case  'Cancelled';
                                        $status = 'Cancelled';
                                        $trans_color = 'bg-danger';
                                        break;
                                    default:
                                        $status = 'Unknown';
                                        $trans_color = 'bg-danger';
                                }
                            ?>
                                <h3 class="text-center text-white mb-0 pb-1 mt-2 <?php echo $trans_color; ?>"><?php echo $status; ?></h3>
                                <h4 class="text-center">Transaction Status</h4>
                                <p>Transaction ID: <?php echo $id; ?> <br /> SS Time: <?php echo $current_date_time; ?></p>
                                <div class="alert alert-danger">
                                    <strong>Notice:</strong> i-screenshot mo ang page na ito at isend mo sa nagpr-process sayo, huwag isend ang mismong link para hindi mawala ang transaction.
                                </div>
                            <?php
                            }


                            ?>
                            <a href="../" class="btn btn-primary w-100 mt-3">Back to Home</a>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
</body>

</html>