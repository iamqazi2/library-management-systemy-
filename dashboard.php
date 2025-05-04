<?php
session_start();

// Redirect to login if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWorm Library</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
                     <?php include 'side-bar.php'; ?>

        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Nav -->
            <div class="bg-white shadow flex justify-between items-center p-4">
                <div class="flex items-center">
                    <!-- User avatar -->
                    <div class="relative">
                         <div class="flex items-center bg-gray-200 rounded-full p-1 ">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                        </svg>
                    </div>
                    </div>
                    
                    <!-- User info -->
                    <div class="ml-3">
                        <div id="userName" class="text-sm font-normal">shivanl</div>
                        <div class="text-xs text-gray-500">admin</div>
                    </div>
                </div>
                
                <!-- Settings -->
                <div>
                     <button class="p-2 rounded-full  hover:bg-gray-100" id="openSettings">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor" id="openSettings">
                            <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            
            <!-- Dashboard Content -->
            <div class="flex-1 p-6 overflow-auto">
                <div class="flex gap-6">
                    <!-- Chart Section -->
                    <div class="flex-1 bg-white rounded-lg shadow p-6">
                        <div class="w-full flex justify-center">
                            <div class="w-96 h-96">
                                <canvas id="bookChart"></canvas>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-center">
                            <div class="flex items-center mr-8">
                                <div class="h-4 w-4 rounded-full bg-blue-700 mr-2"></div>
                                <div>Total Borrowed Books</div>
                            </div>
                            <div class="flex items-center">
                                <div class="h-4 w-4 rounded-full bg-blue-400 mr-2"></div>
                                <div>Total Returned Books</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Stats Section -->
                    <div class="w-80">
                        <!-- Overdue Borrowers -->
                        <div class="bg-white rounded-lg shadow p-4">
                            <a href="#" class="block">
                                <h2 class="text-lg font-semibold mb-4">Overdue Borrowers</h2>
                            </a>
                            
                            <div class="space-y-2">
                                <a href="#" class="block flex justify-between items-center bg-gray-50 rounded p-2">
                                    <div class="flex items-center">
                                        <div class="h-6 w-6 bg-gray-300 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Navneet</div>
                                            <div class="text-xs text-gray-500">Borrowed ID: 10</div>
                                        </div>
                                    </div>
                                    <button class="text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </a>
                                
                                <a href="#" class="block flex justify-between items-center bg-gray-50 rounded p-2">
                                    <div class="flex items-center">
                                        <div class="h-6 w-6 bg-gray-300 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Navneet</div>
                                            <div class="text-xs text-gray-500">Borrowed ID: 10</div>
                                        </div>
                                    </div>
                                    <button class="text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </a>
                                
                                <a href="#" class="block flex justify-between items-center bg-gray-50 rounded p-2">
                                    <div class="flex items-center">
                                        <div class="h-6 w-6 bg-gray-300 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Shivanl</div>
                                            <div class="text-xs text-gray-500">Borrowed ID: 10</div>
                                        </div>
                                    </div>
                                    <button class="text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </a>
                                
                                <a href="#" class="block flex justify-between items-center bg-gray-50 rounded p-2">
                                    <div class="flex items-center">
                                        <div class="h-6 w-6 bg-gray-300 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Navneet</div>
                                            <div class="text-xs text-gray-500">Borrowed ID: 10</div>
                                        </div>
                                    </div>
                                    <button class="text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </a>
                                
                                <a href="#" class="block flex justify-between items-center bg-gray-50 rounded p-2">
                                    <div class="flex items-center">
                                        <div class="h-6 w-6 bg-gray-300 rounded-full flex items-center justify-center mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium">Priyanka</div>
                                            <div class="text-xs text-gray-500">Borrowed ID: 10</div>
                                        </div>
                                    </div>
                                    <button class="text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Key Stats -->
                        <div class="mt-6 space-y-4">
                            <a href="#" class="block bg-white rounded-lg shadow p-4 flex items-center">
                                <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold">0150</div>
                                    <div class="text-sm text-gray-500">Total User Base</div>
                                </div>
                            </a>
                            
                            <a href="#" class="block bg-white rounded-lg shadow p-4 flex items-center">
                                <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold">01500</div>
                                    <div class="text-sm text-gray-500">Total Book Count</div>
                                </div>
                            </a>
                            
                            <a href="#" class="block bg-white rounded-lg shadow p-4 flex items-center">
                                <div class="h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-3xl font-bold">0010</div>
                                    <div class="text-sm text-gray-500">Branch Count</div>
                                </div>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Settings Modal -->
    <div id="settingsModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-[#f4f4f4] rounded-xl shadow-lg w-[500px] p-6 relative">
            <!-- Header -->
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="bg-gray-200 p-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-lg font-semibold">Change Credentials</h2>
                </div>
                <button id="closeSettings" class="bg-white rounded-full w-8 h-8 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <hr class="border-gray-300 mb-6"/>

            <!-- Form -->
            <form>
                <div class="mb-4 flex items-center justify-between">
                    <label class="text-sm text-gray-600 w-1/3">Enter Current Password</label>
                    <input type="password" placeholder="Enter Current Password" class="w-2/3 px-4 py-2 border border-gray-300 rounded focus:outline-none" />
                </div>

                <div class="mb-4 flex items-center justify-between">
                    <label class="text-sm text-gray-600 w-1/3">Enter New Password</label>
                    <input type="password" placeholder="Enter New Password" class="w-2/3 px-4 py-2 border border-gray-300 rounded focus:outline-none" />
                </div>

                <div class="mb-6 flex items-center justify-between">
                    <label class="text-sm text-gray-600 w-1/3">Confirm New Password</label>
                    <input type="password" placeholder="Confirm New Password" class="w-2/3 px-4 py-2 border border-gray-300 rounded focus:outline-none" />
                </div>

                <!-- Buttons -->
                <div class="flex justify-between gap-4">
                    <button type="button" class="bg-gray-300 text-black font-medium py-3 px-4 rounded w-full text-center">CANCEL</button>
                    <button type="submit" class="bg-blue-500 text-white font-medium py-3 px-4 rounded w-full text-center">CONFIRM</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        
        // Initialize chart
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('bookChart').getContext('2d');
            
            const bookChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Total Borrowed Books', 'Total Returned Books'],
                    datasets: [{
                        data: [70, 30],
                        backgroundColor: [
                            '#1e40af', // dark blue
                            '#60a5fa', // light blue
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
        // Modal handling
            const openBtn = document.getElementById("openSettings");
            const modal = document.getElementById("settingsModal");
            const closeBtn = document.getElementById("closeSettings");

            openBtn.addEventListener("click", () => modal.classList.remove("hidden"));
            closeBtn.addEventListener("click", () => modal.classList.add("hidden"));

            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
                console.log("triggered")
            });
    </script>
   

   <script>
document.addEventListener('DOMContentLoaded', () => {
    async function loadUserDetails() {
        try {
            const response = await fetch('api.php?action=get_user');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            const result = await response.json();
            if (result.success && result.users) {
                const userName = `${result.users.first_name} ${result.users.last_name}`;
                document.getElementById('userName').textContent = userName;
            } else {
                console.warn('User data not found or invalid response:', result);
                document.getElementById('userName').textContent = 'Guest'; // Fallback
            }
        } catch (error) {
            console.error('Error loading user details:', error);
            document.getElementById('userName').textContent = 'Guest'; // Fallback
            // Optionally, display an error message to the user
            alert('Failed to load user details');
        }
    }

    // Call the function to load user details
    loadUserDetails();
});
</script>

</body>
</html>