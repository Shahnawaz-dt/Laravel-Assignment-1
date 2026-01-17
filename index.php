<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
    </style>
  </head>

      <?php 
      require_once 'StudentManager.php'; 
      $manager = new StudentManager();  
      $editingStudent = $manager->handleActions();
      $students = $manager->getAllStudents(); 
?>


  <body class="h-full">
    <div class="min-h-full flex flex-col">
      <nav class="bg-indigo-600 pb-32">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <span class="text-white font-bold text-xl tracking-tight"
                  >STUDENT.IO</span
                >
              </div>
            </div>
            <div class="hidden md:block">
              <div class="ml-4 flex items-center md:ml-6">
                <button
                  class="rounded-full bg-indigo-700 p-1 text-indigo-200 hover:text-white focus:outline-none"
                >
                  <span class="sr-only">View notifications</span>
                  <svg
                    class="h-6 w-6"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"
                    />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
        <header class="py-10">
          <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
              Student List
            </h1>
          </div>
        </header>
      </nav>

      <main class="-mt-32">

      <main class="-mt-32">
    <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">

        <?php if ($editingStudent): ?>
        <div class="mb-6 rounded-lg bg-white p-6 shadow-md ring-1 ring-gray-900/5">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Edit Student Record</h2>
            <form method="POST" class="grid grid-cols-1 gap-4 sm:grid-cols-4">
                <input type="hidden" name="update_id" value="<?php echo $editingStudent['id']; ?>">
                
                <input type="text" name="name" value="<?php echo $editingStudent['name']; ?>" class="border p-2 rounded text-sm">
                <input type="email" name="email" value="<?php echo $editingStudent['email']; ?>" class="border p-2 rounded text-sm">
                <input type="text" name="phone" value="<?php echo $editingStudent['phone']; ?>" class="border p-2 rounded text-sm">
                
                <select name="status" class="border p-2 rounded text-sm">
                    <option <?php echo $editingStudent['status'] == 'Active' ? 'selected' : ''; ?>>Active</option>
                    <option <?php echo $editingStudent['status'] == 'On Leave' ? 'selected' : ''; ?>>On Leave</option>
                    <option <?php echo $editingStudent['status'] == 'Graduated' ? 'selected' : ''; ?>>Graduated</option>
                </select>
                
                <div class="sm:col-span-4 flex justify-end gap-2">
                    <a href="index.php" class="px-4 py-2 text-sm text-gray-600 border rounded">Cancel</a>
                    <button type="submit" class="px-4 py-2 text-sm bg-indigo-600 text-white rounded">Update Student</button>
                </div>
            </form>
        </div>
        <?php endif; ?>
        <div class="bg-white shadow sm:rounded-lg">
             <table class="...">
                 </table>
        </div>
    </div>
</main>

        <div class="mx-auto max-w-7xl px-4 pb-12 sm:px-6 lg:px-8">
          <div class="rounded-lg bg-white px-5 py-6 shadow sm:px-6">
            <div class="sm:flex sm:items-center mb-8">
              <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">
                  A list of all students currently enrolled including their name
                  and email address.
                </p>
              </div>
              <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a
                  href="create.php"
                  class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                  Add Student
                </a>
              </div>
            </div>


              




            <div class="overflow-x-auto">
              
              <table class="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr>
                    <th
                      scope="col"
                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0"
                    >
                      Name
                    </th>
                    <th
                      scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Email
                    </th>
                    <th
                      scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Phone
                    </th>
                    <th
                      scope="col"
                      class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                    >
                      Status
                    </th>
                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                      <span class="sr-only">Actions</span>
                    </th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php if (empty($students)): ?>
                        <tr><td colspan="5" class="text-center py-4">No students found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                    <?php echo $student['name']; ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?php echo $student['email']; ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?php echo $student['phone']; ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span class="inline-flex items-center rounded-md px-2 py-1 text-xs font-medium ring-1 ring-inset 
                                        <?php echo ($student['status'] === 'Active') ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-800 ring-yellow-600/20'; ?>">
                                        <?php echo $student['status']; ?>
                                    </span>
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                    <a href="index.php?action=edit&id=<?php echo $student['id']; ?>" 
                                      class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>

                                    <a href="index.php?action=delete&id=<?php echo $student['id']; ?>" 
                                      class="text-red-600 hover:text-red-900" 
                                      onclick="return confirm('Delete this student?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>                                                      
              </table>


            </div>
          </div>
        </div>
      </main>

      <footer class="bg-white border-t border-gray-200 py-6 mt-auto">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
          <p class="text-center text-sm text-gray-500">
            &copy; 2025 Student Management System.
          </p>
        </div>
      </footer>
    </div>
  </body>
</html>
