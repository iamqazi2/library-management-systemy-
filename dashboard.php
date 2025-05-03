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
        <div class="w-full max-w-[200px] bg-blue-500 text-white flex flex-col">
                    <div class="flex justify-center mb-1 mx-4 my-4">
                    <img src="images/Group.svg" alt="BookWorm Icon" >
                    </div>
                
            <div class="flex-grow">
                <!-- Navigation -->
                <div class="mt-6">
                    <a href="#" class="flex items-center px-4 py-3 bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        <span>Books</span>
                    </a>
                    
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Moderators</span>
                    </a>
                </div>
            </div>
 <a href="#" class="flex items-center px-4 py-2 hover:bg-blue-600">
  <div class="flex items-center p-4">
    <img src="images/logout.svg" class="h-5 w-5 mr-3" alt="Logout">
    <span>Log Out</span>
  </div>
</a>
 </div>
        
        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Nav -->
            <div class="bg-white shadow flex justify-between items-center p-4">
                <div class="flex items-center">
                    <!-- User avatar -->
                    <div class="relative">
                        <div class="h-10 w-10 rounded bg-gray-300 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </div>
                    
                    <!-- User info -->
                    <div class="ml-3">
                        <div class="text-sm font-medium">shivanl</div>
                        <div class="text-xs text-gray-500">admin</div>
                    </div>
                </div>
                
                <!-- Settings -->
                <div>
                    <button class="p-2 rounded-lg hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
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
    </script>

    <?php
    // This section would include your PHP logic for dynamic data
    // For example:
    /*
    $users = 150;
    $books = 1500;
    $branches = 10;
    
    $overdueBorrowers = [
        ['name' => 'Navneet', 'id' => 10],
        ['name' => 'Navneet', 'id' => 10],
        ['name' => 'Shivanl', 'id' => 10],
        ['name' => 'Navneet', 'id' => 10],
        ['name' => 'Priyanka', 'id' => 10]
    ];
    
    $borrowedBooks = 70;
    $returnedBooks = 30;
    */
    ?>
</body>
</html>