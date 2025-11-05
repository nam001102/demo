document.addEventListener("DOMContentLoaded", () => {
    const dropdowns = document.querySelectorAll('.nav-item.dropdown');
    let activeDropdown = null;
    let closeTimeout = null;

    dropdowns.forEach(dropdown => {
      const menu = dropdown.querySelector('.dropdown-menu');

      dropdown.addEventListener('mouseenter', () => {
        // Clear previous close timeout
        if (closeTimeout) clearTimeout(closeTimeout);

        // Close other open dropdowns
        if (activeDropdown && activeDropdown !== dropdown) {
          activeDropdown.querySelector('.dropdown-menu')?.classList.remove('show');
        }

        // Show this one
        menu.classList.add('show');
        activeDropdown = dropdown;
      });

      dropdown.addEventListener('mouseleave', () => {
        closeTimeout = setTimeout(() => {
          menu.classList.remove('show');
          if (activeDropdown === dropdown) {
            activeDropdown = null;
          }
        }, 200); // Adjust delay as needed
      });
    });
  });