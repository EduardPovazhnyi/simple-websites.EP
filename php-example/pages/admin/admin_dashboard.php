<?php
include 'database/config.php';
include 'components/header.php';

// create a query to bring in user data
$users = $conn->prepare("SELECT
  id,
  username,
  email,
  role,
  created_on
FROM users
");
$users->execute();
$users->store_result();
$users->bind_result($userId, $username, $email, $role, $created);
?>
<div class="relative font-[sans-serif] pt-[70px] h-screen">

  
<div>
  <div class="flex items-start">
   <?php include 'components/sidebar.php'; ?>

    <button id="toggle-sidebar"
      class='lg:hidden w-8 h-8 z-[100] fixed top-[74px] left-[10px] cursor-pointer bg-[#007bff] flex items-center justify-center rounded-full outline-none transition-all duration-500'>
      <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" class="w-3 h-3" viewBox="0 0 55.752 55.752">
        <path
          d="M43.006 23.916a5.36 5.36 0 0 0-.912-.727L20.485 1.581a5.4 5.4 0 0 0-7.637 7.638l18.611 18.609-18.705 18.707a5.398 5.398 0 1 0 7.634 7.635l21.706-21.703a5.35 5.35 0 0 0 .912-.727 5.373 5.373 0 0 0 1.574-3.912 5.363 5.363 0 0 0-1.574-3.912z"
          data-original="#000000" />
      </svg>
    </button>

    <section class="main-content w-full overflow-auto p-6">
      <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
          <thead class="bg-gray-800 whitespace-nowrap">
            <tr>
              <th class="p-4 text-left text-sm font-medium text-white">
                ID
              </th>
              <th class="p-4 text-left text-sm font-medium text-white">
                Username
              </th>
              <th class="p-4 text-left text-sm font-medium text-white">
                Email
              </th>
              <th class="p-4 text-left text-sm font-medium text-white">
                Role
              </th>
              <th class="p-4 text-left text-sm font-medium text-white">
              Created On
              </th>
              <th class="p-4 text-left text-sm font-medium text-white">
              Actions
              </th>
            </tr>
          </thead>

          <tbody class="whitespace-nowrap">
            <?php while($users->fetch()) : ?>
            <tr class="even:bg-blue-50">
              <td class="p-4 text-sm text-black">
                <?= $userId ?>
              </td>
              <td class="p-4 text-sm text-black">
              <?= $username ?>
              </td>
              <td class="p-4 text-sm text-black">
              <?= $email ?>
              </td>
              <td class="p-4 text-sm text-black">
              <?= $role ?>
             </td>
             <td class="p-4 text-sm text-black">
              <?= $created ?>
             </td>
              <td class="p-4">
                <button class="mr-4" title="Edit">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-500 hover:fill-blue-700"
                    viewBox="0 0 348.882 348.882">
                    <path
                      d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z"
                      data-original="#000000" />
                    <path
                      d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z"
                      data-original="#000000" />
                  </svg>
                </button>
                <button class="mr-4" title="Delete" onclick="window.location.href='delete-user?uid=<?= urlencode($userId) ?>' ">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700"
                    viewBox="0 0 24 24">
                    <path
                      d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                      data-original="#000000" />
                    <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                      data-original="#000000" />
                  </svg>
                </button>
              </td>
            </tr>
              <?php endwhile ?>
           
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
</div>
<?php
include 'components/footer.php';
?>