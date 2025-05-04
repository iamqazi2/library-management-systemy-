 
 
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