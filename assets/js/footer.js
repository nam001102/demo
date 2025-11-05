function getMaxHotWeekItems() {
  const width = window.innerWidth;
  if (width >= 1400) return 6; // 3×2
  if (width >= 1080) return 4; // 2×2
  if (width >= 768) return 2;  // 1×2
  return 1;                    // smallest: 1 item only
}

function getColClass(itemsPerRow) {
  if (itemsPerRow === 3) return 'col-sm-4'; // 3 per row
  if (itemsPerRow === 2) return 'col-sm-6'; // 2 per row
  return 'col-12';                          // full width
}

function renderHotWeek() {
  const maxItems = getMaxHotWeekItems();
  
  // Items per row based on screen width
  let itemsPerRow = 1;
  if (maxItems >= 6) itemsPerRow = 3;
  else if (maxItems >= 4) itemsPerRow = 2;

  const colClass = getColClass(itemsPerRow);
  const itemsToShow = featuredItems.slice(0, maxItems);

  const container = document.getElementById('js-hot-week-container');
  container.innerHTML = '';

  // Chunk into rows
  for (let i = 0; i < itemsToShow.length; i += itemsPerRow) {
    const rowDiv = document.createElement('div');
    rowDiv.className = 'row gx-2 gy-3';

    itemsToShow.slice(i, i + itemsPerRow).forEach(item => {
      const colDiv = document.createElement('div');
      colDiv.className = colClass;

      colDiv.innerHTML = `
        <div class="card rounded-3 border-0" style="height:140px; overflow:hidden;">
          <img src="${item.image}" class="card-img-top" alt="${item.title}" 
               style="width:100%; height:100%; object-fit:cover;">
        </div>
      `;

      rowDiv.appendChild(colDiv);
    });

    container.appendChild(rowDiv);
  }
}

window.addEventListener('load', renderHotWeek);
window.addEventListener('resize', renderHotWeek);
