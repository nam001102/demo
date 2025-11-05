document.addEventListener('DOMContentLoaded', () => {
  const checkbox = document.querySelector('.theme-switch__checkbox');

  const setTheme = (theme) => {
    document.documentElement.setAttribute('data-bs-theme', theme);
    localStorage.setItem('theme', theme);
  };

  const storedTheme = localStorage.getItem('theme');
  if (storedTheme) {
    setTheme(storedTheme);
    if (checkbox) checkbox.checked = storedTheme === 'dark';
  } else {
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const defaultTheme = prefersDark ? 'dark' : 'light';
    setTheme(defaultTheme);
    if (checkbox) checkbox.checked = prefersDark;
  }

  if (checkbox) {
    checkbox.addEventListener('change', () => {
      const newTheme = checkbox.checked ? 'dark' : 'light';
      setTheme(newTheme);
    });
  }
});
