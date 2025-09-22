<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Add Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-lg">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-5 bg-indigo-600">
          <h3 class="text-white text-lg font-semibold text-center">Add New Student</h3>
        </div>

        <div class="p-6">
          <?php if (isset($insert_id)): ?>
            <?php if ($insert_id): ?>
              <div class="mb-4 rounded border border-green-200 bg-green-50 p-3 flex items-start justify-between">
                <div class="text-green-800">🎉 Inserted successfully!</div>
                <button type="button" class="text-green-800 font-bold" onclick="this.parentElement.remove()">✕</button>
              </div>
            <?php else: ?>
              <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 flex items-start justify-between">
                <div class="text-red-800">❌ Insert failed! Please try again.</div>
                <button type="button" class="text-red-800 font-bold" onclick="this.parentElement.remove()">✕</button>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <form action="<?= site_url('students/create'); ?>" method="POST" class="space-y-4">
            <div>
              <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="lastname" name="lastname" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     placeholder="Enter your lastname" />
            </div>

            <div>
              <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="firstname" name="firstname" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     placeholder="Enter your firstname" />
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="email" name="email" type="email" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     placeholder="Enter your email" />
            </div>

            <div class="flex gap-3">
              <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Add Student</button>
              <a href="<?= site_url('students/get-all'); ?>" class="px-4 py-2 border rounded-md text-indigo-700 hover:bg-indigo-50">Student List</a>
            </div>
          </form>
        </div>
      </div>
      <p class="text-center text-sm text-gray-500 mt-3">Create student details</p>
    </div>
  </div>
</body>
</html>
