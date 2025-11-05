<?php include("includes/demoAssets.php"); ?>
<div class="container-fluid d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column gap-3 w-90">
        <div class="row">
            <section class="my-5 rounded-4 shadow p-3 w-100">
                <div class="row">
                    <!-- Column 1: First featured item -->
                    <div id="first-featured-col" class="col-md-5">
                        <?php if (!empty($featuredItems)): ?>
                            <?php $item = $featuredItems[0]; ?>
                            <div class="card h-100 rounded-3 border-0">
                                <img src="<?= $item['image'] ?>" class="card-img-top" style="border-radius: 10px;"
                                    alt="<?= htmlspecialchars($item['title']) ?>">
                                <div class="card-body">
                                    <h2 class="card-title"><?= htmlspecialchars($item['title']) ?></h2>
                                    <p class="card-text"><?= htmlspecialchars($item['author']) ?></p>
                                    <p class="card-text text-muted"><?= htmlspecialchars($item['time']) ?></p>
                                    <p class="card-text"><?= htmlspecialchars($item['description']) ?></p>
                                    <div id="component" class="container py-0">
                                        <div class="row">
                                            <?php foreach ($item['tags'] as $tag): ?>
                                                <div class="col-auto">
                                                    <div class="p-2 px-3 rounded-pill border" style="border-color: #CDCBCB;">
                                                        <p class="text-center m-0 small"><?= htmlspecialchars($tag) ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-7">
                        <div class="featured-item">
                            <?php
                            // Exclude the first item, then take max 8 items
                            $itemsToShow = array_slice($featuredItems, 1, 8);
                            foreach ($itemsToShow as $item):
                                ?>
                                <div class="featured-card">
                                    <img src="<?= htmlspecialchars($item['image']) ?>"
                                        alt="<?= htmlspecialchars($item['title']) ?>" />
                                    <h2><?= htmlspecialchars($item['title']) ?></h2>
                                    <p><?= htmlspecialchars(implode(', ', $item['tags'] ?? [])) ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <div class="row">
            <section class="my-1 rounded-4 shadow p-3 w-100">
                <div class="container-fluid">

                    <div class="row p-0 mb-1">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <p class="fs-2 fw-bold text-uppercase mb-0 flex-grow-1">Ranking - Top 10</p>
                            <a href="index.php?page=ranking" class="fw-semibold ms-3 text-decoration-none">See all</a>
                        </div>
                    </div>

                    <div class="row g-0">
                        <!-- First Column -->
                        <div class="col-md-6">
                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                <div class="row align-items-center py-1 px-2 mb-2">
                                    <div class="col-auto">
                                        <div class="bg-success-subtle rounded-circle" style="width: 10px; height: 10px;">
                                        </div>
                                    </div>
                                    <div class="col fw-bold">NGUYEN DUC TRUNG</div>
                                    <div class="col-auto">Hạng 1</div>
                                    <div class="col-auto">Cấp 7</div>
                                </div>
                            <?php endfor; ?>
                        </div>

                        <!-- Second Column -->
                        <div class="col-md-6">
                            <?php for ($i = 6; $i <= 10; $i++): ?>
                                <div class="row align-items-center py-1 px-2 mb-2">
                                    <div class="col-auto">
                                        <div class="bg-success-subtle rounded-circle" style="width: 10px; height: 10px;">
                                        </div>
                                    </div>
                                    <div class="col fw-bold">NGUYEN DUC TRUNG</div>
                                    <div class="col-auto">Hạng 1</div>
                                    <div class="col-auto">Cấp 7</div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <?php foreach ($categories as $category): ?>
            <div class="row">
                <section class="my-5 rounded-4 shadow p-3 w-100">
                    <h1><?= htmlspecialchars($category['title']) ?></h1>
                    <div class="row">
                        <?php
                        // Limit to max 6 items for 2 rows of 3 columns each
                        $itemsToShow = array_slice($category['items'], 0, 6);
                        ?>
                        <?php foreach ($itemsToShow as $item): ?>
                            <div class="col-md-4 mb-4">
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

                                <!-- Normal text below -->
                                <h2><?= htmlspecialchars($item['title']) ?></h2>
                                <p><?= htmlspecialchars(implode(', ', $item['tags'] ?? [])) ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>

        <div class="row justify-content-center align-items-center">
            <div class="container-fluid my-5 rounded-4 w-75">
                <img src="assets/img/ads.png" alt="Advertisement" class="w-100" style="border-radius: 10px;" />
            </div>
        </div>
    </div>

</div>