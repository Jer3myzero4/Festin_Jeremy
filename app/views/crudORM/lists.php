
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Students List</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
<div class="max-w-6xl mx-auto px-4 py-8">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Students</h1>
        <a href="<?= site_url('students/create'); ?>" class="inline-flex items-center gap-2 bg-indigo-600 text-white px-4 py-2 rounded shadow hover:bg-indigo-700">➕ Add Student</a>
    </div>

    <form method="get" class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-6 items-center">
        <?php
            $q = isset($query) ? $query : '';
            $cur_page = isset($page) ? (int)$page : 1;
            $cur_per = isset($per_page) ? (int)$per_page : 3;
            $total_items = isset($total_items) ? (int)$total_items : 0;
            $total_pages = isset($total_pages) ? (int)$total_pages : 1;
        ?>
        <div class="col-span-1 sm:col-span-2 flex gap-3">
            <input type="search" name="q" value="<?= htmlspecialchars($q, ENT_QUOTES); ?>" placeholder="Search firstname, lastname or email" class="flex-1 px-3 py-2 border rounded bg-white focus:outline-none focus:ring-2 focus:ring-indigo-300">
            <select name="per_page" onchange="this.form.submit()" class="px-3 py-2 border rounded bg-white">
                <?php foreach ([3,6,9] as $opt): ?>
                    <option value="<?= $opt; ?>" <?= $cur_per === $opt ? 'selected' : ''; ?>><?= $opt; ?> / page</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex justify-end gap-2">
            <button type="submit" class="px-3 py-2 border rounded bg-white hover:bg-gray-100">Search</button>
            <a href="<?= site_url('students/get-all'); ?>" class="px-3 py-2 border rounded bg-white hover:bg-gray-100">Reset</a>
        </div>

        <div class="col-span-1 sm:col-span-3 text-sm text-gray-500 text-right">
            <?php
                $start = $total_items ? (($cur_page - 1) * $cur_per) + 1 : 0;
                $shown = isset($students) ? count($students) : 0;
                $end = $total_items ? $start + $shown - 1 : 0;
            ?>
            Showing <?= $start; ?> - <?= $end; ?> of <?= $total_items; ?> results
        </div>
    </form>

    <?php if (empty($students)): ?>
        <div class="rounded bg-white p-4 shadow">No students found.</div>
    <?php else: ?>

    <div class="overflow-x-auto rounded shadow bg-white">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">ID</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Firstname</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Lastname</th>
                <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                <th class="px-4 py-3 text-center text-sm font-medium text-gray-600">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
            <?php
                function row_val($row, $key) {
                    if (is_array($row)) return isset($row[$key]) ? $row[$key] : '';
                    if (is_object($row)) return isset($row->$key) ? $row->$key : '';
                    return '';
                }
            ?>
            <?php foreach($students as $s): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3"><?= htmlspecialchars(row_val($s,'id'), ENT_QUOTES); ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars(row_val($s,'firstname'), ENT_QUOTES); ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars(row_val($s,'lastname'), ENT_QUOTES); ?></td>
                    <td class="px-4 py-3"><?= htmlspecialchars(row_val($s,'email'), ENT_QUOTES); ?></td>
                    <td class="px-4 py-3 text-center">
                        <div class="inline-flex items-center gap-2">
                            <a href="<?= site_url('students/update/'.rawurlencode(row_val($s,'id'))); ?>" class="px-2 py-1 bg-yellow-400 text-white rounded text-xs hover:brightness-90">✏️ Update</a>
                            <a href="<?= site_url('students/delete/'.rawurlencode(row_val($s,'id'))); ?>" onclick="return confirm('Are you sure you want to delete this student?');" class="px-2 py-1 bg-red-500 text-white rounded text-xs hover:brightness-90">🗑️ Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if ($total_pages > 1): ?>
        <?php
            $base_q = [];
            if ($q !== '') { $base_q['q'] = $q; }
            if ($cur_per) { $base_q['per_page'] = $cur_per; }
            $build_page_url = function($p) use ($base_q) {
                $qs = http_build_query(array_merge($base_q, ['page' => $p]));
                return site_url('students/get-all') . ($qs ? '?' . $qs : '');
            };
            $start_page = max(1, $cur_page - 2);
            $end_page = min($total_pages, $cur_page + 2);
        ?>
        <nav class="mt-4 flex justify-center">
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a class="px-3 py-1 rounded-l border bg-white <?= $cur_page <= 1 ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100' ?>" href="<?= $cur_page <= 1 ? '#' : $build_page_url(1); ?>">« First</a>
                </li>
                <li>
                    <a class="px-3 py-1 border bg-white <?= $cur_page <= 1 ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100' ?>" href="<?= $cur_page <= 1 ? '#' : $build_page_url($cur_page - 1); ?>">‹ Prev</a>
                </li>

                <?php for ($p = $start_page; $p <= $end_page; $p++): ?>
                    <li>
                        <a class="px-3 py-1 border-t border-b <?= $p === $cur_page ? 'bg-indigo-600 text-white' : 'bg-white hover:bg-gray-100' ?>" href="<?= $p === $cur_page ? '#' : $build_page_url($p); ?>"><?= $p; ?></a>
                    </li>
                <?php endfor; ?>

                <li>
                    <a class="px-3 py-1 border bg-white <?= $cur_page >= $total_pages ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100' ?>" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($cur_page + 1); ?>">Next ›</a>
                </li>
                <li>
                    <a class="px-3 py-1 rounded-r border bg-white <?= $cur_page >= $total_pages ? 'opacity-50 pointer-events-none' : 'hover:bg-gray-100' ?>" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($total_pages); ?>">Last »</a>
                </li>
            </ul>
        </nav>
    <?php endif; ?>

    <?php endif; ?>

</div>
</body>
</html>