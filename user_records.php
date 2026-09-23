<?php include 'initialize.php'; ?> <!--[cite: 7] -->
<!DOCTYPE html>
<html>
<head>
    <title>Record List</title> <!--[cite: 7] -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Simulate loading skeleton for PHP server-rendered page
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById('skeleton').style.display = 'none';
            document.getElementById('content').style.display = 'block';
        });
    </script>
</head>
<body class="bg-gray-100 p-8">

<!-- D: Loading Skeleton -->
<div id="skeleton" class="max-w-5xl mx-auto animate-pulse">
    <div class="h-8 bg-gray-300 w-1/4 rounded mb-6"></div>
    <div class="h-64 bg-gray-300 rounded"></div>
</div>

<div id="content" style="display:none;" class="max-w-5xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h3 class="text-2xl font-bold text-gray-800">User Dashboard</h3>
        <a href="user_add.php" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">Add User</a> <!--[cite: 7] -->
    </div>

    <?php
        if(isset($_SESSION['alert_message'])) { //[cite: 7]
            echo '<div class="bg-green-100 text-green-800 p-3 rounded mb-4">'. $_SESSION['alert_message'] .'</div>'; //[cite: 7]
            unset($_SESSION['alert_message']); //[cite: 7]
        }
    ?>

    <!-- A: Table with Pagination -->
    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-4 font-semibold text-gray-600">Name</th>
                    <th class="p-4 font-semibold text-gray-600">Username</th>
                    <th class="p-4 font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php
                $limit = 5;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $offset = ($page - 1) * $limit;

                $total_query = $connection->query("SELECT COUNT(*) AS count FROM users");
                $total_pages = ceil($total_query->fetch_assoc()['count'] / $limit);

                $result = $connection->query("SELECT * FROM users LIMIT $limit OFFSET $offset");

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='p-4'>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</td>";
                        echo "<td class='p-4'>" . htmlspecialchars($row['username']) . "</td>";
                        // F: Raw user confirmation alert
                        echo "<td class='p-4'><button onclick=\"if(confirm('Are you sure you want to delete this user?')) { alert('Delete action triggered'); }\" class='text-red-500 hover:underline'>Delete</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='p-4 text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex gap-2">
        <?php if($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>" class="px-4 py-2 border rounded bg-white hover:bg-gray-50">Previous</a>
        <?php endif; ?>
        <?php if($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>" class="px-4 py-2 border rounded bg-white hover:bg-gray-50">Next</a>
        <?php endif; ?>
    </div>
</div>
</body>
</html>