<?php
$currentPage = $_GET['page'] ?? 'home';
$currentSub = $_GET['sub'] ?? '';
?>


<header class="header sticky-top bg-body-tertiary w-100">
    <nav class="navbar navbar-expand-lg bg-body-tertiary w-100 h-100 px-4 py-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php?page=home">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold <?= $currentPage === 'home' ? 'active' : '' ?>"
                            href="index.php?page=home">HOME</a>
                    </li>

                    <?php foreach ($categories as $category):
                        $main = strtolower(str_replace('CATEGORY-', '', $category['title']));
                        $currentMain = strtolower($currentPage); // assuming $currentPage is current main category from URL
                    
                        // Gather unique tags from all items in this category
                        $allTags = [];
                        foreach ($category['items'] as $item) {
                            if (isset($item['tags']) && is_array($item['tags'])) {
                                foreach ($item['tags'] as $tag) {
                                    $allTags[strtolower($tag)] = $tag; // preserve original case for display
                                }
                            }
                        }
                        // Sort tags alphabetically
                        natcasesort($allTags);

                        $currentSub = $_GET['sub'] ?? '';
                        ?>
                        <li class="nav-item dropdown position-static fw-semibold">
                            <a class="nav-link dropdown-toggle <?= $currentMain === $main ? 'active' : '' ?>" href="#"
                                data-bs-toggle="dropdown">
                                <?= strtoupper($main) ?>
                            </a>
                            <div class="dropdown-menu full-width-dropdown bg-body-tertiary w-100 border-0">
                                <div class="container-fluid py-1 d-flex justify-content-center flex-wrap gap-5">
                                    <?php foreach ($allTags as $tagSlug => $tagDisplay): ?>
                                        <?php
                                        $tagHref = strtolower(str_replace(' ', '-', $tagDisplay));
                                        $isActive = ($currentMain === $main && $currentSub === $tagHref);
                                        ?>
                                        <p class="fs-5 fw-semibold m-0">
                                            <a href="index.php?page=<?= $main ?>&sub=<?= $tagHref ?>"
                                                class="text-decoration-none <?= $isActive ? 'active' : '' ?>">
                                                <?= htmlspecialchars($tagDisplay) ?>
                                            </a>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>

                    <li class="nav-item fw-semibold">
                        <a class="nav-link <?= $currentPage === 'fqas' ? 'active' : '' ?>" href="index.php?page=fqas">
                            FQAs
                        </a>
                    </li>
                    <li class="nav-item fw-semibold">
                        <a class="nav-link <?= $currentPage === 'reports' ? 'active' : '' ?>"
                            href="index.php?page=reports">
                            REPORT DEAD LINK
                        </a>
                    </li>
                </ul>

                <!-- Right action buttons (search + theme) -->
                <div class="d-flex align-items-center">
                    <!-- Search Button -->
                    <div class="dropdown position-relative me-3">
                        <button class="btn d-flex align-items-center justify-content-center" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <svg class="search-icon" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M10 2a8 8 0 105.3 14.3l5.4 5.4 1.4-1.4-5.4-5.4A8 8 0 0010 2zm0 2a6 6 0 110 12A6 6 0 0110 4z" />
                            </svg>
                        </button>

                        <div class="dropdown-menu p-3 shadow"
                            style="position: absolute; left: 0; right: auto; transform: translateX(-80%); min-width: 300px;">
                            <form class="d-flex" action="index.php" method="get">
                                <input type="hidden" name="page" value="search">
                                <input class="form-control me-2" type="search" name="q" placeholder="Tìm Kiếm..."
                                    aria-label="Search">
                                <button class="btn btn-primary" type="submit">Tìm</button>
                            </form>
                        </div>
                    </div>
                    <label class="theme-switch">
                        <input type="checkbox" class="theme-switch__checkbox">
                        <div class="theme-switch__container">
                            <div class="theme-switch__clouds"></div>
                            <div class="theme-switch__stars-container">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 144 55" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M135.831 3.00688C135.055 3.85027 134.111 4.29946 133 4.35447C134.111 4.40947 135.055 4.85867 135.831 5.71123C136.607 6.55462 136.996 7.56303 136.996 8.72727C136.996 7.95722 137.172 7.25134 137.525 6.59129C137.886 5.93124 138.372 5.39954 138.98 5.00535C139.598 4.60199 140.268 4.39114 141 4.35447C139.88 4.2903 138.936 3.85027 138.16 3.00688C137.384 2.16348 136.996 1.16425 136.996 0C136.996 1.16425 136.607 2.16348 135.831 3.00688ZM31 23.3545C32.1114 23.2995 33.0551 22.8503 33.8313 22.0069C34.6075 21.1635 34.9956 20.1642 34.9956 19C34.9956 20.1642 35.3837 21.1635 36.1599 22.0069C36.9361 22.8503 37.8798 23.2903 39 23.3545C38.2679 23.3911 37.5976 23.602 36.9802 24.0053C36.3716 24.3995 35.8864 24.9312 35.5248 25.5913C35.172 26.2513 34.9956 26.9572 34.9956 27.7273C34.9956 26.563 34.6075 25.5546 33.8313 24.7112C33.0551 23.8587 32.1114 23.4095 31 23.3545ZM0 36.3545C1.11136 36.2995 2.05513 35.8503 2.83131 35.0069C3.6075 34.1635 3.99559 33.1642 3.99559 32C3.99559 33.1642 4.38368 34.1635 5.15987 35.0069C5.93605 35.8503 6.87982 36.2903 8 36.3545C7.26792 36.3911 6.59757 36.602 5.98015 37.0053C5.37155 37.3995 4.88644 37.9312 4.52481 38.5913C4.172 39.2513 3.99559 39.9572 3.99559 40.7273C3.99559 39.563 3.6075 38.5546 2.83131 37.7112C2.05513 36.8587 1.11136 36.4095 0 36.3545ZM56.8313 24.0069C56.0551 24.8503 55.1114 25.2995 54 25.3545C55.1114 25.4095 56.0551 25.8587 56.8313 26.7112C57.6075 27.5546 57.9956 28.563 57.9956 29.7273C57.9956 28.9572 58.172 28.2513 58.5248 27.5913C58.8864 26.9312 59.3716 26.3995 59.9802 26.0053C60.5976 25.602 61.2679 25.3911 62 25.3545C60.8798 25.2903 59.9361 24.8503 59.1599 24.0069C58.3837 23.1635 57.9956 22.1642 57.9956 21C57.9956 22.1642 57.6075 23.1635 56.8313 24.0069ZM81 25.3545C82.1114 25.2995 83.0551 24.8503 83.8313 24.0069C84.6075 23.1635 84.9956 22.1642 84.9956 21C84.9956 22.1642 85.3837 23.1635 86.1599 24.0069C86.9361 24.8503 87.8798 25.2903 89 25.3545C88.2679 25.3911 87.5976 25.602 86.9802 26.0053C86.3716 26.3995 85.8864 26.9312 85.5248 27.5913C85.172 28.2513 84.9956 28.9572 84.9956 29.7273C84.9956 28.563 84.6075 27.5546 83.8313 26.7112C83.0551 25.8587 82.1114 25.4095 81 25.3545ZM136 36.3545C137.111 36.2995 138.055 35.8503 138.831 35.0069C139.607 34.1635 139.996 33.1642 139.996 32C139.996 33.1642 140.384 34.1635 141.16 35.0069C141.936 35.8503 142.88 36.2903 144 36.3545C143.268 36.3911 142.598 36.602 141.98 37.0053C141.372 37.3995 140.886 37.9312 140.525 38.5913C140.172 39.2513 139.996 39.9572 139.996 40.7273C139.996 39.563 139.607 38.5546 138.831 37.7112C138.055 36.8587 137.111 36.4095 136 36.3545ZM101.831 49.0069C101.055 49.8503 100.111 50.2995 99 50.3545C100.111 50.4095 101.055 50.8587 101.831 51.7112C102.607 52.5546 102.996 53.563 102.996 54.7273C102.996 53.9572 103.172 53.2513 103.525 52.5913C103.886 51.9312 104.372 51.3995 104.98 51.0053C105.598 50.602 106.268 50.3911 107 50.3545C105.88 50.2903 104.936 49.8503 104.16 49.0069C103.384 48.1635 102.996 47.1642 102.996 46C102.996 47.1642 102.607 48.1635 101.831 49.0069Z"
                                        fill="currentColor"></path>
                                </svg>
                            </div>
                            <div class="theme-switch__circle-container">
                                <div class="theme-switch__sun-moon-container">
                                    <div class="theme-switch__moon">
                                        <div class="theme-switch__spot"></div>
                                        <div class="theme-switch__spot"></div>
                                        <div class="theme-switch__spot"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </label>

                    <a class="btn d-flex align-items-center justify-content-center theme-account-btn"
                        href="index.php?page=login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 56 56" fill="none">
                            <path d="M38 40C38 34.8453 33.5228 30.6667 28 30.6667C22.4772 30.6667 18 34.8453 18 40H38Z"
                                fill="currentColor" />
                            <path
                                d="M28 26.6667C24.8441 26.6667 22.2857 24.2789 22.2857 21.3333C22.2857 18.3878 24.8441 16 28 16C31.1559 16 33.7143 18.3878 33.7143 21.3333C33.7143 24.2789 31.1559 26.6667 28 26.6667Z"
                                fill="currentColor" />
                            <path d="M38 40C38 34.8453 33.5228 30.6667 28 30.6667C22.4772 30.6667 18 34.8453 18 40H38Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M28 26.6667C24.8441 26.6667 22.2857 24.2789 22.2857 21.3333C22.2857 18.3878 24.8441 16 28 16C31.1559 16 33.7143 18.3878 33.7143 21.3333C33.7143 24.2789 31.1559 26.6667 28 26.6667Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <rect x="1" y="1" width="54" height="54" rx="27" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </a>


                </div>
            </div>
        </div>
    </nav>
</header>