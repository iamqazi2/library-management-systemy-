<!-- Sidebar -->
<div class="w-full max-w-[200px] bg-blue-500 text-white flex flex-col">
    <div class="flex justify-center mb-1 mx-4 my-4">
        <img src="images/Group.svg" alt="BookWorm Icon">
    </div>
    
    <div class="flex-grow">
        <!-- Navigation -->
        <div class="mt-6">
            <a href="dashboard.php" class="flex items-center px-4 py-3 hover:bg-white hover:text-blue-600 <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-white text-blue-600' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
                <span>Dashboard</span>
            </a>
            
            <a href="book.php" class="flex items-center px-4 py-3 hover:bg-white hover:text-blue-600 <?php echo basename($_SERVER['PHP_SELF']) == 'book.php' ? 'bg-white text-blue-600' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span>Books</span>
            </a>
            
            <a href="moderators-list.php" class="flex items-center px-4 py-3 hover:bg-white hover:text-blue-600 <?php echo basename($_SERVER['PHP_SELF']) == 'moderators-list.php' ? 'bg-white text-blue-600' : ''; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span>Moderators</span>
            </a>
        </div>
    </div>
    
    <a href="logout.php" class="flex items-center px-4 py-3 hover:bg-white hover:text-blue-600 <?php echo basename($_SERVER['PHP_SELF']) == 'logout.php' ? 'bg-white text-blue-600' : ''; ?>">
        <img src="images/logout.svg" class="h-5 w-5 mr-3" alt="Logout">
        <span>Log Out</span>
    </a>
</div>