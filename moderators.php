<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookWorm Library - Moderators</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }
        
        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
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
                    <a href="#" class="flex items-center px-4 py-3 hover:bg-blue-600">
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
                    
                    <a href="#" class="flex items-center px-4 py-3 bg-blue-600">
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
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 flex justify-between items-center p-4">
                <div class="flex items-center">
                    <div class="flex items-center bg-gray-200 rounded-full p-1 mr-2">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z"></path>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm">shivani</div>
                        <div class="text-xs text-gray-500">Admin</div>
                    </div>
                </div>
                <div>
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path>
                        </svg>
                    </button>
                </div>
            </header>
            
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <h1 class="text-2xl font-bold mb-6">Moderators</h1>
                
                <!-- Add Moderator & Search Bar -->
                <div class="flex justify-between mb-6">
    <div class="flex-1"></div>
    <div class="flex items-center space-x-4">
        <button onclick="openModal('createModeratorModal')" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md flex items-center">
            <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19,13H13V19H11V13H5V11H11V5H13V11H19V13Z"></path>
            </svg>
            add moderator
        </button>
        
        <div class="relative">
            <input type="text" placeholder="Search by ID or Type" class="border border-gray-300 rounded-md pl-10 pr-4 py-2 w-64">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z"></path>
            </svg>
        </div>
    </div>
</div>
                
                <!-- Moderators Table -->
                <div class="bg-white rounded-md shadow overflow-hidden">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-4 px-6">ID</th>
                                <th class="text-left py-4 px-6">Name</th>
                                <th class="text-left py-4 px-6">Email</th>
                                <th class="text-left py-4 px-6">Date</th>
                                <th class="text-left py-4 px-6">Availability</th>
                                <th class="text-center py-4 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // In a real application, this would be populated from database
                            $moderators = [];
                            for ($i = 1; $i <= 12; $i++) {
                                $moderators[] = [
                                    'id' => 1,
                                    'name' => 'Hibernate Core ~11th',
                                    'email' => 'Educational',
                                    'date' => 'Priyanka',
                                    'availability' => 'Available'
                                ];
                            }
                            
                            foreach ($moderators as $index => $moderator) {
                                echo '<tr class="border-b hover:bg-gray-50">';
                                echo '<td class="py-4 px-6">'.$moderator['id'].'</td>';
                                echo '<td class="py-4 px-6">'.$moderator['name'].'</td>';
                                echo '<td class="py-4 px-6">'.$moderator['email'].'</td>';
                                echo '<td class="py-4 px-6">'.$moderator['date'].'</td>';
                                echo '<td class="py-4 px-6">'.$moderator['availability'].'</td>';
                                echo '<td class="py-4 px-6 flex justify-center space-x-2">';
                                echo '  <button onclick="openModal(\'updateModeratorModal\')" class="p-1 text-gray-600 hover:text-blue-500">';
                                echo '    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">';
                                echo '      <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"></path>';
                                echo '    </svg>';
                                echo '  </button>';
                                echo '  <button onclick="openModal(\'deleteModeratorModal\')" class="p-1 text-gray-600 hover:text-red-500">';
                                echo '    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">';
                                echo '      <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path>';
                                echo '    </svg>';
                                echo '  </button>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    
    <!-- Create Moderator Modal -->
    <div id="createModeratorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-md w-full max-w-md">
            <div class="flex items-center p-4 border-b">
                <div class="bg-gray-200 p-2 rounded-md mr-3">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17,21L14.25,18L15.41,16.84L17,18.43L20.59,14.84L21.75,16.25M12.8,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19A2,2 0 0,1 21,5V12.8C20.12,12.29 19.09,12 18,12C14.69,12 12,14.69 12,18C12,19.09 12.29,20.12 12.8,21Z"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-medium">Create Moderator</h2>
                <button onclick="closeModal('createModeratorModal')" class="ml-auto">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Name" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="email" placeholder="Email" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="password" placeholder="Password" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div class="flex space-x-4">
                        <button type="button" onclick="closeModal('createModeratorModal')" class="flex-1 bg-gray-200 hover:bg-gray-300 text-black font-medium py-2 px-4 rounded-md">Decline</button>
                        <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Update Moderator Modal -->
    <div id="updateModeratorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-md w-full max-w-md">
            <div class="flex items-center p-4 border-b">
                <div class="bg-gray-200 p-2 rounded-md mr-3">
                    <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17,21L14.25,18L15.41,16.84L17,18.43L20.59,14.84L21.75,16.25M12.8,21H5C3.89,21 3,20.1 3,19V5C3,3.89 3.89,3 5,3H19A2,2 0 0,1 21,5V12.8C20.12,12.29 19.09,12 18,12C14.69,12 12,14.69 12,18C12,19.09 12.29,20.12 12.8,21Z"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-medium">Update Moderator</h2>
                <button onclick="closeModal('updateModeratorModal')" class="ml-auto">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <form>
                    <div class="mb-4">
                        <input type="text" placeholder="Name" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="email" placeholder="Email" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="password" placeholder="Password" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div class="flex space-x-4">
                        <button type="button" onclick="closeModal('updateModeratorModal')" class="flex-1 bg-gray-200 hover:bg-gray-300 text-black font-medium py-2 px-4 rounded-md">Cancel</button>
                        <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Delete Moderator Modal -->
    <div id="deleteModeratorModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-md w-full max-w-md">
            <div class="flex items-center p-4 border-b">
                <div class="bg-gray-200 p-2 rounded-md mr-3">
                    <svg class="w-6 h-6 text-gray-700" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-medium">Delete Moderator</h2>
                <button onclick="closeModal('deleteModeratorModal')" class="ml-auto">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path>
                    </svg>
                </button>
            </div>
            <div class="p-6 text-center">
                <p class="mb-6">"Are you certain you wish to proceed with the deletion of the selected entry?"</p>
                <button onclick="closeModal('deleteModeratorModal')" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-8 rounded-md">CONFIRM</button>
            </div>
        </div>
    </div>
</body>
</html>