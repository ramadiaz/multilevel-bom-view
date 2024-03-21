<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/phosphor-icons@1.4.2/src/index.min.js"></script>
</head>

<body>
    <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r border-neutral-600" aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-neutral-950 text-slate-200  ">
            <div class="font-normal flex flex-col">
                <div class="px-4 py-4 font-semibold bg-gradient-to-br from-blue-600 to-green-400 ">
                    <img src="/logo.png" alt="logo">
                </div>
                <a class="px-4 py-4 hover:bg-gradient-to-br hover:from-green-400 hover:to-blue-600 from-30% transition-all duration-500" href='/bill-of-materials'>Bill of Materials</a>
                <a class="px-4 py-4 hover:bg-gradient-to-br hover:from-green-400 hover:to-blue-600 from-30% transition-all duration-500" href='/regist-bom'>Add new BOM</a>

            </div>
        </div>
    </aside>

    <div class="bg-neutral-900 text-slate-200 min-h-screen py-4 text-sm sm:ml-64">
        <!-- <form action="/regist-bom-api" method="post">
            <input type="text" name="id" id="id" placeholder="COMPONENT ID">
            <input type="text" name="desc" id="desc" placeholder="DESCRIPTION">
            <input type="text" name="inv" id="inv" placeholder="INV">
            <button type="submit">Submit</button>
        </form> -->

        <div class="relative mt-12 w-full max-w-lg sm:mt-10">
            <div class="relative -mb-px h-px w-full bg-gradient-to-r from-transparent via-sky-300 to-transparent" bis_skin_checked="1"></div>
            <div class="mx-5 border dark:border-b-white/50 dark:border-t-white/50 border-b-white/20 sm:border-t-white/20 shadow-[20px_0_20px_20px] shadow-slate-500/10 dark:shadow-white/20 rounded-lg border-white/20 border-l-white/20 border-r-white/20 sm:shadow-sm lg:rounded-xl lg:shadow-none">
                <div class="flex flex-col p-6">
                    <h3 class="text-xl font-semibold leading-6 tracking-tighter">Register new Component</h3>
                    <p class="mt-1.5 text-sm font-medium text-white/50">New component register form.
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <form action="/regist-bom-api" method="post">
                        <div>
                            <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                <div class="flex justify-between">
                                    <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Component ID</label>
                                </div>
                                <input type="text" name="id" id="id" autocomplete="off" class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 file:rounded-full file:border-0 file:bg-accent file:px-4 file:py-2 file:font-medium placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 sm:leading-7 text-foreground">
                            </div>
                        </div>
                        <div class="mt-4">
                            <div>
                                <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                    <div class="flex justify-between">
                                        <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Description</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="text" id="desc" name="desc" autocomplete="off" class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div>
                                <div class="group relative rounded-lg border focus-within:border-sky-200 px-3 pb-1.5 pt-2.5 duration-200 focus-within:ring focus-within:ring-sky-300/30">
                                    <div class="flex justify-between">
                                        <label class="text-xs font-medium text-muted-foreground group-focus-within:text-white text-gray-400">Inv</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="text" id="inv" name="inv" autocomplete="off" class="block w-full border-0 bg-transparent p-0 text-sm file:my-1 placeholder:text-muted-foreground/90 focus:outline-none focus:ring-0 focus:ring-teal-500 sm:leading-7 text-foreground">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 flex items-center justify-end gap-x-2">
                            <button class="font-semibold hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 inline-flex items-center justify-center rounded-md text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-white text-black h-10 px-4 py-2" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>

</html>