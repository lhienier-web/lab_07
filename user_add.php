<?php include 'initialize.php'; ?> <!--[cite: 5] -->
<!DOCTYPE html>
<html>
<head>
    <title>Create New User</title> <!--[cite: 5] -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

<div class="bg-white p-8 rounded shadow-md w-full max-w-md">
    <h3 class="text-xl font-bold text-center mb-4">Create New User</h3> <!--[cite: 5] -->
    
    <?php
        if(isset($_SESSION['alert_message'])) { //[cite: 5]
            echo '<div class="bg-red-100 text-red-700 p-2 mb-4 rounded text-sm text-center">'. $_SESSION['alert_message'] .'</div>'; //[cite: 5]
            unset($_SESSION['alert_message']); //[cite: 5]
        }
    ?>

    <form method="POST" action="user_add_data.php" class="space-y-4"> <!--[cite: 5] -->
        <div>
            <label class="block text-sm font-medium">Firstname:</label> <!--[cite: 5] -->
            <input type="text" name="firstname" class="mt-1 block w-full border rounded p-2 focus:ring focus:ring-blue-200"> <!--[cite: 5] -->
        </div>
        <div>
            <label class="block text-sm font-medium">Lastname:</label> <!--[cite: 5] -->
            <input type="text" name="lastname" class="mt-1 block w-full border rounded p-2 focus:ring focus:ring-blue-200"> <!--[cite: 5] -->
        </div>
        <div>
            <label class="block text-sm font-medium">Username:</label> <!--[cite: 5] -->
            <input type="text" name="username" class="mt-1 block w-full border rounded p-2 focus:ring focus:ring-blue-200"> <!--[cite: 5] -->
        </div>
        <div>
            <label class="block text-sm font-medium">Password:</label> <!--[cite: 5] -->
            <input type="password" name="password" class="mt-1 block w-full border rounded p-2 focus:ring focus:ring-blue-200"> <!--[cite: 5] -->
        </div>
        <div>
            <label class="block text-sm font-medium">Confirm Password:</label> <!--[cite: 5] -->
            <input type="password" name="confirm_password" class="mt-1 block w-full border rounded p-2 focus:ring focus:ring-blue-200"> <!--[cite: 5] -->
        </div>
        
        <button name="register" type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700">Add</button> <!--[cite: 5] -->
    </form>
</div>

</body>
</html>