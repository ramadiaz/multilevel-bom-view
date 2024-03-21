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
                        <button type="button" onclick="toggleList(this.nextElementSibling)" class="button-list flex flex-row items-center gap-3 px-4 py-2 whitespace-none">
                            <?php if (hasChildItems($json_data, $item['component_id'])) { ?>
                                <i class="ph ph-arrow-elbow-down-right"></i>
                            <?php } else { ?>
                                <i class='w-[14px]'></i>
                            <?php } ?>
                            <h6 class="inline-flex items-center gap-1"><?= $level ?> <i class="ph ph-cube"></i> </h6>

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