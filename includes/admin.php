<?php
require_once 'db_connection.php';

session_start();
if (!isset($_SESSION['name'])) {
    header('Location: login.php'); 
    exit();
}

$name = $_SESSION['name'];



?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #00ff87;
            padding: 20px;
            color: #fff;
        }

        h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 20px;
            margin: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        p {
            color: #666;
        }

        a {
            color: #00ff87;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Welcome, <?php echo $name; ?>!</h1>
    </div>

    <div class="content">
        <h2>Admin Dashboard</h2>
        <p>This is the admin dashboard. You can perform administrative tasks here.</p>
    </div>

    <div class="content">
        <h2>Tasks</h2>
        <ul>
            <li><a href="#" data-toggle="modal" data-target="#manageUsersModal">Manage Users</a></li>
            
            <li><a href="#" data-toggle="modal" data-target="#manageProductsModal">Manage Products</a></li>
            <li><a href="#" data-toggle="modal" data-target="#displayUser">Display Users</a></li>
            <li><a href="#" data-toggle="modal" data-target="#displayproducts">Display products</a></li>

        </ul>
    </div>
    <div class="content">
        <a href="logout.php">Logout</a>
    </div>
    <div class="modal fade" id="manageUsersModal" tabindex="-1" role="dialog" aria-labelledby="manageUsersModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="manageUsersModalLabel">Manage Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#createUserTab">Create User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#deleteUserTab">Delete User</a>
            </li>
        </ul>
        <div class="tab-content">
                            <div class="tab-pane fade show active" id="createUserTab">
                                <form action="./create_user.php" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="telnum">Telephone Number:</label>
                                        <input type="tel" class="form-control" id="telnum" name="telnum" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Create User</button>
                                </form>
                            </div>
                        </div>
                <div class="tab-pane fade" id="deleteUserTab">
                    <form id="deleteUserForm" method="POST" action="delete_user.php">
                    <div class="form-group">
                    <label for="deleteUsername">phone number:</label>
                    <input type="text" class="form-control" id="deleteUsername" name="deleteUsername" required>
                    </div>
                <button type="submit" class="btn btn-danger">Delete User</button>
                </form>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>
    </div><!-- Manage Products Modal -->
    <div class="modal fade" id="manageProductsModal" tabindex="-1" role="dialog" aria-labelledby="manageProductsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="manageProductsModalLabel">Manage Products</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#createProductTab">add product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#deleteProductTab">Delete product</a>
            </li>
        </ul>
            </div> <div class="tab-content">
                            <div class="tab-pane fade show active" id="createProductTab">
                                <form action="./add_product.php" method="POST">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="prix">prix:</label>
                                        <input type="prix" class="form-control" id="prix" name="prix" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="marque">marque:</label>
                                        <input type="marque" class="form-control" id="marque" name="marque" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">description:</label>
                                        <input type="description" class="form-control" id="description" name="description">
                                    </div>
                                    <div class="form-group">
                                        <label for="piece">piéce:</label>
                                        <input type="piece" class="form-control" id="piece" name="piece" required>
                                    </div>
                                    <div class="form-group">
                                            <label for="categorie">Category:</label>
                                            <select class="form-control" id="categorie" name="categorie">
                                                <option value="running">Running</option>
                                                <option value="football">Football</option>
                                                <option value="fitness">Fitness</option>
                                                <option value="cycling">Cycling</option>
                                            </select>
                                        </div>

                                    <div class="form-group">
                                         <label for="image">Image:</label>
                                         <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>                                        </div>

                                    <div class="form-group">
                                        <label for="promo">promo:</label>
                                        <input type="promo" class="form-control" id="promo" name="promo" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">add product</button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="deleteProductTab">
                    <form id="deleteproductForm" method="POST" action="delete_product.php">
                        <div class="form-group">
                            <label for="deleteproduct">product name:</label>
                            <input type="text" class="form-control" id="deleteproductname" name="deleteproductname" required>
                        </div>
                        <button type="submit" class="btn btn-danger">Delete product</button>
                    </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    

            <script>
            $(document).ready(function() {
            $('a[data-toggle="tab"]').on('click', function(e) {
                e.preventDefault(); 
                
                var targetTab = $(this).attr('href');
                
                $('.tab-pane').removeClass('show active');
                $(targetTab).addClass('show active');
            });
            });
            </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>