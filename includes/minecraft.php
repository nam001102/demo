<?php
include("includes/demoAssets.php");

$page = $_GET['page'] ?? '';
$sub = $_GET['sub'] ?? '';

// Find matching category
$category = null;
foreach ($categories as $cat) {
    if (strcasecmp($cat['title'], "CATEGORY-" . strtoupper($page)) === 0) {
        $category = $cat;
        break;
    }
}

if (!$category) {
    echo "<p>Category not found.</p>";
    exit;
}

// Filter items if sub param is provided
$items = $category['items'];
if ($sub) {
    $items = array_filter($items, function ($item) use ($sub) {
        return isset($item['tags']) && in_array(strtolower($sub), array_map('strtolower', $item['tags']));
    });
}
?>


<div class="row justify-content-center align-items-center">
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="d-flex flex-column gap-3 w-90">
            <div class="row">
                <section class="my-5 rounded-4 shadow p-3 w-100">
                    <h1><?= htmlspecialchars($category['title']) ?></h1>

                    <!-- Items container -->
                    <div class="items-container py-4">
                        <?php foreach ($items as $item): ?>
                            <div class="category-item">
                                <div class="position-relative overflow-hidden">
                                    <!-- Background image -->
                                    <img src="<?= $item['image'] ?>" alt="<?= htmlspecialchars($item['title']) ?>"
                                        class="img-fluid rounded-3 w-100" />

                                    <!-- Overlay with avatar + description -->
                                    <div
                                        class="position-absolute rounded-3 top-0 start-0 w-100 h-50 gradient-overlay d-flex align-items-start">
                                        <div class="p-3 text-white w-100">
                                            <div class="d-flex align-items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                    viewBox="0 0 17 17" fill="none" class="avatar rounded-circle">
                                                    <circle cx="8.5" cy="8.5" r="8.5" fill="#FFFDFD" />
                                                </svg>
                                                <p class="username mb-0 small">Cao Tuan Anh</p>
                                                <p class="timestamp mb-0 small">08 giờ trước</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h2><?= htmlspecialchars($item['title']) ?></h2>
                                <p><?= htmlspecialchars(implode(', ', $item['tags'] ?? [])) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="pagination w-100">

                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <a href="index.php?page=<?= urlencode($page) ?>&sub=<?= urlencode($sub) ?>&p=<?= $i ?>"
                                class="<?= $i === $currentPage ? 'active' : '' ?>">
                                <?= $i ?>
                            </a>
                        <?php endfor; ?>
                    </div>
                </section>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="container-fluid my-5 rounded-4 w-75">
                    <img src="assets/img/ads.png" alt="Advertisement" class="w-100" style="border-radius: 10px;" />
                </div>
            </div>
        </div>
    </div>
</div>

