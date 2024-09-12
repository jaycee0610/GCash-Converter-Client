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
</head>

<body>
    <div class="container mt-3 p-4">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4">
                <div class="alert alert-danger">
                    <strong>Warning</strong> Huwag gumamit ng dummy account / details, automatic voided transaction. <br /><br /> Wag i-share ang otp at mpin, kapag nasa 10% pababa ang fee, scam yan. huwag makipag transact sa dummy account. hingan ng id at videocall kung may pagdududa.
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://logos-download.com/wp-content/uploads/2020/06/GCash_Logo_text.png" class="img-fluid w-75 mb-3 p-4 pb-0">
                        </div>
                        <h5 class="mb-3 border-start border-3 ps-2 border-primary">Local Store Cashin-Cashout</h5>
                        <form action="createCharges/" method="POST" autocomplete="off">
                            <div class="mb-3 mt-3">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="full_name" placeholder="Enter full name" name="full_name" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="home_address" class="form-label">Home Address:</label>
                                        <input type="text" class="form-control" id="home_address" placeholder="Enter home address" name="home_address" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="zip_code" class="form-label">Zip Code:</label>
                                        <input type="text" class="form-control" id="zip_code" placeholder="Enter zip code" name="zip_code" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email_address" class="form-label">Email Address:</label>
                                <input type="email" class="form-control" id="email_address" placeholder="Enter Email Address" name="email_address" required>
                            </div>

                            <div class="mb-3">
                                <label for="gcash_number" class="form-label">GCash #:</label>
                                <input type="text" class="form-control" id="gcash_number" placeholder="Enter GCash number" name="gcash_number" required>
                            </div>

                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount (Min. 2,000):</label>
                                <input type="number" min="100" class="form-control" id="amount" placeholder="Enter amount" name="amount" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Cashout</button>
                        </form>
                    </div>
                </div>

                <div class="mt-5">
                    <p class="text-center">Want to buy this source-code? contact us <a href="https://www.facebook.com/rootscratch">rootscratch</a></p>
                </div>

            </div>
            <div class="col-sm-4">
            </div>
        </div>
    </div>
    <?php
    if (isset($_GET['error'])) {
    ?>
        <script>
            alert('May mali sa iyong form. Please try again.');
        </script>
    <?php
    }
    ?>
</body>

</html>