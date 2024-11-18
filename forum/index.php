<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['email'];

// Function to handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <title>Forum</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
    <style>
        body {
            background-color: #6A8889;
            color: #fff;
        }
        .container {
            margin-top: 20px;
        }
        .profile-box {
            display: flex;
            align-items: center;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: #000;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .profile-box img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile-details {
            text-align: left;
        }
        .profile-details h3 {
            margin: 0;
            font-size: 16px;
        }
        .profile-details p {
            margin: 0;
            font-size: 14px;
        }
        .logout-btn {
            margin-top: 10px;
        }
        .panel {
            background-color: #edfafa;
            border: 0;
            border-radius: 10px;
        }
        .panel-body {
            padding: 20px;
            color: #000;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary, .btn-secondary {
            width: 100%;
            margin-bottom: 10px;
        }
        @media (max-width: 767px) {
            .btn-primary, .btn-secondary {
                width: auto;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Profile Box -->
        <div class="profile-box">
            <?php
            $avatarPath = './images/OIP.jpeg';
            ?>
            <img src="<?php echo $avatarPath; ?>" alt="Avatar">
            <div class="profile-details">
                <h3>Welcome</h3>
                <p>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'farmed');
                    $query_name = "SELECT * FROM users WHERE email='$name'";
                    $result_name = mysqli_query($conn, $query_name);
                    while ($row_name = mysqli_fetch_array($result_name)) {
                        $user_name = $row_name['FullName'];
                    }
                    ?>
                </p>
                <p><?php echo $user_name; ?></p>
                <p><?php echo $name; ?></p>
                
                    <a href="../login.html"><button  class="btn btn-danger">Log Out</button></a> 
               
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-md-offset-3">
            <div class="panel panel-default" style="margin-top:50px">
                <div class="panel-body">
                    <h3>Community Forum</h3>
                    <hr>
                    <form name="frm" method="post">
                        <input type="hidden" id="commentid" name="Pcommentid" value="0">
                        <div class="form-group">
                            <label for="comment">Write your question:</label>
                            <textarea class="form-control" rows="5" name="msg" required></textarea>
                        </div>
                        <input type="button" id="butsave" name="save" class="btn btn-primary" value="Send">
                        <input type="button" id="butclear" name="clear" class="btn btn-secondary" value="Clear Form" onclick="clearForm()">
                    </form>

                    <script>
                        function clearForm() {
                            document.forms["frm"]["Pcommentid"].value = "0"; // Reset hidden field if needed
                            document.forms["frm"]["msg"].value = ""; // Clear textarea
                            // Additional fields can be cleared similarly
                            window.location.href = 'index.php';
                        }
                    </script>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Recent Questions</h4>
                    <table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
                        <tbody id="record">
                            <!-- Questions will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ReplyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply Question</h4>
            </div>
            <div class="modal-body">
                <form name="frm1" method="post">
                    <input type="hidden" id="commentid" name="Rcommentid">
                    <div class="form-group">
                        <label for="comment">Write your reply:</label>
                        <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                    </div>
                    <input type="button" id="btnreply" name="btnreply" class="btn btn-primary" value="Reply">
                </form>
                <script>
                    document.getElementById('btnreply').addEventListener('click', function() {
                        // Perform form submission or other actions here
                        // Close the form popup
                        document.getElementById('ReplyModal').style.display = 'none';
                        window.location.href = 'index.php';
                    });
                </script>
            </div>
        </div>
    </div>
</div>

</body>
</html>
