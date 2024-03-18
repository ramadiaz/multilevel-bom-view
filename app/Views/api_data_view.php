<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/index.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/index.min.js"></script>
    <script>
        function toggleList(list) {
            list.classList.toggle('hidden');
        }

        function collapseAll() {
            const nestedLists = document.querySelectorAll('.nested-list');
            nestedLists.forEach(list => {
                list.classList.add('hidden');
            });
        }
    </script>
</head>

<body>
    <!-- <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button> -->

    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r border-neutral-600" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-neutral-950 text-slate-200  ">
            <div class="font-normal flex flex-col">
                <div class="px-4 py-4 font-semibold bg-gradient-to-br from-blue-600 to-green-400 ">
                    <img src="/logo.png" alt="logo">
                </div>
                <a class="px-4 py-4 hover:bg-gradient-to-br hover:from-green-400 hover:to-blue-600 from-30% transition-all duration-500" href="/">Bill of Materials</a>
                
            </div>
        </div>
    </aside>

    <div class="bg-neutral-900 text-slate-200 min-h-screen py-4 text-sm sm:ml-64">
        <button onclick="collapseAll()" class="relative inline-flex items-center justify-center p-0.5 mx-4 my-4 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 text-white focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 transition-all duration-500">
            <span class="relative px-4 py-1 transition-all ease-in duration-75 bg-gray-900 rounded-md group-hover:bg-opacity-0 text-sm transition-all duration-500">
                Collapse all
            </span>
        </button>
        <?php
        function displayItemsRecursive($json_data, $parent_id, $level = 0)
        {
            $filteredItems = array_filter($json_data, function ($item) use ($parent_id) {
                return $item['parent_id'] === $parent_id;
            });
        ?>

            <ul class='font-mono'>
                <?php
                foreach ($filteredItems as $item) {
                    $childItemsCount = count(array_filter($json_data, function ($childItem) use ($item) {
                        return $childItem['parent_id'] === $item['component_id'];
                    }));
                ?>
                    <li class="uppercase select-none bg-neutral-800">
                        <button type="button" onclick="toggleList(this.nextElementSibling)" class="flex flex-row items-center gap-3 px-4 py-2 whitespace-none">
                            <?php if (hasChildItems($json_data, $item['component_id'])) { ?>
                                <i class="ph ph-arrow-elbow-down-right"></i>
                            <?php } else { ?>
                                <i class='w-[14px]'></i>
                            <?php } ?>
                            <h6 class="inline-flex items-center gap-1"><?= $childItemsCount ?> <i class="ph ph-cube"></i> </h6>

                            <span class="opacity-75 ">
                                id:
                            </span>
                            <?= $item['component_id'] ?>
                            <?php if (isset($item['component_desc'])) { ?>
                                <span class="opacity-75 ">
                                    desc:
                                </span>
                                <?= $item['component_desc'] ?>
                            <?php } ?>
                            <?php if (isset($item['net']) && $item['net'] !== 0) { ?>
                                <span class="opacity-75 ">
                                    net:
                                </span>
                                <?= $item['net'] ?>
                            <?php } ?>
                            <?php if (isset($item['component_inv'])) { ?>
                                <span class="opacity-75 ">
                                    inv:
                                </span>
                                <?= $item['component_inv'] ?>
                            <?php } ?>
                        </button>
                        <ul class="ml-6 nested-list hidden list-disc list-inside transition-all duration-300">
                            <?php
                            displayItemsRecursive($json_data, $item['component_id'], $level + 1); ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>

        <?php
        function hasChildItems($json_data, $parent_id)
        {
            foreach ($json_data as $item) {
                if ($item['parent_id'] === $parent_id) {
                    return true;
                }
            }
            return false;
        }

        displayItemsRecursive($json_data, 'PARENT');
        ?>
    </div>

</body>

</html>