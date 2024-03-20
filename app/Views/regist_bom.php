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
        <form action="/regist-bom-api" method="post">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <button type="submit">Submit</button>
        </form>

    </div>

</body>

</html>