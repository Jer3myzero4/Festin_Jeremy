
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Update Student</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
  <div class="min-h-screen flex items-center justify-center py-12 px-4">
    <div class="w-full max-w-lg">
      <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-5 bg-indigo-600">
          <h3 class="text-white text-lg font-semibold text-center">Update Student</h3>
        </div>

        <div class="p-6">
          <form action="<?= site_url('students/update/'.rawurlencode($stu['id'] ?? '')); ?>" method="POST" class="space-y-4">
            <div>
              <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="lastname" name="lastname" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     value="<?= htmlspecialchars($stu['lastname'] ?? '', ENT_QUOTES); ?>" />
            </div>

            <div>
              <label for="firstname" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="firstname" name="firstname" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     value="<?= htmlspecialchars($stu['firstname'] ?? '', ENT_QUOTES); ?>" />
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1"></label>
              <input id="email" name="email" type="email" required
                     class="w-full px-3 py-2 border rounded-md bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300"
                     value="<?= htmlspecialchars($stu['email'] ?? '', ENT_QUOTES); ?>" />
            </div>

            <div class="flex gap-3">
              <button type="submit" class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update Student</button>
              <a href="<?= site_url('students/get-all'); ?>" class="px-4 py-2 border rounded-md text-indigo-700 hover:bg-indigo-50">Back to List</a>
            </div>
          </form>
        </div>
      </div>
      <p class="text-center text-sm text-gray-500 mt-3">Edit student details</p>
    </div>
  </div>
</body>
</html>
