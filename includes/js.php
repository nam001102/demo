<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/theme-switcher.js"></script>
<script src="assets/js/home.js"></script>
<script src="assets/js/category.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/footer.js"></script>
<script>
    const featuredItems = <?= json_encode(array_slice($featuredItems, 0)) ?>;
</script>