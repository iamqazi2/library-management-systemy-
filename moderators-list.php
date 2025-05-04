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
    <title>BookWorm Library - Moderators</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
              <?php include 'side-bar.php'; ?>

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
                        <div class="text-sm" id="userName">shivani</div>
                        <div class="text-xs text-gray-500">Admin</div>
                    </div>
                </div>
                <div>
                    <button class="p-2 rounded-full  hover:bg-gray-100" id="openSettings">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor" id="openSettings">
                            <path d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z"></path>
                        </svg>
                    </button>
                </div>
            </header>
            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto p-6">
                <h1 class="text-2xl font-bold mb-6">Moderators</h1>
                <!-- Message Area -->
                <div id="messageArea" class="mb-4 hidden p-4 rounded-md"></div>
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
                            <input type="text" id="searchInput" placeholder="Search by Name or Email" class="border border-gray-300 rounded-md pl-10 pr-4 py-2 w-64">
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
                                <th class="text-left py-4 px-6">Created Date</th>
                                <th class="text-center py-4 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
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
                <form id="createModeratorForm">
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Name" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="email" name="email" placeholder="Email (e.g., john.moderator@gmail.com)" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="password" name="password" placeholder="Password" class="w-full border border-gray-300 rounded-md px-3 py-2">
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
                <form id="updateModeratorForm">
                    <input type="hidden" name="id">
                    <div class="mb-4">
                        <input type="text" name="name" placeholder="Name" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="email" name="email" placeholder="Email (e.g., john.moderator@gmail.com)" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-4">
                        <input type="password" name="password" placeholder="Password (optional)" class="w-full border border-gray-300 rounded-md px-3 py-2">
                    </div>
                    <div class="flex space-x-4">
                        <button type="button" onclick="closeModal('updateModeratorModal')" class="flex-1 bg-gray-200 hover:bg-gray-300 text-black font-medium py-2 px-4 rounded-md">Cancel</button>
                        <button type="submit" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md">Update</button>
                    </div>
                </form>
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
                <p class="mb-6">Are you certain you wish to proceed with the deletion of the selected entry?</p>
                <button id="confirmDelete" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-8 rounded-md">CONFIRM</button>
            </div>
        </div>
    </div>
    <script>
        let currentModeratorId = null;
        let allModerators = []; // Store full moderators list

        // Function to show messages
        function showMessage(message, isError = false) {
            const messageArea = document.getElementById('messageArea');
            messageArea.textContent = message;
            messageArea.classList.remove('hidden', 'bg-green-100', 'text-green-700', 'bg-red-100', 'text-red-700');
            messageArea.classList.add(isError ? 'bg-red-100' : 'bg-green-100', isError ? 'text-red-700' : 'text-green-700');
            setTimeout(() => {
                messageArea.classList.add('hidden');
            }, 5000);
        }

        // Fetch user details and update name
        async function loadUserDetails() {
            try {
                const response = await fetch('api.php?action=get_user');
                const result = await response.json();
                if (result.success && result.users.email.includes('admin@gmail')) {
                    const userName = `${result.users.first_name} ${result.users.last_name}`;
                    document.getElementById('userName').textContent = userName;
                } else {
                    document.getElementById('userName').textContent = 'shivani'; // Fallback
                }
            } catch (error) {
                console.error('Error loading user details:', error);
                document.getElementById('userName').textContent = 'shivani'; // Fallback
                showMessage('Failed to load user details', true);
            }
        }

        // Render moderators table
        function renderModerators(moderators) {
            const tbody = document.querySelector('tbody');
            tbody.innerHTML = '';
            moderators.forEach(mod => {
                // Extract date only (YYYY-MM-DD)
                const dateOnly = mod.created_date.split(' ')[0];
                tbody.innerHTML += `
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-4 px-6">${mod.id}</td>
                        <td class="py-4 px-6">${mod.name}</td>
                        <td class="py-4 px-6">${mod.email}</td>
                        <td class="py-4 px-6">${dateOnly}</td>
                        <td class="py-4 px-6 flex justify-center space-x-2">
                            <button onclick="openUpdateModal(${mod.id}, '${mod.name}', '${mod.email}')" class="p-1 text-gray-600 hover:text-blue-500">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z"></path>
                                </svg>
                            </button>
                            <button onclick="openDeleteModal(${mod.id})" class="p-1 text-gray-600 hover:text-red-500">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19,4H15.5L14.5,3H9.5L8.5,4H5V6H19M6,19A2,2 0 0,0 8,21H16A2,2 0 0,0 18,19V7H6V19Z"></path>
                                </svg>
                            </button>
                        </td>
                    </tr>`;
            });
        }

        // Fetch moderators from API
        async function loadModerators() {
            try {
                const response = await fetch('api.php?action=get_moderators');
                allModerators = await response.json();
                renderModerators(allModerators);
            } catch (error) {
                console.error('Error loading moderators:', error);
                showMessage('Failed to load moderators', true);
            }
        }

        // Search moderators
        document.getElementById('searchInput').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const filteredModerators = allModerators.filter(mod =>
                mod.name.toLowerCase().includes(searchTerm) || mod.email.toLowerCase().includes(searchTerm)
            );
            renderModerators(filteredModerators);
        });

        // Call on page load
        document.addEventListener('DOMContentLoaded', () => {
            loadUserDetails();
            loadModerators();
        });

        // Create Moderator
        document.querySelector('#createModeratorForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = {
                name: e.target.querySelector('input[name="name"]').value,
                email: e.target.querySelector('input[name="email"]').value,
                password: e.target.querySelector('input[name="password"]').value
            };
            try {
                const response = await fetch('api.php?action=add_moderator', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                const result = await response.json();
                if (result.success) {
                    closeModal('createModeratorModal');
                    e.target.reset();
                    loadModerators();
                    showMessage(result.message);
                } else {
                    showMessage(result.error, true);
                }
            } catch (error) {
                console.error('Error adding moderator:', error);
                showMessage('Failed to create moderator', true);
            }
        });

        // Open Update Modal with Pre-filled Data
        function openUpdateModal(id, name, email) {
            currentModeratorId = id;
            const form = document.querySelector('#updateModeratorForm');
            form.querySelector('input[name="id"]').value = id;
            form.querySelector('input[name="name"]').value = name;
            form.querySelector('input[name="email"]').value = email;
            form.querySelector('input[name="password"]').value = '';
            openModal('updateModeratorModal');
        }

        // Update Moderator
        document.querySelector('#updateModeratorForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = {
                id: e.target.querySelector('input[name="id"]').value,
                name: e.target.querySelector('input[name="name"]').value,
                email: e.target.querySelector('input[name="email"]').value,
                password: e.target.querySelector('input[name="password"]').value
            };
            try {
                const response = await fetch('api.php?action=update_moderator', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(formData)
                });
                const result = await response.json();
                if (result.success) {
                    closeModal('updateModeratorModal');
                    e.target.reset();
                    loadModerators();
                    showMessage(result.message);
                } else {
                    showMessage(result.error, true);
                }
            } catch (error) {
                console.error('Error updating moderator:', error);
                showMessage('Failed to update moderator', true);
            }
        });

        // Open Delete Modal
        function openDeleteModal(id) {
            currentModeratorId = id;
            openModal('deleteModeratorModal');
        }

        // Delete Moderator
        document.querySelector('#confirmDelete').addEventListener('click', async () => {
            try {
                const response = await fetch('api.php?action=delete_moderator', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ id: currentModeratorId })
                });
                const result = await response.json();
                if (result.success) {
                    closeModal('deleteModeratorModal');
                    loadModerators();
                    showMessage(result.message);
                } else {
                    showMessage(result.error, true);
                }
            } catch (error) {
                console.error('Error deleting moderator:', error);
                showMessage('Failed to delete moderator', true);
            }
           
        });

        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
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
</body>
</html>