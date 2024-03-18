<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleList(list) {
            list.classList.toggle('hidden');
        }
    </script>
</head>

<body>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <span class="ms-3">BOM</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <?php
        function displayItemsRecursive($json_data, $parent_id, $level = 0)
        {
            $filteredItems = array_filter($json_data, function ($item) use ($parent_id) {
                return $item['parent_id'] === $parent_id;
            }); ?>

            <ul>

                <?php
                foreach ($filteredItems as $item) { ?>
                    <li  class="border border-slate-700 select-none">
                        <button type="button" onclick="toggleList(this.nextElementSibling)">
                            <?php echo str_repeat('`-', $level);?>
                            <?= $item['component_id'] ?> ||
                            <?= $item['net'] ?>
                            <?= $item['component_inv'] ?>
                            <span class="float-right">[+]</span>
                        </button>
                        <ul class="hidden pl-4 list-disc list-inside">
                            <?php
                            displayItemsRecursive($json_data, $item['component_id'], $level + 1); ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

        <?php
        displayItemsRecursive($json_data, 'F-ACDP-105D31L-B8C3-AP-PRA0');
        ?>
    </div>
</body>

</html>